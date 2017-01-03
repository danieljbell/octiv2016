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
							'post_parent' => $post->ID
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
<?php else : ?>
	<section>
		<div class="site-width">
			<?php the_content(); ?>
			<?php if ( is_page('571') ) : ?>
				<div class="centered font-bump pad-b">
					<h1>Thanks! We’ll be in touch.</h1>
					<p>In the meantime, check out these resources:</p>
				</div>
				<div class="third">
				<?php 
				$thank_you_whitepaper = array(
					'post_type' => 'page',
					'post_parent' => 65,
					'posts_per_page' => 1
				);

				$thank_you_whitepaper_query = new WP_Query( $thank_you_whitepaper );

				if ( $thank_you_whitepaper_query->have_posts() ) : while ( $thank_you_whitepaper_query->have_posts() ) : $thank_you_whitepaper_query->the_post();
				?>
					<div class="card">
						<div class="card-top">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail(); ?>
							</a>
						</div>
						<div class="card-bottom">
							<a href="/resources/whitepapers">
								<p class="card-tag-whitepapers">Whitepapers</p>
							</a>
							<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
							<p><?php echo get_field('short_description') ?></p>	
							<a href="<?php the_permalink(); ?>" class="btn-arrow">Get the Guide</a>
						</div>
					</div>
				<?php endwhile; endif; wp_reset_query(); ?>
				<?php 
				$thank_you_webinar = array(
					'post_type' => 'page',
					'post_parent' => 207,
					'posts_per_page' => 1
				);

				$thank_you_webinar_query = new WP_Query( $thank_you_webinar );

				if ( $thank_you_webinar_query->have_posts() ) : while ( $thank_you_webinar_query->have_posts() ) : $thank_you_webinar_query->the_post();
				?>
					<div class="card">
						<div class="card-top">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail(); ?>
							</a>
						</div>
						<div class="card-bottom">
							<a href="/resources/webinar">
								<p class="card-tag-webinars">Webinar</p>
							</a>
							<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
							<p><?php echo get_field('short_description') ?></p>	
								<a href="<?php the_permalink(); ?>" class="btn-arrow">Watch the Webinar</a>
						</div>
					</div>
				<?php endwhile; endif; wp_reset_query(); ?>
				<?php 
				$thank_you_webinar = array(
					'post_type' => 'page',
					'post_parent' => 74,
					'posts_per_page' => 1
				);

				$thank_you_webinar_query = new WP_Query( $thank_you_webinar );

				if ( $thank_you_webinar_query->have_posts() ) : while ( $thank_you_webinar_query->have_posts() ) : $thank_you_webinar_query->the_post();
				?>
					<div class="card">
						<div class="card-top">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail(); ?>
							</a>
						</div>
						<div class="card-bottom">
							<a href="/resources/client-stories">
								<p class="card-tag-client-stories">Client Stories</p>
							</a>
							<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
							<p><?php echo get_field('short_description') ?></p>	
								<a href="<?php the_permalink(); ?>" class="btn-arrow">How Octiv Helped</a>
						</div>
					</div>
				<?php endwhile; endif; wp_reset_query(); ?>
				</div>
		<?php endif; ?>
		</div>
	</section>
<?php endif; ?>





<?php get_footer(); ?>