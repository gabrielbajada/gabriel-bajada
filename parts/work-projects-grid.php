<?php
$temp = $wp_query; $wp_query= null;
$wp_query = $wp_query = new WP_Query(); $wp_query->query('post_type=project' . '&posts_per_page=3' . '&orderby=date' . '&order=DESC' . '&paged='.$paged); //. '&cat=-10'
?>

<?php if($wp_query->have_posts()) : ?>

<section id="generic-projects-grid" class="grid-container full appear-load-3">

  <div class="generic-grid">
    <div class="grid-x grid-padding-x align-center generic-grid-inner moose-infinite-scroll">

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
        $content = apply_filters( 'the_content', $post->post_content );
        $embeds = get_media_embedded_in_content( $content );

        // Custom Fields
        $lead = types_render_field("lead", array("output"=>"html"));
        ?>

        <!--Item: -->
        <article id="post-<?php the_ID(); ?>" <?php post_class('cell medium-10 xlarge-8 xxlarge-7 item moose-infinite-scroll-item'); ?> role="article">

          <div class="card">

          <div class="grid-x grix-padding-x align-center-middle item-inner">

          <div class="cell medium-6 card-image">
            <a href="<?php the_permalink(); ?>" rel="bookmark">
                <div class="featured-image-container" itemprop="articleBody">

                    <div class="featured-image aspect-ratio" style="background-image: url('<?php echo $thumb_url; ?>');"> </div>

                </div>
            </a>
          </div>

            <div class="cell medium-6 card-section">
              <?php //get_template_part( 'parts/project', 'client' ); ?>
              <h3 class="balance-text">
                <a href="<?php the_permalink(); ?>">
                  <?php the_title(); ?>
                </a>
              </h3>

              <?php if ( $lead != '' ) { ?>
                <p class="lead balance-text"><?php echo wp_trim_words( $lead, 25, '…' ); ?></p>
              <?php } else {} ?>

              <a href="<?php the_permalink(); ?>" class="cta" target="_self">View Project</a>
            </div>

          </div>


          </div>

        </article> <!-- end article -->

<?php endwhile; ?>

      </div>

      <div class="grid-x grid-padding-x page-load-status">
        <div class="cell infinite-scroll-request text-center"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/preloader-transparent.gif"></div>
        <div class="cell infinite-scroll-last text-center"><p class="lead">No more projects to show.</p></div>
        <div class="cell infinite-scroll-error text-center"><p class="lead">Something's not quite right.</p></div>
      </div>

    </div>

  <?php joints_page_navi(); ?>

</section>

<!-- reset global post variable. After this point, we are back to the Main Query object -->
<?php wp_reset_postdata(); ?>
<?php wp_reset_query(); ?>

<?php else: ?>
    Oops, there are no posts.
<?php endif; ?>
