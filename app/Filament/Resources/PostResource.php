<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
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

class PostResource extends Resource
{
    protected static ?string $model = Post::class;
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationGroup = 'Portofolio & Publikasi';
    protected static ?string $navigationLabel = 'Artikel & Wawasan';
    protected static ?string $modelLabel = 'Artikel';
    protected static ?string $pluralModelLabel = 'Artikel & Wawasan Teknis';
    protected static ?int $navigationSort = 3;

    public static function getNavigationBadge(): ?string
    {
        return (string) static::getModel()::where('is_published', true)->count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Konten Utama Artikel')
                    ->description('Publikasikan artikel edukasi teknis seputar Penerangan Jalan Umum dan Mechanical & Electrical.')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                                    ->label('Judul Artikel'),
                                TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(Post::class, 'slug', ignoreRecord: true)
                                    ->label('Slug URL'),
                                Select::make('post_category_id')
                                    ->relationship('category', 'name')
                                    ->required()
                                    ->searchable()
                                    ->preload()
                                    ->label('Kategori Artikel'),
                                DateTimePicker::make('published_at')
                                    ->default(now())
                                    ->required()
                                    ->label('Waktu Publikasi'),
                            ]),
                        FileUpload::make('featured_image')
                            ->image()
                            ->disk('public')
                            ->directory('blog')
                            ->columnSpanFull()
                            ->label('Gambar Sampul Artikel'),
                        Textarea::make('excerpt')
                            ->rows(2)
                            ->required()
                            ->columnSpanFull()
                            ->label('Ringkasan / Kutipan Singkat'),
                        RichEditor::make('content')
                            ->required()
                            ->columnSpanFull()
                            ->label('Isi Lengkap Artikel'),
                    ]),

                Section::make('Optimasi SEO & Status Tayang')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('meta_title')
                                    ->maxLength(255)
                                    ->label('SEO Meta Title'),
                                TextInput::make('meta_description')
                                    ->maxLength(255)
                                    ->label('SEO Meta Description'),
                            ]),
                        Toggle::make('is_published')
                            ->default(true)
                            ->label('Publikasikan Artikel (Tayang di Website)'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn ($query) => $query->with('category'))
            ->defaultSort('published_at', 'desc')
            ->columns([
                ImageColumn::make('featured_image')
                    ->label('Sampul')
                    ->disk('public')
                    ->square()
                    ->size(48),
                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->limit(50)
                    ->label('Judul Artikel'),
                TextColumn::make('category.name')
                    ->badge()
                    ->color('primary')
                    ->sortable()
                    ->label('Kategori'),
                TextColumn::make('published_at')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->label('Tanggal Rilis'),
                IconColumn::make('is_published')
                    ->boolean()
                    ->label('Tayang'),
            ])
            ->filters([
                SelectFilter::make('post_category_id')
                    ->relationship('category', 'name')
                    ->label('Filter Kategori'),
                TernaryFilter::make('is_published')
                    ->label('Status Tayang'),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
