<?php
/**
 * The template for displaying the footer.
 *
 * Comtains closing divs for header.php.
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
 ?>


                <footer class="footer grid-container full appear-load-3" role="contentinfo">

                    <section id="footer-top" class="grid-x grid-padding-x align-center half-inner-spaced">

                        <div id="footer-menu-bar" class="cell xlarge-11 xxlarge-10">

                            <div class="grid-x grid-padding-x">

                                <div id="footer-widget-1" class="cell small-6 medium-3 small-order-3 medium-order-1">

                                    <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>

                                        <?php dynamic_sidebar( 'footer-1' ); ?>

                                    <?php endif; ?>

                                </div>


                                <div id="footer-widget-2" class="cell small-6 medium-3 small-order-1 medium-order-2">

                                    <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>

                                        <?php dynamic_sidebar( 'footer-2' ); ?>

                                    <?php endif; ?>

                                </div>


                                <div id="footer-widget-3" class="cell small-6 medium-3 small-order-2 medium-order-3">

                                    <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>

                                        <?php dynamic_sidebar( 'footer-3' ); ?>

                                    <?php endif; ?>

                                </div>


                                <div id="social-media-widget" class="cell small-6 medium-3 small-order-4 medium-order-4">

                                    <?php if ( is_active_sidebar( 'social-media' ) ) : ?>

                                        <?php dynamic_sidebar( 'social-media' ); ?>

                                    <?php endif; ?>

                                    <?php if ( is_active_sidebar( 'certifications' ) ) : ?>

                                    <div id="certifications-widget">

                                        <?php dynamic_sidebar( 'certifications' ); ?>

                                    </div>

                                    <?php endif; ?>

                                </div>

                                <div class="cell">

                                    <nav role="navigation">
                                        <?php joints_footer_links(); ?>
                                    </nav>

                                </div>

                            </div>

                        </div>

                    </section> <!-- end #inner-footer -->



                    <section id="footer-bottom" class="grid-x grid-padding-x align-center quarter-inner-spaced">

                        <div class="cell xlarge-11 xxlarge-10">

                            <div class="grid-x grid-padding-x">

                                <div class="cell small-8 medium-6">
                                    <p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.&emsp;</p>

                                    <?php if ( is_active_sidebar( 'footer-bottom' ) ) : ?>

                                        <?php dynamic_sidebar( 'footer-bottom' ); ?>

                                    <?php endif; ?>
                                </div>

                                <div class="cell small-4 medium-6 medium-text-right xxlarge-6">
                                    <a href="http://www.moose.com.mt" title="Designed & Developed by Moose" target="_blank">
                                        <img src="https://gabrielbajada-host1.com/host/credits/moose-mark-white.png" alt="Moose mark" class="moose-mark">
                                    </a>
                                </div>

                            </div>

                        </div>

                    </section>

				</footer> <!-- end .footer -->
			</div>  <!-- end .main-content -->
		</div> <!-- end .off-canvas-wrapper -->

		<?php wp_footer(); ?>

    <!-- Owl Carousel JS -->
    <script defer src="<?php echo get_template_directory_uri(); ?>/vendor/owl-carousel/owl.carousel.min.js"></script>

    <!-- Infinite Scroll -->
    <script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js"></script>

	</body>
</html> <!-- end page -->
