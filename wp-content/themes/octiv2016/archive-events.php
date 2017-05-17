<?php get_header(); ?>

<div class="fixed-hero-section">
  <div class="site-width white-text centered">
    <h1><?php echo str_replace('Archives: ','',get_the_archive_title()); ?></h1>
    <?php
      $local_post_type = get_post_type_object('events');
      echo '<p class="font-bump">' . $local_post_type->description . '</p>';
    ?>
  </div>
</div>

<?php get_template_part('partials/display', 'breadcrumbs'); ?>

<section>
  <div class="site-width">
    <div class="fourth-3-fourth">
      <div class="sticky-sidebar" id="sticky-sidebar">
        <h4><?php echo str_replace('Archives: ','',get_the_archive_title()); ?></h4>
        <hr>
        <?php
          $terms = get_terms( array(
              'taxonomy' => 'event_type',
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
          foreach ($terms as $term) {
            $local_args = array(
              'post_type' => 'events',
              'tax_query' => array(
                array(
                  'taxonomy' => 'event_type',
                  'field' => 'slug',
                  'terms' => $term->slug,
                ),
              ),
            );
            $local_query = new WP_Query($local_args);
            if ($local_query->have_posts()) :
              echo '<section style="padding-top: 0;">';
                echo '<div class="section-menu">';
                  echo '<h3 id="' . $term->slug . '" class="inline">' . $term->name . '</h3>';
                  echo '<p class="inline filter-toggle" style="margin-left: 1rem; font-size: 0.85em;">Show Filters</p>';
                  echo '<div class="filter-container">';
                    echo '<ul class="inline" style="font-size: 0.8em;">';
                    if ($term->name === 'Events') {
                      echo '<li><input type="checkbox" id="upcoming" checked><label for="upcoming">Upcoming Events</label></li>';
                      echo '<li><input type="checkbox" id="past" checked><label for="past">Past Events</label></li>';
                    } else {
                      echo '<li><input type="checkbox" id="thought-leadership" checked><label for="thought-leadership">Thought Leadership</label></li>';
                      echo '<li><input type="checkbox" id="product" checked><label for="product">Product</label></li>';
                      echo '<li><input type="checkbox" id="client" checked><label for="client">Client</label></li>';
                    }
                    echo '</ul>';
                  echo '</div>';
                echo '</div>';
                echo '<div class="third" style="margin-top: 0.5rem;">';
              while ($local_query->have_posts()) :
                $local_query->the_post();
                $today = date('Ymd');
                if ($today <= get_field('event_end_date')) {
                  $class = 'upcoming';
                } else {
                  $class = 'past';
                }
                if (get_field('webinar_type') === 'thought-leadership') {
                  $webinar_type = 'thought-leadership';
                } else if (get_field('webinar_type') === 'product') {
                  $webinar_type = 'product';
                } else if (get_field('webinar_type') === 'client') {
                  $webinar_type = 'client';
                }
                echo do_shortcode('[get_card thumb="true" tag="' . $class . '" class="' . $class . ' ' . $webinar_type . '" excerpt="date"]');
              endwhile;
                echo '</div>';
                echo '<div class="centered"><a href="' . get_term_link($term) . '" class="btn-outline">View All ' . $term->name . '</a></div>';
              echo '</section>';
            endif;
            wp_reset_query();
          }
        ?>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
