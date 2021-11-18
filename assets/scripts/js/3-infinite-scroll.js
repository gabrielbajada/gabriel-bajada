// Infinite Scroll

jQuery(document).ready(function() {

    jQuery('.moose-infinite-scroll').infiniteScroll({
      // options
      path: 'page/{{#}}',
      append: '.moose-infinite-scroll-item',
      hideNav: '.pagination-container',
      scrollThreshold: 800,
      prefill: true,
      status: '.page-load-status',
      history: false
    });

    // link used to get absolute path, beginning with /
    let link = document.createElement('a');

    $container.on( 'append.infiniteScroll', function( event, response, path ) {
      link.href = path;
      ga( 'set', 'page', link.pathname );
      ga( 'send', 'pageview' );
    });

});
