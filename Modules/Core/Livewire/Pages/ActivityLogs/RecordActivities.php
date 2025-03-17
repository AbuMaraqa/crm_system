<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Livewire\Pages\ActivityLogs;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Tables\Concerns\CanPaginateRecords;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Core\Entities\Activity;
use Modules\Core\Entities\User;
use Modules\Core\View\Components\AppLayouts;

class RecordActivities extends Component implements HasForms
{
    use CanPaginateRecords;
    use InteractsWithFormActions;
    use InteractsWithForms;
    use WithPagination;
    // use InteractsWithRecord;

    #[Locked]
    public $record;

    public function mount($model, $record)
    {
        $modelClass = Crypt::decryptString($model);

        $this->record = $modelClass::withoutGlobalScopes()->findOrFail($record);
    }

    public function getActivities()
    {
        if (! method_exists($this->record, 'activities')) {
            abort(404);
        }

        return $this->paginateTableQuery(
            $this->record
                ->activities()
                ->with([
                    'causer',
                    'subject',
                ])
                ->latest('id')
                ->getQuery()
        );
    }

    public function getNestedArrayHTML($array, $indent = 0): string
    {
        $html = "<ul class='divide-y divide-gray-200 dark:divide-gray-800 text-gray-700 dark:text-gray-300 text-sm leading-2'>";
        foreach ($array as $key => $value) {
            $html .= '<li>';
            if (is_array($value)) {
                $html .= "<ul style='margin-left:{($indent*6)}px' class='py-2 list-disc list-inside'>";
                $html .= $this->getNestedArrayHTML($value, $indent + 1);
                $html .= '</ul>';
            } else {
                $html .= "<div><span class='font-bold'>{$this->getFieldLabel($key)}</span>: $value</div>";
            }
            $html .= '</li>';
        }
        $html .= '</ul>';

        return $html;
    }

    public function getFieldLabel(string $name): string
    {
        $label = Str::of($name)
            ->before('.')
            ->replace('_', ' ')
            ->headline()
            ->replaceMatches('/\bid\b/i', 'ID')
            ->toString();

        if (is_array(__($label))) {
            return $label;
        }

        return __($label);
    }

    protected function getIdentifiedTableQueryStringPropertyNameFor(string $property): string
    {
        return $property;
    }

    protected function getDefaultTableRecordsPerPageSelectOption(): int
    {
        return 10;
    }

    protected function getTableRecordsPerPageSelectOptions(): array
    {
        return [10, 25, 50, 100];
    }

    public function render()
    {
        return view('core::livewire.pages.activity-logs.record-activities')
            ->layout(AppLayouts::class, [
                'pageTitle' => __('Activity Logs'),
                'breadcrumbs' => [
                    route('dashboard.home') => __('Home'),
                    route('dashboard.user_management.activity_logs') => __('Activity Logs'),
                    // route('dashboard.user_management.activity_logs.view', $this->activityLog->id) => $this->activityLog->id,
                ],
            ]);
    }
}
