<?php get_header(); ?>

<?php $rand_num = mt_rand(1,4); ?>

<div class="fixed-hero-section" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(/wp-content/themes/octiv2016/dist/img/octiv-pattern.svg), url(/wp-content/uploads/2017/06/generic-<?php echo $rand_num; ?>.jpg);">
	<div class="site-width white-text centered">
		<h1><?php echo str_replace('Archives: ','',get_the_archive_title()); ?></h1>
	</div>
</div>

<?php get_template_part('partials/display', 'breadcrumbs'); ?>

<?php if (!is_post_type_archive('press-releases')) : ?>
	<section>
		<div class="site-width">
			<div class="third">
				<?php
					if (have_posts()) :
						while (have_posts()) :
							the_post();
							echo do_shortcode('[get_card]');
						endwhile;
					endif;
					wp_reset_query();
				?>
			</div>
		</div>
	</section>
<?php else : ?>
	<section>
		<div class="site-width">
			<?php
				if (have_posts()) :
					while (have_posts()) :
						the_post(); ?>
						<article class="pad-y">
							<strong><?php echo get_the_date(); ?></strong>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<?php the_excerpt(); ?>
						</article>
		<?php endwhile;
				endif;
				wp_reset_query();
			?>
		</div>
	</section>
<?php endif; ?>

<?php get_footer(); ?>