<?php

namespace App\Filament\Widgets;

use Illuminate\Support\Collection;
use \Guava\Calendar\Widgets\CalendarWidget;
use Guava\Calendar\ValueObjects\CalendarEvent;
use App\Models\MaintenanceLog;
 
class MaintenanceCalendarWidget extends CalendarWidget
{

    public function getEvents(array $fetchInfo = []): Collection|array
    {
        $logs = MaintenanceLog::all();

        $events = $logs->map(function (MaintenanceLog $log) {

            $deviceName = $log->device?->name ?? __('fields.unknown');

            $title = __('fields.maintenance') . ': ' . $deviceName;

            return CalendarEvent::make()
                ->title($title)
                ->allDay(true)
                ->backgroundColor(match ($log->status) {
                    'completed' => '#198754',
                    'pending' => '#ffc107',
                    'skipped' => '#dc3545',
                })
                ->textColor('#222222')
                ->start($log->maintenance_date)
                ->end($log->maintenance_date);
        });

        return $events;
    }
}
