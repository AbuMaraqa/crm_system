
/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

import flatpickr from "flatpickr";
import ConfirmDate from "flatpickr/dist/esm/plugins/confirmDate/confirmDate.js";
import MonthSelect from "flatpickr/dist/esm/plugins/monthSelect/index.js";
import WeekSelect from "flatpickr/dist/esm/plugins/weekSelect/weekSelect.js";
import { Arabic } from "flatpickr/dist/l10n/ar.js"

// import RangePlugin from "../../assets/flatpickr/dist/esm/plugins/rangePlugin.js";
export default function flatpickrDatepicker(args) {
    return {
        state: args.state,
        mode: 'light',
        attribs: args.attribs ?? {},
        packageConfig: args.packageConfig ?? {},
        fp: null,
        get darkStatus() {
            return window.matchMedia('(prefers-color-scheme: dark)').matches;
        },
        get getMode() {
            if (localStorage.getItem('theme')) {
                return localStorage.getItem('theme');
            }
            this.mode = this.darkStatus ? 'dark' : 'light';
            return this.mode;
        },
        get darkLightAssetUrl() {
            return this.darkStatus ? this.attribs.darkThemeAsset : this.attribs.lightThemeAsset
        },
        init: function () {
            this.mode = this.darkStatus ? 'dark' : 'light';
            const config = {
                mode: this.attribs.mode,
                time_24hr: true,
                altFormat: 'F j, Y',
                disableMobile: true,
                initialDate: this.state,
                allowInvalidPreload: false,
                static: false,
                defaultDate: this.state,
                ...this.packageConfig,
                plugins: [new ConfirmDate({
                    confirmText: "OK",
                    showAlways: false,
                    theme: this.mode
                })],
            };
            if (this.getMode === 'dark') {
                let el = document.querySelector('#pickr-theme')
                console.log(el);
                if (el) {
                    el.href = this.attribs.darkThemeAsset;
                }
            }
            if (this.attribs.monthSelect) {
                config.plugins.push(new MonthSelect({
                    shorthand: false, //defaults to false
                    dateFormat: "F Y", //defaults to "F Y"
                    altInput: true,
                    altFormat: "F, Y", //defaults to "F Y"
                    theme: this.mode, // defaults to "light"
                    "locale": Arabic // locale for this instance only
                }))
            } else if (this.attribs.weekSelect) {
                config.plugins.push(new WeekSelect({}))
            }/* else if (this.attribs.rangePicker) {
                config.plugins.push(new RangePlugin({}))
            }*/
            this.fp = flatpickr(this.$refs.picker, config);
            this.fp.parseDate(this.state, this.packageConfig.dateFormat)
            window.addEventListener('theme-changed', e => {
                this.mode = e.detail;
                let href;
                if (this.mode === 'dark') {
                    href = this.attribs.darkThemeAsset;
                } else {
                    href = this.attribs.themeAsset;
                }
                document.querySelector('#pickr-theme').href = href;
            })
        },
    }
}
