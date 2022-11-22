<?php
$temp = $wp_query; $wp_query= null;
$wp_query = $wp_query = new WP_Query(); $wp_query->query('post_type=academy' . '&posts_per_page=12' . '&orderby=menu_order' . '&order=DESC' . '&paged='.$paged); //. '&cat=-10'
?>

<?php if($wp_query->have_posts()) : ?>

  <div id="about-education" class="grid-x grid-padding-x">

  <div class="cell">
    <h3 class="section-title">Education</h3>
  </div>

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
    $lead = types_render_field("project-lead-paragraph", array("output"=>"html"));
    $start_date = types_render_field( "start-date", array("style" => "text", "format" => "Y"));
    $end_date = types_render_field("end-date", array("style" => "text", "format" => "Y"));
    $certification = types_render_field("certification", array("output"=>"raw"));
    $field_of_study = types_render_field("field-of-study", array("output"=>"raw"));
    ?>

    <!--Item: -->
    <article id="post-<?php the_ID(); ?>" <?php post_class('cell'); ?> role="article">

      <h4 class="balance-text">
        <?php echo $certification; ?>, <?php echo $field_of_study; ?>
      </h4>

      <h5>
        <strong><?php the_title(); ?></strong>&emsp;<?php echo $start_date; ?>&ndash;<?php if( ($end_date !== '') ) { echo $end_date; } else { echo "Present"; } ?>
      </h5>

    </article> <!-- end article -->

  <?php endwhile; ?>

  <?php joints_page_navi(); ?>

</div>

<!-- reset global post variable. After this point, we are back to the Main Query object -->
<?php wp_reset_postdata(); ?>
<?php wp_reset_query(); ?>

<?php else: ?>
    Oops, there are no posts.
<?php endif; ?>
