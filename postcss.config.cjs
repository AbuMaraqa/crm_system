
/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/2/24, 9:34 AM.
 * @Project: Jumla
 ************************************************/

module.exports = {
    plugins: [
        require("postcss-import"),
        require("tailwindcss/nesting"),
        require("tailwindcss")("./tailwind-dashboard.config.js"),
        require("autoprefixer"),
        require('postcss-rtl')(),
    ],
};

