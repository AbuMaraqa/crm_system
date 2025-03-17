
/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/2/24, 9:34 AM.
 * @Project: Jumla
 ************************************************/

import { Alpine, Livewire } from "../../../../vendor/livewire/livewire/dist/livewire.esm";

// Third Party Libraries
/**
 * Scrollbar Library
 * @see https://github.com/Grsmto/simplebar
 */
import SimpleBar from "simplebar";

/**
 * Date Utility Library
 * @see https://day.js.org/
 */
import dayjs from "dayjs";

/**
 * Carousel Library
 * @see https://swiperjs.com/
 */
import Swiper from "swiper/bundle";

/**
 * Drag & Drop Library
 * @see https://github.com/SortableJS/Sortable
 */
import Sortable from "sortablejs";

/**
 * Chart Library
 * @see https://apexcharts.com/
 */
import ApexCharts from "apexcharts";

/**
 * Table Library
 * @see https://gridjs.io/
 */
import * as Gridjs from "gridjs";

//  Forms Libraries
import "@caneara/iodine"; // @see https://github.com/caneara/iodine
import * as FilePond from "filepond"; // @see https://pqina.nl/filepond/
import FilePondPluginImagePreview from "filepond-plugin-image-preview"; // @see https://pqina.nl/filepond/docs/api/plugins/image-preview/
import Quill from "quill"; // @see https://quilljs.com/
import flatpickr from "flatpickr"; // @see https://flatpickr.js.org/
import Tom from "tom-select/dist/js/tom-select.complete.min"; // @see https://tom-select.js.org/
// Helper Functions
import * as helpers from "./utils/helpers";

// Pages Scripts
import * as pages from "./pages";

// Global Store
import store from "./store";

// Breakpoints Store
import breakpoints from "./utils/breakpoints";

// Alpine Components
import usePopper from "./components/usePopper";
import accordionItem from "./components/accordionItem";
import navLink from "./components/navLink";

// Alpine Directives
import tooltip from "./directives/tooltip";
import inputMask from "./directives/inputMask";

// Alpine Magic Functions
import notification from "./magics/notification";
import clipboard from "./magics/clipboard";
import "./components/analog-clock-element.js";


// Register plugin image preview for filepond
FilePond.registerPlugin(FilePondPluginImagePreview);

window.dayjs = dayjs;
window.SimpleBar = SimpleBar;
window.Swiper = Swiper;
window.Sortable = Sortable;
window.ApexCharts = ApexCharts;
window.Gridjs = Gridjs;
window.FilePond = FilePond;
window.flatpickr = flatpickr;
window.Quill = Quill;
window.Tom = Tom;

window.Alpine = Alpine;
window.Livewire = Livewire;
window.helpers = helpers;
window.pages = pages;

document.addEventListener("alpine:init", () => {
    Alpine.directive("tooltip", tooltip);
    Alpine.directive("input-mask", inputMask);

    Alpine.magic("notification", () => notification);
    Alpine.magic("clipboard", () => clipboard);

    Alpine.store("breakpoints", breakpoints);
    Alpine.store("global", store);

    Alpine.data("usePopper", usePopper);
    Alpine.data("accordionItem", accordionItem);
    Alpine.data("navLink", navLink);
});
