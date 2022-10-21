<?php
    //Get the content, apply filters and execute shortcodes
    $content = apply_filters( 'the_content', $post->post_content );
    $embeds = get_media_embedded_in_content( $content );

    $subtitle = types_render_field("subtitle", array("output"=>"raw"));
    $expiry_date = types_render_field("expiry-date", array("output"=>"raw"));
    $disclaimer = types_render_field("disclaimer", array("output"=>"raw"));
    $downloadable_document = types_render_field("downloadable-document", array("output"=>"raw"));
    $custom_url = types_render_field("custom-url", array("output"=>"raw"));

    //$embeds is an array and each item is the HTML of an embedded media.
    //The first item of the array is the first embedded media in the content
    $first_embedded = $embeds[0];
    $counter_video = 1;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('grid-x grid-padding-x'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
        
    <?php if ( has_post_format( 'video' )) { ?>

    <div class="cell medium-12 video-hero">

        <?php
            $post = get_post($post_id);
            $content = do_shortcode( apply_filters( 'the_content', $post->post_content ) );
            $embeds = get_media_embedded_in_content( $content );

            if( !empty($embeds) ) {
                //check what is the first embed containg video tag, youtube or vimeo
                foreach( $embeds as $embed ) {
                    if( strpos( $embed, 'video' ) || strpos( $embed, 'youtube' ) || strpos( $embed, 'vimeo' ) ) {
                        if ($counter_video == 1) {
                            echo $embed;
                            $counter_video++;
                        }
                    }
                }

            } else {
                //No video embedded found
            }
        ?>

    </div>

    <header class="cell article-header">	
        <h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
        <?php get_template_part( 'parts/content', 'byline' ); ?>
    </header> <!-- end article header -->

    <section class="cell medium-10 entry-content" itemprop="articleBody">

        <?php $no_video = get_the_content();
            $no_video = apply_filters( 'the_content', $post->post_content );
            // $no_video = preg_replace("/<img[^>]+\>/i", "", $no_video); 		
            $no_video = preg_replace("/<iframe[^>]+\>/i", "", $no_video); 
            // $no_video = preg_replace("/<embed[^>]+\>/i", "", $no_video);
            // $no_video = preg_replace("/<embed[^>]+>/i", "", $no_video, 1);
            $no_video = apply_filters('the_content', $no_video);
            $no_video = str_replace(']]>', ']]>', $no_video);
            echo $no_video;

        $counter_video = 1;
        if( !empty($embeds) ) {
            //check what is the first embed containg video tag, youtube or vimeo
            foreach( $embeds as $embed ) {
                if( strpos( $embed, 'video' ) || strpos( $embed, 'youtube' ) || strpos( $embed, 'vimeo' ) ) {
                    if ($counter_video != 1) {
                        echo $embed;
                    }
                    $counter_video++;
                }
            }

        } 

        ?>

    </section> <!-- end article section -->

    <footer class="cell article-footer">
        <?php wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jointswp' ), 'after'  => '</div>' ) ); ?>
        <p class="tags"><?php the_tags('<span class="tags-title">' . __( 'Tags:', 'jointswp' ) . '</span> ', ', ', ''); ?></p>	
    </footer> <!-- end article footer -->

    <?php } else { // END ELSE OF POST FORMAT VIDEO ?>

    <?php if ( has_post_thumbnail() ) { ?>

    <div class="cell">

        <?php 
            $thumb_id = get_post_thumbnail_id();
            $thumb_url_array = wp_get_attachment_image_src($thumb_id,'full', true);  
            $thumb_url = $thumb_url_array[0]; 
        ?>

        <div class="featured-image-container">

            <div class="featured-image aspect-ratio" style="background-image: url('<?php echo $thumb_url; ?>');"> </div>

        </div>

    </div>

    <?php } else { ?>

    <?php } ?>

    <header class="cell article-header">	
        <h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
        <?php get_template_part( 'parts/content', 'byline' ); ?>
    </header> <!-- end article header -->

    <section class="cell medium-10 entry-content" itemprop="articleBody">
        <?php // the_post_thumbnail('full'); ?>
        <?php the_content(); ?>

    </section> <!-- end article section -->

    <footer class="cell article-footer">
        <?php wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jointswp' ), 'after'  => '</div>' ) ); ?>
        <p class="tags"><?php the_tags('<span class="tags-title">' . __( 'Tags:', 'jointswp' ) . '</span> ', ', ', ''); ?></p>	
    </footer> <!-- end article footer -->

    <?php } // END ELSE OF THUMBNAIL ?>
																			
</article> <!-- end article -->