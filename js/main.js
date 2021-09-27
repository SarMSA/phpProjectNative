/* global $ ,jquery*/

$(function () {
    'use strict';


    var winH = $(window).height(),
        upperH = $('.upper-bar').innerHeight(),
        navH = $('.navbar').innerHeight();

    $('.slider, .carousel-item ').height(winH - (upperH + navH));

    //shuffle//
    $('.featured-work ul li').on('click', function () {
        $(this).addClass('active').siblings().removeClass('active');
        if ($(this).data('class') === '.all') {
            $('.shuffle .col-md').css('opacity', 1);
        } else {
            $('.shuffle .col-md').css('opacity', '0.5');
            $($(this).data('class')).parent().css('opacity', 1);
        }
    });
    /*testimonial*/

    
    $('.testimonial').hover(function () {
        $('.testimonial .hidden-right, .testimonial .hidden-left').toggleClass('flex');
    });




});
$(document).ready(function () {
    'use strict';
    $(window).on('resize', function () {
        var dw = $(document).width();

        // $('.slider .our-head').css({
        //     'font-size': dw * 4.151223128243143 / 100,
        //     'width' : dw * 0.6671608598962194
        // });
    });

});

//0.04151223128243143
//0.6671608598962194



