<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">

    <!-- label>
        <span class="screen-reader-text"><?php //echo _x( 'Search for:', 'label', 'jointstheme' ) ?></span>
    </label -->

    <div class="input-group">

        <input class="input-group-field search-field"
               type="text"
               placeholder="<?php echo esc_attr_x( 'Search & hit enter', 'placeholder' ) ?>"
               value="<?php echo get_search_query() ?>"
               name="s"
               title="<?php echo esc_attr_x( 'Search for:', 'jointstheme' ) ?>"
               autocomplete="off" >

        <div class="input-group-button">
          <!--input type="submit" class="search-submit button" value="" /--><?php// echo esc_attr_x( 'Search', 'jointstheme' ) ?>
          <button type="submit" class="search-submit button" ><i class="material-symbols-sharp">search</i></button>
          <input type="hidden" name="post_type" value="post_type_name" />
        </div>

    </div>

</form>
