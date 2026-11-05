<?php

namespace App\Filament\Resources;

use App\Enums\InquiryPipelineStatus;
use App\Models\ContactInquiry;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ContactInquiryResource extends Resource
{
    protected static ?string $model = ContactInquiry::class;
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationGroup = 'Interaksi Klien (CRM Ringan)';
    protected static ?string $navigationLabel = 'Pesan & Konsultasi Klien';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('full_name')->disabled()->label('Nama Lengkap'),
                TextInput::make('company_or_institution')->disabled()->label('Perusahaan / Instansi'),
                TextInput::make('whatsapp_number')->disabled()->label('Nomor WhatsApp'),
                TextInput::make('email')->disabled()->label('Email'),
                TextInput::make('subject')->disabled()->label('Subjek'),
                Textarea::make('message')->disabled()->rows(4)->columnSpanFull()->label('Pesan Klien'),

                Select::make('pipeline_status')
                    ->options(InquiryPipelineStatus::class)
                    ->required()
                    ->label('Status Pipeline (Alur Bisnis PT. MAA)'),
                Textarea::make('admin_notes')
                    ->rows(3)
                    ->columnSpanFull()
                    ->placeholder('Catatan hasil survei lapangan, jadwal negosiasi, atau progress deal...')
                    ->label('Catatan Tim Internal'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('created_at')->dateTime('d M Y H:i')->label('Tanggal')->sortable(),
                TextColumn::make('full_name')->weight('bold')->searchable(),
                TextColumn::make('company_or_institution')->label('Instansi / Perusahaan')->searchable(),
                TextColumn::make('whatsapp_number')->label('No. WhatsApp')->copyable(),
                TextColumn::make('pipeline_status')
                    ->badge()
                    ->label('Tahapan Alur'),
            ])
            ->filters([
                SelectFilter::make('pipeline_status')
                    ->options(InquiryPipelineStatus::class)
                    ->label('Filter Status Pipeline'),
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make()->label('Update Status'),
            ]);
    }
}

