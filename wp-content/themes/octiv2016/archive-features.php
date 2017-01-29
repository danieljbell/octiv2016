<?php get_header(); ?>

<div class="fixed-hero-section">
  <div class="site-width white-text centered">
    <svg fill="#fff" style="filter: drop-shadow(0px 0px 8px rgba(0,0,0,1)); margin-bottom: 1.5rem;">
      <use xlink:href="#icon-handshake">
    </svg>
    <h1>Platform <?php echo str_replace('Archives: ','',get_the_archive_title()); ?></h1>
    <div class="two-third-only">
      <div>
        <p class="font-bump">Explore Octiv’s products and services by category, function, and utility. You can combine multiple components of the platform to solve for your business use cases.</p>
      </div>
    </div>
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
          $terms = get_terms( array(
              'taxonomy' => 'feature_type',
              'orderby' => 'id',
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
          $custom_terms = get_terms( array(
            'taxonomy' => 'feature_type',
            'orderby' => 'id'
          ) );
          $i = 0;
          foreach($custom_terms as $custom_term) {
            wp_reset_query();
            $args = array(
              'post_type' => 'features',
              'posts_per_page' => -1,
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
            echo '<h3 id="' . $custom_term->slug . '" style="padding-bottom: 0.5rem;">' . $custom_term->name . '</h3>';
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

<?php get_footer(); ?>