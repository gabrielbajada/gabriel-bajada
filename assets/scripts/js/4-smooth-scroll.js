// SCROLL DOWN
jQuery(document).ready(function($){

    $("#scroll-down-container").click(function() {
        $('html, body').animate({
            scrollTop: $("#inner-content").offset().top
        }, 2000);
    });

});


// SCROLL TO TOP

jQuery(document).ready(function(){ 
    jQuery(window).scroll(function(){ 
        if (jQuery(this).scrollTop() > 100) { 
            jQuery('#scroll-top-container').fadeIn(250); 
        } else { 
            jQuery('#scroll-top-container').fadeOut(250); 
        } 
    }); 
    jQuery('#scroll-top-container').click(function(){ 
        jQuery("html, body").animate({ scrollTop: 0 }, 1000); 
        return false; 
    }); 
});