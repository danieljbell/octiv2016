<?php
/*
===============================
Template Name: List Child Pages
===============================
*/

get_header();
?>

<div class="fixed-hero-section">
	<div class="site-width white-text">
		<h1><?php the_title(); ?></h1>
	</div>
</div>

<?php get_template_part('partials/display', 'breadcrumbs'); ?>

<section>
	<div class="site-width">
		<?php

			$args = array(
				'post_type' => 'page',
				'post_parent' => $post->ID
			);

			$query = new WP_Query( $args );

			if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post()

		?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		<?php	endwhile; endif; wp_reset_query(); ?>

	</div>
</section>

<?php get_footer(); ?>
