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
use Filament\Tables\Concerns\CanPaginateRecords;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\Features\SupportPagination\HandlesPagination;
use Modules\Core\Entities\Activity;
use Modules\Core\View\Components\AppLayouts;

class View extends Component implements HasForms
{
    use CanPaginateRecords;
    use HandlesPagination;
    use InteractsWithFormActions;
    use InteractsWithForms;

    protected static Collection $fieldLabelMap;

    #[Locked]
    public int $activityLogID;

    #[Computed()]
    public function activityLog()
    {
        return Activity::with([
            'subject' => function ($query) {
                $query->withoutGlobalScopes();
            },
            'causer' => function ($query) {
                $query->withoutGlobalScopes();
            },
        ])
            ->find($this->activityLogID);
    }

    public function mount($activityLog)
    {
        $this->activityLogID = $activityLog;
    }

    public function getNestedArrayHTML($array, $indent = 0): string
    {
        $html = "<ul class='text-sm leading-2'>";
        foreach ($array as $key => $value) {
            $html .= '<li>';
            if (is_array($value)) {
                $html .= "<ul class='ml-4 py-2 border-b border-gray-200 dark:border-gray-800 list-disc list-inside'>";
                $html .= $this->getNestedArrayHTML($value, $indent + 1);
                $html .= '</ul>';
            } else {
                $html .= "<div><span class='font-bold'>{$this->getFieldLabel($key)}</span>: <span class='text-gray-700 dark:text-gray-300'>$value</span></div>";
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

        return __($label);
    }

    public function render()
    {
        return view('core::livewire.pages.activity-logs.view')
            ->layout(AppLayouts::class, [
                'pageTitle' => __('View'),
                'breadcrumbs' => [
                    route('dashboard.home') => __('Home'),
                    route('dashboard.user_management.activity_logs') => __('Activity Logs'),
                    route('dashboard.user_management.activity_logs.view', $this->activityLog->id) => $this->activityLog->id,
                ],
            ]);
    }
}
