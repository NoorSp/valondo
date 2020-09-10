$(document).ready(function () {
    $('.pr-details-btn').click(function () {
        $('.tab--link[data-tabname="description"]').trigger('click');

        $('html, body').animate({
            scrollTop: $('.tab--link[data-tabname="description"]').offset().top
        }, 500);
    });

    $('.also-bought-btn').click(function () {
        $('.also-bought-target').trigger('click');

        $('html, body').animate({
            scrollTop: $('.also-bought-target').offset().top
        }, 500);
    });
});