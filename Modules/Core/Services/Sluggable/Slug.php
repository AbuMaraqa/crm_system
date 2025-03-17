<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Services\Sluggable;

class Slug
{
    // public static function generate(string $title, string $separator = '-', string|null $language = 'en'): string
    // {

    // }

    public static function make(string $title, string $separator = '-', ?string $language = 'en'): string
    {
        // $title = trim($title);
        // $title = str_replace('}', ' ', $title);
        // $title = str_replace('{', ' ', $title);

        // $title = mb_strtolower($title, "UTF-8");;

        // $title = preg_replace("/[^a-z0-9_\s\-{0660}-\x{0669}ءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]/u", '', $title);

        // // Remove multiple dashes or whitespaces or underscores
        // $title = preg_replace("/[\s\-_]+/", ' ', $title);

        // // Convert whitespaces and underscore to the given separator
        // $title = preg_replace("/[\s_]/", $separator, $title);

        $title = trim($title);
        $title = mb_strtolower($title, 'UTF-8');

        $title = str_replace('‌', $separator, $title);

        $title = preg_replace(
            '/[^a-z0-9_\s\-اآؤئبپتثجچحخدذرزژسشصضطظعغفقكکگلمنوةيإأۀءهی۰۱۲۳۴۵۶۷۸۹٠١٢٣٤٥٦٧٨٩]/u',
            '',
            $title
        );

        $title = preg_replace('/[\s\-_]+/', ' ', $title);
        $title = preg_replace('/[\s_]/', $separator, $title);
        $title = trim($title, $separator);

        return $title;
    }
}
