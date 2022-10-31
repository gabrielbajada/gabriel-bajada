// SCROLL DOWN
jQuery(document).ready(function($){
  $("#scroll-down-container").click(function() {
      $('html, body').animate({
          scrollTop: $("#inner-content").offset().top
      }, 2000);
  });
});


// SCROLL TO TOP

jQuery(document).ready(function($){
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('#scroll-top-container').fadeIn(250);
        } else {
            $('#scroll-top-container').fadeOut(250);
        }
    });
    $('#scroll-top-container').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 1000);
        return false;
    });
});


// CONTACT FORM 7 SCROLL TO RESPONSE OUTPUT

jQuery(document).ready(function($){
  $('html, body').animate({
    scrollTop: $('.wpcf7-response-output').offset().top
  }, 1000);
});
