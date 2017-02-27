

<?php get_header(); ?>

<div class="fixed-hero-section">
	<div class="site-width">
		<div class="white-text">
			<div class="half">
				<div>
					<h1>Support Portal</h1>
					<p>Search or view all categories.</p>
				</div>
				<div>
					<form role="search" method="get" action="<?php echo site_url(); ?>">
						<input type="text" name="s" placeholder="Search Octiv Support" style="box-shadow: 0 0 15px rgba(0,0,0,0.6); text-align: center;">
						<input type="hidden" name="post_type" value="support" />
					</form>
				</div>
			</div>
			<hr>
			<br>
				<div class="half" style="background-color: transparent;">
					<div>
						<h1>Need More Help?</h1>
						<p>Click the button if you need assistance from Octiv. If your request is urgent, please call global support 24 hours a day at <a href="tel:844-906-2848" style="color: #fff;">844-906-2848</a></p>
					</div>
					<div>
			    	<button id="submit-ticket" class="btn-primary" style="padding: 1rem; box-shadow: 0 0 15px rgba(0,0,0,0.6); display: block; width: 100%;">Submit a "Help Me" Ticket</button>
					</div>
				</div>
			</div>
	  </div>
	</div>
</div>

<?php get_template_part('partials/display', 'breadcrumbs'); ?>

<section>
	<div class="site-width">
		<div class="fourth">
			<?php
				$args = array(
					'post_type'	=> 'support',
					'post_parent' => 0
				);

				$support_query = new WP_Query( $args );

				if ($support_query->have_posts()) :
					while ($support_query->have_posts()) :
						$support_query->the_post();
						echo do_shortcode('[get_card thumb="true"]');
					endwhile;
				endif;
				wp_reset_query();
			?>
			<div class="card">

				<a href="<?php echo site_url(); ?>/releases" style="background-image: url(/wp-content/uploads/2016/08/releases.png);" class="card-tb"></a>
				<div>
					<h4><a href="<?php echo site_url(); ?>/releases">Releases</a></h4>
					<p>&nbsp;</p>
					<a href="<?php echo site_url(); ?>/releases" class="btn-arrow">View More</a>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
