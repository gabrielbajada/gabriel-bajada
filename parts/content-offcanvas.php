<?php
/**
 * The template part for displaying offcanvas content
 *
 * For more info: http://jointswp.com/docs/off-canvas-menu/
 */
?>

<div class="off-canvas position-right" id="off-canvas" data-off-canvas data-transition="overlay">




  <section id="offcanvas-section-top"  class="align-top">

    <div id="offcanvas-logo" class="grid-x">

        <div id="logo-area" class="cell small-9">
          <a href="<?php echo home_url(); ?>">
            <div class="top-menu-logo"> </div>
          </a>
        </div>

        <div class="cell small-3 text-right close-button">
          <button data-close aria-label="Close reveal" type="button">
            <i class="material-symbols-sharp times">last_page</i><span class="show-for-large">ESC</span>
          </button>
        </div>

    </div>

    <!-- div class="grid-x grid-padding-x align-center-middle close-button show-for-medium">
      <div class="cell text-right">
        <button data-close aria-label="Close reveal" type="button">
          <i class="material-symbols-sharp times">close</i><span class="show-for-large">ESC</span>
        </button>
      </div>
    </div -->

    <div id="offcanvas-menu" class="grid-x">

      <div class="cell">

        <?php joints_off_canvas_nav(); ?>

      </div>

    </div>

    <?php if ( is_active_sidebar( 'social-media' ) ) : ?>

    <div id="offcanvas-social-media-widget" class="grid-x">

        <div class="cell">

            <?php dynamic_sidebar( 'social-media' ); ?>

        </div>

    </div>

    <?php endif; ?>


    <?php if ( is_active_sidebar( 'offcanvas' ) ) : ?>

    <div id="offcanvas-sidebar" class="grid-x grid-padding-x half-spaced-top">

        <div class="cell">

            <?php dynamic_sidebar( 'offcanvas' ); ?>

        </div>

    </div>

    <?php endif; ?>

  </section>




  <section id="offcanvas-section-bottom" class="align-bottom">


    <div id="offcanvas-search" class="grid-x">

        <div class="cell">

            <?php //get_search_form( 'offcanvas' ); ?>
            <?php get_template_part( 'searchform', 'offcanvas' ); ?>

        </div>

    </div>

  </section>




</div>
