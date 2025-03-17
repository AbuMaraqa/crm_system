
/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/2/24, 10:20 AM.
 * @Project: Jumla
 ************************************************/

import {defineConfig} from "vite";
import laravel, {refreshPaths} from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/dashboard/app.css",
                "resources/js/dashboard/app.js",

                "resources/css/dashboard/admin-theme/app.css",
                "resources/js/dashboard/admin-theme/app.js",
            ],

            refresh: [
                ...refreshPaths,
                "app/Filament/**",
                "app/Forms/Components/**",
                "app/Livewire/**",
                "app/Infolists/Components/**",
                "app/Providers/Filament/**",
                "app/Tables/Columns/**",
            ],
            buildDirectory: "/dashboard-assets/output",
        }),
    ],
    css: {
        postcss: "./postcss.config.cjs",
    },
});
