<?php

namespace App\Filament\Widgets;

use App\Models\ContactInquiry;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestInquiriesWidget extends BaseWidget
{
    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(ContactInquiry::query()->latest()->limit(5))
            ->heading('5 Permintaan Konsultasi / Pesan Terbaru')
            ->columns([
                TextColumn::make('created_at')->dateTime('d M Y H:i')->label('Waktu'),
                TextColumn::make('full_name')->label('Nama Klien')->weight('bold'),
                TextColumn::make('company_or_institution')->label('Instansi / Perusahaan'),
                TextColumn::make('whatsapp_number')->label('No. WhatsApp')->copyable(),
                TextColumn::make('pipeline_status')->badge()->label('Status'),
            ]);
    }
}

