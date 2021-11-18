<?php
  // Custom Fields
  $map_image = types_render_field("map-image", array( "output" => "raw", ));
  $map_code = types_render_field("map-code", array( "output" => "raw", ));
?>



<?php if ( $map_code != '' ) { ?>

<section id="home-map" class="grid-container full appear-load-3">

  <div id="map" class="grid-x">
    <div class="cell">
      <img src="<?php echo $map_image; ?>">
    </div>
  </div>

  <div id="map-overlay">
    <?php echo $map_code; ?>
  </div>

</div>

</section>

<?php } else {} ?>
