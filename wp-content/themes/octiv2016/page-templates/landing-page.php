<?php
/*
==============================
TEMPLATE NAME: Landing Page
==============================
*/

get_header();

?>

<!-- <div class="fixed-hero-section" style="background-image: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)), url(<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>);"> -->
<div class="fixed-hero-section">
	<div class="site-width white-text">
		<h1><?php the_title(); ?></h1>
	</div>
</div>

<?php get_template_part('partials/display', 'breadcrumbs'); ?>

<section class="page-content">
	<div class="site-width">
		<div class="two-third">
			<div>
				<h2>About the <?php the_title(); ?></h2>
				<hr>
				<?php the_content(); ?>
			</div>
			<aside>
				<?php get_sidebar( 'landing-form' ); ?>
			</aside>
		</div>
	</div>
</section>


<?php get_footer(); ?>
