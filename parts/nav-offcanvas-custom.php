<?php get_template_part( 'parts/modal', 'search' ); ?>

<div id="top-bar-menu" class="grid-container full appear-load-2 cbp-af-header">

  <div class="grid-x grid-padding-x align-center">

    <div id="menu-container" class="cell xlarge-11 xxlarge-10 cbp-af-inner">

      <div class="grid-x grid-padding-x">

        <div id="logo-area" class="cell small-8 medium-4 float-left appear-load-2"> <!-- top-bar-left -->
          <a href="<?php echo home_url(); ?>">
            <div class="top-menu-logo"> </div>
          </a>
        </div>

        <div id="menu-area" class="cell medium-7 show-for-medium appear-load-2">
          <!--a id="search-icon-container" data-open="search" class="show-for-large appear-load-2" title="Search">
              <i class="material-icons-round">search</i>
          </a -->
          <?php joints_top_nav(); ?>
        </div>

        <div id="offcanvas-menu-area" class="cell small-4 medium-1 appear-load-2"> <!-- top-bar-right -->
          <ul class="menu">

            <li>
              <!-- button id="theme-toggle" class="" type="button">
                <i class="material-icons-round d-block-light d-none">brightness_7</i>
                <i class="material-icons-round d-block-dark d-none">brightness_4</i>
              </button>

              <button class="btn-toggle">Toggle Dark-Mode</button-->

              <button id="theme-toggle" class="btn-toggle">
                <i class="material-icons-round btn-toggle-light">brightness_7</i>
                <i class="material-icons-round btn-toggle-dark">brightness_4</i>
              </button>
            </li>

            <li>
              <button id="hamburger-icon" type="button" data-toggle="off-canvas">
                <i class="material-icons-round">menu</i>
              </button>
            </li>
            <!-- li><a data-toggle="off-canvas"><?php _e( 'Menu', 'jointswp' ); ?></a></li -->
          </ul>
          <?php //get_template_part( 'parts/search', 'fullscreen' ); ?>
        </div>

      </div>

    </div>

  </div>

</div>
