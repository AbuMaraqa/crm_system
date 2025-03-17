<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Services\Formatters;

use Carbon\CarbonInterval;
use DateInterval;
use DateTime;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class Time extends Formatter
{
    protected mixed $defaultState = null;

    public function dtLength($sec): string
    {

        $time = new DateTime('@'.$sec);
        $remaining = new DateTime('@0');

        $min = $time->diff($remaining);
        $min = new DateTime($min);

        $second = $min->format('s');
        if ($second > 0) {
            $min->add(new DateInterval('PT'.(60 - $second).'S'));
        }

        $hour = intval($min->format('%a')) * 24 + intval($min->format('%H'));

        return Str::padLeft($hour, 2, '0').':'.$min->format('%I');
    }

    public function numberToTime(): ?string
    {
        $sign = '';
        $decimalHours = $this->getState();

        if (is_null($decimalHours)) {
            return $decimalHours;
        }

        if ($decimalHours < 0) {
            $sign = '-';
            $decimalHours = abs($decimalHours);
        }

        $hours = floor($decimalHours); // Extract the hours (integer part).
        $minutes = ($decimalHours - $hours) * 60; // Convert fractional part to minutes.

        // Round the minutes to the nearest minute.
        $roundedMinutes = round($minutes);

        // Create a CarbonInterval instance representing the duration.
        $duration = CarbonInterval::hours($hours)->minutes($roundedMinutes);

        return $sign.$duration->format('%r%H:%I');
    }

    public function getTimeDuration(): ?string
    {
        $decimalHours = $this->getState();

        if (is_null($decimalHours)) {
            return $decimalHours;
        }

        if ($decimalHours < 0) {
            $decimalHours = abs($decimalHours);
        }

        $hours = floor($decimalHours); // Extract the hours (integer part).
        $minutes = ($decimalHours - $hours) * 60; // Convert fractional part to minutes.

        // Round the minutes to the nearest minute.
        $roundedMinutes = round($minutes);

        // Create a CarbonInterval instance representing the duration.
        $duration = CarbonInterval::hours($hours)->minutes($roundedMinutes);

        return $duration->format('%r%h:%I');
    }

    public function getTimeCarbonObject(): ?Carbon
    {
        $hours = $this->getState();

        if (is_null($hours)) {
            return $hours;
        }

        if ($hours < 0) {
            $hours = abs($hours);
        }

        $seconds = $hours * 3600;

        return Carbon::createFromTime()->addSeconds($seconds)->roundMinute();
    }

    public function getTime(): ?string
    {
        return $this->numberToTime();
    }

    public function renderAsHtml(): ?string
    {
        if (is_null($this->numberToTime())) {
            return '';
        }

        return $this->numberToTime();
    }
}
