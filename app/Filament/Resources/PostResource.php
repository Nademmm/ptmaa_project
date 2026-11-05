<?php

namespace App\Filament\Resources;

use App\Models\Post;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
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

class PostResource extends Resource
{
    protected static ?string $model = Post::class;
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationGroup = 'Portofolio & Publikasi';
    protected static ?string $navigationLabel = 'Artikel & Berita';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                    ->label('Judul Artikel'),
                TextInput::make('slug')
                    ->required()
                    ->unique(Post::class, 'slug', ignoreRecord: true),
                Select::make('post_category_id')
                    ->relationship('category', 'name')
                    ->label('Kategori'),
                DateTimePicker::make('published_at')
                    ->default(now())
                    ->label('Tanggal Publikasi'),
                FileUpload::make('featured_image')
                    ->image()
                    ->directory('blog')
                    ->label('Gambar Sampul'),
                Textarea::make('excerpt')
                    ->rows(2)
                    ->columnSpanFull()
                    ->label('Kutipan Singkat'),
                RichEditor::make('content')
                    ->required()
                    ->columnSpanFull()
                    ->label('Isi Artikel'),
                TextInput::make('meta_title')->label('SEO Meta Title'),
                TextInput::make('meta_description')->label('SEO Meta Description'),
                Toggle::make('is_published')->default(true)->label('Tayang'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('featured_image')->label('Sampul'),
                TextColumn::make('title')->searchable()->weight('bold'),
                TextColumn::make('category.name')->label('Kategori'),
                TextColumn::make('published_at')->date()->label('Rilis'),
                IconColumn::make('is_published')->boolean()->label('Tayang'),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}

