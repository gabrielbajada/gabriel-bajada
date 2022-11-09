<?php

    $project_agency_id = get_the_ID();

    $project_agency_query = new WP_Query(
        array(
            'post_type' => 'agency',
            'numberposts' => 1,
            //new toolset_relationships query argument
            'toolset_relationships' => array(
                'role' => 'child',
                'related_to' => $project_agency_id,
                'relationship' =>'project-agency'
            ),
            //'meta_key' => 'wpcf-service-order',
            //'orderby' => 'meta_value',
            //'order' => 'ASC',
        )
    );

    if ( $project_agency_query->have_posts() ) {

    $related_agencies = $project_agency_query->posts;
?>

    <?php foreach ($related_agencies as $agency) {

        $agency_id = $agency->ID;
        $agency_post = get_post($agency_id);
        $post_slug = $agency_post->post_name;
        $permalink = get_the_permalink( $agency_id );
        $agency_title = get_the_title( $agency_id );
        //$excerpt = $learning_partner_post->post_excerpt;
        $excerpt = apply_filters('the_content', $agency_post->post_excerpt);
        $content = apply_filters('the_content', $agency_post->post_content);

        $thumb_id = get_post_thumbnail_id($agency_id);
        $thumb_url_array = wp_get_attachment_image_src($thumb_id,'full', true);
        $thumb_url = $thumb_url_array[0];

        $url = types_render_field("url", array("output"=>"raw", "post_id"=>$agency_id));
        $agency_standfirst = types_render_field("agency-standfirst", array("output"=>"html", "post_id"=>$agency_id));
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

                            <a href="<?php echo $url; ?>" title="<?php echo $agency_title; ?>'s Website" target="_blank" class="show-for-medium">

                                <div class="featured-image-container">

                                    <div class="featured-image aspect-ratio" style="background-image: url('<?php echo $thumb_url; ?>');"> </div>

                                </div>

                            </a>

                            <?php } else {} ?>

                        </div>

                        <div class="cell medium-7 medium-offset-1">

                            <h3 class="reveal-title"><?php echo $agency_title; ?></h3>

                            <div class="standfirst"><?php echo $agency_standfirst; ?></div>

                            <?php echo $content; ?>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <a data-toggle="<?php echo $post_slug; ?>"><?php echo $agency_title; ?></a>

  <?php } ?>

<?php } else {} ?>

<?php wp_reset_postdata(); ?>
