<?php
$user = 'octiv';
$pass = 'D@n13lR0cks!';
$context = stream_context_create(array(
	'http' => array(
		'header'  => "Authorization: Basic " . base64_encode("$user:$pass")
	)
));

$rand_num = mt_rand(1,4);
?>

<?php get_header(); ?>

<?php
	// get the terms
	$categories = get_categories('taxonomy=integration_type');

	// create and empty array to fill with the acf order
	$sorted_cats = array();

	// loop through each term and push to the $sorted_cats array
	foreach($categories as $cat){
		$ordr = get_field( 'order', $cat );
		$sorted_cats[$ordr] = $cat;
	}

	// sort the cats ASC
	ksort($sorted_cats);
?>



<div class="fixed-hero-section" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(/wp-content/themes/octiv2016/dist/img/octiv-pattern.svg), url(/wp-content/uploads/2017/06/generic-<?php echo $rand_num; ?>.jpg);">
  <div class="site-width centered">
    <h1 class="white-text">Platform <?php echo str_replace('Archives: ','',get_the_archive_title()); ?></h1>
    <div class="two-third-only white-text">
      <div>
        <p class="font-bump">The Octiv API enables seamless integrations with CRM, CPQ, ERP, ECM, HRIS and other systems. This allows Octiv to pull data from various systems and assemble accurate, personalized documents.</p>
      </div>
    </div>
    <a href="/tour" class="btn-primary">Tour the Platform</a>
  </div>
</div>

<?php get_template_part('partials/display', 'breadcrumbs'); ?>

<section>
  <div class="site-width">
    <div class="fourth-3-fourth">
      <div class="sticky-sidebar" id="sticky-sidebar">
        <h4>Integrations</h4>
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
              'post_type' => 'integration',
              'posts_per_page' => -1,
							'orderby' => 'menu_order',
							'order' => 'ASC',
              'tax_query' => array(
                array(
                  'taxonomy' => 'integration_type',
                  'field' => 'slug',
                  'terms' => $custom_term->slug,
                ),
              ),
            );
          $loop = new WP_Query($args);
          $i++;
          if($loop->have_posts()) {
						// echo file_get_contents('./wp-content/uploads/2017/01/wrench.svg', false, $context);
						// $slug = $custom_term->slug;
						// $slug = './wp-content/uploads/2017/01/' . $slug . '.svg';
            echo '<section style="padding-top: 0;">';
						// echo '<div class="section-title-container">';
		        //   echo '<div>' . file_get_contents($slug, false, $context) . '</div>';
	          //   echo '<h3 id="' . $custom_term->slug . '" style="padding-bottom: 0.5rem;">' . $custom_term->name . '</h3>';
						// echo '</div>';
						  echo '<h3 id="' . $custom_term->slug . '" style="padding-bottom: 0.5rem;">' . $custom_term->name . '</h3>';
            echo '<div class="third">';
          while($loop->have_posts()) : $loop->the_post();
            echo '<div class="card pos-rel">';
              echo '<div style="padding: 4rem; background-image: url(' . get_field('integration_logo') . '); background-repeat: no-repeat; background-position: center; background-size: 65% 65%;">';
                echo '<a href="' . get_the_permalink() . '" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0;" title="' . get_the_title() . '"></a>';
              echo '</div>';
            echo '</div>';
          ?>
    <?php endwhile;
            echo '</div>';
         }
            echo '</section>';
      } ?>
      </div>
    </div>
  </div>
</section>

<!--<style>
.section-title-container {
	display: flex;
}
.section-title-container div {
	margin-right: 0.5rem;
}
.section-title-container svg {
	width: 100%;
	max-height: 35px;
	max-width: 35px;
	fill: #ed4c06;
}
</style>-->

<?php get_footer(); ?>
