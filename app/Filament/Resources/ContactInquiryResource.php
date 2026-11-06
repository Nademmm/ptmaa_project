<?php

namespace App\Filament\Resources;

use App\Enums\InquiryPipelineStatus;
use App\Filament\Resources\ContactInquiryResource\Pages;
use App\Models\ContactInquiry;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ContactInquiryResource extends Resource
{
    protected static ?string $model = ContactInquiry::class;
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationGroup = 'CRM & Interaksi Klien';
    protected static ?string $navigationLabel = 'Permintaan & Konsultasi Klien';
    protected static ?string $modelLabel = 'Permintaan Klien';
    protected static ?string $pluralModelLabel = 'Permintaan & Konsultasi Klien';
    protected static ?int $navigationSort = 1;

    public static function getNavigationBadge(): ?string
    {
        $newCount = static::getModel()::where('pipeline_status', InquiryPipelineStatus::KOMUNIKASI->value)->count();
        return $newCount > 0 ? (string) $newCount : null;
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'info';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Identitas & Kebutuhan Klien (B2B / B2G)')
                    ->description('Data pengirim permintaan penawaran atau konsultasi proyek yang masuk melalui portal maupun input manual.')
                    ->columns(2)
                    ->schema([
                        TextInput::make('full_name')
                            ->required()
                            ->maxLength(255)
                            ->label('Nama Lengkap Klien / PIC'),

                        TextInput::make('company_or_institution')
                            ->maxLength(255)
                            ->placeholder('Contoh: Dinas Perhubungan / PT. Kawasan Industri...')
                            ->label('Nama Perusahaan / Instansi'),

                        TextInput::make('whatsapp_number')
                            ->required()
                            ->maxLength(30)
                            ->placeholder('Contoh: 081234567890')
                            ->label('Nomor Telepon / WhatsApp'),

                        TextInput::make('email')
                            ->email()
                            ->maxLength(255)
                            ->placeholder('email@perusahaan.co.id')
                            ->label('Alamat Email'),

                        Select::make('service_pillar_id')
                            ->relationship('pillar', 'name')
                            ->searchable()
                            ->preload()
                            ->placeholder('Pilih Divisi Bisnis Terkait')
                            ->label('Divisi Bisnis Terkait'),

                        TextInput::make('subject')
                            ->required()
                            ->maxLength(255)
                            ->label('Subjek Permintaan / Nama Proyek'),

                        Textarea::make('message')
                            ->required()
                            ->rows(4)
                            ->columnSpanFull()
                            ->label('Rincian Kebutuhan / Pesan Klien'),
                    ]),

                Section::make('Tindak Lanjut & Status Pipeline Internal')
                    ->description('Pantau progres tahapan proyek dari permintaan awal, survei lokasi, penawaran RAB, negosiasi, hingga deal & pelaksanaan.')
                    ->columns(1)
                    ->schema([
                        Select::make('pipeline_status')
                            ->options(InquiryPipelineStatus::class)
                            ->default(InquiryPipelineStatus::KOMUNIKASI)
                            ->required()
                            ->native(false)
                            ->label('Tahapan Alur Proyek (Pipeline Status)'),

                        Textarea::make('admin_notes')
                            ->rows(4)
                            ->columnSpanFull()
                            ->placeholder('Catat hasil survei lapangan, nomor surat penawaran/RAB, jadwal presentasi teknis, atau kesepakatan kontrak...')
                            ->label('Catatan Tindak Lanjut Tim Internal'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('created_at')
                    ->dateTime('d M Y, H:i')
                    ->label('Waktu Masuk')
                    ->sortable(),

                TextColumn::make('full_name')
                    ->weight('bold')
                    ->searchable()
                    ->description(fn (ContactInquiry $record): string => $record->company_or_institution ?: 'Klien Mandiri')
                    ->label('Nama PIC & Instansi'),

                TextColumn::make('pillar.name')
                    ->badge()
                    ->color('gray')
                    ->placeholder('Umum')
                    ->label('Divisi Layanan'),

                TextColumn::make('subject')
                    ->limit(40)
                    ->searchable()
                    ->label('Subjek Proyek'),

                TextColumn::make('whatsapp_number')
                    ->icon('heroicon-m-phone')
                    ->copyable()
                    ->searchable()
                    ->label('No. WhatsApp'),

                TextColumn::make('pipeline_status')
                    ->badge()
                    ->sortable()
                    ->label('Tahapan Alur'),
            ])
            ->filters([
                SelectFilter::make('pipeline_status')
                    ->options(InquiryPipelineStatus::class)
                    ->label('Tahapan Pipeline'),
                SelectFilter::make('service_pillar_id')
                    ->relationship('pillar', 'name')
                    ->label('Divisi Bisnis'),
            ])
            ->actions([
                Action::make('whatsapp')
                    ->label('Follow Up WA')
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
                ViewAction::make(),
                EditAction::make()->label('Update Pipeline'),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactInquiries::route('/'),
            'create' => Pages\CreateContactInquiry::route('/create'),
            'edit' => Pages\EditContactInquiry::route('/{record}/edit'),
        ];
    }
}
