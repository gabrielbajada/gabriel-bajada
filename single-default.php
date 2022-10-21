<?php get_header(); ?>

    <?php //get_template_part( 'parts/banner', 'post' ); ?>

    <div id="content">

        <div id="inner-content">

            <section id="single-post-content" class="grid-container full appear-load-3">

                <div class="grid-x grid-padding-x align-center">

                    <main class="cell medium-8 xlarge-7 xxlarge-6 main" role="main">

                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                            <?php get_template_part( 'parts/loop', 'single' ); ?>

                        <?php endwhile; else : ?>

                            <?php get_template_part( 'parts/content', 'missing' ); ?>

                        <?php endif; ?>

                    </main>
                    
                </div>

            </section>

        </div> <!-- end #inner-content -->

        <?php get_template_part( 'parts/nav', 'posts' ); ?>

    </div> <!-- end #content -->

<?php get_footer(); ?>
