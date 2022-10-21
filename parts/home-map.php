<?php

  ///// RESPONSIVE BACKGROUND IMAGE DATA INTERCHANGE

  // set the image url
  $image_url = types_render_field("map-image", array( "output" => "raw", ));
  // store the image ID in a var
  $attachment_id = banner_get_image_id($image_url);

  $bg_img_small_array = wp_get_attachment_image_src( $attachment_id, 'thumbnail' );
  $bg_img_small = $bg_img_small_array[0];
  $bg_img_medium_array = wp_get_attachment_image_src( $attachment_id, 'medium' );
  $bg_img_medium = $bg_img_medium_array[0];
  $bg_img_large_array = wp_get_attachment_image_src( $attachment_id, 'large' );
  $bg_img_large = $bg_img_large_array[0];
  $bg_img_xlarge_array = wp_get_attachment_image_src( $attachment_id, 'full' );
  $bg_img_xlarge = $bg_img_xlarge_array[0];

  // Custom Fields
  //$map_image = types_render_field("map-image", array( "output" => "raw", ));
  $map_code = types_render_field("map-code", array( "output" => "raw", ));
?>



<?php if ( $map_code != '' ) { ?>

<section id="home-map" class="grid-container full appear-load-3">

  <div id="map" class="grid-x align-center">
    <div class="cell xlarge-11 xxlarge-10">
      <!-- img src="<?php //echo $map_image; ?>" -->
      <img data-interchange=" [<?php echo $bg_img_small; ?>, small], [<?php echo $bg_img_medium; ?>, small.retina],
                              [<?php echo $bg_img_medium; ?>, medium], [<?php echo $bg_img_large; ?>, medium.retina],
                              [<?php echo $bg_img_large; ?>, large], [<?php echo $bg_img_xlarge; ?>, large.retina],
                              [<?php echo $bg_img_xlarge; ?>, xlarge], [<?php echo $bg_img_xlarge; ?>, xlarge.retina],
                              [<?php echo $bg_img_xlarge; ?>, xxlarge]">
    </div>
  </div>

  <div id="map-overlay" class="grid-x align-center">
    <div class="cell xlarge-11 xxlarge-10">
      <?php echo $map_code; ?>
    </div>
  </div>

</div>

</section>

<!--section id="home-map-small" class="grid-container full appear-load-3 breaker hide-for-medium" role="complementary" style="background-image: url('<?php //echo $image_url; ?>');">

  <div class="grid-x align-center breaker-overlay">
   <div class="cell large-8 xlarge-9 xxlarge-8 text-center">

    <div class="grid-x grid-padding-x align-center-middle">
    	<div class="cell medium-8">

        <a class="button" data-open="map-reveal">
          View Map
        </a>

      </div>
    </div>

    </div>
  </div>

</section>

<section id="map-reveal" class="reveal full" data-reveal data-close-on-click="true" data-v-offset="0" data-deep-link="true" data-update-history="true" data-animation-in="fade-in" data-animation-out="fade-out">
  <div class="grid-container">

    <div class="grid-x grid-padding-x align-center-middle close-button">
        <div class="cell medium-11 text-right">
            <button data-close aria-label="Close reveal" type="button">
                <span class="material-symbols-sharp times">close</span><span class="show-for-medium">ESC</span>
            </button>
        </div>
    </div>

    <div id="map" class="grid-x">
      <div class="cell">
        <img data-interchange=" [<?php //echo $bg_img_small; ?>, small], [<?php //echo $bg_img_medium; ?>, small.retina],
                                [<?php //echo $bg_img_medium; ?>, medium], [<?php //echo $bg_img_large; ?>, medium.retina],
                                [<?php //echo $bg_img_large; ?>, large], [<?php //echo $bg_img_xlarge; ?>, large.retina],
                                [<?php //echo $bg_img_xlarge; ?>, xlarge], [<?php //echo $bg_img_xlarge; ?>, xlarge.retina],
                                [<?php //echo $bg_img_xlarge; ?>, xxlarge]">
      </div>
    </div>

    <div id="map-overlay">
      <?php //echo $map_code; ?>
    </div>

  </div>

</section -->

<?php } else {} ?>




<?php
$temp = $wp_query; $wp_query= null;
$wp_query = $wp_query = new WP_Query(); $wp_query->query('post_type=facility' . '&showposts=-1' . '&orderby=menu_order' . '&order=ASC'); //. '&cat=-10'
?>

<?php if($wp_query->have_posts()) : ?>

<?php while($wp_query->have_posts()) : ?>

<?php $wp_query->the_post(); ?>

          <?php
          $thumb_id = get_post_thumbnail_id();
          $thumb_url_array = wp_get_attachment_image_src($thumb_id,'full', true);
          $thumb_url = $thumb_url_array[0];

          $post_id = get_the_ID();
          $post = get_post($post_id);

          //global $post;
          $post_slug=$post->post_name;

          //Get the content, apply filters and execute shortcodes
          //$content = apply_filters( 'the_content', $post->post_content );
          //$embeds = get_media_embedded_in_content( $content );

          // Custom Fields
          $title = types_render_field("title", array("output"=>"raw"));
          $lead = types_render_field("lead", array("output"=>"html"));
          $content = types_render_field("content", array("output"=>"html"));
          $url = types_render_field("url", array("output"=>"raw"));
          ?>




          <section class="reveal large" id="<?php echo $post_slug; ?>" data-reveal data-close-on-click="true" data-v-offset="0" data-deep-link="true" data-update-history="true" data-animation-in="fade-in" data-animation-out="fade-out">
            <div class="grid-container">

              <div class="grid-x grid-padding-x align-center-middle close-button">
                  <div class="cell medium-11 text-right">
                      <button data-close aria-label="Close reveal" type="button">
                          <span class="material-symbols-sharp times">close</span><span class="show-for-medium">ESC</span>
                      </button>
                  </div>
              </div>

              <div class="grid-x grid-padding-x align-center">

                <div class="cell medium-10 xxlarge-9">

                  <div class="grid-x grid-padding-x align-center">

                    <?php if ( $thumb_url != '' ) { ?>

                    <div class="cell small-8 medium-4">
                      <div class="featured-image-container">
                          <div class="featured-image aspect-ratio" style="background-image: url('<?php echo $thumb_url; ?>');"> </div>
                      </div>
                    </div>

                    <div class="cell medium-7 medium-offset-1">

                      <h4 class="section-title"><?php the_title(); ?></h4>

                      <?php if ( $title != '' ) { ?>
                      <h3><?php echo $title; ?></h3>
                      <?php } else {} ?>

                      <?php if ( $lead != '' ) { ?>
                      <div class="lead"><?php echo $lead; ?></div>
                      <?php } else {} ?>

                      <?php if ( $content != '' ) { ?>
                      <?php echo $content; ?>
                      <?php } else {} ?>

                      <a href="<?php the_permalink(); ?>" class="button hollow" target="_blank">Learn More</a>

                    </div>

                    <?php } else { ?>

                    <div class="cell medium-7">

                      <h4 class="section-title"><?php the_title(); ?></h4>

                      <?php if ( $title != '' ) { ?>
                      <h3><?php echo $title; ?></h3>
                      <?php } else {} ?>

                      <?php if ( $lead != '' ) { ?>
                      <div class="lead"><?php echo $lead; ?></div>
                      <?php } else {} ?>

                      <?php if ( $content != '' ) { ?>
                      <?php echo $content; ?>
                      <?php } else {} ?>

                      <a href="<?php the_permalink(); ?>" class="button hollow" target="_blank">Learn More</a>

                    </div>

                    <?php } ?>

                  </div>

                </div>

              </div>

            </div>
          </section>

<?php endwhile; ?>

<!-- reset global post variable. After this point, we are back to the Main Query object -->
<?php wp_reset_postdata(); ?>
<?php wp_reset_query(); ?>

<?php else: ?>
    <!-- Oops, there are no posts. -->
<?php endif; ?>
