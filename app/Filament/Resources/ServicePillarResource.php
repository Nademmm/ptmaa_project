<?php

namespace App\Filament\Resources;

use App\Models\ServicePillar;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ServicePillarResource extends Resource
{
    protected static ?string $model = ServicePillar::class;
    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';
    protected static ?string $navigationGroup = 'Katalog & Layanan';
    protected static ?string $navigationLabel = '4 Pilar Layanan';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required()->label('Nama Pilar Layanan'),
                TextInput::make('code')->placeholder('PJU / ME / INTERIOR / SPAREPART')->label('Kode Unik'),
                Textarea::make('short_summary')->rows(2)->columnSpanFull()->label('Ringkasan Singkat Beranda'),
                RichEditor::make('description')->columnSpanFull()->label('Deskripsi Lengkap'),
                TextInput::make('sort_order')->numeric()->default(0)->label('Urutan Tampilan'),
                Toggle::make('is_active')->default(true)->label('Aktif'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->weight('bold')->searchable(),
                TextColumn::make('code')->badge(),
                TextColumn::make('scopes_count')->counts('scopes')->label('Rincian Barang & Jasa'),
                IconColumn::make('is_active')->boolean()->label('Aktif'),
            ])
            ->actions([
                EditAction::make(),
            ]);
    }
}

