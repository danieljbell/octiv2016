<?php
/*
==============================
Template Name: Resources Page
==============================
*/

get_header();

?>


<div class="fixed-hero-section" style="background-image: radial-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0)), linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(/wp-content/uploads/2017/06/resources.jpg);">
	<div class="site-width centered pos-rel" style="z-index: 2;">
		<h1 class="white-text">We've Got the Resources You Need to Boost Your Bottom Line</h1>
		<div class="two-third-only white-text">
			<div class="font-bump">
				<p>Browse our webinars, whitepapers and more to learn about how digital document generation can boost productivity.</p>
			</div>
		</div>
		<a href="/tour" class="btn-primary">Take A Guided Tour Now</a>
	</div>
</div>

<?php get_template_part('partials/display', 'breadcrumbs'); ?>

<section class="featured-section">
	<div class="site-width">
		<div class="two-third">
				<?php
				// GET MOST RECENT PUBLISHED BLOG POST
					$args = array('post_type' => 'post','posts_per_page' => 1);
					$featured_query = new WP_Query( $args );
					if ( $featured_query->have_posts() ) : while ( $featured_query->have_posts() ) : $featured_query->the_post();
				?>
					<figure style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>);">
						<a href="<?php the_permalink(); ?>" title="From the Blog: <?php the_title(); ?>" style="position: absolute; top: 0; right: 0; bottom: 0; left: 0;"></a>
						<figcaption>
							<h4>From the Blog</h4>
							<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
						</figcaption>
					</figure>
				<?php endwhile; endif; wp_reset_query();?>
			<div>
				<?php
					$args = array('post_type' => 'page', 'posts_per_page' => 1, 'post_parent' => 65);
					$whitepaper_query = new WP_Query( $args );
					if ( $whitepaper_query->have_posts() ) : while ( $whitepaper_query->have_posts() ) : $whitepaper_query->the_post();
				?>
					<article class="whitepaper brand-two-callout">
						<div>
							<a href="<?php the_permalink(); ?>"><img src="<?php echo get_field('cover_image'); ?>" alt="<?php the_title(); ?>"></a>
						</div>
						<div>
							<h4>Whitepaper</h4>
							<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
						</div>
					</article>
				<?php endwhile; endif; wp_reset_query(); ?>
				<?php
					$args = array('post_type' => 'page', 'posts_per_page' => 1, 'post_parent' => 74);
					$client_story_query = new WP_Query( $args );
					if ( $client_story_query->have_posts() ) : while ( $client_story_query->have_posts() ) : $client_story_query->the_post();
				?>
					<article class="client-story pos-rel" style="background-image: linear-gradient(rgba(255,255,255,0.85), rgba(255,255,255,0.85)), url(<?php echo get_field('client_testimonial_image') ?>);">
						<img src="<?php echo get_field('client_logo'); ?>" alt="<?php echo get_field('client_testimonial_company'); ?>">
						<a href="<?php the_permalink(); ?>" class="btn-secondary-outline">Read Case Study</a>
					</article>
				<?php endwhile; endif; wp_reset_query(); ?>
			</div>
		</div>
	</div>
</section>

<?php // get_template_part('partials/display', 'newsletter-section'); ?>

<section>
	<div class="site-width">
		<div class="tabs">
			<h6>Blog</h6>
			<div class="tabbody">
				<?php
					$args = array( 'post_type' => 'post', 'posts_per_page' => 6 );
					$query = new WP_Query( $args );
					if ( $query->have_posts() ) :
						echo '<div class="third">';
						while ( $query->have_posts() ) :
							$query->the_post();
								echo do_shortcode('[get_card thumb="true" excerpt="true" tag="blog"]');
						endwhile;
						echo '</div>';
						echo '
							<div class="third-only">
								<div class="centered"><a href="/resources/blog" title="View More" class="btn-primary-outline">View More</a></div>
							</div>
						';
					endif;
					wp_reset_query();
				?>
			</div>
			<h6>Client Stories</h6>
			<div class="tabbody">
				<?php
						$args = array( 'post_type' => 'page', 'post_parent' => 74, 'posts_per_page' => 6 );
						$query = new WP_Query( $args );
						if ( $query->have_posts() ) :
							echo '<div class="third">';
							while ( $query->have_posts() ) :
								$query->the_post();
									echo do_shortcode('[get_card thumb="true" excerpt="custom" tag="client-stories"]');
							endwhile;
							echo '</div>';
							echo '
							<div class="third-only">
								<div class="centered"><a href="/resources/client-stories" title="View More" class="btn-primary-outline">View More</a></div>
							</div>
						';
						endif;
						wp_reset_query();
					?>
			</div>
			<h6>Webinars</h6>
			<div class="tabbody">
				<?php
						$args = array( 'post_type' => 'page', 'post_parent' => 207, 'posts_per_page' => 6 );
						$query = new WP_Query( $args );
						if ( $query->have_posts() ) :
							echo '<div class="third">';
							while ( $query->have_posts() ) :
								$query->the_post();
									echo do_shortcode('[get_card thumb="true" excerpt="custom" tag="webinars"]');
							endwhile;
							echo '</div>';
							echo '
							<div class="third-only">
								<div class="centered"><a href="/resources/webinars" title="View More" class="btn-primary-outline">View More</a></div>
							</div>
						';
						endif;
						wp_reset_query();
					?>
			</div>
			<h6>Whitepapers</h6>
			<div class="tabbody">
				<?php
						$args = array( 'post_type' => 'page', 'post_parent' => 65, 'posts_per_page' => 6 );
						$query = new WP_Query( $args );
						if ( $query->have_posts() ) :
							echo '<div class="third">';
							while ( $query->have_posts() ) :
								$query->the_post();
									echo do_shortcode('[get_card thumb="true" excerpt="custom" tag="whitepapers"]');
							endwhile;
							echo '</div>';
							echo '
							<div class="third-only">
								<div class="centered"><a href="/resources/whitepapers" title="View More" class="btn-primary-outline">View More</a></div>
							</div>
						';
						endif;
						wp_reset_query();
					?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
