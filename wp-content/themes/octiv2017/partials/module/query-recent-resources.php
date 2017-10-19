<?php
  $args = array(
    'post_type'      => 'post',
    'posts_per_page' => 1
  );
  $query = new WP_Query($args);
  if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
      echo do_shortcode('[get_card_v3 excerpt="true"]');
    endwhile;
  endif;
  wp_reset_query();
?>

<?php
  $args = array(
    'post_type'      => 'library',
    'posts_per_page' => 1,
    'tax_query' => array(
        array(
          'taxonomy' => 'library_type',
          'field'    => 'slug',
          'terms'    => 'whitepapers',
        ),
      ),
  );
  $query = new WP_Query($args);
  if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
      echo do_shortcode('[get_card_v3 excerpt="true"]');
    endwhile;
  endif;
  wp_reset_query();
?>

<?php
  $args = array(
    'post_type'      => 'events',
    'posts_per_page' => 1,
  );
  $query = new WP_Query($args);
  if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
      echo do_shortcode('[get_card_v3 excerpt="true"]');
    endwhile;
  endif;
  wp_reset_query();
?>