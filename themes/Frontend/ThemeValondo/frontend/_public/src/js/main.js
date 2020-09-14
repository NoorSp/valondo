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

    // Move product technical specification table
    var tbl_title = $('.content--description table').prev();
    var tbl = $('.content--description table');
    $('.content--description').after('<div class="tech-details"></div><div style="clear: both;"></div>');

    if( tbl.length > 0 && tbl_title[0].tagName === 'H3' ){
        $('.tech-details').append(tbl_title);
        $('.tech-details').append(tbl);
    }

});