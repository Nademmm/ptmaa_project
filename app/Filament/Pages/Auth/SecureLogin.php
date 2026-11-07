<?php

namespace App\Filament\Pages\Auth;

use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use Filament\Facades\Filament;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Http\Responses\Auth\Contracts\LoginResponse;
use Filament\Models\Contracts\FilamentUser;
use Filament\Notifications\Notification;
use Filament\Pages\Auth\Login as BaseLogin;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class SecureLogin extends BaseLogin
{
    public function getTitle(): string | Htmlable
    {
        return 'Otorisasi Portal Internal — PT. Multi Abadi Aksana';
    }

    public function getHeading(): string | Htmlable
    {
        return 'Otorisasi Portal Internal';
    }

    public function getSubheading(): string | Htmlable | null
    {
        return 'Akses terbatas khusus Administrator resmi PT. Multi Abadi Aksana. Seluruh aktivitas & alamat IP tercatat oleh sistem.';
    }

    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getEmailFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getHoneypotFormComponent(),
                        $this->getRememberFormComponent(),
                    ])
                    ->statePath('data'),
            ),
        ];
    }

    protected function getHoneypotFormComponent(): Component
    {
        return TextInput::make('website_security_trap')
            ->label('Jangan diisi (Perangkap Bot)')
            ->autocomplete('off')
            ->extraInputAttributes([
                'tabindex' => '-1',
                'aria-hidden' => 'true',
            ])
            ->extraFieldWrapperAttributes([
                'style' => 'position:absolute;left:-9999px;width:1px;height:1px;opacity:0;overflow:hidden;pointer-events:none;',
                'aria-hidden' => 'true',
            ]);
    }

    public function authenticate(): ?LoginResponse
    {
        try {
            // Maksimal 3 kali percobaan dalam 300 detik (5 menit) per IP
            $this->rateLimit(3, 300);
        } catch (TooManyRequestsException $exception) {
            Log::warning('[SECURITY] Brute-force rate limit terpicu pada Portal Admin', [
                'ip' => request()->ip(),
                'user_agent' => request()->userAgent(),
                'seconds_remaining' => $exception->secondsUntilAvailable,
            ]);

            Notification::make()
                ->title('Akses Dikunci Sementara (Proteksi Brute-Force)')
                ->body("Terlalu banyak percobaan masuk yang gagal. Silakan tunggu {$exception->secondsUntilAvailable} detik sebelum mencoba kembali.")
                ->danger()
                ->send();

            return null;
        }

        $data = $this->form->getState();

        // Proteksi Honeypot Anti-Bot
        if (! empty($data['website_security_trap'])) {
            Log::alert('[SECURITY] Bot Honeypot terdeteksi pada form login Admin', [
                'ip' => request()->ip(),
                'user_agent' => request()->userAgent(),
                'email_attempted' => $data['email'] ?? null,
            ]);

            $this->throwFailureValidationException();
        }

        if (! Filament::auth()->attempt($this->getCredentialsFromFormData($data), $data['remember'] ?? false)) {
            Log::warning('[SECURITY] Percobaan login Admin GAGAL', [
                'ip' => request()->ip(),
                'email_attempted' => $data['email'] ?? null,
                'user_agent' => request()->userAgent(),
            ]);

            $this->throwFailureValidationException();
        }

        $user = Filament::auth()->user();

        if (
            ($user instanceof FilamentUser) &&
            (! $user->canAccessPanel(Filament::getCurrentPanel()))
        ) {
            Filament::auth()->logout();

            Log::warning('[SECURITY] Akun tidak memiliki otorisasi Portal Admin', [
                'ip' => request()->ip(),
                'email' => $user->email ?? null,
            ]);

            $this->throwFailureValidationException();
        }

        session()->regenerate();

        Log::info('[SECURITY] Login Admin BERHASIL', [
            'ip' => request()->ip(),
            'user_id' => $user?->id,
            'email' => $user?->email,
        ]);

        return app(LoginResponse::class);
    }

    protected function throwFailureValidationException(): never
    {
        throw ValidationException::withMessages([
            'data.email' => 'Kredensial otorisasi tidak valid atau akses ditolak.',
        ]);
    }
}
