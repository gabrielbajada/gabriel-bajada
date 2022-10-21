<?php
/*
Template Name: Updates
Template Post Type: page
*/
?>

<?php get_header(); ?>

	<div id="content">

    <?php get_template_part( 'parts/banner', 'page' ); ?>

    <div id="inner-content">

      <?php get_template_part( 'parts/updates', 'grid' ); ?>

    </div> <!-- end #inner-content -->

		<?php get_footer(); ?>

	</div> <!-- end #content -->
