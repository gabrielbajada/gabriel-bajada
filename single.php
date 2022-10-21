<?php
    $post = $wp_query->post;
    if (in_category('careers')) {
        include(TEMPLATEPATH.'/single-career.php');
    }

    /* elseif (in_category('news')) {
        include(TEMPLATEPATH.'/single-news.php');
    } */ 

    else {
        include(TEMPLATEPATH.'/single-default.php');
    }
?>