<?php

namespace App\Filament\Resources\ServicePillarResource\Pages;

use App\Filament\Resources\ServicePillarResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditServicePillar extends EditRecord
{
    protected static string $resource = ServicePillarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

