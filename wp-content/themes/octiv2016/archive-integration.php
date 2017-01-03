<?php get_header(); ?>

<div class="fixed-hero-section">
  <div class="site-width white-text">
    <h1><?php echo str_replace('Archives: ','',get_the_archive_title()); ?></h1>
  </div>
</div>

<?php get_template_part('partials/display', 'breadcrumbs'); ?>

<section>
  <!-- <div class="centered-slider">
    <?php
      $args = array(
        'post_type' => 'integration',
        'posts_per_page' => 10
      );

      $query = new WP_Query($args);

      if ($query->have_posts()) :
        while ($query->have_posts()) :
          $query->the_post();
          echo '<div class="card">';
            echo '<div class="">';
              echo '<div class="pos-rel integration-card-bg" style="background-image: url(' . get_field('integration_logo', $post->ID) . '), linear-gradient(#fff, #f0f0f0);">';
                echo '<a href="' . get_the_permalink() . '" style="position: absolute; top: 0; right: 0; bottom: 0; left: 0;" title="' . get_the_title() . '"></a>';
              echo '</div>';
              echo '<h4><a href="' . get_the_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a></h4>';
              echo '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>';
              echo '<a href="' . get_the_permalink() . '" title="' . get_the_title() . '" class="btn-arrow">Learn More</a>';
            echo '</div>';
          echo '</div>';
        endwhile;
      endif;
      wp_reset_query();

    ?>
  </div>
  <div class="centered-slider-buttons"></div>
  <br>
  <br>
  <br> -->
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
            echo '<section style="padding-top: 0;">';
            echo '<h3 id="' . $custom_term->slug . '" style="padding-bottom: 0.5rem;">' . $custom_term->name . '</h3>';
            echo '<div class="third">';
          while($loop->have_posts()) : $loop->the_post();
            echo '<div class="card">';
              echo '<div>';
                echo '<a href="' . get_the_permalink() . '"><img src="' . get_field('integration_logo') . '" alt="' . get_the_title() . '"></a>';
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

<?php get_footer(); ?>
