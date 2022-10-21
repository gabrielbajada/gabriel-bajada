<?php get_header(); ?>

    <?php //get_template_part( 'parts/banner', 'careers' ); ?>

    <div id="content">

        <div id="inner-content">

            <section id="careers-content" class="grid-container full appear-load-3">

                <div class="grid-x grid-padding-x">

                    <main class="cell medium-8 medium-offset-2 xlarge-7 xxlarge-6 main" role="main">

                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                            <?php get_template_part( 'parts/loop', 'single-career' ); ?>

                        <?php endwhile; else : ?>

                            <?php get_template_part( 'parts/content', 'missing' ); ?>

                        <?php endif; ?>

                    </main> <!-- end #main -->

                </div>
            </section>

            <?php get_template_part( 'parts/careers', 'form' ); ?>

        </div> <!-- end #inner-content -->

    </div> <!-- end #content -->

<?php get_footer(); ?>
