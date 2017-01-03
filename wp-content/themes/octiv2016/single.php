<?php

$url = $_SERVER['REQUEST_URI'];
$parsed_url = explode( '/', $url );
$cat = ucwords($parsed_url[1]);
$explode_cat = explode( '-', $cat);
$formatted_cat = ucwords(strtolower($explode_cat[0] . ' ' . $explode_cat[1]));

get_header();

if ( have_posts() ) :
while ( have_posts() ) :
the_post();

// 20160901 - DK New Media - Updated all template and upload URL paths to WordPress dynamic instead of hard-coding them

$upload_dir = wp_upload_dir(); ?>

<div class="fixed-hero-section" style="background-image: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)), url(<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>);">
	<div class="site-width centered white-text">
		<h1><?php the_title(); ?></h1>
	</div>
</div>

<?php get_template_part('partials/display', 'breadcrumbs'); ?>

<section>
	<div class="site-width">
		<div class="post-content">
			<div class="two-third">
				<div class="post-main">
					<?php the_content(); ?>
					<?php // get_template_part('partials/display', 'advertisement'); ?>
					<div class="post-sharing">
						<h4>Share this Article:</h4>
						<a href="http://twitter.com/intent/tweet?url=<?php echo the_permalink(); ?>&text=<?php echo the_title(); ?>" target="_blank"><svg viewBox="0 0 10 10"><use xlink:href="#icon-twitter"></svg></a>
						<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" target="_blank"><svg viewBox="0 0 10 10"><use xlink:href="#icon-linkedin"></svg></a>
						<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><svg viewBox="0 0 10 10"><use xlink:href="#icon-facebook"></svg></a>
					</div>
					<div class="post-meta">
						<div>
							<img src="<?php echo get_cupp_meta($user->ID, "full"); ?>" alt="<?php echo get_the_author(); ?>">
						</div>
						<div>
							<a href="<?php echo get_author_posts_url($post->post_author); ?>">
								<strong><?php echo get_the_author(); ?></strong>
							</a>
							<em><?php echo the_author_meta('user_description'); ?></em>
							<br>
							<?php if (get_the_author_meta('twitter')) : ?>
							Follow on: <a href="http://twitter.com/<?php echo the_author_meta('twitter'); ?>" target="_blank">@<?php echo the_author_meta('twitter'); ?></a>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<aside class="post-sidebar"><?php get_sidebar(); ?></aside>
			</div>
		</div>
		<hr class="hide-lg">
	</div>
</section>

<section class="white-bg">
	<div class="site-width related-articles">
		<h3 class="centered">You may also like...</h3>
		<div class="third">
			<?php
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => 4,
					'post__not_in' => array($post->ID)
				);

				$related = new WP_Query( $args );

				if ( $related->have_posts() ) :
					while ( $related->have_posts() ) :
						$related->the_post();
						echo do_shortcode('[get_card thumb="true" excerpt="true"]');
					endwhile;
				endif;
				wp_reset_query();
			?>
		</div>
	</div>
</section>



<?php endwhile; endif; ?>


<script type="text/javascript" async src="https://platform.twitter.com/widgets.js"></script>
<?php get_footer(); ?>
