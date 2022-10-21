<?php
$temp = $wp_query; $wp_query= null;
$wp_query = $wp_query = new WP_Query(); $wp_query->query('post_type=retail-outlet' . '&showposts=12' . '&orderby=title' . '&order=ASC'); //. '&cat=-10'
?>

<?php if($wp_query->have_posts()) : ?>

<section id="home-retail-outlets" class="grid-container full appear-load-3">

  <div class="grid-x grid-padding-x align-center">
    <div class="cell medium-10 xxlarge-9">

      <?php
        // Custom Fields
        $outlets_title = types_render_field("outlets-title", array("output"=>"raw"));
        $outlets_lead = types_render_field("outlets-lead", array("output"=>"raw"));
      ?>

      <?php if ( ($outlets_title != '') || ($outlets_lead != '') ) { ?>

      <div id="home-retail-outlets-header" class="grid-x grid-padding-x">

        <div class="cell medium-8">
          <?php if ( $outlets_title != '' ) { ?>
          <h4 class="section-title"><?php echo $outlets_title; ?></h4>
          <?php } else {} ?>

          <?php if ( $outlets_lead != '' ) { ?>
          <p class="lead"><?php echo $outlets_lead; ?></p>
          <?php } else {} ?>
        </div>

      </div>

      <?php } else {} ?>

      <div id="home-retail-outlets-grid" class="generic-grid">
          <div class="grid-x grid-padding-x small-up-2 medium-up-4 xlarge-up-5 generic-grid-inner">

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
              $lead = types_render_field("lead", array("output"=>"html"));
              $content = types_render_field("content", array("output"=>"html"));
              ?>

              <!--Item: -->
              <article id="post-<?php the_ID(); ?>" <?php post_class('cell item'); ?> role="article">

                  <ul class="cs-style-1">

                      <li class="item-inner text-center">

                        <a href="<?php the_permalink(); ?>" target="_self" title="<?php the_title(); ?>">
                          <div class="featured-image-container">
                              <div class="featured-image aspect-ratio" style="background-image: url('<?php echo $thumb_url; ?>');"> </div>
                          </div>
                        </a>

                      </li>

                  </ul>

              </article> <!-- end article -->

<?php endwhile; ?>

            </div>
        </div>

      </div>
  </div>

  <?php //joints_page_navi(); ?>

</section>

<!-- reset global post variable. After this point, we are back to the Main Query object -->
<?php wp_reset_postdata(); ?>
<?php wp_reset_query(); ?>

<?php else: ?>
    <!-- Oops, there are no posts. -->
<?php endif; ?>
