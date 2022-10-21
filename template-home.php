<?php
/*
Template Name: Home
Template Post Type: page
*/
?>

<?php get_header(); ?>

	<div id="content">

	  <?php get_template_part( 'parts/banner', 'home' ); ?>

	  <div id="inner-content">

			<?php get_template_part( 'parts/home', 'projects-grid' ); ?>

	  </div> <!-- end #inner-content -->

		<?php get_template_part( 'parts/footer', 'cta' ); ?>

		<?php get_footer(); ?>

	</div> <!-- end #content -->
