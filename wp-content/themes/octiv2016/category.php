<?php get_header(); ?>

<div class="fixed-hero-section">
	<div class="site-width white-text">
		<div class="two-third">
			<div>
				<h1><?php single_cat_title(); ?></h1>
			</div>
			<div class="centered">
				<?php
					// Get the Total number of published articles
					$count_posts = get_queried_object();
				  echo $count_posts->count . ' Total Articles';
				?>
			</div>
		</div>
	</div>
</div>

<?php get_template_part('partials/display', 'breadcrumbs'); ?>

<section>
	<div class="site-width">
		<div class="third">
			<?php
				if (have_posts()) :
					while (have_posts()) :
						the_post();
							echo do_shortcode('[get_card thumb="true" excerpt="true" tag="blog"]');
					endwhile;
				endif;
			?>
	</div>
</section>


<?php get_footer(); ?>
