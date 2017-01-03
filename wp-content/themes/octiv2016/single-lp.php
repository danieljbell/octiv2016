<?php get_header(); ?>

<div class="fixed-hero-section">
	<div class="site-width white-text">
		<h1><?php the_title(); ?></h1>
	</div>
</div>

<section style="padding: 2rem 0;">
	<div class="site-width page-content">
		<?php the_content(); ?>
	</div>
</section>

<?php get_footer(); ?>