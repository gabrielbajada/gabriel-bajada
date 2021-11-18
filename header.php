<?php
/**
* The template for displaying the header
* This is the template that displays all of the <head> section
*/
?>

<!-- Dark Mode -->
<?php
  $themeClass = '';
  if (!empty($_COOKIE['theme'])) {
    if ($_COOKIE['theme'] == 'dark') {
      $themeClass = 'dark-theme';
    } elseif ($_COOKIE['theme'] == 'light') {
      $themeClass = 'light-theme';
    }
  }
?>

<!doctype html>

  <html class="no-js"  <?php language_attributes(); ?>>

	<head>
		<meta charset="utf-8">

		<!-- Force IE to use the latest rendering engine available -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta class="foundation-mq">

		<!-- If Site Icon isn't set in customizer -->
		<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
			<!-- Icons & Favicons -->
			<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
			<link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-touch.png" rel="apple-touch-icon" />
	    <?php } ?>

    <meta name="msapplication-TileColor" content="#5B7671">
    <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/assets/images/win8-tile-icon.png">
    <meta name="theme-color" content="#5B7671">

    <!-- Dark Mode -->
    <meta name="color-scheme" content="dark light">


		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php wp_head(); ?>

    <!-- Owl Carousel Styles -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/vendor/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/vendor/owl-carousel/animate.css">
    <!-- link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/ -->

    <!-- Google Material Design Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

	</head>

	<body <?php body_class(); ?> class="<?php echo $themeClass; ?>">

    <!--[if lt IE 10]>
        <div class="browsehappy">
            <h3><a href="http://browsehappy.com/" target="_blank">We've noticed you're using an <strong>outdated</strong> browser</a></h3>
            <p>Please <a href="http://browsehappy.com/" target="_blank">click here</a> and upgrade your browser. You'll improve your browsing experience not just on our website, but throughout the internet.</p>
        </div>
    <![endif]-->

    <div class="preloader-spinner"></div>

    <a id="scroll-top-container" title="Back to top"><i class="material-icons-round">expand_less</i></a>

		<div class="off-canvas-wrapper">

			<!-- Load off-canvas container. Feel free to remove if not using. -->
			<?php get_template_part( 'parts/content', 'offcanvas' ); ?>

			<div class="off-canvas-content" data-off-canvas-content>

				<header class="header" role="banner">

					 <!-- This navs will be applied to the topbar, above all content
						  To see additional nav styles, visit the /parts directory -->
					 <?php get_template_part( 'parts/nav', 'offcanvas-custom' ); ?>

				</header> <!-- end .header -->
