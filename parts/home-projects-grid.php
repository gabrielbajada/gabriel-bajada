<?php
// $paged holds the current page offset
//$paged = ( get_query_var('paged') ) ? get_query_var( 'paged' ) : 1;
//$paged = ( get_query_var('page') ) ? get_query_var('page') : 1;

/*if ( get_query_var('paged') ) {
    $paged = get_query_var('paged');
} elseif ( get_query_var('page') ) {
    $paged = get_query_var('page');
} else {
    $paged = 1;
}*/

/**
 * - Checks if the current page is 'paged' (false on first page)
 * - Remove the check if you need those sticky posts on all pages
 * - I added the $paged parameter so those sticky posts will paginate
 *   if you decide to show them on all pages
 *
 */
//if( ! is_paged() ) { // Sticky posts only on first page

$args = array(
    'post_type' => 'project',
    'posts_per_page' => 3,
    'orderby' => 'date',
    'order' => 'DESC',
    //'paged' => $paged, // ah, the page offset
);
$args['paged'] = get_query_var( 'page' ) ? get_query_var( 'page' ) : 1;

$temp = $wp_query; $wp_query= null;
$wp_query = $wp_query = new WP_Query( $args );
?>

<?php if($wp_query->have_posts()) : ?>

<section id="generic-projects-grid" class="grid-container full appear-load-3">

  <div class="generic-grid">
    <div class="grid-x grid-padding-x align-center generic-grid-inner moose-infinite-scroll-homepage">

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
        <article id="post-<?php the_ID(); ?>" <?php post_class('cell medium-10 xlarge-8 xxlarge-7 item moose-infinite-scroll-homepage-item'); ?> role="article">

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
              <h3>
                <span class="balance-text">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </span>
              </h3>

              <?php if ( $lead != '' ) { ?>
                <p class="lead">
                  <span class="balance-text">
                    <?php echo wp_trim_words( $lead, 25, '…' ); ?>
                  </span>
                </p>
              <?php } else {} ?>

              <a href="<?php the_permalink(); ?>" class="cta" target="_self">View Project</a>
            </div>

          </div>


          </div>

        </article> <!-- end article -->

<?php endwhile; ?>

      </div>

      <div class="grid-x grid-padding-x page-load-status">
        <div class="cell infinite-scroll-request text-center"></div>
        <div class="cell infinite-scroll-last text-center"></div>
        <div class="cell infinite-scroll-error text-center"><p class="lead"><span class="material-symbols-sharp">error</span>&ensp;Something's not quite right.</p></div>
      </div>

    </div>

  <?php joints_page_navi(); ?>

</section>

<!-- reset global post variable. After this point, we are back to the Main Query object -->
<?php wp_reset_postdata(); ?>
<?php //wp_reset_query(); ?>

<?php else: ?>
    Oops, there are no posts.
<?php endif; ?>

<?php //} ?>
