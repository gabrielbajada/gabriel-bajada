// Appear on Load Effect - More code in CSS file

jQuery(window).on('load', function() {
  var appear = document.getElementById('appear-load-1');
  jQuery('.appear-load-1').addClass('visible');
});

jQuery(window).on('load', function() {
  var appear = document.getElementById('appear-load-2');
  jQuery('.appear-load-2').addClass('visible');
});

jQuery(window).on('load', function() {
  var appear = document.getElementById('appear-load-3');
  jQuery('.appear-load-3').addClass('visible');
});

jQuery(window).on('load', function() {
  var appear = document.getElementById('appear-load-4');
  jQuery('.appear-load-4').addClass('visible');
});



// Appear on Load Effect - FOR OWL CAROUSEL CONTROLS - More code in CSS file

jQuery(window).on('load', function() {
  var appear = document.getElementById('owl-controls');
  jQuery('.owl-controls').addClass('visible');
});



// Appear on Scroll Effect - More code in CSS file

jQuery(document).on("scroll", function () {
  var pageTop = jQuery(document).scrollTop();
  var pageBottom = pageTop + jQuery(window).height();
  var tags = jQuery(".appear-scroll-1");

  for (var i = 0; i < tags.length; i++) {
    var tag = tags[i];

    if (jQuery(tag).position().top < pageBottom) {
      jQuery(tag).addClass("visible");
    } else {
      //jQuery(tag).removeClass("visible");
    }
  }
});

jQuery(document).on("scroll", function () {
  var pageTop = jQuery(document).scrollTop();
  var pageBottom = pageTop + jQuery(window).height();
  var tags = jQuery(".appear-scroll-2");

  for (var i = 0; i < tags.length; i++) {
    var tag = tags[i];

    if (jQuery(tag).position().top < pageBottom) {
      jQuery(tag).addClass("visible");
    } else {
      //jQuery(tag).removeClass("visible");
    }
  }
});

jQuery(document).on("scroll", function () {
  var pageTop = jQuery(document).scrollTop();
  var pageBottom = pageTop + jQuery(window).height();
  var tags = jQuery(".appear-scroll-3");

  for (var i = 0; i < tags.length; i++) {
    var tag = tags[i];

    if (jQuery(tag).position().top < pageBottom) {
      jQuery(tag).addClass("visible");
    } else {
      //jQuery(tag).removeClass("visible");
    }
  }
});

jQuery(document).on("scroll", function () {
  var pageTop = jQuery(document).scrollTop();
  var pageBottom = pageTop + jQuery(window).height();
  var tags = jQuery(".appear-scroll-4");

  for (var i = 0; i < tags.length; i++) {
    var tag = tags[i];

    if (jQuery(tag).position().top < pageBottom) {
      jQuery(tag).addClass("visible");
    } else {
      //jQuery(tag).removeClass("visible");
    }
  }
});
