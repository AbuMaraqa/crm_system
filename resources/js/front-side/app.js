/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/2/24, 9:34 AM.
 * @Project: Jumla
 ************************************************/

import { Alpine, Livewire } from "../../../vendor/livewire/livewire/dist/livewire.esm";


Alpine.data(
    "select",
    (
        el,
        status,
        selectAll,
        selectSearchPlaceholder,
        selectNoResultText,
        selectAllLabel
    ) => ({
        el: el,
        status: status,
        selectAll: selectAll,
        selectSearchPlaceholder: selectSearchPlaceholder,
        selectNoResultText: selectNoResultText,
        selectAllLabel: selectAllLabel,

        init() {
            let statusClasses = "";
            if (this.status === 1)
                statusClasses = "ring-2 ring-green-700 dark:ring-green-600";
            else if (this.status === 2)
                statusClasses = "ring-2 ring-red-700 dark:ring-red-600";
            else statusClasses = "ring-1 ring-gray-300 dark:ring-gray-600";

            new Select(
                this.el,
                {
                    selectFilter: true,
                    selectAll: this.selectAll,
                    selectSearchPlaceholder: this.selectSearchPlaceholder,
                    selectNoResultText: this.selectNoResultText,
                    selectAllLabel: this.selectAllLabel
                },
                {
                    selectArrow:
                        "absolute text-[0.8rem] text-gray-400 dark:text-gray-550 cursor-pointer peer-focus:text-primary peer-data-[te-input-focused]:text-primary group-data-[te-was-validated]/validation:peer-valid:text-green-600 group-data-[te-was-validated]/validation:peer-invalid:text-[rgb(220,76,100)] w-5 h-5 ltr:right-3 rtl:left-3",
                    selectArrowDefault: "top-3",
                    formOutline:
                        "rtl:[&>[data-te-input-notch-ref]]:flex-row-reverse [&>[data-te-input-notch-ref]>div]:border-0 [&>[data-te-input-notch-ref]>div]:!shadow-none",
                    selectLabel:
                        "pointer-events-none absolute top-1/4 ltr:left-3 rtl:right-3 max-w-[90%] truncate text-gray-500 transition-all duration-200 ease-out peer-focus:text-primary motion-reduce:transition-none dark:text-gray-500 dark:peer-focus:text-gray-200",
                    selectInput: `text-gray-600 dark:text-gray-300 outline-none rounded ${statusClasses} ring-inset focus:ring-2 focus:ring-light-blue-300 dark:focus:ring-light-blue-600 bg-white dark:bg-gray-650 w-full h-[40px]`,
                    dropdown:
                        "relative outline-none min-w-[100px] m-0 scale-[0.8] opacity-0 bg-white dark:bg-gray-650 shadow-[0_2px_5px_0_rgba(0,0,0,0.16),_0_2px_10px_0_rgba(0,0,0,0.12)] transition duration-200 motion-reduce:transition-none data-[te-select-open]:scale-100 data-[te-select-open]:opacity-100 rounded border border-gray-300 dark:border-gray-600 overflow-hidden",
                    inputGroup:
                        "flex items-center whitespace-nowrap p-2.5 text-center text-base font-normal leading-[1.6] text-gray-700 dark:bg-gray-800 dark:text-gray-200 dark:placeholder:text-gray-200 [&>input]:text-sm [&>input]:border-none [&>input]:ring-1 [&>input]:ring-gray-300 dark:[&>input]:ring-gray-600 [&>input]:ring-inset",
                    noResult:
                        "flex justify-center items-center text-sm px-4 text-gray-600 dark:text-gray-300",
                    selectOption:
                        "flex flex-row items-center justify-between w-full px-4 truncate text-gray-700 bg-transparent select-none cursor-pointer data-[te-input-multiple-active]:bg-black/5 hover:[&:not([data-te-select-option-disabled])]:bg-black/5 data-[te-input-state-active]:bg-black/5 data-[te-select-option-selected]:data-[te-input-state-active]:bg-black/5 data-[te-select-selected]:data-[te-select-option-disabled]:cursor-default data-[te-select-selected]:data-[te-select-option-disabled]:text-gray-400 data-[te-select-selected]:data-[te-select-option-disabled]:bg-transparent data-[te-select-option-selected]:bg-black/[0.02] data-[te-select-option-disabled]:text-gray-400 data-[te-select-option-disabled]:cursor-default group-data-[te-select-option-group-ref]/opt:pl-7 dark:text-gray-200 dark:hover:[&:not([data-te-select-option-disabled])]:bg-white/[0.05] dark:data-[te-input-state-active]:bg-white/[0.05] dark:data-[te-select-option-selected]:data-[te-input-state-active]:bg-white/[0.05] dark:data-[te-select-option-disabled]:text-gray-400 dark:data-[te-input-multiple-active]:bg-white/[0.05]",

                    selectOptionText: "group text-sm",
                    selectOptionIcon: "w-6 h-6 rounded-full",
                    formCheckInput:
                        "relative h-4 w-4 form-checkbox block transition outline-none border border-gray-300 dark:border-gray-600 bg-transparent rounded"
                }
            );
        }
    })
);

Livewire.start();
