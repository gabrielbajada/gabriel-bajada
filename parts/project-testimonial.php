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
        $client_standfirst = types_render_field("client-standfirst", array("output"=>"html", "post_id"=>$client_id));
    ?>


    <section class="full reveal" id="<?php echo $post_slug; ?>" data-reveal data-close-on-click="true" data-v-offset="0" data-deep-link="true" data-update-history="true" data-animation-in="fade-in" data-animation-out="fade-out">

        <div class="grid-container">

            <div class="grid-x grid-padding-x align-center-middle close-button">
                <div class="cell medium-12 text-right">
                    <button data-close aria-label="Close reveal" type="button">
                        <span aria-hidden="true" class="times">&times;</span><span class="show-for-medium">ESC</span>
                    </button>
                </div>
            </div>

            <div class="grid-x grid-padding-x">

                <div class="cell large-10 large-offset-1 xlarge-8 xlarge-offset-2">

                    <div class="grid-x grid-margin-x">

                        <?php if ( has_post_thumbnail() ) { ?>

                        <header class="cell small-8 small-offset-2 show-for-small-only">

                            <a href="<?php echo $url; ?>" target="_blank" class="">

                                <div class="featured-image-container">

                                    <div class="featured-image aspect-ratio" style="background-image: url('<?php echo $thumb_url; ?>');"> </div>

                                </div>

                            </a>

                        </header>

                        <?php } else {} ?>

                        <div class="cell small-8 small-offset-2 medium-4 medium-offset-0">

                            <?php if ( has_post_thumbnail() ) { ?>

                            <a href="<?php echo $url; ?>" title="<?php echo $client_title; ?>'s Website" target="_blank" class="show-for-medium">

                                <div class="featured-image-container">

                                    <div class="featured-image aspect-ratio" style="background-image: url('<?php echo $thumb_url; ?>');"> </div>

                                </div>

                            </a>

                            <?php } else {} ?>

                        </div>

                        <div class="cell medium-7 medium-offset-1">

                            <h3 class="reveal-title"><?php echo $client_title; ?></h3>

                            <div class="lead"><?php echo $client_standfirst; ?></div>

                            <?php echo $content; ?>

                            <?php //get_template_part( 'parts/project', 'client-testimonial' ); ?>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>




<?php
    $client_testimonials_id = $client_id;
    $client_testimonials_query = new WP_Query(
        array(
            'post_type' => 'testimonial',
            'numberposts' => 1,
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
<section id="testimonials" class="grid-container full inner-spaced appear-load-3">

    <div class="generic-grid">

        <div class="grid-x grid-padding-x align-center">

            <div class="cell small-11 large-10 xxlarge-7 testimonials text-left">

              <!-- h4>Here's what <?php //echo $client_title; ?> had to say about us:</h4-->

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

              <article id="post-<?php echo $testimonial_id; ?>" <?php post_class('grid-x grid-padding-x item'); ?> role="article" >

                  <div class="cell medium-10">

                      <div class="lead"><?php echo $testimonial_content; ?></div>

                      <h3>
                          <a href="<?php echo $testimonial_linkedin_url; ?>" title="<?php echo $testimonial_title; ?>'s Linkedin Profile" target="_blank">
                              <?php echo $testimonial_title; ?>
                          </a>
                      </h3>

                      <h5 class="designation"><?php echo $testimonial_designation; ?>,&nbsp;<?php get_template_part( 'parts/project', 'client-link' ); ?></h5>

                  </div>

              </article> <!-- end article -->

              <?php } ?>

            </div>
        </div>
    </div>
</section>

<?php } else {} ?>

<?php wp_reset_postdata(); ?>




    <?php } ?>

<?php } else {} ?>

<?php wp_reset_postdata(); ?>
