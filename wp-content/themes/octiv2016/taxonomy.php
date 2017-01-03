<?php get_header(); ?>

<div class="fixed-hero-section">
	<div class="site-width white-text">
		<h1>
			<?php echo str_replace('Event Type: ','',get_the_archive_title()); ?>
		</h1>
	</div>
</div>

<?php get_template_part('partials/display', 'breadcrumbs'); ?>

<section>
	<div class="site-width">
		<?php
			if ( have_posts() ) :
				echo '<div class="third">';
				while ( have_posts() ) :
					the_post();
					echo do_shortcode('[get_card thumb="true" excerpt="custom"]');
				endwhile;
				echo '</div>';
			endif; wp_reset_query();
		?>
	</div>
</section>


<?php get_footer(); ?>