<?php
	$agency_position_id = get_the_ID();
    $related_positions = toolset_get_related_posts(
		$agency_position_id, // get posts related to this one
		'agency-position', // relationship between the posts
		'child', // get posts where $writer is the parent in given relationship
		100, 0, // pagination
		array(), // How was his surname, again…?
		'post_object',
		'parent'
	);
?>

<?php foreach ($related_positions as $position) {

  $position_agency_id = $position->ID;
  //error_log("position_id is " . $position_agency_id);
  $position_post = get_post($position_agency_id);
  $post_slug = $position_post->post_name;
  $permalink = get_the_permalink( $position_agency_id );
  $title = get_the_title( $position_agency_id );
  //$excerpt = $position_post->post_excerpt;
  $excerpt = apply_filters('the_content', $position_post->post_excerpt);
  $content = apply_filters('the_content', $position_post->post_content);

  $thumb_id = get_post_thumbnail_id($position_agency_id);
  $thumb_url_array = wp_get_attachment_image_src($thumb_id,'full', true);
  $thumb_url = $thumb_url_array[0];

	$url = types_render_field("url", array("output"=>"raw", "post_id"=>$position_agency_id));
	$agency_lead = types_render_field("agency-lead-paragraph", array("output"=>"html", "post_id"=>$position_agency_id));
	$agency_content = types_render_field("agency-content", array("output"=>"html", "post_id"=>$position_agency_id));
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
					<h3 class="reveal-title"><?php echo $title; ?></h3>

					<?php if ( $agency_lead != '' ) { ?>
						<div class="lead">
							<span class="balance-text">
								<?php echo $agency_lead; ?>
							</span>
						</div>
					<?php } else {} ?>

					<?php if ( $agency_content != '' ) { ?>
						<span class="balance-text">
							<?php echo $agency_content; ?>
						</span>
					<?php } else {} ?>
				</div>

				<div class="cell medium-4 medium-offset-1 small-order-1 medium-order-2">
					<?php if ( has_post_thumbnail() ) { ?>
					<a href="<?php echo $url; ?>" title="<?php echo $title; ?>'s Website" target="_blank">
						<div class="featured-image-container client-logo">
							<div class="featured-image aspect-ratio" style="background-image: url('<?php echo $thumb_url; ?>');"> </div>
						</div>
					</a>
					<?php } else {} ?>
				</div>

			</div>

		</div>

	</div>

</div>
</section>

<a data-toggle="<?php echo $post_slug; ?>"><?php echo $title; ?></a>

<?php } ?>

<?php wp_reset_postdata(); ?>
