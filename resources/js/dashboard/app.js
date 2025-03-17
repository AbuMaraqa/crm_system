/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/2/24, 9:34 AM.
 * @Project: Jumla
 ************************************************/

//import { Livewire } from "../../../vendor/livewire/livewire/dist/livewire.esm";
//
//Livewire.start();

//
//document.addEventListener("DOMContentLoaded", function() {
//    const addNewAttributeRepeaterButton = document.querySelector(".add-new-attribute-repeater-button");
//    const attributesRepeater = document.querySelector(".fi-fo-repeater");
//
//    // Delegate the event listener for radio buttons
//    attributesRepeater.addEventListener("click", function(event) {
//        if (event.target && event.target.matches("input[type=\"radio\"]")) {
//            const radioButton = event.target;
//            const repeaterRows = attributesRepeater.querySelectorAll(".fi-fo-repeater-item");
//
//            // When a radio button is clicked, uncheck all other radio buttons
//            repeaterRows.forEach(row => {
//                const otherRadioButton = row.querySelector("input[type=\"radio\"]");
//                if (otherRadioButton !== radioButton) {
//                    otherRadioButton.checked = false;
//                    otherRadioButton.value = 0; // Set value to 0 for unchecked
//                }
//            });
//
//            // Set value to 1 for the checked radio button
//            radioButton.value = radioButton.checked ? 1 : 0;
//        }
//    });
//
//    addNewAttributeRepeaterButton.addEventListener("click", function() {
//        const repeaterRows = attributesRepeater.querySelectorAll(".fi-fo-repeater-item");
//        let checkedElement = null;
//        repeaterRows.forEach(row => {
//            const radioButton = row.querySelector("input[type=\"radio\"]");
//            if (radioButton.checked) {
//                checkedElement = row;
//            }
//        });
//
//        setTimeout(() => {
//            const repeaterRows = attributesRepeater.querySelectorAll(".fi-fo-repeater-item");
//            repeaterRows.forEach(row => {
//                const radioButton = row.querySelector("input[type=\"radio\"]");
//
//                radioButton.checked = false;
//                radioButton.value = 0;
//            });
//
//            if (checkedElement) {
//                checkedElement.querySelector("input[type=\"radio\"]").checked = true;
//                checkedElement.querySelector("input[type=\"radio\"]").value = 1;
//            }
//
//        }, 400);
//    });
//});
//
//
