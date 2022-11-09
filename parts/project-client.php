<?php
	$project_client_id = get_the_ID();
    $related_clients = toolset_get_related_posts(
		$project_client_id, // get posts related to this one
		'project-client', // relationship between the posts
		'parent', // get posts where $writer is the parent in given relationship
		100, 0, // pagination
		array(), // How was his surname, again…?
		'post_object',
		'child'
	);
?>

<?php foreach ($related_clients as $client) {

    $client_project_id = $client->ID;
    //error_log("client_id is " . $client_project_id);
    $client_post = get_post($client_project_id);
    $post_slug = $client_post->post_name;
    $permalink = get_the_permalink( $client_project_id );
    $title = get_the_title( $client_project_id );
    //$excerpt = $client_post->post_excerpt;
    $excerpt = apply_filters('the_content', $client_post->post_excerpt);
    $content = apply_filters('the_content', $client_post->post_content);

    $thumb_id = get_post_thumbnail_id($client_project_id);
    $thumb_url_array = wp_get_attachment_image_src($thumb_id,'full', true);
    $thumb_url = $thumb_url_array[0];

    //$map = types_render_field("google-map-embed-code", array("output"=>"html", "post_id"=>$client_project_id));
    //$client_address = types_render_field("client-address", array("output"=>"html", "post_id"=>$client_project_id));
?>

    <h4><?php echo $title; ?></h4>

<?php } ?>

<?php wp_reset_postdata(); ?>
