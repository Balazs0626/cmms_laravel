<?php

namespace App\Filament\Resources\DeviceTypeResource\Pages;

use App\Filament\Resources\DeviceTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use TomatoPHP\FilamentLogger\Facades\FilamentLogger;

class CreateDeviceType extends CreateRecord
{
    protected static string $resource = DeviceTypeResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function handleRecordCreation(array $data): \Illuminate\Database\Eloquent\Model
    {
        $record = parent::handleRecordCreation($data);

        FilamentLogger::log(
            message: 'Eszköztípus létrehozva: ID ' . $record->id,
            level: 'create'
        );

        return $record;
    }
}
