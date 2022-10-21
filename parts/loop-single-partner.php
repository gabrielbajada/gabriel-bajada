<?php
/**
 * Template part for displaying a single region
 */

	$thumb_id = get_post_thumbnail_id();
	$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
	$thumb_url = $thumb_url_array[0];

	$lead = types_render_field("lead", array("output"=>"html"));
	$content = types_render_field("content", array("output"=>"html"));
	$url = types_render_field("url", array("output"=>"raw"));
	$alternate_image = types_render_field("alternate-image", array("output"=>"raw"));
	$gallery = types_render_field("gallery", array("output"=>"html"));
?>

<section id="single-facility-content" class="grid-container full appear-load-3">

	<article id="post-<?php the_ID(); ?>" <?php post_class('grid-x grid-padding-x align-center entry-content'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

		<div class="cell small-11 medium-7 xlarge-6">

			<?php if ( $lead != '' ) { ?>
				<div class="lead"><?php echo $lead; ?></div>
			<?php } else {} ?>

		</div>

		<div class="cell medium-1 show-for-medium"></div>

		<div class="cell small-11 medium-8 xlarge-7">

			<?php if ( $content != '' ) { ?>
				<div class="content"><?php echo $content; ?></div>
			<?php } else {} ?>

			<?php if ( $url != '' ) { ?>
				<a href="<?php echo $url; ?>" class="button hollow" target="_blank">Visit Website</a>
			<?php } else {} ?>

		</div>

	</article> <!-- end article -->

</section>

<?php if ( $gallery != '' ) { ?>
	<section id="gallery" class="grid-container full appear-load-3">
		<div class="grid-x grid-padding-x align-center">

			<div class="cell xlarge-11 xxlarge-10">
				<?php echo $gallery; ?>
			</div>

		</div>
	</section>
<?php } else {} ?>
