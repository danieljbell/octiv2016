<?php
// useless comment to commit
  get_header();
  $terms = get_terms( array(
    'taxonomy' => 'event_type',
    'hide_empty' => false,
  ) );

  $rand_num2 = mt_rand(1,4);
?>

<div class="fixed-hero-section" style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url(/wp-content/themes/octiv2016/dist/img/octiv-pattern.svg), url(/wp-content/uploads/2017/06/events-archive-bg.jpg);">
  <div class="site-width white-text centered">
    <h1><?php echo str_replace('Archives: ','',get_the_archive_title()); ?> &amp; Webinars</h1>
  </div>
</div>

<?php get_template_part('partials/display', 'breadcrumbs'); ?>

<section>
  <div class="site-width">
    <div class="fourth-3-fourth">
      <div class="filter-sidebar">
        <h4>Filters</h4>
        <hr>
        <ul class="no-bull filter-container">
          <li style="font-size: 0.85em;"><input type="checkbox" id="upcoming" checked><label for="upcoming">Upcoming Events</label></li>
          <li style="font-size: 0.85em;"><input type="checkbox" id="past" checked><label for="past">Past Events</label></li>
        </ul>
        <div class="mar-t"></div>
          <h4>Legend</h4>
          <hr>
          <ul class="no-bull" style="padding-left: 0;">
            <li class="pos-rel">
              <p class="card-tag-webinars" style="margin-bottom: 0;">Thought Leadership</p>
              <p style="font-size: 0.85em;">Get info you need straight from the experts.</p>
            </li>
            <li class="pos-rel">
              <p class="card-tag-blog" style="margin-bottom: 0;">Platform</p>
              <p style="font-size: 0.85em;">See the latest updates to the Octiv platform.</p>
            </li>
            <li class="pos-rel">
              <p class="card-tag-client-stories" style="margin-bottom: 0;">Client</p>
              <p style="font-size: 0.85em;">Learn how to get the most out of Octiv.</p>
            </li>
          </ul>
      </div>
      <div class="sticky-listing">
        <?php
          foreach ($terms as $term) {
            $local_args = array(
              'post_type' => 'events',
              'posts_per_page' => 3,
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
                  echo '<h3 id="' . $term->slug . '" class="inline">';
                    if ($term->slug == 'online') {
                      echo 'Webinars';
                    }
                    if ($term->slug == 'in-person') {
                      echo 'Events';
                    }
                  echo '</h3>';
                  if ($term->slug === 'online') {
                    echo '<div class="centered box" style="background-image: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)), url(/wp-content/uploads/2017/06/generic-' . $rand_num2 . '.jpg); background-size: cover; background-position: center; padding: 3rem; margin-top: 1rem; margin-bottom: 2rem;">';
                      echo '<h2 class="white-text">View a demo of the Octiv platform now</h2>';
                      echo '<div class="two-third-only">';
                        echo '<div><p class="white-text">This on-demand webinar is an exclusive opportunity to see the leading document generation and contract lifecycle management platform in action.</div>';
                        echo '<a href="/platform-demo" class="btn-primary" style="margin-bottom: 0; width: initial !important;">Watch Now</a>';
                      echo '</div>';
                    echo '</div>';
                  }
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
                if ($term->slug === 'online') {
                  if (get_field('webinar_type') === 'thought-leadership') {
                    $webinar_type = 'thought-leadership';
                  } else if (get_field('webinar_type') === 'platform') {
                    $webinar_type = 'platform';
                  } else if (get_field('webinar_type') === 'client') {
                    $webinar_type = 'client';
                  }
                }
                echo do_shortcode('[get_card thumb="true" thumb_modifier="' . $webinar_type . '" tag="' . $class . '" class="' . $class . ' ' . $webinar_type . '" excerpt="date"]');
              endwhile;
                echo '</div>';
                echo '<div class="centered"><a href="/resources/events/' . $term->slug . '" class="btn-outline" title="View All ' . $term->name . ' Events">View All ';
                if ($term->slug != 'online') {
                  echo $term->name . ' Events';
                } else {
                  echo 'Webinars';
                }
                echo '</a></div>';
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
