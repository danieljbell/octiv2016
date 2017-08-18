<?php
/*
==============================
HERO
==============================
*/
?>

<?php
  if ($post->post_type === 'client-stories') {
    $hero_bg = '//unsplash.it/1920/400';
    $page_title = get_field('short_description');
    $page_sub_title = strip_tags( get_the_excerpt() );
  }
?>

<section class="hero" style="background-image: radial-gradient(rgba(45, 57, 67, 0.75),rgba(45, 57, 67, 0)), linear-gradient(rgba(45, 57, 67, 0.7), rgba(45, 57, 67, 0.7)), url(<?php echo $hero_bg; ?>);">
  <div class="site-width">
    <h1><?php echo $page_title; ?></h1>
    <h2><?php echo $page_sub_title; ?></h2>
  </div>
</section>