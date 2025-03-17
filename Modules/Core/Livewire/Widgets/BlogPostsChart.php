<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Livewire\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Lazy;

#[Lazy]
class BlogPostsChart extends ChartWidget
{
    protected int|string|array $columnSpan = 6;

    protected function getData(): array
    {
        $userCountsByMonth = DB::table('users')
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->get();
        $userCountsCollection = new Collection($userCountsByMonth);

        $months = [];
        $userCounts = [];

        for ($month = 1; $month <= 12; $month++) {
            $months[] = Carbon::create(null, $month)->format('F');
            $userCount = $userCountsCollection->where('month', $month)->first();
            $userCounts[] = $userCount ? $userCount->count : 0;
        }

        // dd($months,$userCounts);
        return [
            'datasets' => [
                [
                    'label' => __('Users'),
                    'data' => $userCounts,
                ],
            ],
            'labels' => $months,
        ];
    }

    public function getHeading(): string|Htmlable|null
    {
        return __('Users');
    }

    protected function getType(): string
    {
        return 'line';
    }
}
