const li = document.querySelector('li.dropmenu');
const div = document.querySelector('div.dropmenu');
const fontAwesome = document.querySelector('i.fa-angle-down');
const hamburger_div = document.querySelector('div.hamburger_menu')
const hamburger_icon = document.querySelector('i.fa-bars');
const hamburger_menu = document.querySelector('.main_nav');


li.addEventListener('click', function() {
    div.classList.toggle('visible');
    fontAwesome.classList.toggle('rotate');

});

hamburger_icon.addEventListener('click', function () {
    hamburger_menu.classList.toggle('nav_active_hamburger');
    hamburger_div.classList.toggle('rotate_menu');

});