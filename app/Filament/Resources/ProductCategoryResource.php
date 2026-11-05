<?php

namespace App\Filament\Resources;

use App\Models\ProductCategory;
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
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ProductCategoryResource extends Resource
{
    protected static ?string $model = ProductCategory::class;
    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?string $navigationGroup = 'Katalog & Layanan';
    protected static ?string $navigationLabel = 'Kategori Produk (Filter)';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('service_pillar_id')
                    ->relationship('pillar', 'name')
                    ->nullable()
                    ->label('Terkait Pilar Layanan'),
                TextInput::make('name')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                    ->label('Nama Kategori'),
                TextInput::make('slug')
                    ->required()
                    ->unique(ProductCategory::class, 'slug', ignoreRecord: true),
                TextInput::make('contact_phone')
                    ->placeholder('Misal: 081216592824 (Khusus sparepart)')
                    ->helperText('Kosongkan jika menggunakan nomor WhatsApp default perusahaan')
                    ->label('Nomor WhatsApp PIC Khusus (Opsional)'),
                Textarea::make('description')
                    ->rows(3)
                    ->columnSpanFull()
                    ->label('Deskripsi Kategori'),
                TextInput::make('sort_order')
                    ->numeric()
                    ->default(0)
                    ->label('Urutan Tampilan'),
                Toggle::make('is_active')
                    ->default(true)
                    ->label('Aktif'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable()->weight('bold'),
                TextColumn::make('pillar.name')->label('Pilar Layanan')->badge(),
                TextColumn::make('contact_phone')->label('Override WA')->placeholder('Default'),
                TextColumn::make('products_count')->counts('products')->label('Total Produk'),
                IconColumn::make('is_active')->boolean()->label('Aktif'),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}

