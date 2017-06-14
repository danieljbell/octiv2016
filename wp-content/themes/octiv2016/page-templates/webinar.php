<?php
/*
==============================
Template Name: Webinar
==============================
*/

?>

<?php get_header(); ?>

<?php if (get_the_post_thumbnail()) {
	$featured_img = wp_get_attachment_url( get_post_thumbnail_id() );
} ?>


	<?php
		if (!$featured_img) {
			echo '<div class="fixed-hero-section">';
		} else {
			echo '<div class="fixed-hero-section" style="background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(' . $featured_img . '); background-size: cover;">';
		}
	?>
	<div class="site-width white-text centered">
		<h1><?php the_title(); ?></h1>
		<div class="two-third-only">
			<div style="margin-bottom: 0;">
				<p class="font-bump" style="margin-bottom: 0;"><?php echo get_field('short_description'); ?></p>
			</div>
		</div>
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
			<div>
				<main role="main">
					<?php the_content(); ?>
				</main>
			</div>
			<div>
				<aside>
					<div class="box">
						<script src="//app-sj20.marketo.com/js/forms2/js/forms2.min.js"></script>
						<form id="mktoForm_<?php echo get_field('form_source'); ?>"></form>
						<script>MktoForms2.loadForm("//app-sj20.marketo.com", "625-MXY-689", <?php echo get_field('form_source'); ?>, function(form) {
							form.onSuccess(function(values, followUpUrl) {
								var vals = form.vals();
								form.getFormElem().hide();
								var formContainer = document.querySelector('aside > .box');
								formContainer.classList.add('centered');
								formContainer.innerHTML = '<h2>Thanks ' + vals.FirstName + ' for Registering!</h2><p>You will be recieving a confirmation email soon.</p>';
								return false;
							});
						});</script>
					</div>
				</aside>
			</div>
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
