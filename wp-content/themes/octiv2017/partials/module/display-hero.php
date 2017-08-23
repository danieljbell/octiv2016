<?php
/*
==============================
HERO
==============================
*/

$rand_num = mt_rand(1,4);
?>

<?php

  /*
  ==============================
  HERO DEFAULT VARIABLES
  ==============================
  */
  $page_title = get_the_title();
  $page_sub_title = strip_tags(get_the_excerpt());
  if (has_post_thumbnail()) {
    $thumb_id = get_post_thumbnail_id();
    $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
    $thumb_url = $thumb_url_array[0];
    $hero_bg = 'url(' . $thumb_url . ')';
  } else {
    $hero_bg = 'url(/wp-content/uploads/2017/06/generic-' . $rand_num . '.jpg)';
  }

  if (is_front_page()) {
    $page_title = 'Octiv Powers Documents';
    $page_sub_title = 'Create digital documents in minutes, share them online, sign from anywhere and store your documents securely in the cloud. Save more time and boost productivity.';
  }

  // CLIENT STORIES POST TYPE
  if (is_post_type_archive('client-stories')) {
    $page_title = 'Client Stories';
    $page_sub_title = null;
  }

  if (is_singular('client-stories')) {
    $hero_bg = 'url(' . get_field('client_testimonial_image') . ')';
    $page_title = get_field('short_description');
    $page_sub_title = strip_tags( get_the_excerpt() );
  }

  // EVENTS POST TYPE
  if (is_post_type_archive('events')) {
    $page_title = 'Events & Webinars';
  }

  // PRESS RELEASES POST TYPE
  if (is_post_type_archive('press-releases')) {
    $page_title = 'Press Releases';
  }

  // POST POST TYPE
  if (is_singular('post')) {
    $thumb_id = get_post_thumbnail_id();
    $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
    $thumb_url = $thumb_url_array[0];
    $hero_bg = 'url(' . $thumb_url . ')';
    $page_title = get_the_title();
    $page_sub_title = strip_tags( get_the_excerpt() );
  }

  // INTEGRATIONS POST TYPE
  if (is_post_type_archive('integration')) {
    $page_title = 'Integrations';
  }

  if (is_singular('integration')) {
    $hero_bg = 'linear-gradient(' . get_field('integration_color') . ', ' . get_field('integration_color') . ')';
    $page_title = get_the_title();
  }

  // PAGE TEMPLATES - Archive
  if (is_page_template('page-templates/archive.php')) {
    $page_title = get_the_title();
  }
?>

<section class="hero" style="background-image: radial-gradient(rgba(45, 57, 67, 0.75),rgba(45, 57, 67, 0)), linear-gradient(rgba(45, 57, 67, 0.7), rgba(45, 57, 67, 0.7)), url(<?php echo get_stylesheet_directory_URI(); ?>/dist/img/octiv-pattern.svg), <?php echo $hero_bg; ?>;">
  <div class="site-width">
    <h1><?php echo $page_title; ?></h1>
    <?php
      if ($page_sub_title) {
        echo '<h2>' . $page_sub_title . '</h2>';
      }
    ?>
  </div>
</section>