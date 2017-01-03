<?php get_header(); ?>

<div class="fixed-hero-section">
	<div class="site-width white-text">
		<h1><?php echo get_the_author(); ?></h1>
	</div>
</div>

<?php get_template_part('partials/display', 'breadcrumbs'); ?>

<section>
	<div class="site-width">
		<div class="two-third">
			<div class="half">
				<?php
					if (have_posts()) :
						while (have_posts()) :
							the_post();
								echo do_shortcode('[get_card thumb="true" excerpt="true"]');
						endwhile;
					endif;
				?>
			</div>
			<div>
				<aside class="box">
					<div>
						<div>
							<img src="<?php echo get_cupp_meta($user->ID, 'full'); ?>" alt="<?php echo $user->display_name; ?>">
						</div>
						<div>
							<h3><?php echo get_the_author(); ?></h3>
							<p><?php echo get_the_author_meta('job_title'); ?></p>
							<?php if (get_the_author_meta('twitter')) : ?>
								<a href="http://twitter.com/<?php echo the_author_meta('twitter'); ?>"><img src="/wp-content/themes/octiv2016/dist/img/twitter.svg" alt="Twitter"></a>
							<?php endif; ?>
							<?php if (get_the_author_meta('linkedin')): ?>
								<a href="http://linkedin.com/<?php echo the_author_meta('linkedin'); ?>"><img src="/wp-content/themes/octiv2016/dist/img/linkedin.svg" alt="LinkedIn"></a>
							<?php endif ?>
						</div>
					</div>
					<div>
						<br>
						<p>Articles written: <?php the_author_posts(); ?></p>
						<p><?php echo the_author_meta('user_description'); ?></p>
					</div>
				</aside>
				<br>
				<p class="centered"><a href="<?php echo site_url(); ?>/author" class="btn-primary">View all Authors</a></p>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
