<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductCategoryResource\Pages;
use App\Models\ProductCategory;
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
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ProductCategoryResource extends Resource
{
    protected static ?string $model = ProductCategory::class;
    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?string $navigationGroup = 'Katalog & Divisi Bisnis';
    protected static ?string $navigationLabel = 'Kategori Katalog Produk';
    protected static ?string $modelLabel = 'Kategori Produk';
    protected static ?string $pluralModelLabel = 'Kategori Katalog Produk';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Detail Kategori Katalog Produk')
                    ->description('Kategori produk yang tampil sebagai filter di bawah divisi Penerangan Jalan Umum maupun Mechanical & Electrical.')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('service_pillar_id')
                                    ->relationship('pillar', 'name')
                                    ->required()
                                    ->searchable()
                                    ->preload()
                                    ->label('Divisi Bisnis Utama'),
                                TextInput::make('name')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                                    ->label('Nama Kategori Produk'),
                                TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(ProductCategory::class, 'slug', ignoreRecord: true)
                                    ->label('Slug URL'),
                                TextInput::make('contact_phone')
                                    ->placeholder('082342979898')
                                    ->default('082342979898')
                                    ->helperText('Nomor WhatsApp tujuan saat tombol konsultasi produk diklik.')
                                    ->label('Nomor WhatsApp Resmi'),
                                TextInput::make('sort_order')
                                    ->numeric()
                                    ->default(1)
                                    ->label('Urutan Tampilan'),
                                Toggle::make('is_active')
                                    ->default(true)
                                    ->inline(false)
                                    ->label('Status Kategori Aktif'),
                            ]),
                        Textarea::make('description')
                            ->rows(3)
                            ->columnSpanFull()
                            ->label('Deskripsi Singkat Kategori'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn ($query) => $query->with('pillar'))
            ->defaultSort('sort_order')
            ->columns([
                TextColumn::make('sort_order')
                    ->sortable()
                    ->label('#'),
                TextColumn::make('name')
                    ->sortable()
                    ->searchable()
                    ->weight('bold')
                    ->label('Nama Kategori'),
                TextColumn::make('pillar.name')
                    ->label('Divisi Bisnis')
                    ->badge()
                    ->color('primary')
                    ->sortable(),
                TextColumn::make('contact_phone')
                    ->label('WhatsApp Resmi')
                    ->placeholder('+62 823-4297-9898'),
                TextColumn::make('products_count')
                    ->counts('products')
                    ->badge()
                    ->color('success')
                    ->label('Total Produk'),
                IconColumn::make('is_active')
                    ->boolean()
                    ->label('Aktif'),
            ])
            ->filters([
                SelectFilter::make('service_pillar_id')
                    ->relationship('pillar', 'name')
                    ->label('Filter Divisi Bisnis'),
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
            'index' => Pages\ListProductCategories::route('/'),
            'create' => Pages\CreateProductCategory::route('/create'),
            'edit' => Pages\EditProductCategory::route('/{record}/edit'),
        ];
    }
}
