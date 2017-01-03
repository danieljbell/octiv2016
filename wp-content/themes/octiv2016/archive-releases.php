<?php get_header(); ?>

<div class="fixed-hero-section">
	<div class="site-width white-text">
		<h1>Releases</h1>
	</div>
</div>

<div class="breadcrumb">
	<div class="site-width">
		<ul>
			<li><a href="/">Home</a></li>
			<li>Releases</li>
		</ul>
	</div>
</div>

<section class="white-bg">
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
