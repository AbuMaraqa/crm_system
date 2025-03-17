/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/2/24, 9:34 AM.
 * @Project: Jumla
 ************************************************/

import preset from "./vendor/filament/support/tailwind.config.preset";

const colors = require("tailwindcss/colors");
const defaultTheme = require("tailwindcss/defaultTheme");

const navyColor = {
    50: "#E7E9EF",
    100: "#C2C9D6",
    200: "#A3ADC2",
    300: "#697A9B",
    400: "#5C6B8A",
    450: "#465675",
    500: "#384766",
    600: "#313E59",
    700: "#26334D",
    750: "#222E45",
    800: "#202B40",
    900: "#192132"
};

const customColors = {
    navy: navyColor,
    "slate-150": "#E9EEF5",
    primary: "#ED8911",
    "primary-focus": "#DF8417",
    //primary: colors.indigo["600"],
    //"primary-focus": colors.indigo["700"],
    "secondary-light": "#FF57D8",
    secondary: "#F000B9",
    "secondary-focus": "#BD0090",
    "accent-light": colors.indigo["400"],
    accent: "#5F5AF6",
    "accent-focus": "#4D47F5",
    info: colors.sky["500"],
    "info-focus": colors.sky["600"],
    success: colors.emerald["500"],
    "success-focus": colors.emerald["600"],
    warning: "#FF9800",
    "warning-focus": "#E68200",
    error: "#FF5724",
    "error-focus": "#F03000",
    danger: "#DC2121",
    "danger-focus": "#DC2121"
};


/** @type {import("tailwindcss").Config} */
module.exports = {
    presets: [preset],
    content: [

        "!./**/FrontSide/**/*.php",
        "!./**/frontend/**/*.php",
        "./Modules/**/*.php",

        "./resources/views/errors/*.php",
        "./resources/**/dashboard/**/*.php",
        "./resources/**/dashboard/**/*.js",
        "./resources/**/*.blade.php",
        "./resources/views/**/*.blade.php",

        "./vendor/jaocero/*/resources/views/**/*.blade.php",
        "./vendor/filament/**/*.php"

    ],
    darkMode: "class",
    theme: {
        container: {
            screens: {
                "2xl": "1320px"
            }
        },
        extend: {
            screens: {
                "3xl": "1600px"
            },
            colors: {
                ...customColors,

                "egg-white": {
                    "50": "#FFFBEB",
                    "100": "#FFF1C0",
                    "200": "#FFE488",
                    "300": "#FFD14A",
                    "400": "#FFBC20",
                    "500": "#F99A07",
                    "600": "#DD7202",
                    "700": "#B74F06",
                    "800": "#943C0C",
                    "900": "#7A320D",
                    "950": "#461802"
                },
                "olive-drab": {
                    "50": "#F5F8ED",
                    "100": "#E9EFD8",
                    "200": "#D4E1B5",
                    "300": "#B7CE88",
                    "400": "#9BB962",
                    "500": "#7D9D45",
                    "600": "#6A8838",
                    "700": "#4B602B",
                    "800": "#3E4E26",
                    "900": "#364324",
                    "950": "#1B240F"
                },
                "blue-lagoon": {
                    "50": "#EBFFFE",
                    "100": "#CDFEFF",
                    "200": "#A1FAFF",
                    "300": "#61F4FF",
                    "400": "#19E4F7",
                    "500": "#00C6DD",
                    "600": "#019FB9",
                    "700": "#087990",
                    "800": "#116579",
                    "900": "#135466",
                    "950": "#053747"
                },
                "chelsea-gem": {
                    "50": "#FDF9E9",
                    "100": "#FCF2C5",
                    "200": "#FAE48E",
                    "300": "#F7CE4D",
                    "400": "#F2B51D",
                    "500": "#E29D10",
                    "600": "#C3790B",
                    "700": "#98530C",
                    "800": "#814412",
                    "900": "#6E3815",
                    "950": "#401B08"
                },
                "shiraz": {
                    "50": "#FFF1F2",
                    "100": "#FFE4E7",
                    "200": "#FECDD5",
                    "300": "#FDA4B2",
                    "400": "#FB718A",
                    "500": "#F53E64",
                    "600": "#E21C4F",
                    "700": "#BE1242",
                    "800": "#A3123F",
                    "900": "#88133B",
                    "950": "#4C051B"
                },
                "bay-of-many": {
                    "50": "#EFF7FF",
                    "100": "#DBEBFE",
                    "200": "#BEDDFF",
                    "300": "#92C9FE",
                    "400": "#5EABFC",
                    "500": "#3988F8",
                    "600": "#2369ED",
                    "700": "#1B54DA",
                    "800": "#1C44B1",
                    "900": "#1D3E8D",
                    "950": "#162755"
                },
                "blue-romance": {
                    "50": "#EFFAF1",
                    "100": "#CCF0D1",
                    "200": "#B3E7BD",
                    "300": "#81D496",
                    "400": "#4EB96D",
                    "500": "#2B9E50",
                    "600": "#1C7F3D",
                    "700": "#176534",
                    "800": "#14512B",
                    "900": "#124225",
                    "950": "#092514"
                },
                "your-pink": {
                    "50": "#FEF2F2",
                    "100": "#FDE3E3",
                    "200": "#FDCCCC",
                    "300": "#FAA7A7",
                    "400": "#F57474",
                    "500": "#EC4747",
                    "600": "#D82A2A",
                    "700": "#B61F1F",
                    "800": "#961E1E",
                    "900": "#7D1F1F",
                    "950": "#440B0B"
                },
                "cosmos": {
                    "50": "#FFF1F2",
                    "100": "#FEE5E7",
                    "200": "#FDD3D8",
                    "300": "#FBA6B1",
                    "400": "#F87487",
                    "500": "#F04360",
                    "600": "#DC224A",
                    "700": "#BA163D",
                    "800": "#9B163B",
                    "900": "#851638",
                    "950": "#4A071A"
                },
                "claret": {
                    "50": "#FDF3F4",
                    "100": "#FAE9EA",
                    "200": "#F5D6D8",
                    "300": "#EEB3BA",
                    "400": "#E38994",
                    "500": "#D55E70",
                    "600": "#BF3F58",
                    "700": "#A03048",
                    "800": "#852A41",
                    "900": "#74273D",
                    "950": "#40111D"
                },
                "fiery-orange": {
                    "50": "#FEFAEC",
                    "100": "#FCF0C9",
                    "200": "#F9DF8E",
                    "300": "#F5C954",
                    "400": "#F3B42C",
                    "500": "#EC9414",
                    "600": "#D16F0E",
                    "700": "#B15010",
                    "800": "#8D3D13",
                    "900": "#743313",
                    "950": "#421906"
                },
                "mineral-green": {
                    "50": "#F5F8F6",
                    "100": "#DFE8E3",
                    "200": "#BFD0C8",
                    "300": "#97B1A5",
                    "400": "#728F83",
                    "500": "#577568",
                    "600": "#41584F",
                    "700": "#394C44",
                    "800": "#313E3A",
                    "900": "#2B3632",
                    "950": "#161D1B"
                },
                "jacksons-purple": {
                    "50": "#EDF2FF",
                    "100": "#DFE6FF",
                    "200": "#C5D1FF",
                    "300": "#A1B1FF",
                    "400": "#7C88FD",
                    "500": "#5D60F7",
                    "600": "#493FEC",
                    "700": "#3D31D1",
                    "800": "#322BA8",
                    "900": "#2D2A84",
                    "950": "#1C194D"
                },
                "eastern-blue": {
                    "50": "#EEFCFD",
                    "100": "#D3F7FA",
                    "200": "#ADEEF4",
                    "300": "#74DFEC",
                    "400": "#34C8DC",
                    "500": "#17A2B8",
                    "600": "#1789A3",
                    "700": "#196E85",
                    "800": "#1D5B6D",
                    "900": "#1D4C5C",
                    "950": "#0D313F"
                },
                "cosmic": {
                    "50": "#FBF8FB",
                    "100": "#F7EFF8",
                    "200": "#EDDFEF",
                    "300": "#E0C5E2",
                    "400": "#CEA2D0",
                    "500": "#B67CB9",
                    "600": "#9A5D9C",
                    "700": "#7F4B80",
                    "800": "#6A3F6A",
                    "900": "#583757",
                    "950": "#361C35"
                }
            },
            fontFamily: {
                sans: ["Poppins", "Changa", ...defaultTheme.fontFamily.sans],
                inter: ["Inter", "Changa", ...defaultTheme.fontFamily.sans]
            },
            fontSize: {
                tiny: ["0.625rem", "0.8125rem"],
                "tiny+": ["0.6875rem", "0.875rem"],
                "xs+": ["0.8125rem", "1.125rem"],
                "sm+": ["0.9375rem", "1.375rem"]
            },
            opacity: {
                15: ".15"
            },
            spacing: {
                4.5: "1.125rem",
                5.5: "1.375rem",
                18: "4.5rem"
            },
            boxShadow: {
                soft: "0 3px 10px 0 rgb(48 46 56 / 6%)",
                "soft-dark": "0 3px 10px 0 rgb(25 33 50 / 30%)"
            },
            zIndex: {
                1: "1",
                2: "2",
                3: "3",
                4: "4",
                5: "5"
            },
            keyframes: {
                "fade-out": {
                    "0%": {
                        opacity: 1,
                        visibility: "visible"
                    },
                    "100%": {
                        opacity: 0,
                        visibility: "hidden"
                    }
                },
                shimmer: {
                    from: {
                        "backgroundPosition": "0 0"
                    },
                    to: {
                        "backgroundPosition": "-200% 0"
                    }
                }
            },
            animation: {
                shimmer: "shimmer 2s linear infinite"
            },
            container: {
                center: true
            }
        }
    },
    corePlugins: {
        textOpacity: false,
        backgroundOpacity: false,
        borderOpacity: false,
        divideOpacity: false,
        placeholderOpacity: false,
        ringOpacity: false
    },
    plugins: [
        require("@tailwindcss/forms")
    ]
};
