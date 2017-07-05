<?php
	$url = $_SERVER['REQUEST_URI'];
	$parsed_url = explode( '/', $url );
	$cat = $parsed_url[2];
	$rand_num = mt_rand(1,4);
?>

<?php get_header(); ?>

<div class="fixed-hero-section" <?php if (get_post_thumbnail_id()) {
	if ($post->post_parent === 74) {
		echo 'style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(/wp-content/themes/octiv2016/dist/img/octiv-pattern.svg), url(' . get_field('client_testimonial_image') . ');"';
	}
	echo 'style="background-image: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)), url(/wp-content/themes/octiv2016/dist/img/octiv-pattern.svg), url(' . wp_get_attachment_url( get_post_thumbnail_id() ) . ');"';
} else {
	echo 'style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(/wp-content/themes/octiv2016/dist/img/octiv-pattern.svg), url(/wp-content/uploads/2017/06/generic-' . $rand_num . '.jpg);"';
} ?>>
	<div class="centered site-width white-text">
		<?php if ($post->post_parent === 74) : ?>
			<h1><?php echo rtrim(get_field('short_description'), '.'); ?></h1>
			<div class="two-third-only">
				<div>
					<p class="font-bump"><?php echo get_field('client_testimonial'); ?></p>
				</div>
			</div>
		<?php else : ?>
			<h1><?php the_title(); ?></h1>
		<?php endif; ?>
	</div>
</div>

<?php get_template_part('partials/display', 'breadcrumbs'); ?>

<?php if ($post->post_parent != 0) : ?>
	<section>
		<div class="site-width">
			<?php the_content(); ?>
				<?php
					if ($cat === 'blog') :
						$args = array(
							'post_type'		=> 'post'
						);
					else :
						$args = array(
							'post_type'		=> array('page','post'),
							// 'posts_per_page' => -1,
							'post_parent' => $post->ID,
							'post__not_in' => array( 3025 )
						);
					endif;
				?>
			<?php
				$child_query = new WP_Query( $args );

				if ( $child_query->have_posts() ) :
					echo '<div class="third">';
					while ( $child_query->have_posts() ) :
						$child_query->the_post();
						$tag;
						$excerpt = 'true';
						if ($post->post_parent == '65') {
							$tag = 'whitepapers';
							$excerpt = 'custom';
						}
						if ($post->post_parent == '74') {
							$tag = 'client-stories';
							$excerpt = 'custom';
						}
						if ($post->post_parent == '207') {
							$tag = 'webinars';
							$excerpt = 'custom';
						}
						if ($post->post_parent == '0') {
							$tag = 'blog';
						}
						echo do_shortcode('[get_card thumb="true" excerpt="' . $excerpt . '" tag="' . $tag . '"]');
					endwhile;
					echo '</div>';
					echo paginate_links(array(
						'total' => $child_query->max_num_pages
					));
				endif;
				wp_reset_query();
			?>
		</div>
	</section>
	<?php
		if ($post->post_parent === 74) {
			echo '<div class="site-width"><hr></div>';
			get_template_part('partials/display', 'basic-contact-us');
		}
	?>
<?php else : ?>
	<section>
		<div class="site-width">
			<?php the_content(); ?>
		</div>
	</section>
<?php endif; ?>





<?php get_footer(); ?>
