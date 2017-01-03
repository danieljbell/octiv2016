<?php get_header(); ?>

<div class="fixed-hero-section">
  <div class="site-width white-text">
    <h1><?php echo str_replace('Archives: ','',get_the_archive_title()); ?></h1>
  </div>
</div>

<?php get_template_part('partials/display', 'breadcrumbs'); ?>

<section>
  <div class="site-width">
    <div class="fourth-3-fourth">
      <div class="sticky-sidebar" id="sticky-sidebar">
        <h4>Catalog</h4>
        <hr>
        <?php
          $terms = get_terms( array(
              'taxonomy' => 'catalog_type',
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
          $custom_terms = get_terms('catalog_type');
          $i = 0;
          foreach($custom_terms as $custom_term) {
            wp_reset_query();
            $args = array(
              'post_type' => 'catalog',
              'posts_per_page' => -1,
              'tax_query' => array(
                array(
                  'taxonomy' => 'catalog_type',
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
            if ($tag == 'roadmap') {
              $tag = 'roadmap';
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