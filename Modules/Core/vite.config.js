
/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

import { defineConfig } from "vite";

export default defineConfig({
    build: {
        outDir: "Resources/assets/js/components/flatpickr",
        lib: {
            entry: resolve(
                __dirname,
                "Resources/assets/js/components/flatpickr/flatpickr.js"
            ),
            name: 'Flatpickr',

            fileName: "flatpickr-component.js",
        },
    },
});
