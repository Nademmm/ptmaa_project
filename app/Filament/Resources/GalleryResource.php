<?php

namespace App\Filament\Resources;

use App\Models\Gallery;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;
    protected static ?string $navigationIcon = 'heroicon-o-camera';
    protected static ?string $navigationGroup = 'Portofolio & Publikasi';
    protected static ?string $navigationLabel = 'Galeri Projek On Duty';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                    ->label('Judul Dokumentasi Proyek'),
                TextInput::make('slug')
                    ->required()
                    ->unique(Gallery::class, 'slug', ignoreRecord: true),
                TextInput::make('client_or_unit_code')
                    ->placeholder('Misal: Adelle Jewellery, Ruas Gempol, Unit PGIC-E34')
                    ->label('Nama Klien / Kode Unit'),
                TextInput::make('location')
                    ->placeholder('Misal: Gempol - Sidoarjo - Malang')
                    ->label('Lokasi Proyek'),
                Select::make('category')
                    ->options([
                        'pju' => 'Proyek PJU (Penerangan Jalan Umum)',
                        'interior_exterior' => 'Proyek Interior & Exterior',
                        'me' => 'Proyek Mechanical Electrical',
                        'alat_berat_sparepart' => 'Alat Berat & Sparepart Unit',
                    ])
                    ->required()
                    ->label('Kategori Divisi'),
                DatePicker::make('completion_date')
                    ->label('Tanggal Selesai Proyek'),
                FileUpload::make('image_path')
                    ->image()
                    ->directory('gallery')
                    ->required()
                    ->label('Foto Dokumentasi Lapangan'),
                Textarea::make('description')
                    ->rows(3)
                    ->columnSpanFull()
                    ->label('Rincian Pekerjaan Lapangan'),
                Toggle::make('is_featured')
                    ->label('Highlight di Beranda'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_path')->label('Foto')->circular(),
                TextColumn::make('title')->searchable()->weight('bold'),
                TextColumn::make('client_or_unit_code')->label('Klien / Unit')->badge(),
                TextColumn::make('location')->label('Lokasi'),
                TextColumn::make('category')->badge(),
                IconColumn::make('is_featured')->boolean()->label('Beranda'),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}

