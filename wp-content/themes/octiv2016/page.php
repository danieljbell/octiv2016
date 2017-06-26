<?php
	$url = $_SERVER['REQUEST_URI'];
	$parsed_url = explode( '/', $url );
	$cat = $parsed_url[2];
?>

<?php get_header(); ?>

<div class="fixed-hero-section">
	<div class="site-width white-text">
		<?php if ($post->post_parent === 74) : ?>
			<h1><?php echo rtrim(get_field('short_description'), '.'); ?></h1>
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
