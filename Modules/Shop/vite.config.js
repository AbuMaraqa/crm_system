
/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 4:00 PM.
 * @Project: Jumla
 ************************************************/

import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    build: {
        outDir: '../../public/build-shop',
        emptyOutDir: true,
        manifest: true,
    },
    plugins: [
        laravel({
            publicDirectory: '../../public',
            buildDirectory: 'build-shop',
            input: [
                __dirname + '/resources/assets/sass/app.scss',
                __dirname + '/resources/assets/js/app.js'
            ],
            refresh: true,
        }),
    ],
});
