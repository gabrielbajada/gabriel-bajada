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


                                <div id="social-media-widget" class="cell">

                                    <?php if ( is_active_sidebar( 'social-media' ) ) : ?>

                                        <?php dynamic_sidebar( 'social-media' ); ?>

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

                                <div class="cell small-4 medium-6 xxlarge-6 text-right credit">
                                    <a href="http://www.moose.com.mt" title="Designed & Developed by Moose" target="_blank">
                                      <div class="moose-mark"> </div>
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

    <!-- Balance Text -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/balance-text/3.3.1/balancetext.min.js"></script>
    <script>
      balanceText();
    </script>

	</body>
</html> <!-- end page -->
