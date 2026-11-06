<?php

namespace App\Filament\Resources\ServicePillarResource\Pages;

use App\Filament\Resources\ServicePillarResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListServicePillars extends ListRecords
{
    protected static string $resource = ServicePillarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Tambah Divisi Bisnis'),
        ];
    }
}

