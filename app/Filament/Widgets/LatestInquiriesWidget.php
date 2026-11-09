<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\ContactInquiryResource;
use App\Models\ContactInquiry;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestInquiriesWidget extends BaseWidget
{
    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(ContactInquiry::query()->with('pillar')->latest()->limit(5))
            ->heading('Permintaan Penawaran & Konsultasi Klien Terbaru')
            ->description('Daftar 5 interaksi klien B2B / B2G terbaru yang masuk ke sistem pipeline PT. Multi Abadi Aksana.')
            ->columns([
                TextColumn::make('created_at')
                    ->dateTime('d M Y, H:i')
                    ->label('Waktu Masuk'),

                TextColumn::make('full_name')
                    ->label('Nama Klien & Instansi')
                    ->weight('bold')
                    ->description(fn (ContactInquiry $record): string => $record->company_or_institution ?: 'Klien Mandiri'),

                TextColumn::make('pillar.name')
                    ->badge()
                    ->color('gray')
                    ->placeholder('Umum')
                    ->label('Divisi Bisnis'),

                TextColumn::make('subject')
                    ->limit(45)
                    ->label('Subjek Proyek'),

                TextColumn::make('whatsapp_number')
                    ->label('No. WhatsApp')
                    ->icon('heroicon-m-phone')
                    ->copyable(),

                TextColumn::make('pipeline_status')
                    ->badge()
                    ->label('Status Pipeline'),
            ])
            ->actions([
                Action::make('whatsapp')
                    ->label('Hubungi WA')
                    ->icon('heroicon-o-chat-bubble-oval-left-ellipsis')
                    ->color('success')
                    ->url(function (ContactInquiry $record): string {
                        $phone = preg_replace('/[^0-9]/', '', $record->whatsapp_number);
                        if (str_starts_with($phone, '0')) {
                            $phone = '62' . substr($phone, 1);
                        }
                        $text = urlencode("Halo Bapak/Ibu {$record->full_name}, kami dari Tim Engineering PT. Multi Abadi Aksana menindaklanjuti konsultasi Anda terkait: \"{$record->subject}\".");
                        return "https://wa.me/{$phone}?text={$text}";
                    })
                    ->openUrlInNewTab(),
                Action::make('edit')
                    ->label('Detail & Update')
                    ->icon('heroicon-m-pencil-square')
                    ->url(fn (ContactInquiry $record): string => ContactInquiryResource::getUrl('edit', ['record' => $record])),
            ]);
    }
}
