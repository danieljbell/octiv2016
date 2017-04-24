<?php

get_header();

$url = $_SERVER['REQUEST_URI'];

$parsed_url = explode( '/', $url );

$support_category = $parsed_url[2];

$support_cat_string = explode( '-', $support_category);

$formatted_cat = ucwords(strtolower($support_cat_string[0] . ' ' . $support_cat_string[1]));

$queried_object = get_queried_object();
$taxonomy = $queried_object->taxonomy;
$term_id = $queried_object->term_id;

$webinar_source = get_field('webinar_source', $queried_object);



?>

<div class="fixed-hero-section">
	<div class="site-width centered">
		<h1 class="white-text">
			<?php if($post->post_parent > 0) :
							echo $formatted_cat . ' ';
							the_title();
						else :
							the_title();
						endif;?>
		</h1>
	</div>
</div>

<?php get_template_part('partials/display', 'breadcrumbs'); ?>


<section>
	<div class="site-width">
		<?php if (get_field( 'resource_type' ) === 'faq') : ?>
		<?php echo '<style>' . get_field('custom_css') . '</style>'; ?>
			<h2><?php echo ucwords(get_field( 'resource_type' )); ?></h2>
			<?php the_content(); ?>
		<?php else: ?>

			<?php
				// This styles the child page
				if ($post->post_parent > 0) :
			?>
				<?php
					// If webinar source is true, then use this layout.
					if ($webinar_source) :
				?>
					<h2 class="mar-b"><?php echo ucwords(get_field( 'resource_type' )); ?> Details</h2>
					<div class="video-outer mar-b">
						<div class="video-inner">
							<iframe src="<?php echo $webinar_source; ?>" frameborder="0" width="100%" height="100%"></iframe>
						</div>
					</div>
					<?php the_content(); ?>
				<?php
					// If webinar source is false, use this layout.
					else :
				?>
					<div class="two-third">
						<div>
							<h2><?php echo ucwords(get_field( 'resource_type' )); ?> Details</h2>
							<?php the_content(); ?>
						</div>
						<div class="box" id="sidebar-form">
							<?php
								echo '<script src="//app-sj20.marketo.com/js/forms2/js/forms2.min.js"></script>';
								echo '<form id="mktoForm_' . get_field('form_source') . '"></form>';
								echo '<script>MktoForms2.loadForm("//app-sj20.marketo.com", "625-MXY-689", ' . get_field('form_source') . ', function(form) {
										form.onSuccess(function(values, followUpUrl) {
			                form.getFormElem().hide();
			                var boxContainer = document.querySelector("#sidebar-form");
			                boxContainer.innerHTML = "<div class=\"centered\"><h2>Thanks for Registering!</h2><p>You will receive an email confirmation shortly.</p></div>";
			                return false;
										})
								});</script>';
							?>
						</div>
				<?php endif; ?>

			<?php
				// This styles the parent page
				else :
			?>
		<div class="two-third">

				<div>
					<h2>About the Release</h2>
					<div class="post-content"><?php the_content(); ?></div>
					<p class="pad-t">&nbsp;</p>
					<h2 class="pad-t"><?php the_title(); ?>'s Release Notes</h2>
					<p>The following features are included in the release. Please click the links below for descriptions of each new enhancement and update.</p>
					<dl class="accordian">
						<dt><h3>Released</h3></dt>
						<dd>
							<p class="brand-callout" style="color: #fff; padding: 1rem; font-weight: bold; margin-top: -1rem; margin-bottom: 2rem;">Released - Fully released updates that are now generally available for applicable customers.</p>
							<dl class="accordian">
								<?php
									if ( have_rows('launched') ) :
									while ( have_rows('launched') ) : the_row();
										echo '<dt><h4>' . get_sub_field('launched_feature') . '</h4></dt>';
										echo '<dd>';
										echo '<p>' . get_sub_field('launched_description') . '</p>';
										if (get_sub_field('feature_released')) :
											echo '<p><strong>Released on: </strong><br>' . get_sub_field('feature_released') . '</p>';
										endif;
										echo '<p><strong>Feature Impact:</strong><br>' . get_sub_field('feature_impact') . '</p>';
										echo '<p><strong>Available Plan:</strong><br>' . get_sub_field('available') . '</p>';
										if (get_sub_field('link_source')) :
											echo '<a href="' . get_sub_field('link_source') . '" class="btn-primary" style="margin-top: 1rem;">Learn More</a>';
											if (get_sub_field('feature_image')) :
												echo '<button class="mar-l btn-arrow" data-img-text="' . get_sub_field('launched_feature') . '" data-img="' . get_sub_field('feature_image') . '">View Screenshot</button>';
											endif;
											else :
												if (get_sub_field('feature_image')) :
													echo '<button class="btn-arrow" data-img-text="' . get_sub_field('launched_feature') . '" data-img="' . get_sub_field('feature_image') . '">View Screenshot</button>';
												endif;
										endif;
										echo '</dd>';
									endwhile;
									else :
										echo '<p style="padding-left: 1rem;">No released features at this time</p>';
									endif;
								?>
							</dl>
						</dd>
						<dt><h3>Planned</h3></dt>
						<dd>
							<p class="brand-callout" style="color: #fff; padding: 1rem; font-weight: bold; margin-top: -1rem; margin-bottom: 2rem;">Planned - Updates that are currently planned for release and are not yet available.</p>
							<dl class="accordian">
								<?php
									if ( have_rows('planned') ) :
									while ( have_rows('planned') ) : the_row();
										echo '<dt><h4>' . get_sub_field('planned_feature') . '</h4></dt>';
										echo '<dd>';
										if (get_sub_field('feature_image')) :
											echo '<img src="' . get_sub_field('feature_image') . '" alt="Product Screenshot">';
										endif;
										echo '<p>' . get_sub_field('planned_description') . '</p>';
										if (get_sub_field('feature_released')) :
											echo '<p><strong>Planned for: </strong><br>' . get_sub_field('feature_released') . '</p>';
										endif;
										echo '<p><strong>Feature Impact:</strong><br>' . get_sub_field('feature_impact') . '</p>';
										echo '<p><strong>Available Plan:</strong><br>' . get_sub_field('available') . '</p>';
										if (get_sub_field('link_source')) :
											echo '<a href="' . get_sub_field('link_source') . '" class="btn-primary" style="margin-top: 1rem;">Learn More</a>';
										endif;
										echo '</dd>';
									endwhile;
									else :
										echo '<p style="padding-left: 1rem;">No planned features at this time</p>';
									endif;
								?>
							</dl>
						</dd>
					</dl>
				</div>
				<div>
					<h2>Release Resources</h2>
					<?php
						$args = array(
							'post_type' => 'releases',
							'post_parent' => $post->ID,
							'order'	=> 'ASC',
						);
						$query_children = new WP_Query( $args );
						if ($query_children->have_posts()) :
						while ($query_children->have_posts()) :
						$query_children->the_post();
					?>
						<div class="card sidebar-card">
							<a href="<?php the_permalink(); ?>" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>);"></a>
							<div>
								<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
								<p><br><a href="<?php the_permalink(); ?>" class="btn-arrow">
									<?php
										if (get_field( 'resource_type' ) === 'faq') :
											echo 'Read FAQ';
										else :
											if (get_field( 'webinar_source' ) === '')  :
												echo 'Register Now';
											else :
												echo 'Watch Webinar';
											endif;
										endif;
									?>
								</a></p>
							</div>
						</div>
					<?php
						endwhile;
						else :
							echo 'Resources are coming soon, stay tuned!';
						endif;
						wp_reset_query();
					?>
				</div>
			<?php endif; ?>
		</div>
		<?php endif; ?>

	</div>
</section>

<?php // get_template_part('partials/display', 'newsletter-section'); ?>


<?php get_footer(); ?>
