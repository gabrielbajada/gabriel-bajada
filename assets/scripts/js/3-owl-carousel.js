// Owl Carousel

jQuery(document).ready(function(){

    jQuery('#home-slider-above-fold').owlCarousel({
        loop: true,
        arrows: false,
        dots: true,
        autoplay: true,
        autoplaySpeed: 1000,
        items: 1, //1 item above 1025px browser width
        itemsDesktop: [1025,1], //1 items between 1025px and 0
        itemsDesktopSmall: false,
        itemsTablet: false,
        itemsMobile: false,
        video: true,
        animateIn: 'fadeIn',
        animateOut: 'fadeOutLeft',
    });

    jQuery('#home-virtual-tour-slider').owlCarousel({
        loop: true,
        arrows: false,
        dots: false,
        autoplay: true,
        autoplayHoverPause: false,
        autoplaySpeed: 1000,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut',
        items:1,
        slideBy:1,
    });

    jQuery('.generic-testimonials-slider').owlCarousel({
        loop: true,
        arrows: false,
        dots: true,
        autoplay: true,
        autoplayHoverPause: true,
        autoplaySpeed: 1000,
        animateIn: 'fadeIn',
        animateOut: 'fadeOutLeft',
        items:1,
        slideBy:1,
    });

    jQuery('.facilities-slider').owlCarousel({
        loop: true,
        arrows: false,
        dots: true,
        autoplay: true,
        autoplayHoverPause: true,
        autoplaySpeed: 1000,
        //animateIn: 'fadeIn',
        //animateOut: 'fadeOutLeft',

        responsive:{
            0:{
                items:1,
                margin:20,
                slideBy:1,
            },
            641:{
                items:3,
                margin:20,
                slideBy:2,
            },
            1025:{
                items:3,
                margin:30,
                slideBy:2,
            },
            1441: {
                items:4,
                margin:60,
                slideBy:3,
            },
            1921: {
                items:4,
                margin:80,
                slideBy:3,
            },
        },
    });

});
