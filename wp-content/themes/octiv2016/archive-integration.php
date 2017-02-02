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

<div class="fixed-hero-section">
  <div class="site-width white-text centered">
    <div style="fill: #fff; max-width: 125px; margin-bottom: 0.5rem; filter: drop-shadow(0 0 8px rgba(0,0,0,0.75));"><?php echo file_get_contents('./wp-content/uploads/2017/01/integrations.svg', false, $context); ?></div>
    <h1>Platform <?php echo str_replace('Archives: ','',get_the_archive_title()); ?></h1>
    <div class="two-third-only">
      <div>
        <p class="font-bump">The Octiv API enables seamless integrations with CRM, CPQ, ERP, ECM, HRIS and another systems. This allows Octiv to pull data from various systems and assemble accurate, personalized documents.</p>
      </div>
    </div>
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
          $terms = get_terms( array(
              'taxonomy' => 'integration_type',
              'hide_empty' => false,
          ) );
          if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
              echo '<ul class="nav sidebar-links" id="sidebar-links">';
              foreach ( $terms as $term ) {
                  echo '<li><a href="#' . $term->slug . '">' . $term->name . '</a></li>';
              }
              echo '</ul>';
          }
        ?>
      </div>
      <div class="sticky-listing">
        <?php
          $custom_terms = get_terms('integration_type');
          $i = 0;
          foreach($custom_terms as $custom_term) {
            wp_reset_query();
            $args = array(
              'post_type' => 'integration',
              'posts_per_page' => -1,
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
              echo '<div style="padding: 4rem;">';
                echo '<a href="' . get_the_permalink() . '" style="position: absolute; top: 50%; transform: translate(-50%, -50%); left: 50%;"><img src="' . get_field('integration_logo') . '" alt="' . get_the_title() . '"></a>';
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
