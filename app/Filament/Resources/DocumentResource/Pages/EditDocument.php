<?php

namespace App\Filament\Resources\DocumentResource\Pages;

use App\Filament\Resources\DocumentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use TomatoPHP\FilamentLogger\Facades\FilamentLogger;
use Illuminate\Database\Eloquent\Model;

class EditDocument extends EditRecord
{
    protected static string $resource = DocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make()
                ->after(function ($record) {
                    FilamentLogger::log(
                        message: 'Dokumentum törölve: ID ' . $record->id,
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
            message: 'Dokumentum módosítva: ID ' . $updatedRecord->id,
            level: 'edit'
        );

        return $updatedRecord;
    }
}
