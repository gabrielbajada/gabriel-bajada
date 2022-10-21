<?php
/**
 * Template part for displaying posts
 *
 * Used for single, index, archive, search.
 */
?>

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
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</h3>

			<?php if ( $lead != '' ) { ?>
				<p class="lead"><?php echo wp_trim_words( $lead, 25, '…' ); ?></p>
			<?php } else {} ?>

			<a href="<?php the_permalink(); ?>" class="cta" target="_self">View Project</a>
		</div>

	</div>


	</div>

</article> <!-- end article -->
