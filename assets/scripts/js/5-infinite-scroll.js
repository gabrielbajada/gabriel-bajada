// Infinite Scroll Generic

jQuery(document).ready(function() {

  jQuery('.moose-infinite-scroll').infiniteScroll({
    // options
    path: 'page/{{#}}',
    //checkLastPage: '.pagination__next',
    append: '.moose-infinite-scroll-item',
    hideNav: '.pagination-container',
    scrollThreshold: 800,
    prefill: true,
    status: '.page-load-status',
    history: false,
    hiddenStyle: { opacity: 0 },
    visibleStyle: { opacity: 1 }
  });

  // link used to get absolute path, beginning with /
  let link = document.createElement('a');

  $container.on( 'append.infiniteScroll', function( event, response, path ) {
    link.href = path;
    ga( 'set', 'page', link.pathname );
    ga( 'send', 'pageview' );
  });

});


// Infinite Scroll Home Page

jQuery(document).ready(function() {

  jQuery('.moose-infinite-scroll-homepage').infiniteScroll({
    // options
    path: 'page/{{#}}', //?paged=%#%
    //checkLastPage: '.pagination__next',
    append: '.moose-infinite-scroll-homepage-item',
    hideNav: '.pagination-container',
    scrollThreshold: 800,
    prefill: true,
    status: '.page-load-status',
    history: false,
    hiddenStyle: { opacity: 0 },
    visibleStyle: { opacity: 1 }
  });

  // link used to get absolute path, beginning with /
  let link = document.createElement('a');

  $container.on( 'append.infiniteScroll', function( event, response, path ) {
    link.href = path;
    ga( 'set', 'page', link.pathname );
    ga( 'send', 'pageview' );
  });

});
