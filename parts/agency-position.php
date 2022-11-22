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

  //$map = types_render_field("google-map-embed-code", array("output"=>"html", "post_id"=>$position_agency_id));
  //$position_address = types_render_field("position-address", array("output"=>"html", "post_id"=>$position_agency_id));
?>

  <?php echo $title; ?>

<?php } ?>

<?php wp_reset_postdata(); ?>
