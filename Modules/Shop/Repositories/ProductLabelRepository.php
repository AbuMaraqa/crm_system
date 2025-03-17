<?php

/*************************************************
 * Copyright (c) 2024.
 *
 * @Author : Shaker Awad <awadshaker74@gmail.com>
 * @Date   : 7/17/24, 7:05 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Shop\Repositories;

use Modules\Shop\Entities\ProductLabel;

class ProductLabelRepository
{
    /**
     * @return array
     */
    public function getLabelsAsOptions()
    {
        $result = [];
        $labels = ProductLabel::all();

        foreach ($labels as $label) {
            /**
             * @var ProductLabel $label
             */
            $background_color   = $label->background_color;
            $text_color              = $label->text_color;
            $title              = $label->getTitle();
//            $result[$label->id] = '<span style="color: ' . $color . '">' . $title . '</span>';
            $result[$label->id] = '<div class="badge space-x-2.5 rounded-md" style="background-color: ' . $background_color . '"><span style="color: ' . $text_color . '">' . $title . '</span></div>';
//            $result[$label->id] = '<div class="badge space-x-2.5 rounded-full bg-' . $color . '/10 text-' . $color . ' dark:bg-' . $color . '/15"><div class="size-2 rounded-full bg-current"></div><span>' . $title . '</span></div>';
        }

        return $result;
    }

    public function mohamad($record){
        $backgroundColor = $record->background_color;
        $textColor = $record->text_color;

        return <<<HTML
            <div class="badge space-x-2.5 rounded-full"
                 style="background-color: $backgroundColor; color: $textColor;">
                <div class="size-2 rounded-full" style="background-color: $textColor;"></div>
                <span>{$record->title}</span>
            </div>
        HTML;
    }
}
