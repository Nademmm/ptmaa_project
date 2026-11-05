<?php

namespace App\Filament\Resources;

use App\Enums\ProductAvailability;
use App\Models\Product;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
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
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $navigationGroup = 'Katalog & Layanan';
    protected static ?string $navigationLabel = 'Produk & Material';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Product Details')
                    ->tabs([
                        Tab::make('Informasi Dasar')
                            ->schema([
                                Select::make('product_category_id')
                                    ->relationship('category', 'name')
                                    ->required()
                                    ->searchable()
                                    ->preload()
                                    ->label('Kategori Produk'),
                                TextInput::make('name')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                                    ->label('Nama Produk'),
                                TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(Product::class, 'slug', ignoreRecord: true),
                                TextInput::make('sub_badge')
                                    ->placeholder('Misal: All In One, Two In One, PJU PLN, Sparepart')
                                    ->label('Label Badge Tipe'),
                                TextInput::make('brand')
                                    ->placeholder('Misal: Philips, Osram, COB, Estika')
                                    ->label('Merek / Brand'),
                                Select::make('availability_status')
                                    ->options(ProductAvailability::class)
                                    ->default(ProductAvailability::TERSEDIA)
                                    ->label('Status Ketersediaan'),
                                Toggle::make('is_featured')
                                    ->label('Produk Unggulan (Tampil di Beranda)'),
                                Toggle::make('has_warranty_badge')
                                    ->default(true)
                                    ->label('Badge Bergaransi'),
                                Toggle::make('has_eco_k3_badge')
                                    ->default(true)
                                    ->label('Badge Standar Mutu & K3'),
                                Toggle::make('is_active')
                                    ->default(true)
                                    ->label('Status Publikasi Aktif'),
                            ])->columns(2),

                        Tab::make('Media & Galeri')
                            ->schema([
                                FileUpload::make('thumbnail_image')
                                    ->image()
                                    ->directory('products')
                                    ->label('Foto Utama Produk')
                                    ->helperText('Rekomendasi rasio 4:3 atau 1:1 format WebP'),
                                FileUpload::make('gallery_images')
                                    ->image()
                                    ->multiple()
                                    ->reorderable()
                                    ->directory('products/gallery')
                                    ->label('Galeri Foto Tambahan (Sudut Pandang)'),
                            ]),

                        Tab::make('Konten & Deskripsi')
                            ->schema([
                                Textarea::make('short_summary')
                                    ->rows(3)
                                    ->label('Ringkasan Singkat (1-2 Kalimat)'),
                                RichEditor::make('description')
                                    ->label('Deskripsi Lengkap Produk'),
                                RichEditor::make('why_choose_text')
                                    ->label('Seksi "Mengapa Harus Produk Ini?"'),
                            ]),

                        Tab::make('Spesifikasi & Keunggulan')
                            ->schema([
                                Section::make('Tabel Spesifikasi Teknis (Key-Value)')
                                    ->description('Tambahkan baris spesifikasi teknis dinamis sebanyak yang dibutuhkan.')
                                    ->schema([
                                        Repeater::make('specifications')
                                            ->schema([
                                                TextInput::make('label')->required()->placeholder('Contoh: Daya Lampu'),
                                                TextInput::make('value')->required()->placeholder('Contoh: 100W LED'),
                                            ])
                                            ->columns(2)
                                            ->collapsible()
                                            ->reorderable()
                                            ->label('Daftar Spesifikasi'),
                                    ]),

                                Section::make('Poin-Poin Keunggulan Produk')
                                    ->description('Poin kelebihan produk dengan ikon centang.')
                                    ->schema([
                                        Repeater::make('advantages')
                                            ->schema([
                                                TextInput::make('point')->required()->placeholder('Contoh: Hemat biaya operasional PLN 100%'),
                                            ])
                                            ->collapsible()
                                            ->label('Daftar Keunggulan'),
                                    ]),
                            ]),
                    ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumbnail_image')->label('Foto')->circular(),
                TextColumn::make('name')->searchable()->sortable()->weight('bold'),
                TextColumn::make('category.name')->label('Kategori')->sortable(),
                TextColumn::make('sub_badge')->badge()->label('Tipe'),
                IconColumn::make('is_featured')->boolean()->label('Unggulan'),
                IconColumn::make('is_active')->boolean()->label('Aktif'),
            ])
            ->filters([
                SelectFilter::make('product_category_id')
                    ->relationship('category', 'name')
                    ->label('Filter Kategori'),
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
}

