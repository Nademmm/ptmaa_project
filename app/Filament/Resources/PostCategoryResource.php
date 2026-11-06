<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostCategoryResource\Pages;
use App\Models\PostCategory;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class PostCategoryResource extends Resource
{
    protected static ?string $model = PostCategory::class;
    protected static ?string $navigationIcon = 'heroicon-o-folder';
    protected static ?string $navigationGroup = 'Portofolio & Publikasi';
    protected static ?string $navigationLabel = 'Kategori Artikel';
    protected static ?string $modelLabel = 'Kategori Artikel';
    protected static ?string $pluralModelLabel = 'Kategori Artikel & Wawasan';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Detail Kategori Artikel')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                            ->label('Nama Kategori Artikel'),
                        TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(PostCategory::class, 'slug', ignoreRecord: true)
                            ->label('Slug URL'),
                        Textarea::make('description')
                            ->rows(3)
                            ->columnSpanFull()
                            ->label('Deskripsi Kategori'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->label('Nama Kategori'),
                TextColumn::make('slug')
                    ->badge()
                    ->color('gray')
                    ->label('Slug'),
                TextColumn::make('posts_count')
                    ->counts('posts')
                    ->badge()
                    ->color('primary')
                    ->label('Total Artikel'),
                TextColumn::make('description')
                    ->limit(55)
                    ->label('Deskripsi'),
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
            'index' => Pages\ListPostCategories::route('/'),
            'create' => Pages\CreatePostCategory::route('/create'),
            'edit' => Pages\EditPostCategory::route('/{record}/edit'),
        ];
    }
}

