<?php

namespace App\Filament\Resources\MaintenanceLogResource\Pages;

use App\Filament\Resources\MaintenanceLogResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
//use TomatoPHP\FilamentLogger\Facades\FilamentLogger;

class ViewMaintenanceLog extends ViewRecord
{
    protected static string $resource = MaintenanceLogResource::class;

/*     public function mount($record): void
    {
        parent::mount($record);

        FilamentLogger::log(
            message: 'Megnézve karbantartási napló #' . $this->record->id,
            level: 'info'
        );
    } */

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
