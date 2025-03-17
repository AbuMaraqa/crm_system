/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/23/24, 9:35 AM.
 * @Project: Jumla
 ************************************************/

import { defineConfig } from "vite";
import laravel, { refreshPaths } from "laravel-vite-plugin";

import autoprefixer from "autoprefixer";
import postcssRTL from "postcss-rtl";


export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/front-side/app.css",
                "resources/js/front-side/app.js",
            ],
            refresh: [
                ...refreshPaths
            ],
            //buildDirectory: "/front-side/output"
            buildDirectory: "build"

        })
    ],
    css: {
        postcss: {
            plugins: [
                autoprefixer,
                postcssRTL()
            ]
        }
    }
});
