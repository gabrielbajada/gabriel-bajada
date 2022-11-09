<?php
/**
 * The template for displaying single projects
*/

get_header(); ?>

<div class="content">

	<?php get_template_part( 'parts/banner', 'cpt' ); ?>

	<div class="inner-content">

		<main class="main" role="main">

		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		    	<?php get_template_part( 'parts/project', 'content' ); ?>

          <?php get_template_part( 'parts/project', 'testimonial' ); ?>

		    <?php endwhile; else : ?>

		   		<?php get_template_part( 'parts/content', 'missing' ); ?>

		    <?php endif; ?>

        <?php get_template_part( 'parts/project', 'nav' );  ?>

		</main> <!-- end #main -->

	</div> <!-- end #inner-content -->

  <?php //get_template_part( 'parts/footer', 'contact' ); ?>

	<?php get_footer(); ?>

</div> <!-- end #content -->
