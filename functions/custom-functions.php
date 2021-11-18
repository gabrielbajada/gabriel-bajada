<?php

  // retrieves the attachment ID from the file URL
  function banner_get_image_id($image_url) {
      global $wpdb;
      $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ));
          return $attachment[0];
  }




  // Disable Admin Bar for All Users Except for Administrators
  add_action('after_setup_theme', 'remove_admin_bar');

      function remove_admin_bar() {
      if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
      }
  }




  // Exclude Specific Pages from Search (terms & conditions, cookie policy)
  function moose_search_filter( $query ) {
    if ( ! $query->is_admin && $query->is_search && $query->is_main_query() ) {
      $query->set( 'post__not_in', array( 82,2161 ) );
    }
  }
  add_action( 'pre_get_posts', 'moose_search_filter' );




  // Defer Parsing of JavaScript in WordPress via functions.php file
  // Learn more at https://technumero.com/defer-parsing-of-javascript/

  function defer_parsing_js($url) {
  //Add the files to exclude from defer. Add jquery.js by default
      $exclude_files = array('jquery.js');
  //Bypass JS defer for logged in users
      if (!is_user_logged_in()) {
          if (false === strpos($url, '.js')) {
              return $url;
          }

          foreach ($exclude_files as $file) {
              if (strpos($url, $file)) {
                  return $url;
              }
          }
      } else {
          return $url;
      }
      return "$url' defer='defer";

  }
  add_filter('clean_url', 'defer_parsing_js', 11, 1);

?>
