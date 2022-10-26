<section id="banner-home" class="grid-container full">

    <article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">

        <div class="banner-background appear-load-1">

            <?php

            ///// RESPONSIVE BACKGROUND IMAGE DATA INTERCHANGE

            // set the image url
            $image_url = types_render_field("banner-image", array("output"=>"raw"));
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


            ///// CUSTOM FIELDS

            $banner_title = types_render_field("banner-title", array( "output" => "raw" ));
            $banner_lead_paragraph = types_render_field("banner-lead-paragraph", array( "output" => "raw" ));
            $video_youtube = types_render_field("banner-video-youtube", array( "output" => "raw" ));
            $video_webm = types_render_field("banner-video-webm", array( "output" => "raw" ));
            $video_mp4 = types_render_field("banner-video-mp4", array( "output" => "raw" ));

            $banner_button_title = types_render_field("banner-button-title", array( "output" => "raw" ));
            $banner_button_url = types_render_field("banner-button-url", array( "output" => "raw" ));
            $banner_button_target = types_render_field("banner-button-target", array( "output" => "raw" ));

            $banner_secondary_button_title = types_render_field("banner-secondary-button-title", array( "output" => "raw" ));
            $banner_secondary_button_url = types_render_field("banner-secondary-button-url", array( "output" => "raw" ));
            $banner_secondary_button_target = types_render_field("banner-secondary-button-target", array( "output" => "raw" ));

            $modal_switch = types_render_field("modal-switch", array( "output" => "raw" ));
            $modal_content = types_render_field("modal-content", array( "output" => "html" ));

            ?>

            <?php if ($video_youtube != '') { ?>

            <div class="banner-background-video-youtube appear-load-4 show-for-large">
              <div class="banner-background-video-youtube-container">
                <iframe src="https://www.youtube.com/embed/<?php echo $video_youtube; ?>?autoplay=1&loop=1&playlist=<?php echo $video_youtube; ?>&mute=1&controls=0" width="560" height="315" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </div>

            <div data-interchange="[<?php echo $bg_img_small; ?>, small], [<?php echo $bg_img_medium; ?>, small.retina],
                                    [<?php echo $bg_img_medium; ?>, medium], [<?php echo $bg_img_large; ?>, medium.retina],
                                    [<?php echo $bg_img_large; ?>, large], [<?php echo $bg_img_xlarge; ?>, large.retina],
                                    [<?php echo $bg_img_xlarge; ?>, xlarge], [<?php echo $bg_img_xlarge; ?>, xlarge.retina],
                                    [<?php echo $bg_img_xlarge; ?>, xxlarge]"
                  class="banner-background-img hide-for-large">
            </div>
            <noscript><img id="home-bgimg-script" src="<?php echo $bg_img_medium; ?>"></noscript>

          <?php } elseif ( ($video_webm != '') || ($video_mp4 != '') ) { ?>

                <video id="banner-background-video" preload autoplay loop muted poster="<?php echo $bg_img_large; ?>">
                  <source src="<?php echo $video_webm; ?>" type="video/webm">
                  <source src="<?php echo $video_mp4; ?>" type="video/mp4">
                </video>

            <?php } elseif ( ($bg_img_small != '') && ($bg_img_medium != '') && ($bg_img_large != '') && ($bg_img_xlarge != '') ) { ?>

                <div data-interchange="[<?php echo $bg_img_small; ?>, small], [<?php echo $bg_img_medium; ?>, small.retina],
                                        [<?php echo $bg_img_medium; ?>, medium], [<?php echo $bg_img_large; ?>, medium.retina],
                                        [<?php echo $bg_img_large; ?>, large], [<?php echo $bg_img_xlarge; ?>, large.retina],
                                        [<?php echo $bg_img_xlarge; ?>, xlarge], [<?php echo $bg_img_xlarge; ?>, xlarge.retina],
                                        [<?php echo $bg_img_xlarge; ?>, xxlarge]"
                      class="banner-background-img">
                </div>
                <noscript><img id="home-bgimg-script" src="<?php echo $bg_img_medium; ?>"></noscript>

            <?php } else {} ?>

        </div>

        <?php if ( ( ($bg_img_small != '') && ($bg_img_medium != '') && ($bg_img_large != '') && ($bg_img_xlarge != '') ) || (($video_webm != '') || ($video_mp4 != '') ) ) { ?>

        <div class="banner-overlay with-image">

        <?php } else { ?>

        <div class="banner-overlay">

        <?php } ?>

            <div class="banner-overlay-inner grid-x grid-padding-x align-center align-bottom appear-load-3">
                <div class="cell small-11 large-10 xlarge-8">

                    <div class="callout">

                        <div class="grid-x grid-padding-x align-left text-left">

                            <div class="cell">

                              <h1>

                              <?php if ( $banner_title != '' ) { ?>

                                <?php echo $banner_title; ?></h1>

                              <?php } else {} ?>

                              <?php if ( $banner_lead_paragraph != '' ) { ?>

                                <span class="balance-text">
                                  <?php echo $banner_lead_paragraph; ?>
                                  <?php //echo wp_trim_words( $banner_lead_paragraph, 35, '…' ); ?>
                                </span>

                              <?php } else {} ?>

                              </h1>

                            </div>

                            <?php if ( ($banner_button_title != '') && ($banner_secondary_button_title != '') ) { ?>

                                    <?php if ( $modal_switch === '1' ) { ?>

                                        <div class="cell small-10 medium-4">
                                            <a data-open="banner-modal" class="button hollow expanded"><?php echo $banner_button_title; ?></a>
                                        </div>

                                    <?php } else { ?>

                                        <div class="cell small-10 medium-4">
                                          <a href="<?php echo $banner_button_url; ?>" class="button hollow expanded" target="<?php echo $banner_button_target; ?>"><?php echo $banner_button_title; ?></a>
                                        </div>

                                    <?php } ?>

                                <div class="cell small-10 medium-4">
                                  <a href="<?php echo $banner_secondary_button_url; ?>" class="button expanded" target="<?php echo $banner_secondary_button_target; ?>"><?php echo $banner_secondary_button_title; ?></a>
                                </div>

                            <?php } elseif ( ($banner_button_url != '') && ($banner_button_title != '') && ($banner_secondary_button_url == '') && ($banner_secondary_button_title == '') ) { ?>

                                <div class="cell small-10 medium-4">
                                  <a href="<?php echo $banner_button_url; ?>" class="button expanded" target="<?php echo $banner_button_target; ?>"><?php echo $banner_button_title; ?></a>
                                </div>

                            <?php } elseif ( ($banner_button_url == '') && ($banner_button_title == '') && ($banner_secondary_button_url != '') && ($banner_secondary_button_title != '') ) { ?>

                                <div class="cell small-10 medium-4">
                                  <a href="<?php echo $banner_secondary_button_url; ?>" class="button expanded" target="<?php echo $banner_secondary_button_target; ?>"><?php echo $banner_secondary_button_title; ?></a>
                                </div>

                            <?php } else {} ?>

                     </div>

                    </div>

                </div>
            </div>

            <!-- div class="banner-overlay-inner-bottom grid-x align-center-middle appear-load-3">
              <div class="cell text-center">
                <a id="scroll-down-container" title="Scroll down"><i class="material-symbols-sharp">expand_more</i></a>
              </div>
            </div -->

        </div>

    </article>

</section>

<div id="banner-modal" class="reveal full appear-load-1" data-reveal>

    <div class="grid-x grid-padding-x align-center-middle close-button">
        <div class="cell medium-12 text-right">
            <button data-close aria-label="Close reveal" type="button">
                <span aria-hidden="true" class="times">&times;</span><span class="show-for-medium">ESC</span>
            </button>
        </div>
    </div>

    <div class="grid-x grid-padding-x align-center-middle searchform-container">

        <div class="cell large-10 xlarge-8 searchform-container-inner">

            <?php echo $modal_content; ?>

        </div>

    </div>
</div>
