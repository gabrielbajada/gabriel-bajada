<?php
/**
 * Template part for displaying a single region
 */

	$thumb_id = get_post_thumbnail_id();
	$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
	$thumb_url = $thumb_url_array[0];

	$lead = types_render_field("project-lead-paragraph", array("output"=>"html"));
	$details = types_render_field("project-details", array("output"=>"html"));
	$other_credits = types_render_field("other-credits", array("output"=>"html"));
	$primary_url = types_render_field("primary-url", array("output"=>"raw"));
	$primary_url_title = types_render_field("primary-url-title", array("output"=>"raw"));
	$secondary_url = types_render_field("secondary-url", array("output"=>"raw"));
	$secondary_url_title = types_render_field("secondary-url-title", array("output"=>"raw"));
	$alternate_image = types_render_field("alternate-image", array("output"=>"raw"));
	$gallery = types_render_field("gallery", array("output"=>"html"));
?>

<section id="single-project-content" class="grid-container full appear-load-3">

	<article id="post-<?php the_ID(); ?>" <?php post_class('grid-x grid-padding-x align-center entry-content'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

		<header class="cell small-11 large-10 xxlarge-7 article-header">

			<div id="project-info" class="grid-x grid-padding-x">

				<div class="cell small-11 medium-7">

					<?php if ( $lead != '' ) { ?>
						<div class="lead"><?php echo $lead; ?></div>
					<?php } else {} ?>

					<?php if ( $details != '' ) { ?>
						<div class="grid-x grid-padding-x">
							<div class="cell medium-9 xlarge-10">
								<div class="details">
									<?php echo $details; ?>
								</div>
							</div>
						</div>
					<?php } else {} ?>

				</div>

				<div class="cell small-11 medium-4 medium-offset-1" data-sticky-container>

				  <div class="sticky" data-sticky data-anchor="project-info" data-margin-top="5.5">

						<?php if ( $other_credits != '' ) { ?>
							<div class="container other-credits">
								<?php echo $other_credits; ?>
							</div>
						<?php } else {} ?>

						<?php if ( $primary_url != '' ) { ?>
							<div class="container url">
								<a href="<?php echo $primary_url; ?>" class="cta" target="_blank"><?php echo $primary_url_title; ?></a>
							</div>
						<?php } else {} ?>

						<?php if ( $secondary_url != '' ) { ?>
							<div class="container url">
								<a href="<?php echo $secondary_url; ?>" class="cta" target="_blank"><?php echo $secondary_url_title; ?></a>
							</div>
						<?php } else {} ?>

					</div>

				</div>

			</div>

			<div id="project-details" class="grid-x">

				<div class="cell">
					<div class="grid-x grid-padding-x">

						<div class="cell small-4">
							<h5 class="detail"><span class="abbreviation">Date</span><?php the_time( 'Y' ); ?></h5>
						</div>

						<div class="cell small-4">
							<h5 class="detail"><span class="abbreviation">Client</span><?php get_template_part( 'parts/project', 'client-link' ); ?></h5>
						</div>

						<div class="cell small-4">
							<h5 class="detail"><span class="abbreviation">Agency</span><?php get_template_part( 'parts/project', 'agency-link' ); ?></h5>
						</div>

					</div>
				</div>

			</div>

		</header>

		<section id="project-content" class="cell small-11 large-10 xxlarge-7 entry-content" itemprop="articleBody">
				<?php // the_post_thumbnail('full'); ?>
				<?php the_content(); ?>

		</section> <!-- end article section -->

	</article> <!-- end article -->

</section>
