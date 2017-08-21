<?php
/*
==============================
HERO
==============================
*/

$rand_num = mt_rand(1,4);
?>

<?php
  if (is_archive('client-stories')) {
    $hero_bg = '/wp-content/uploads/2017/06/generic-' . $rand_num . '.jpg';
    $page_title = 'Client Stories';
    $page_sub_title = null;
  }

  if (is_singular('client-stories')) {
    $hero_bg = get_field('client_testimonial_image');
    $page_title = get_field('short_description');
    $page_sub_title = strip_tags( get_the_excerpt() );
  }
?>

<section class="hero" style="background-image: radial-gradient(rgba(45, 57, 67, 0.75),rgba(45, 57, 67, 0)), linear-gradient(rgba(45, 57, 67, 0.7), rgba(45, 57, 67, 0.7)), url(<?php echo $hero_bg; ?>);">
  <div class="site-width">
    <h1><?php echo $page_title; ?></h1>
    <?php
      if ($page_sub_title) {
        echo '<h2>' . $page_sub_title . '</h2>';
      }
    ?>
  </div>
</section>