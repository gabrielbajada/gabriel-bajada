<?php
/*
Template Name: Contact
Template Post Type: page
*/
?>

<?php get_header(); ?>

	<div id="content">

        <?php get_template_part( 'parts/banner', 'contact' ); ?>

        <div id="inner-content">

            <section id="contact-content" class="grid-container full inner-spaced appear-load-3">

                <div class="grid-x grid-padding-x align-center">

                    <div class="cell small-11 large-8 xlarge-7 xxlarge-6">

                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                        <div class="grid-x grid-padding-x align-center">

                            <?php get_template_part( 'parts/contact', 'form' ); ?>

                            <?php //get_template_part( 'parts/contact', 'details' ); ?>

                        </div>

                        <?php endwhile; endif; ?>

                    </div>

                </div>

            </section>

        </div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>
