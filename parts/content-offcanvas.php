<?php
/**
 * The template part for displaying offcanvas content
 *
 * For more info: http://jointswp.com/docs/off-canvas-menu/
 */
?>

<div class="off-canvas position-right" id="off-canvas" data-off-canvas data-transition="overlay">

    <div id="offcanvas-logo" class="grid-x grid-padding-x">

        <div id="logo-area" class="cell medium-9">
          <a href="<?php echo home_url(); ?>">
            <div class="top-menu-logo"> </div>
          </a>
        </div>

    </div>

    <!-- div class="grid-x grid-padding-x align-center-middle close-button show-for-medium">
      <div class="cell text-right">
        <button data-close aria-label="Close reveal" type="button">
          <i class="material-icons-round times">close</i><span class="show-for-large">ESC</span>
        </button>
      </div>
    </div -->

    <div id="offcanvas-menu" class="grid-x grid-padding-x">

      <div class="cell">

        <?php joints_off_canvas_nav(); ?>

      </div>

    </div>

    <div id="offcanvas-search" class="grid-x grid-padding-x">

        <div class="cell">

            <?php //get_search_form( 'offcanvas' ); ?>
            <?php get_template_part( 'searchform', 'offcanvas' ); ?>

        </div>

    </div>

    <?php if ( is_active_sidebar( 'social-media' ) ) : ?>

    <div id="offcanvas-social-media-widget" class="grid-x grid-padding-x half-spaced-top">

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

</div>
