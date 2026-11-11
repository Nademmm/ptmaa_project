<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroSlideResource\Pages;
use App\Models\HeroSlide;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class HeroSlideResource extends Resource
{
    protected static ?string $model = HeroSlide::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationGroup = 'Portofolio & Publikasi';

    protected static ?string $navigationLabel = 'Hero Slider Beranda';

    protected static ?string $modelLabel = 'Slide Hero Beranda';

    protected static ?string $pluralModelLabel = 'Hero Slider Beranda';

    protected static ?int $navigationSort = 0;

    public static function getNavigationBadge(): ?string
    {
        return (string) static::getModel()::where('is_active', true)->count();
    }

    public static function getNavigationBadgeTooltip(): ?string
    {
        return 'Jumlah slide hero yang sedang aktif tayang di beranda';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Konten & Pesan Utama Hero Slide')
                    ->description('Atur judul headline dan deskripsi pendukung yang tampil di atas banner utama halaman Beranda.')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(150)
                            ->placeholder('Contoh: Spesialis Penerangan Jalan Umum & Mechanical Electrical')
                            ->columnSpanFull()
                            ->label('Judul Utama Slide (Headline)'),
                        Textarea::make('subtitle')
                            ->required()
                            ->rows(3)
                            ->maxLength(350)
                            ->placeholder('Contoh: Mitra strategis pengadaan dan konstruksi Penerangan Jalan Umum (Solar Cell & PLN) serta rekayasa Mechanical & Electrical industri di Indonesia.')
                            ->columnSpanFull()
                            ->label('Deskripsi / Subjudul Slide'),
                    ]),

                Section::make('Visual Banner & Pengaturan Tayang')
                    ->description('Unggah foto latar belakang beresolusi tinggi dan atur urutan tampilannya.')
                    ->schema([
                        FileUpload::make('image_path')
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '21:9',
                                '16:9',
                                '4:3',
                            ])
                            ->disk('public')
                            ->directory('hero-slides')
                            ->required()
                            ->columnSpanFull()
                            ->label('Foto Background Hero Slide')
                            ->helperText('Disarankan menggunakan foto dokumentasi landscape (rasio 21:9 atau 16:9, resolusi ideal 1600×685px) dalam format WebP, JPG, atau PNG.'),

                        Grid::make(2)
                            ->schema([
                                TextInput::make('sort_order')
                                    ->numeric()
                                    ->default(fn () => ((int) HeroSlide::max('sort_order')) + 1)
                                    ->required()
                                    ->label('Urutan Tampilan Slide')
                                    ->helperText('Angka lebih kecil akan ditampilkan lebih dulu. Anda juga bisa menggeser urutan langsung di tabel.'),
                                Toggle::make('is_active')
                                    ->default(true)
                                    ->inline(false)
                                    ->label('Tampilkan Slide di Beranda')
                                    ->helperText('Nonaktifkan jika ingin menyembunyikan slide sementara tanpa menghapusnya.'),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
            ->columns([
                TextColumn::make('sort_order')
                    ->sortable()
                    ->badge()
                    ->color('primary')
                    ->label('#'),
                ImageColumn::make('image_path')
                    ->label('Foto Banner')
                    ->disk('public')
                    ->width(112)
                    ->height(52)
                    ->extraImgAttributes(['class' => 'rounded-lg object-cover']),
                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->limit(55)
                    ->description(fn (HeroSlide $record): string => Str::limit($record->subtitle, 85))
                    ->label('Judul & Deskripsi Slide'),
                ToggleColumn::make('is_active')
                    ->label('Status Tayang'),
                TextColumn::make('updated_at')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Terakhir Diperbarui'),
            ])
            ->filters([
                TernaryFilter::make('is_active')
                    ->label('Filter Status Tayang'),
            ])
            ->actions([
                EditAction::make(),
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
            'index' => Pages\ListHeroSlides::route('/'),
            'create' => Pages\CreateHeroSlide::route('/create'),
            'edit' => Pages\EditHeroSlide::route('/{record}/edit'),
        ];
    }
}
