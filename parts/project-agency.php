<?php
	$project_agency_id = get_the_ID();
    $related_agencys = toolset_get_related_posts(
		$project_agency_id, // get posts related to this one
		'project-agency', // relationship between the posts
		'parent', // get posts where $writer is the parent in given relationship
		100, 0, // pagination
		array(), // How was his surname, again…?
		'post_object',
		'child'
	);
?>

<?php foreach ($related_agencys as $agency) {

    $agency_project_id = $agency->ID;
    //error_log("agency_id is " . $agency_project_id);
    $agency_post = get_post($agency_project_id);
    $post_slug = $agency_post->post_name;
    $permalink = get_the_permalink( $agency_project_id );
    $title = get_the_title( $agency_project_id );
    //$excerpt = $agency_post->post_excerpt;
    $excerpt = apply_filters('the_content', $agency_post->post_excerpt);
    $content = apply_filters('the_content', $agency_post->post_content);

    $thumb_id = get_post_thumbnail_id($agency_project_id);
    $thumb_url_array = wp_get_attachment_image_src($thumb_id,'full', true);
    $thumb_url = $thumb_url_array[0];

    //$map = types_render_field("google-map-embed-code", array("output"=>"html", "post_id"=>$agency_project_id));
    //$agency_address = types_render_field("agency-address", array("output"=>"html", "post_id"=>$agency_project_id));
?>

    <h4><span class="ampersand">&ensp;&commat;&ensp;</span><?php echo $title; ?></h4>

<?php } ?>

<?php wp_reset_postdata(); ?>
