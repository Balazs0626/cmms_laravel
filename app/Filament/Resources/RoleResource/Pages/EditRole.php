<?php

namespace App\Filament\Resources\RoleResource\Pages;

use App\Filament\Resources\RoleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use TomatoPHP\FilamentLogger\Facades\FilamentLogger;
use Illuminate\Database\Eloquent\Model;

class EditRole extends EditRecord
{
    protected static string $resource = RoleResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->after(function ($record) {
                    FilamentLogger::log(
                        message: 'Szerepkör törölve: ID ' . $record->id,
                        level: 'delete'
                    );
                }),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $updatedRecord = parent::handleRecordUpdate($record, $data);

        FilamentLogger::log(
            message: 'Szerepkör módosítva: ID ' . $updatedRecord->id,
            level: 'edit'
        );

        return $updatedRecord;
    }
}
