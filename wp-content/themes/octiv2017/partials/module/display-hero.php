<?php
/*
==============================
HERO
==============================
*/

$rand_num = mt_rand(1,4);
?>

<?php

  // CLIENT STORIES POST TYPE
  if (is_post_type_archive('client-stories')) {
    $hero_bg = '/wp-content/uploads/2017/06/generic-' . $rand_num . '.jpg';
    $page_title = 'Client Stories';
    $page_sub_title = null;
  }

  if (is_singular('client-stories')) {
    $hero_bg = get_field('client_testimonial_image');
    $page_title = get_field('short_description');
    $page_sub_title = strip_tags( get_the_excerpt() );
  }

  // EVENTS POST TYPE
  if (is_post_type_archive('events')) {
    $hero_bg = '/wp-content/uploads/2017/06/generic-' . $rand_num . '.jpg';
    $page_title = 'Events & Webinars';
  }

  // PRESS RELEASES POST TYPE
  if (is_post_type_archive('press-releases')) {
    $hero_bg = '/wp-content/uploads/2017/06/generic-' . $rand_num . '.jpg';
    $page_title = 'Press Releases';
  }

  if (is_singular('post')) {
    $thumb_id = get_post_thumbnail_id();
    $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
    $thumb_url = $thumb_url_array[0];
    $hero_bg = $thumb_url;
    $page_title = get_the_title();
    $page_sub_title = strip_tags( get_the_excerpt() );
  }


  // PAGE TEMPLATES - Archive
  if (is_page_template('page-templates/archive.php')) {
    $hero_bg = '/wp-content/uploads/2017/06/generic-' . $rand_num . '.jpg';
    $page_title = get_the_title();
  }
?>

<section class="hero" style="background-image: radial-gradient(rgba(45, 57, 67, 0.75),rgba(45, 57, 67, 0)), linear-gradient(rgba(45, 57, 67, 0.7), rgba(45, 57, 67, 0.7)), url(<?php echo get_stylesheet_directory_URI(); ?>/dist/img/octiv-pattern.svg), url(<?php echo $hero_bg; ?>);">
  <div class="site-width">
    <h1><?php echo $page_title; ?></h1>
    <?php
      if ($page_sub_title) {
        echo '<h2>' . $page_sub_title . '</h2>';
      }
    ?>
  </div>
</section>