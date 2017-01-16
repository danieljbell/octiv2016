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
        <h4>Events</h4>
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
          $custom_terms = get_terms('event_type');
          $i = 0;
          foreach($custom_terms as $custom_term) {
            wp_reset_query();
            $args = array(
              'post_type' => 'events',
              'posts_per_page' => -1,
              'tax_query' => array(
                array(
                  'taxonomy' => 'event_type',
                  'field' => 'slug',
                  'terms' => $custom_term->slug,
                ),
              ),
            );
          $loop = new WP_Query($args);
          $i++;
          if($loop->have_posts()) {
            $today = date('Y-m-d');
            echo '<section style="padding-top: 0;">';
            echo '<h3 id="' . $custom_term->slug . '" style="padding-bottom: 0.5rem;">' . $custom_term->name . '<a href="/events/' . $custom_term->slug . '" style="color: rgba(0,0,0,0.5); font-size: 0.65em; display: inline-block; margin-left: 0.5rem; font-style: italic; font-weight: normal;">(see all)</a></h3>';
            echo '<div class="third">';
          while($loop->have_posts()) : $loop->the_post();
            $event_date = get_field('event_start_date');
            $term = get_the_terms($post->ID, 'event_type');
            if ($term[0]->slug === 'demos') :
              $tag_conditional = '';
              if ($event_date < date('Ymd')) {
                $tag_conditional = 'past';
              }
              echo do_shortcode( '[get_card thumb="false" tag="' . $tag_conditional . '" excerpt="date"]' );
            endif;
            if ($term[0]->slug === 'industry-conferences') :
              $tag_conditional = '';
              if ($event_date < date('Ymd')) {
                $tag_conditional = 'past';
              }
              echo do_shortcode( '[get_card thumb="true" tag="' . $tag_conditional . '" excerpt="date"]' );
            endif;
            if ($term[0]->slug === 'webinars') :
              echo do_shortcode( '[get_card thumb="true" excerpt="date"]' );
            endif;
          endwhile;
            echo '</div>';
         }
            echo '</section>';
      } ?>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
