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
        <div class="mar-t"></div>
        <h4>Filters</h4>
        <hr>
        <ul class="no-bull filter-container">
          <li><input type="checkbox" id="upcoming" checked><label for="upcoming">Upcoming Events</label></li>
          <li><input type="checkbox" id="past" checked><label for="past">Past Events</label></li>
        </ul>
      </div>
      <div class="sticky-listing">
        <?php
          foreach ($terms as $term) {
            $local_args = array(
              'post_type' => 'events',
              'posts_per_page' => 6,
              'order' => 'DESC',
              'orderby' => 'meta_value',
              'meta_key' => 'event_start_date',
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
                echo '</div>';
                echo '<div class="third" style="margin-top: 0.5rem;">';
              while ($local_query->have_posts()) :
                $local_query->the_post();
                $today = date('Ymd');
                if (!get_field('event_end_date')) {
                  if ($today <= get_field('event_start_date')) {
                    $class = 'upcoming';
                  } else {
                    $class = 'past';
                  }
                } else {
                  if ($today <= get_field('event_end_date')) {
                    $class = 'upcoming';
                  } else {
                    $class = 'past';
                  }
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
                echo '<div class="centered"><a href="/resources/events/' . $term->slug . '" class="btn-outline" title="View All ' . $term->name . ' Events">View All ' . $term->name . ' Events</a></div>';
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
