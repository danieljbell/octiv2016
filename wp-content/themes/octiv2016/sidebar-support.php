<?php 
$parent_page_ID = $post->post_parent;
?>

<?php 

	$args = array(
		'post_type' => 'support',
		'post_parent' => $parent_page_ID,
		'posts_per_page' => 15,
		'orderby' => 'title',
		'order' => 'ASC',
		'post__not_in' => array($post->ID)
	);

	$query = new WP_Query( $args );

	if ( $query->have_posts() ) : 
		echo '<h4>Related Articles</h4><hr><ul>'; 

	while ( $query->have_posts() ) : 
		$query->the_post() 
?>

<li style="font-size: 0.9em;line-height: 1.4em;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		
<?php	endwhile; echo "</ul>"; endif; wp_reset_query(); ?>
