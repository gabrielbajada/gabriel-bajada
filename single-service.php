<?php
/**
 * The template for displaying single regions
 */

get_header(); ?>

<div class="content">

	<?php get_template_part( 'parts/banner', 'cpt' ); ?>

	<div class="inner-content">

		<main class="main" role="main">

		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		    	<?php get_template_part( 'parts/loop', 'single-service' ); ?>

		    <?php endwhile; else : ?>

		   		<?php get_template_part( 'parts/content', 'missing' ); ?>

		    <?php endif; ?>

		</main> <!-- end #main -->

	</div> <!-- end #inner-content -->

	<?php get_footer(); ?>

</div> <!-- end #content -->
