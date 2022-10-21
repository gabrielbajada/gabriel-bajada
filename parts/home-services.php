<?php
$temp = $wp_query; $wp_query= null;
$wp_query = $wp_query = new WP_Query(); $wp_query->query('post_type=service' . '&showposts=-1' . '&orderby=menu_order' . '&order=ASC'); //. '&cat=-10'
?>

<?php if($wp_query->have_posts()) : ?>

<section id="home-services" class="grid-container full appear-load-3">

  <div class="grid-x align-center">
    <div class="cell">

      <?php
        // Custom Fields
        $services_title = types_render_field("services-title", array("output"=>"raw"));
        $services_lead = types_render_field("services-lead", array("output"=>"raw"));

        $counter = 0;
      ?>

      <ul class="accordion" data-responsive-accordion-tabs="accordion medium-tabs" data-allow-all-closed="true">

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
          $banner_title = types_render_field("banner-title", array("output"=>"raw"));
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
                      <a href="<?php the_permalink(); ?>" target="_blank">
                        <div class="featured-image-container">
                          <div class="featured-image aspect-ratio" style="background-image: url('<?php echo $thumb_url; ?>');"> </div>
                        </div>
                      </a>
                    </div>

                    <div class="cell medium-7 medium-offset-1">

                      <h4 class="section-title"><?php the_title(); ?></h4>

                      <?php if ( $banner_title != '' ) { ?>
                      <h3>
                        <a href="<?php the_permalink(); ?>" target="_blank">
                          <?php echo $banner_title; ?>
                        </a>
                      </h3>
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

                      <?php if ( $banner_title != '' ) { ?>
                      <h3><?php echo $banner_title; ?></h3>
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




          <!--Item: -->

          <?php if ( $counter == '0' ) { ?>
          <li class="accordion-item is-active" data-accordion-item>
          <?php } else { ?>
          <li class="accordion-item" data-accordion-item>
          <?php } ?>

            <a href="#" class="accordion-title"><?php the_title(); ?></a>

            <div class="accordion-content animate__animated animate__fadeIn" data-tab-content>

              <article id="post-<?php the_ID(); ?>" <?php post_class('grid-x grid-padding-x align-center'); ?> role="article">

                <div class="cell medium-10 xxlarge-9">

                  <div class="grid-x grid-padding-x align-center">

                    <?php if ( $thumb_url != '' ) { ?>

                    <div class="cell small-8 medium-4">
                      <a href="<?php the_permalink(); ?>" target="_blank">
                        <div class="featured-image-container">
                          <div class="featured-image aspect-ratio" style="background-image: url('<?php echo $thumb_url; ?>');"> </div>
                        </div>
                      </a>
                    </div>

                    <div class="cell medium-7 medium-offset-1">

                      <?php if ( $banner_title != '' ) { ?>
                      <h3>
                        <a href="<?php the_permalink(); ?>" target="_blank">
                          <?php echo $banner_title; ?>
                        </a>
                      </h3>
                      <?php } else {} ?>

                      <?php if ( $lead != '' ) { ?>
                      <div class="lead"><?php echo $lead; ?></div>
                      <?php } else {} ?>

                      <?php if ( $content != '' ) { ?>
                      <?php echo $content; ?>
                      <?php } else {} ?>

              				<a href="<?php the_permalink(); ?>" class="cta">Learn More</a>

                    </div>

                    <?php } else { ?>

                    <div class="cell medium-7">

                      <?php if ( $banner_title != '' ) { ?>
                      <h3><?php echo $banner_title; ?></h3>
                      <?php } else {} ?>

                      <?php if ( $lead != '' ) { ?>
                      <div class="lead"><?php echo $lead; ?></div>
                      <?php } else {} ?>

                      <?php if ( $content != '' ) { ?>
                      <?php echo $content; ?>
                      <?php } else {} ?>

              				<a href="<?php the_permalink(); ?>" class="cta">Learn More</a>

                    </div>

                    <?php } ?>

                  </div>

                </div>

              </article>

            </div>

          </li><!-- end article -->

          <?php $counter++; ?>

<?php endwhile; ?>

<?php //echo $counter; ?>

        </ul>

      </div>
  </div>

</section>

<!-- reset global post variable. After this point, we are back to the Main Query object -->
<?php wp_reset_postdata(); ?>
<?php wp_reset_query(); ?>

<?php else: ?>
    <!-- Oops, there are no posts. -->
<?php endif; ?>
