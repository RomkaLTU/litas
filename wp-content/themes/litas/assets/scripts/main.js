import $ from "jquery";
window.$ = $;

import 'bootstrap';
import debounce from "./modules/debounce";
import menuscroll from "./modules/menuscroll";

$(window).scroll(debounce(() => menuscroll()));

menuscroll();

$('#navbar-collapse').on('show.bs.collapse', function () {
    $('.hamburger').addClass('open');
    $('.navbar-main').addClass('navbar-open');
    console.log('navbar-open');
});
$('#navbar-collapse').on('hide.bs.collapse', function () {
    $('.hamburger').removeClass('open');
});
$('#navbar-collapse').on('hidden.bs.collapse', function () {
    console.log('ooooo');
    $('.navbar-main').removeClass('navbar-open');
});

