<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;
use App\Models\Gallery;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-camera';

    protected static ?string $navigationGroup = 'Portofolio & Publikasi';

    protected static ?string $navigationLabel = 'Galeri Projek On Duty';

    protected static ?string $modelLabel = 'Dokumentasi Proyek';

    protected static ?string $pluralModelLabel = 'Galeri Projek On Duty';

    protected static ?int $navigationSort = 1;

    public static function getNavigationBadge(): ?string
    {
        return (string) static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Detail Dokumentasi Projek On Duty')
                    ->description('Kelola portofolio dokumentasi proyek lapangan Penerangan Jalan Umum dan Mechanical & Electrical (termasuk Interior & Exterior).')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                                    ->label('Judul Dokumentasi Proyek'),
                                TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(Gallery::class, 'slug', ignoreRecord: true)
                                    ->label('Slug URL'),
                                Select::make('category')
                                    ->options([
                                        'pju' => 'Penerangan Jalan Umum',
                                        'mechanical_electrical' => 'Mechanical & Electrical',
                                    ])
                                    ->in(['pju', 'mechanical_electrical'])
                                    ->required()
                                    ->label('Divisi Proyek'),
                                TextInput::make('location')
                                    ->placeholder('Contoh: Ruas Jalan Gempol, Sidoarjo / Area Pabrik Industri')
                                    ->required()
                                    ->label('Lokasi Pelaksanaan Proyek'),
                                TextInput::make('client_or_unit_code')
                                    ->placeholder('Contoh: Unit Blower PGIC-E34 / Proyek Jalan Nasional')
                                    ->label('Nama Klien / Kode Unit (Opsional)'),
                                DatePicker::make('completion_date')
                                    ->default(now())
                                    ->label('Tanggal Pelaksanaan'),
                                TextInput::make('sort_order')
                                    ->numeric()
                                    ->default(1)
                                    ->label('Urutan Tampilan'),
                                Toggle::make('is_featured')
                                    ->default(false)
                                    ->inline(false)
                                    ->label('Tampilkan di Beranda (Projek On Duty)'),
                            ]),
                        FileUpload::make('image_path')
                            ->image()
                            ->disk('public')
                            ->directory('gallery')
                            ->required()
                            ->columnSpanFull()
                            ->label('Foto Dokumentasi Lapangan'),
                        Textarea::make('description')
                            ->rows(3)
                            ->required()
                            ->columnSpanFull()
                            ->label('Uraian Pekerjaan & Standar K3 Lapangan'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order')
            ->columns([
                TextColumn::make('sort_order')
                    ->sortable()
                    ->label('#'),
                ImageColumn::make('image_path')
                    ->label('Foto')
                    ->disk('public')
                    ->square()
                    ->size(48),
                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->limit(45)
                    ->label('Judul Proyek'),
                TextColumn::make('category')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pju' => 'Penerangan Jalan Umum',
                        'mechanical_electrical' => 'Mechanical & Electrical',
                        default => $state,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'pju' => 'primary',
                        'mechanical_electrical' => 'info',
                        default => 'gray',
                    })
                    ->label('Divisi'),
                TextColumn::make('location')
                    ->searchable()
                    ->limit(35)
                    ->label('Lokasi'),
                TextColumn::make('completion_date')
                    ->date('d M Y')
                    ->sortable()
                    ->label('Tanggal'),
                IconColumn::make('is_featured')
                    ->boolean()
                    ->label('Beranda'),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->options([
                        'pju' => 'Penerangan Jalan Umum',
                        'mechanical_electrical' => 'Mechanical & Electrical',
                    ])
                    ->label('Filter Divisi Proyek'),
                TernaryFilter::make('is_featured')
                    ->label('Tampil di Beranda'),
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
            'index' => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
}
