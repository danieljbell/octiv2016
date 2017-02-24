<div class="client-testimonials">
	<?php

		$args = array(
			'post_type' => 'page',
			'post_parent' => 74,
			'posts_per_page' => -1,
			'order' => 'DESC',
			'order_by' => 'name',
			'post_status'   => 'publish'
		);

		$query = new WP_Query( $args );

		if ( $query->have_posts() ) :
			echo '<section class=" slider-nav-section" style="background-color: #f0f0f0; padding: 1rem 0;"><div class="slider-nav">';
			echo '<div><img src="/wp-content/uploads/2017/02/GE.png" alt=""></div>';
				while ( $query->have_posts() ) :
					$query->the_post();
						echo
							'<div><img src="' . get_field('client_logo') . '" alt="' . get_field('client_testimonial_company') . '"></div>';
				endwhile;
			echo '</div></section>';
		$query->rewind_posts();
		echo '<div class="slider-for" role="list">';
		echo '<div role="listitem" style="background-image: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)), url(/wp-content/uploads/2017/02/ge-slider-bg.jpg);">
			<div class="site-width">
				<div class="centered">
					<img src="https://octiv.com/wp-content/uploads/2017/02/GE.png" alt="">
				</div>
				<div>
					<h4>Before Octiv, GE Global Operations had an inefficient contract creation workflow. With Octiv, they\'ve saved a year of man hours in just six months.</h4>
				</div>
			</div>
		</div>';
		while ( $query->have_posts() ) :
			$query->the_post();
				echo
					'<div role="listitem" style="background-image: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)), url(' . get_field('client_testimonial_image') . ');">
						<div class="site-width">
							<div class="centered">
								<img src="' . get_field('client_logo') . '" alt="' . get_field('client_testimonial_company') . '">
								<br>
								<a href="' . get_the_permalink() . '" class="btn-white-outline">Read Case Study</a>
							</div>
							<div>
								<h4>' . get_field('client_testimonial') . '</h4>
							</div>
						</div>
					</div>';
		endwhile;
		echo '</div>';
	endif;
		wp_reset_query();
	?>
</div>
