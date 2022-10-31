<?php
/*
Template Name: About
Template Post Type: page
*/
?>

<?php get_header(); ?>

	<div id="content">

        <?php get_template_part( 'parts/banner', 'page' ); ?>

        <div id="inner-content">

            <section id="about-container" class="grid-container full inner-spaced appear-load-3">

                <div class="grid-x grid-padding-x align-center">

                    <div class="cell small-11 large-8 xxlarge-7">

                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                        <div id="about-content" class="grid-x grid-padding-x align-center">

                            <?php get_template_part( 'parts/about', 'bio' ); ?>

                            <?php get_template_part( 'parts/about', 'details' ); ?>

                        </div>

                        <?php endwhile; endif; ?>

                    </div>

                </div>

            </section>

        </div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>
