window._ = require('lodash');

document.addEventListener("turbolinks:load", function() {

    try {
        window.Popper = require('popper.js').default;
        window.$ = window.jQuery = require('jquery');
        const swal = require('sweetalert2');
    } catch (e) {}


})