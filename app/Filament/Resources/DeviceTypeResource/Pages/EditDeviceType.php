<?php

namespace App\Filament\Resources\DeviceTypeResource\Pages;

use App\Filament\Resources\DeviceTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use TomatoPHP\FilamentLogger\Facades\FilamentLogger;
use Illuminate\Database\Eloquent\Model;

class EditDeviceType extends EditRecord
{
    protected static string $resource = DeviceTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->after(function ($record) {
                    FilamentLogger::log(
                        message: 'Eszköztípus törölve: ID ' . $record->id,
                        level: 'delete'
                    );
                }),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $updatedRecord = parent::handleRecordUpdate($record, $data);

        FilamentLogger::log(
            message: 'Eszköztípus módosítva: ID ' . $updatedRecord->id,
            level: 'edit'
        );

        return $updatedRecord;
    }
}
