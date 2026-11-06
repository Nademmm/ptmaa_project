<?php

namespace App\Filament\Resources;

use App\Enums\ServiceScopeType;
use App\Filament\Resources\ServicePillarResource\Pages;
use App\Models\ServicePillar;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
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
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ServicePillarResource extends Resource
{
    protected static ?string $model = ServicePillar::class;
    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';
    protected static ?string $navigationGroup = 'Katalog & Divisi Bisnis';
    protected static ?string $navigationLabel = 'Divisi Bisnis Utama';
    protected static ?string $modelLabel = 'Divisi Bisnis';
    protected static ?string $pluralModelLabel = 'Divisi Bisnis Utama';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Identitas Divisi Bisnis')
                    ->description('Pengaturan informasi utama untuk divisi Penerangan Jalan Umum maupun Mechanical & Electrical.')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                                    ->label('Nama Divisi Bisnis'),
                                TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(ServicePillar::class, 'slug', ignoreRecord: true)
                                    ->label('Slug URL'),
                                TextInput::make('code')
                                    ->placeholder('Contoh: Divisi 1 / Divisi 2')
                                    ->maxLength(50)
                                    ->label('Label / Kode Divisi'),
                                TextInput::make('icon')
                                    ->placeholder('Contoh: bx-bulb atau bx-cog')
                                    ->default('bx-bulb')
                                    ->label('Ikon Boxicons'),
                                TextInput::make('sort_order')
                                    ->numeric()
                                    ->default(1)
                                    ->label('Urutan Tampilan'),
                                Toggle::make('is_active')
                                    ->default(true)
                                    ->inline(false)
                                    ->label('Status Aktif'),
                            ]),
                        Textarea::make('short_summary')
                            ->rows(2)
                            ->required()
                            ->columnSpanFull()
                            ->label('Ringkasan Singkat (Tampil di Beranda)'),
                        Textarea::make('description')
                            ->rows(3)
                            ->columnSpanFull()
                            ->label('Deskripsi Lengkap (Tampil di Halaman Tentang Kami)'),
                    ]),

                Section::make('Cakupan Pengadaan Barang & Pengadaan Jasa')
                    ->description('Kelola daftar rincian Pengadaan Barang dan Pengadaan Jasa untuk divisi ini.')
                    ->schema([
                        Repeater::make('scopes')
                            ->relationship('scopes')
                            ->schema([
                                Grid::make(3)
                                    ->schema([
                                        Select::make('type')
                                            ->options(ServiceScopeType::class)
                                            ->required()
                                            ->label('Jenis Cakupan'),
                                        TextInput::make('title')
                                            ->required()
                                            ->label('Judul Cakupan Layanan'),
                                        TextInput::make('sort_order')
                                            ->numeric()
                                            ->default(1)
                                            ->label('Urutan'),
                                    ]),
                                Textarea::make('description')
                                    ->rows(2)
                                    ->columnSpanFull()
                                    ->label('Deskripsi Singkat Cakupan'),
                                Repeater::make('items')
                                    ->simple(
                                        TextInput::make('item')
                                            ->required()
                                            ->placeholder('Tuliskan poin rincian barang atau jasa...')
                                    )
                                    ->defaultItems(3)
                                    ->addActionLabel('Tambah Poin Rincian')
                                    ->columnSpanFull()
                                    ->label('Daftar Poin Rincian Barang / Jasa'),
                            ])
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => $state['title'] ?? 'Cakupan Baru')
                            ->addActionLabel('Tambah Cakupan Barang / Jasa')
                            ->label('Daftar Cakupan Layanan'),
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
                TextColumn::make('code')
                    ->badge()
                    ->color('primary')
                    ->label('Kode Divisi'),
                TextColumn::make('name')
                    ->weight('bold')
                    ->searchable()
                    ->sortable()
                    ->label('Nama Divisi Bisnis'),
                TextColumn::make('scopes_count')
                    ->counts('scopes')
                    ->badge()
                    ->color('success')
                    ->label('Cakupan Barang & Jasa'),
                TextColumn::make('categories_count')
                    ->counts('categories')
                    ->badge()
                    ->color('info')
                    ->label('Sub-Kategori Produk'),
                IconColumn::make('is_active')
                    ->boolean()
                    ->label('Aktif'),
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
            'index' => Pages\ListServicePillars::route('/'),
            'create' => Pages\CreateServicePillar::route('/create'),
            'edit' => Pages\EditServicePillar::route('/{record}/edit'),
        ];
    }
}
