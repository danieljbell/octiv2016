<?php get_header(); ?>

<div class="fixed-hero-section">
	<div class="site-width white-text">
		<h1>Search For: <?php echo get_search_query(); ?></h1>
	</div>
</div>

<section>
	<div class="site-width">
		<?php
			if ( have_posts() ) :
				echo '<div class="fourth">';
				while ( have_posts() ) :
					the_post();
					echo do_shortcode('[get_card]');
				endwhile;
				echo '</div>';
			else :
				echo '<p>Sorry, there is nothing related to ' . get_search_query() .' currently on the site. Please reach out to our support team for help.</p><button id="submit-ticket" class="btn-primary">Submit Support Ticket</button>';
			endif;
			wp_reset_query();
		?>
	</div>
</section>


<?php get_footer(); ?>
