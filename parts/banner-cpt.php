<section id="banner-cpt" class="grid-container full">

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
            $video_webm = types_render_field("banner-video-webm", array( "output" => "raw" ));
            $video_mp4 = types_render_field("banner-video-mp4", array( "output" => "raw" ));

          	$url = types_render_field("url", array("output"=>"raw"));
          	$alternate_image = types_render_field("alternate-image", array("output"=>"raw"));

            $cta_button_title = types_render_field("cta-button-title", array( "output" => "raw" ));
            $cta_button_url = types_render_field("cta-button-url", array( "output" => "raw" ));

            ?>

            <?php if ( ($video_webm != '') && ($video_mp4 != '') ) { ?>

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

            <?php } else { ?>

                <div class="animated_bg"><?php echo $attachment_id; ?></div>

            <?php } ?>

        </div>

        <?php if ( ( ($bg_img_small != '') && ($bg_img_medium != '') && ($bg_img_large != '') && ($bg_img_xlarge != '') ) || (($video_webm != '') || ($video_mp4 != '') ) ) { ?>

        <div class="banner-overlay with-image">

        <?php } else { ?>

        <div class="banner-overlay">

        <?php } ?>

            <div class="banner-overlay-inner grid-x grid-padding-x align-center align-bottom appear-load-3">
                <div class="cell medium-8 xlarge-6 xxlarge-5">

                    <div class="callout">

                      <?php if ( $alternate_image != '' ) { ?>

                        <div class="grid-x grid-padding-x align-center-middle">

                            <div class="cell small-8 medium-4">

                      				<?php if ( $url != '' ) { ?>
                      				<a href="<?php echo $url; ?>" target="_blank">
                      				<?php } else {} ?>

                      					<div class="featured-image-container">
                      						<div class="featured-image aspect-ratio" style="background-image: url('<?php echo $alternate_image; ?>');"> </div>
                      					</div>

                      				<?php if ( $url != '' ) { ?>
                      				</a>
                      				<?php } else {} ?>

                            </div>

                            <div class="cell small-11 medium-7 medium-offset-1 text-center medium-text-left">

                               <h1>

                                  <?php if ( $banner_title != '' ) { ?>

                                    <?php if ( $image_url != '' ) { ?>
                                      <span class="title"><?php the_title(); ?></span>
                                    <?php } else { ?>
                                      <span class="title light"><?php the_title(); ?></span>
                                    <?php } ?>

                                    <?php echo $banner_title; ?>

                                  <?php } else { ?>

                                    <?php the_title(); ?>

                                  <?php } ?>

                                  <?php if ( $banner_lead_paragraph != '' ) { ?>

                                    <span class="lead">
                                      <?php echo $banner_lead_paragraph; ?>
                                      <?php //echo wp_trim_words( $banner_lead_paragraph, 35, '…' ); ?>
                                    </span>

                                  <?php } else {} ?>

                                </h1>

                            </div>

                          </div>

                        <?php } else { ?>

                          <div class="grid-x grid-padding-x align-center text-center">

                            <div class="cell small-11 medium-12">

                               <h1>

                                   <?php if ( $banner_title != '' ) { ?>

                                    <?php if ( $image_url != '' ) { ?>
                                      <span class="title"><?php the_title(); ?></span>
                                    <?php } else { ?>
                                      <span class="title light"><?php the_title(); ?></span>
                                    <?php } ?>

                                    <?php echo $banner_title; ?>

                                   <?php } else { ?>

                                       <?php the_title(); ?>

                                   <?php } ?>

                                    <?php if ( $banner_lead_paragraph != '' ) { ?>

                                        <span class="lead">
                                            <?php echo $banner_lead_paragraph; ?>
                                            <?php //echo wp_trim_words( $banner_lead_paragraph, 35, '…' ); ?>
                                        </span>

                                    <?php } else {} ?>

                                </h1>

                            </div>

                         </div>

                      <?php } ?>

                    </div>

                </div>
            </div>

        </div>

    </article>

</section>
