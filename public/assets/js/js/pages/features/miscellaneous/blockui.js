"use strict";
// Class definition

// var KTBlockUIDemo = function() {
//     // Private functions
//     // page blocking
//     var _demo4 = function() {
//         $('#kt_blockui_page_default').click(function() {
//             KTApp.blockPage();

//             setTimeout(function() {
//                 KTApp.unblockPage();
//             }, 2000);
//         });

//         $('#kt_blockui_page_overlay_color').click(function() {
//             KTApp.blockPage({
//                 overlayColor: 'red',
//                 opacity: 0.1,
//                 state: 'primary' // a bootstrap color
//             });

//             setTimeout(function() {
//                 KTApp.unblockPage();
//             }, 2000);
//         });

//         $('#kt_blockui_page_custom_spinner').click(function() {
//             KTApp.blockPage({
//                 overlayColor: '#000000',
//                 state: 'warning', // a bootstrap color
//                 size: 'lg' //available custom sizes: sm|lg
//             });

//             setTimeout(function() {
//                 KTApp.unblockPage();
//             }, 2000);
//         });

//         $('#kt_blockui_page_custom_text_1').click(function() {
//             KTApp.blockPage({
//                 overlayColor: '#000000',
//                 state: 'danger',
//                 message: 'Please wait...'
//             });

//             setTimeout(function() {
//                 KTApp.unblockPage();
//             }, 2000);
//         });

//         $('#kt_blockui_page_custom_text_2').click(function() {
//             KTApp.blockPage({
//                 overlayColor: '#000000',
//                 state: 'primary',
//                 message: 'Processing...'
//             });

//             setTimeout(function() {
//                 KTApp.unblockPage();
//             }, 2000);
//         });
//     }

//     return {
//         // public functions
//         init: function() {
//             _demo4();
//         }
//     };
// }();

// jQuery(document).ready(function() {
//     KTBlockUIDemo.init();
// });