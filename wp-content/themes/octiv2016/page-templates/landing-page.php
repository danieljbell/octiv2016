<?php
/*
==============================
TEMPLATE NAME: Landing Page
==============================
*/

get_header();

?>

<div class="fixed-hero-section" style="background-color: #fff; background-image: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)), url(<?php
	if (get_field('hero_background')) {
		echo get_field('hero_background');
	} else {
		echo wp_get_attachment_url( get_post_thumbnail_id() );
	}
?>);">
	<div class="site-width centered white-text two-third-only">
		<div>
			<h1><?php the_title(); ?></h1>
			<p class="font-bump" style="margin-bottom: 0;"><?php echo get_field('short_description', $post->ID); ?></p>
		</div>
	</div>
</div>

<?php // get_template_part('partials/display', 'breadcrumbs'); ?>

<section class="page-content">
	<div class="site-width">
		<div class="two-third">
			<div class="content-container">
				<?php the_content(); ?>
			</div>
			<aside>
				<?php get_sidebar( 'landing-form' ); ?>
			</aside>
		</div>
	</div>
</section>


<?php get_footer(); ?>
