<?php get_header(); ?>

<?php $rand_num = mt_rand(1,4); ?>

<div class="fixed-hero-section" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(/wp-content/themes/octiv2016/dist/img/octiv-pattern.svg), url(/wp-content/uploads/2017/06/generic-<?php echo $rand_num; ?>.jpg);">
	<div class="site-width white-text centered">
		<div class="two-third-only">
			<div style="margin-bottom: 0;">
				<h1>Get ready for the next release</h1>
				<p class="font-bump" style="margin-bottom: 0;">If you administer or configure Octiv products and services, watch this page for the latest information about upcoming product releases.</p>
			</div>
		</div>
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
