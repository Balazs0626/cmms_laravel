<?php

namespace App\Filament\Resources\MaintenanceLogResource\Pages;

use App\Filament\Resources\MaintenanceLogResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use TomatoPHP\FilamentLogger\Facades\FilamentLogger;
use Illuminate\Database\Eloquent\Model;

class EditMaintenanceLog extends EditRecord
{
    protected static string $resource = MaintenanceLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make()
                ->after(function ($record) {
                    FilamentLogger::log(
                        message: 'Karbantartási naplóbejegyzés törölve: ID ' . $record->id,
                        level: 'delete'
                    );
                }),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $updatedRecord = parent::handleRecordUpdate($record, $data);

        FilamentLogger::log(
            message: 'Karbantartási naplóbejegyzés módosítva: ID ' . $updatedRecord->id,
            level: 'edit'
        );

        return $updatedRecord;
    }
}
