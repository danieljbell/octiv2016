<?php
$user = 'octiv';
$pass = 'D@n13lR0cks!';
$context = stream_context_create(array(
	'http' => array(
		'header'  => "Authorization: Basic " . base64_encode("$user:$pass")
	)
));
?>

<?php get_header(); ?>

<?php $rand_num2 = mt_rand(1,4); ?>

<?php
	// get the terms
	$categories = get_categories('taxonomy=feature_type');

	// create and empty array to fill with the acf order
	$sorted_cats = array();

	// loop through each term and push to the $sorted_cats array
	foreach($categories as $cat){
		$ordr = get_field( 'order', $cat );
		$sorted_cats[$ordr] = $cat;
	}

	// sort the cats ASC
	ksort($sorted_cats);

  $rand_num = mt_rand(1,4);
?>

<div class="fixed-hero-section" style="background-image: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)), url(/wp-content/themes/octiv2016/dist/img/octiv-pattern.svg), url(/wp-content/uploads/2017/06/generic-<?php echo $rand_num; ?>.jpg);">
  <div class="site-width centered">
    <h1 class="white-text">Platform <?php echo str_replace('Archives: ','',get_the_archive_title()); ?></h1>
    <div class="two-third-only">
      <div class="white-text">
        <p class="font-bump">Explore Octiv’s products and services by category, function, and utility. You can combine multiple components of the platform to solve for your business use cases.</p>
      </div>
    </div>
    <a href="/tour" class="rad-modal-button btn-primary">See How Octiv Works</a>
  </div>
</div>

<?php get_template_part('partials/display', 'breadcrumbs'); ?>

<section>
  <div class="site-width">
    <div class="fourth-3-fourth">
      <div class="sticky-sidebar" id="sticky-sidebar">
        <h4><?php echo str_replace('Archives: ', '', get_the_archive_title()); ?></h4>
        <hr>
        <?php
          echo '<ul class="nav sidebar-links" id="sidebar-links">';
          foreach($sorted_cats as $term) {
              echo '<li><a href="#' . $term->slug . '">' . $term->name . '</a></li>';
          }
          echo '</ul>';
        ?>
      </div>
      <div class="sticky-listing">
        <?php
          $i = 0;
          foreach($sorted_cats as $custom_term) {
            wp_reset_query();
            $args = array(
              'post_type' => 'features',
              'posts_per_page' => -1,
							'orderby' => 'menu_order',
							'order' => 'ASC',
              'tax_query' => array(
                array(
                  'taxonomy' => 'feature_type',
                  'field' => 'slug',
                  'terms' => $custom_term->slug,
                ),
              ),
            );
          $loop = new WP_Query($args);
          $i++;
          if($loop->have_posts()) {
            echo '<section style="padding-top: 0;">';
            echo '<h3 id="' . $custom_term->slug . '">' . $custom_term->name . '</h3>';
						echo '<p>' . $custom_term->description . '</p>';
            echo '<div class="third">';
            while($loop->have_posts()) : $loop->the_post();
              $tag = get_field('status');
              if ($tag[0] == 'roadmap') {
                $tag = 'roadmap';
              }
              if ($tag[0] == 'beta') {
                $tag = 'beta';
              }
              echo do_shortcode('[get_card excerpt="true" tag="' . $tag . '"]');
            endwhile;
            echo '</div>';
           }
           if ($custom_term->slug === 'document-generation') {
            echo '<div class="centered box" style="background-image: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)), url(/wp-content/uploads/2017/06/generic-' . $rand_num2 . '.jpg); background-size: cover; background-position: center; padding: 3rem;">';
              echo '<h2 class="white-text">Experience Octiv\'s Document Generation</h2>';
              echo '<p class="white-text">Create a personalized document based on your interests.</p>';
              echo '<a href="/experience" class="btn-primary">Create Document Now</a>';
            echo '</div>';
           }
            echo '</section>';
      } ?>
      </div>
    </div>
  </div>
</section>



<?php get_footer(); ?>
