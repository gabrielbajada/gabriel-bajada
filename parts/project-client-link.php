<?php

    $project_client_id = get_the_ID();

    $project_client_query = new WP_Query(
        array(
            'post_type' => 'client',
            'numberposts' => 1,
            //new toolset_relationships query argument
            'toolset_relationships' => array(
                'role' => 'child',
                'related_to' => $project_client_id,
                'relationship' =>'project-client'
            ),
            //'meta_key' => 'wpcf-service-order',
            //'orderby' => 'meta_value',
            //'order' => 'ASC',
        )
    );

    if ( $project_client_query->have_posts() ) {

    $related_clients = $project_client_query->posts;
?>

    <?php foreach ($related_clients as $client) {

        $client_id = $client->ID;
        $client_post = get_post($client_id);
        $post_slug = $client_post->post_name;
        $permalink = get_the_permalink( $client_id );
        $client_title = get_the_title( $client_id );
        //$excerpt = $learning_partner_post->post_excerpt;
        $excerpt = apply_filters('the_content', $client_post->post_excerpt);
        $content = apply_filters('the_content', $client_post->post_content);

        $thumb_id = get_post_thumbnail_id($client_id);
        $thumb_url_array = wp_get_attachment_image_src($thumb_id,'full', true);
        $thumb_url = $thumb_url_array[0];

        $url = types_render_field("url", array("output"=>"raw", "post_id"=>$client_id));
        $client_lead = types_render_field("client-lead-paragraph", array("output"=>"html", "post_id"=>$client_id));
        $client_content = types_render_field("client-content", array("output"=>"html", "post_id"=>$client_id));
    ?>


    <section class="full reveal" id="<?php echo $post_slug; ?>" data-reveal data-close-on-click="true" data-v-offset="0" data-deep-link="true" data-update-history="true" data-animation-in="fade-in" data-animation-out="fade-out">

      <div class="grid-container">

        <div class="grid-x grid-padding-x align-center-middle">
          <div class="cell text-right close-button">
            <button data-close aria-label="Close reveal" type="button">
              <i class="material-symbols-sharp times">close</i><span class="show-for-large">ESC</span>
            </button>
          </div>
        </div>

        <div class="grid-x grid-padding-x align-center">
          <div class="cell small-11 large-10 xxlarge-7">

            <div class="grid-x grid-padding-x align-left text-left">

              <div class="cell medium-7 small-order-2 medium-order-1">
                <h3 class="reveal-title"><?php echo $client_title; ?></h3>
                <div class="lead"><?php echo $client_lead; ?></div>
                <?php echo $client_content; ?>
              </div>

              <div class="cell medium-4 medium-offset-1 small-order-1 medium-order-2">
                <?php if ( has_post_thumbnail() ) { ?>
                <a href="<?php echo $url; ?>" title="<?php echo $client_title; ?>'s Website" target="_blank">
                  <div class="featured-image-container client-logo">
                    <div class="featured-image aspect-ratio" style="background-image: url('<?php echo $thumb_url; ?>');"> </div>
                  </div>
                </a>
                <?php } else {} ?>
              </div>

            </div>

          </div>
        </div>




<?php
    $client_projects_id = $client_id;
    $client_projects_query = new WP_Query(
        array(
            'post_type' => 'project',
            //'numberposts' => 1,
            'showposts' => 1,
            //new toolset_relationships query argument
            'toolset_relationships' => array(
                'role' => 'parent',
                'related_to' => $client_projects_id,
                'relationship' =>'project-client'
            ),
            //'meta_key' => 'wpcf-service-order',
            //'orderby' => 'meta_value',
            //'order' => 'ASC',
        )
    );

    if ( $client_projects_query->have_posts() ) {

    $related_projects = $client_projects_query->posts;
?>
<section id="generic-projects-grid" class="grid-x grid-padding-x align-center inner-spaced-top">
  <div class="cell small-11 large-10 xxlarge-7">

    <div class="grid-x grid-padding-x align-left text-left">

      <div class="cell">
        <h5>My latest project for <?php echo $client_title; ?></h5>
      </div>

      <?php foreach ($related_projects as $project) {

      $project_id = $project->ID;
      //error_log("testimonial_id is " . $testimonial_id);
      $project_post = get_post( $project_id );
      $project_permalink = get_the_permalink( $project_id );
      $project_title = get_the_title( $project_id );
      //$excerpt = $testimonial_post->post_excerpt;
      $project_excerpt = apply_filters('the_content', $project_post->post_excerpt);
      $project_content = apply_filters('the_content', $project_post->post_content);

      $thumb_id = get_post_thumbnail_id($project_id);
      $thumb_url_array = wp_get_attachment_image_src($thumb_id,'full', true);
      $thumb_url = $thumb_url_array[0];

      $lead = types_render_field("project-lead-paragraph", array("output"=>"html", "post_id"=>$testimonial_id));

      ?>

      <!--Item: -->
      <article id="post-<?php echo $project_id; ?>" <?php post_class('cell'); ?> role="article">

        <div class="card">

          <div class="grid-x grix-padding-x align-center-middle item-inner">

            <div class="cell medium-5 card-image">
              <a href="<?php the_permalink(); ?>" rel="bookmark">
                  <div class="featured-image-container" itemprop="articleBody">

                      <div class="featured-image aspect-ratio" style="background-image: url('<?php echo $thumb_url; ?>');"> </div>

                  </div>
              </a>
            </div>

            <div class="cell medium-7 card-section">
              <h3>
                <span class="balance-text">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </span>
              </h3>

              <?php if ( $lead != '' ) { ?>
                <p class="lead">
                  <span class="balance-text">
                    <?php echo wp_trim_words( $lead, 15, '…' ); ?>
                  </span>
                </p>
              <?php } else {} ?>

              <a href="<?php the_permalink(); ?>" class="cta" target="_self">View Project</a>
            </div>

          </div>

        </div>

      </article> <!-- end article -->

      <?php } ?>

    </div>
  </div>
</section>

<?php } else {} ?>

<?php wp_reset_postdata(); ?>




<?php
    $client_testimonials_id = $client_id;
    $client_testimonials_query = new WP_Query(
        array(
            'post_type' => 'testimonial',
            //'numberposts' => 1,
            'showposts' => 1,
            //new toolset_relationships query argument
            'toolset_relationships' => array(
                'role' => 'child',
                'related_to' => $client_testimonials_id,
                'relationship' =>'client-testimonial'
            ),
            //'meta_key' => 'wpcf-service-order',
            //'orderby' => 'meta_value',
            //'order' => 'ASC',
        )
    );

    if ( $client_testimonials_query->have_posts() ) {

    $related_testimonials = $client_testimonials_query->posts;
?>
<section id="client-testimonials" class="grid-x grid-padding-x align-center inner-spaced-top">
  <div class="cell small-11 large-10 xxlarge-7">

    <div class="grid-x grid-padding-x align-left text-left">

      <div class="cell">
        <h5>This is what <?php echo $client_title; ?> had to say</h5>
      </div>

      <?php foreach ($related_testimonials as $testimonial) {

      $testimonial_id = $testimonial->ID;
      //error_log("testimonial_id is " . $testimonial_id);
      $testimonial_post = get_post( $testimonial_id );
      $testimonial_permalink = get_the_permalink( $testimonial_id );
      $testimonial_title = get_the_title( $testimonial_id );
      //$excerpt = $testimonial_post->post_excerpt;
      $testimonial_excerpt = apply_filters('the_content', $testimonial_post->post_excerpt);
      $testimonial_content = apply_filters('the_content', $testimonial_post->post_content);

      $thumb_id = get_post_thumbnail_id($testimonial_id);
      $thumb_url_array = wp_get_attachment_image_src($thumb_id,'full', true);
      $thumb_url = $thumb_url_array[0];

      $testimonial_designation = types_render_field("designation", array("output"=>"raw", "post_id"=>$testimonial_id));
      $testimonial_linkedin_url = types_render_field("linkedin-url", array("output"=>"raw", "post_id"=>$testimonial_id));

      ?>

      <!--Item: -->
      <article id="post-<?php echo $testimonial_id; ?>" <?php post_class('cell medium-9 testimonial'); ?> role="article">
        <div class="lead"><?php echo $testimonial_content; ?></div>
        <h3>
            <a href="<?php echo $testimonial_linkedin_url; ?>" title="<?php echo $testimonial_title; ?>'s Linkedin Profile" target="_blank">
                <?php echo $testimonial_title; ?>
            </a>
        </h3>

        <h5><?php echo $testimonial_designation; ?>, <?php echo $client_title; ?></h5>
      </article> <!-- end article -->

      <?php } ?>

    </div>
  </div>
</section>

<?php } else {} ?>

<?php wp_reset_postdata(); ?>

    </div>
  </section>

  <a data-toggle="<?php echo $post_slug; ?>"><?php echo $client_title; ?></a>

  <?php } ?>

<?php } else {} ?>

<?php wp_reset_postdata(); ?>
