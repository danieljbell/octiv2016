<?php
/*
==============================
Template Name: Webinar
==============================
*/

?>

<?php get_header(); ?>

<div class="fixed-hero-section">
	<div class="site-width white-text">
		<h1><?php the_title(); ?></h1>
	</div>
</div>

<?php get_template_part('partials/display', 'breadcrumbs'); ?>

<?php 

$today = date('Ymd');
$webinar_date = get_field('webinar_date');

if ($webinar_date > $today) : ?>
	
<section>
	<div class="site-width">
		<div class="two-third">
			<main role="main">
				<?php the_post_thumbnail(full, array('class' => 'pad-b')); ?>
				<?php the_content(); ?>
			</main>
			<aside><?php get_sidebar('landing-form'); ?></aside>
		</div>
	</div>
</section>

<?php else : ?>

<section>
	<div class="site-width">
		<main role="main">
			<?php if ( get_field('webinar_source') ) : ?>
				<div class="video-outer mar-b">
					<div class="video-inner">
						<iframe src="<?php echo get_field('webinar_source'); ?>" width="100%" height="100%" frameborder="0"></iframe>
					</div>
				</div>
			<?php endif; ?>
			<?php the_content(); ?>
		</main>
	</div>
</section>

<?php endif; ?>

<?php get_footer(); ?>
