<?php
/*
Template Name: Display Authors
*/

// Get all authors order by amount of posts
$users = get_users( array(
  'role__in'    => 'contributor',
  'order'       => 'ASC',
  'orderby'     => 'name'
));

?>

<?php get_header(); ?>

<div class="fixed-hero-section">
	<div class="site-width">
		<h1 class="white-text"><?php the_title(); ?></h1>
	</div>
</div>

<?php get_template_part('partials/display', 'breadcrumbs'); ?>

<section class="white-bg">
	<div class="site-width">
		<div class="third">
			<?php
				foreach($users as $user) : 
					echo '<div class="card sidebar-card">';
				    echo '<a href="' . get_author_posts_url( $user->ID ) . '" style="background-image: url(' . get_cupp_meta($user->ID, "full") . ');" class="card-tb"></a>';
				    echo '<div>';
				    echo '<h4><a href="' . get_author_posts_url( $user->ID ) . '">' . $user->display_name . '</a></h4>';
				    echo '<p>' . $user->job_title . '</p>';
				    echo '<a href="' . get_author_posts_url( $user-> ID ) . '" class="btn-arrow">' . 'See All Articles</a>';
				    echo '</div>';
				  echo '</div>';
				endforeach;
			?>
		</div>
	</div>
</section>

<?php get_footer(); ?>