<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

if (! function_exists('module_path')) {
    function module_path($name, $path = null)
    {
        if ($path) {
            return base_path("Modules/$name/$path");
        }

        return base_path("Modules/$name");

    }
}
