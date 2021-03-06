<?php
/*
==============================
TEMPLATE NAME: Landing Page
==============================
*/

get_header();
$rand_num = mt_rand(1,4);

?>

<div class="fixed-hero-section" style="background-image: linear-gradient(rgba(0,0,0,0), rgba(0,0,0,0)), linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)), url(<?php
	if (get_field('hero_background')) {
		echo get_field('hero_background');
	} elseif (get_post_thumbnail_id()) {
		echo wp_get_attachment_url( get_post_thumbnail_id() );
	} else {
		echo '/wp-content/uploads/2017/06/generic-' . $rand_num . '.jpg';
	}
?>);">
	<div class="site-width centered white-text">
		<h1><?php the_title(); ?></h1>
		<div class="two-third-only">
			<div style="margin-bottom: 0;">
			<p class="font-bump" style="margin-bottom: 0;"><?php echo get_field('short_description', $post->ID); ?></p>
		</div>
		</div>
	</div>
</div>

<section class="page-content">
	<div class="site-width">
		<div class="two-third">
			<div class="content-container">
				<?php if (get_field('show_cover_on_lp')) {
					echo '<img src="' . get_field('cover_image') . '" alt="' . get_the_title() . ' Cover" class="content-cover">';
				} ?>
				<?php the_content(); ?>
			</div>
			<aside>
				<?php get_sidebar( 'landing-form' ); ?>
			</aside>
		</div>
	</div>
</section>


<?php get_footer(); ?>
