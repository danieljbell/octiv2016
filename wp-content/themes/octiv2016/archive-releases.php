<?php get_header(); ?>

<div class="fixed-hero-section">
	<div class="site-width white-text centered">
		<section>
			<div class="two-third-only">
				<div style="margin-bottom: 0;">
					<h1>Get ready for the next release</h1>
					<p class="font-bump" style="margin-bottom: 0;">If you administer or configure Octiv products and services, watch this page for the latest information about upcoming product releases.</p>
				</div>
			</div>
		</section>
	</div>
</div>

<?php get_template_part('partials/display', 'breadcrumbs'); ?>

<section>
	<div class="site-width">
		<h2>Upcoming Releases</h2>
		<div class="third">
			<?php
			// global date param
			$today = date('Ymd');

			// setting up args for upcoming events
			$upcoming_args = array (
			    'post_type' => 'releases',
			    'post_parent' => 0,
			    'meta_query' => array(
					array(
				        'key'		=> 'release_date',
				        'compare'	=> '>=',
				        'value'		=> $today,
				    )
			    ),
			);

			//query for upcoming posts
			$posts = get_posts( $upcoming_args );

			//loop through upcoming posts
			foreach ( $posts as $post ) : setup_postdata( $post );
				echo do_shortcode('[get_card thumb="true" excerpt="custom"]');
			endforeach; wp_reset_postdata();?>
		</div>
	</div>
</section>

<section class="white-bg">
	<div class="site-width">
		<h2>Past Releases</h2>
		<div class="third">
		<?php
			// setting up args for past events
			$past_args = array (
			    'post_type' => 'releases',
			    'post_parent' => 0,
			    'meta_query' => array(
					array(
				        'key'		=> 'release_date',
				        'compare'	=> '<',
				        'value'		=> $today,
				    )
			    ),
			);

			//query for upcoming posts
			$posts = get_posts( $past_args );

			//loop through upcoming posts
			foreach ( $posts as $post ) : setup_postdata( $post );
				echo do_shortcode('[get_card thumb="true" excerpt="custom"]');
			endforeach; wp_reset_postdata();?>
			</div>
	</div>
</section>

<?php get_footer(); ?>
