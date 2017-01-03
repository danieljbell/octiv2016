<div class="post-author">
	<div><img src="<?php echo get_cupp_meta($user->ID, "full"); ?>" alt="<?php echo get_the_author(); ?>"></div>
	<div><a href="<?php echo get_author_posts_url($post->post_author); ?>"><?php echo get_the_author(); ?></a><br><?php echo get_the_date(); ?></div>
</div>

<div class="newsletter-signup">
	<h2>Subscribe for updates</h2>
	<iframe src="http://www2.octiv.com/l/18292/2016-07-13/4y972w" frameborder="0" width="100%" height="115"></iframe>
</div>

<div class="ad-container">
	<?php 
		$args = array(
			'post_type' => 'page',
			'post_parent' => 65,
			'posts_per_page' => 1 
		);

		$whitepaper_ad = new WP_Query( $args );

		if ($whitepaper_ad->have_posts()) : while ($whitepaper_ad->have_posts()) : $whitepaper_ad->the_post(); ?>
			<a href="<?php the_permalink(); ?>"><img src="<?php echo get_field('cover_image'); ?>" alt="<?php the_title(); ?>"></a>
			<p><strong>Free Whitepaper:</strong><br><?php the_title(); ?></p>
			<a href="<?php the_permalink(); ?>" class="btn-white-outline">Download the Book</a>
		<?php endwhile; endif; wp_reset_query(); ?>
</div>