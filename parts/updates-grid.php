<?php
$temp = $wp_query; $wp_query= null;
$wp_query = $wp_query = new WP_Query(); $wp_query->query('post_type=post' . '&posts_per_page=12' . '&orderby=date' . '&order=DESC' . '&paged='.$paged); //. '&cat=-10'
?>

<?php if($wp_query->have_posts()) : ?>

<section id="updates-grid" class="grid-container full appear-load-3">

  <div class="grid-x grid-padding-x align-center" data-equalizer="card-content" data-equalize-by-row="true">
    <div class="cell small-11 medium-10 xxlarge-9">

      <div class="generic-grid">
        <div class="grid-x grid-padding-x medium-up-3 align-center generic-grid-inner">

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

              <div class="item-inner card">

                <div data-equalizer-watch="card-content">

                  <?php if ( has_post_thumbnail() ) { ?>

                  <a href="<?php the_permalink(); ?>" target="_self">
                    <div class="featured-image-container">
                        <div class="featured-image aspect-ratio" style="background-image: url('<?php echo $thumb_url; ?>');"> </div>
                    </div>
                  </a>

                  <?php } else {} ?>

                  <header>
                    <h3>
                      <a href="<?php the_permalink(); ?>" target="_self">
                        <?php the_title(); ?>
                      </a>
                    </h3>
                    <h5><?php the_time('j F, Y') ?></h5>
                  </header>

                  <section class="entry-content" itemprop="articleBody">
                    <?php echo '<p>' . wp_trim_words( get_the_excerpt(), 15, null ) . '</p>';?>
                  </section>
                </div>

                <footer>
                  <a href="<?php the_permalink(); ?>" class="cta" target="_self">Learn More</a>
                </footer>

              </div>

            </article> <!-- end article -->

<?php endwhile; ?>

          </div>

        </div>

      </div>
    </div>

  <?php joints_page_navi(); ?>

</section>

<!-- reset global post variable. After this point, we are back to the Main Query object -->
<?php wp_reset_postdata(); ?>

<?php else: ?>
    Oops, there are no posts.
<?php endif; ?>
