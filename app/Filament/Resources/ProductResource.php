<?php

namespace App\Filament\Resources;

use App\Enums\ProductAvailability;
use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
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
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $navigationGroup = 'Katalog & Divisi Bisnis';
    protected static ?string $navigationLabel = 'Produk & Material';
    protected static ?string $modelLabel = 'Produk & Material';
    protected static ?string $pluralModelLabel = 'Produk & Material Pengadaan';
    protected static ?int $navigationSort = 3;

    public static function getNavigationBadge(): ?string
    {
        return (string) static::getModel()::where('is_active', true)->count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Detail Produk & Spesifikasi Teknis')
                    ->tabs([
                        Tab::make('Informasi Dasar')
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        Select::make('product_category_id')
                                            ->relationship('category', 'name')
                                            ->required()
                                            ->searchable()
                                            ->preload()
                                            ->label('Kategori Katalog Produk'),
                                        TextInput::make('name')
                                            ->required()
                                            ->maxLength(255)
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                                            ->label('Nama Produk / Material'),
                                        TextInput::make('slug')
                                            ->required()
                                            ->maxLength(255)
                                            ->unique(Product::class, 'slug', ignoreRecord: true)
                                            ->label('Slug URL'),
                                        TextInput::make('sub_badge')
                                            ->placeholder('Contoh: PJU All In One, Impeller & Mekanikal, Oli & Grease')
                                            ->label('Label Badge Tipe'),
                                        TextInput::make('brand')
                                            ->placeholder('Contoh: PT. Multi Abadi Aksana / COB / OSRAM / PHILIPS')
                                            ->default('PT. Multi Abadi Aksana')
                                            ->label('Merek / Brand'),
                                        Select::make('availability_status')
                                            ->options(ProductAvailability::class)
                                            ->default(ProductAvailability::TERSEDIA)
                                            ->required()
                                            ->label('Status Ketersediaan'),
                                        TextInput::make('sort_order')
                                            ->numeric()
                                            ->default(1)
                                            ->label('Urutan Tampilan Katalog'),
                                    ]),

                                Section::make('Pengaturan Tampilan & Badge Jaminan')
                                    ->schema([
                                        Grid::make(4)
                                            ->schema([
                                                Toggle::make('is_featured')
                                                    ->default(false)
                                                    ->label('Tampil di Beranda'),
                                                Toggle::make('has_warranty_badge')
                                                    ->default(true)
                                                    ->label('Badge Bergaransi'),
                                                Toggle::make('has_eco_k3_badge')
                                                    ->default(true)
                                                    ->label('Badge Standar K3'),
                                                Toggle::make('is_active')
                                                    ->default(true)
                                                    ->label('Status Publikasi Aktif'),
                                            ]),
                                    ]),
                            ]),

                        Tab::make('Media & Galeri Foto')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                FileUpload::make('thumbnail_image')
                                    ->image()
                                    ->directory('products')
                                    ->label('Foto Utama Produk (Thumbnail)')
                                    ->helperText('Unggah foto utama produk (format WebP/JPG/PNG).'),
                                FileUpload::make('gallery_images')
                                    ->image()
                                    ->multiple()
                                    ->reorderable()
                                    ->directory('products/gallery')
                                    ->label('Galeri Foto Sudut Pandang Tambahan')
                                    ->helperText('Bisa mengunggah beberapa foto detail produk sekaligus.'),
                            ]),

                        Tab::make('Konten & Deskripsi')
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                Textarea::make('short_summary')
                                    ->rows(3)
                                    ->required()
                                    ->label('Ringkasan Singkat (Tampil di Kartu Katalog)'),
                                RichEditor::make('description')
                                    ->required()
                                    ->label('Deskripsi Teknis Lengkap'),
                                RichEditor::make('why_choose_text')
                                    ->label('Uraian "Mengapa Memilih Produk Ini?"'),
                            ]),

                        Tab::make('Spesifikasi & Keunggulan')
                            ->icon('heroicon-o-clipboard-document-list')
                            ->schema([
                                Section::make('Tabel Spesifikasi Teknis (Key-Value)')
                                    ->description('Tambahkan parameter spesifikasi teknis produk sesuai kebutuhan.')
                                    ->schema([
                                        Repeater::make('specifications')
                                            ->schema([
                                                TextInput::make('label')
                                                    ->required()
                                                    ->placeholder('Contoh: Konfigurasi Sistem / Material Tiang')
                                                    ->label('Parameter Spesifikasi'),
                                                TextInput::make('value')
                                                    ->required()
                                                    ->placeholder('Contoh: All In One LiFePO4 / Hot Dip Galvanized')
                                                    ->label('Nilai / Keterangan Teknis'),
                                            ])
                                            ->columns(2)
                                            ->collapsible()
                                            ->reorderable()
                                            ->defaultItems(3)
                                            ->addActionLabel('Tambah Baris Spesifikasi')
                                            ->label('Daftar Spesifikasi Teknis'),
                                    ]),

                                Section::make('Poin-Poin Keunggulan Produk')
                                    ->description('Daftar poin nilai tambah produk yang tampil di halaman detail.')
                                    ->schema([
                                        Repeater::make('advantages')
                                            ->schema([
                                                TextInput::make('point')
                                                    ->required()
                                                    ->placeholder('Contoh: Menghemat biaya operasional listrik PLN dengan energi surya mandiri')
                                                    ->label('Poin Keunggulan'),
                                            ])
                                            ->collapsible()
                                            ->reorderable()
                                            ->defaultItems(3)
                                            ->addActionLabel('Tambah Poin Keunggulan')
                                            ->label('Daftar Keunggulan Utama'),
                                    ]),
                            ]),
                    ])->columnSpanFull(),
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
                ImageColumn::make('thumbnail_image')
                    ->label('Foto')
                    ->getStateUsing(function (Product $record): ?string {
                        if (! $record->thumbnail_image) {
                            return null;
                        }

                        return str_starts_with($record->thumbnail_image, '/') || str_starts_with($record->thumbnail_image, 'http')
                            ? asset(ltrim($record->thumbnail_image, '/'))
                            : asset('storage/' . $record->thumbnail_image);
                    })
                    ->square()
                    ->size(48),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->limit(45)
                    ->label('Nama Produk'),
                TextColumn::make('category.name')
                    ->label('Kategori')
                    ->badge()
                    ->color('primary')
                    ->sortable(),
                TextColumn::make('sub_badge')
                    ->badge()
                    ->color('gray')
                    ->label('Tipe Badge'),
                TextColumn::make('availability_status')
                    ->badge()
                    ->label('Ketersediaan'),
                IconColumn::make('is_featured')
                    ->boolean()
                    ->label('Unggulan'),
                IconColumn::make('is_active')
                    ->boolean()
                    ->label('Aktif'),
            ])
            ->filters([
                SelectFilter::make('product_category_id')
                    ->relationship('category', 'name')
                    ->label('Filter Kategori'),
                SelectFilter::make('availability_status')
                    ->options(ProductAvailability::class)
                    ->label('Status Ketersediaan'),
                TernaryFilter::make('is_featured')
                    ->label('Produk Unggulan Beranda'),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
