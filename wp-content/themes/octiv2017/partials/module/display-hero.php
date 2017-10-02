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

  /* BACKGROUND HERO IMAGE */
  if (has_post_thumbnail()) {
    $thumb_id = get_post_thumbnail_id();
    $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
    $thumb_url = $thumb_url_array[0];
    $hero_bg = 'url(' . $thumb_url . ')';
  } else {
    $hero_bg = 'url(/wp-content/uploads/2017/06/generic-' . $rand_num . '.jpg)';
  }
  if (get_field('background_image')) {
    $hero_bg = 'url(' . get_field('background_image') . ')';
  }

  /* HERO TITLE */
  $page_hero_title = get_the_title();
  if (get_field('hero_title')) {
    $page_hero_title = get_field('hero_title');
  }

  /* HERO BODY COPY */
  $page_hero_body = strip_tags(get_the_excerpt());
  if (get_field('hero_body_copy')) {
    $page_hero_body = get_field('hero_body_copy');
  }

  /* HERO BODY COPY */
  if (get_field('hero_button_link')) {
    $page_hero_button_text = get_field('hero_button_text');
    $page_hero_button_link = get_field('hero_button_link');
  }
  
  

  // CLIENT STORIES POST TYPE
  if (is_post_type_archive('client-story')) {
    $page_hero_title = 'Client Stories';
    $page_hero_sub_title = null;
    $page_hero_body = null;
  }

  if (is_singular('client-story')) {
    $hero_bg = 'url(' . get_field('client_testimonial_image') . ')';
    $page_hero_title = get_the_title();
    $page_hero_sub_title = 'Client Story';
    $page_hero_body = strip_tags(get_the_excerpt());
  }

  // EVENTS POST TYPE
  if (is_post_type_archive('events')) {
    $page_hero_title = 'Events & Webinars';
  }

  // PRESS RELEASES POST TYPE
  if (is_post_type_archive('press-releases')) {
    $page_hero_title = 'Press Releases';
  }

  // POST POST TYPE
  if (is_singular('post')) {
    $thumb_id = get_post_thumbnail_id();
    $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
    $thumb_url = $thumb_url_array[0];
    $hero_bg = 'url(' . $thumb_url . ')';
    $page_hero_title = get_the_title();
    $page_hero_sub_title = 'Blog Post';
    $page_hero_body = strip_tags( get_the_excerpt() );
  }

  // INTEGRATIONS POST TYPE
  if (is_post_type_archive('integration')) {
    $page_hero_title = 'Integrations';
  }

  if (is_singular('integration')) {
    $hero_bg = 'linear-gradient(' . get_field('integration_color') . ', ' . get_field('integration_color') . ')';
    $page_hero_title = get_the_title();
  }

  // PAGE TEMPLATES - Archive
  if (is_page_template('page-templates/archive.php')) {
    $page_hero_title = get_the_title();
  }

  // SUPPORT POST TYPE
  if (is_post_type_archive('support')) {
    $page_hero_title = 'Support';
  }

  if (is_singular('support')) {
    $page_hero_title = get_the_title();
    $page_hero_sub_title = 'Support Article';
    $page_hero_body = 'Last updated: ' . get_the_modified_time('F j, Y');
  }

  // 404 Error Page
  if (is_404()) {
    $page_hero_title = 'Oh Uh!';
    $page_hero_body = 'The page you are looking for either moved or doesn\'t exist.';
  }

?>

<?php if (!is_singular('integration')) : ?>

  <?php if (!is_front_page()) : ?>

    <section class="hero" style="background-image: radial-gradient(rgba(45, 57, 67, 0.75),rgba(45, 57, 67, 0)), linear-gradient(rgba(45, 57, 67, 0.7), rgba(45, 57, 67, 0.7)), url(<?php echo get_stylesheet_directory_URI(); ?>/dist/img/octiv-pattern.svg), <?php echo $hero_bg; ?>;">
      <div class="site-width">
        <div class="color-boxes">
          <?php if (is_page_template('page-templates/page-sections.php')) : ?>
            <h1 class="color-box-headline--brand-two"><?php echo $page_hero_title; ?></h1>
          <?php else : ?>
            <h1 class="color-box-headline--brand-two"><?php echo $page_hero_title; ?></h1>
          <?php endif; ?>
        </div>
        <?php
          if ($page_hero_body) {
            echo '<h2 class="mar-b">' . $page_hero_body . '</h2>';
          }
          if ($page_hero_button_link) {
            echo '<a href="' . $page_hero_button_link . '" class="btn-white--outline">' . $page_hero_button_text . '</a>';
          }
        ?>
      </div>
    </section>

  <?php 
    else :
    /* HOMEPAGE HERO */
  ?>
  
    <section class="hero">
      <div class="slider">
        <?php
          if (have_rows('hero_banners')) :
            while (have_rows('hero_banners')) : 
              the_row();
              $cta_text = 'Learn More';
              if (get_sub_field('banner_link_text')) {
                $cta_text = get_sub_field('banner_link_text');
              }
              if (get_sub_field('custom_banner')) {
                $page_hero_title = get_sub_field('banner_headline');
                $page_hero_body = get_sub_field('banner_subheadline');
                $page_hero_body_copy = get_sub_field('banner_body_copy');
                $hero_bg = 'url(' . get_sub_field('banner_image') . ')';
                $cta_location = get_sub_field('banner_link');
              } else {
                $page_hero_title = get_sub_field('pick_your_page')[0]->post_title;
                $page_hero_body = get_sub_field('pick_your_page')[0]->post_excerpt;
                $thumb_id = get_post_thumbnail_id(get_sub_field('pick_your_page')[0]->ID);
                $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
                $thumb_url = $thumb_url_array[0];
                $hero_bg = 'url(' . $thumb_url . ')';
                $page_hero_body_copy = get_field('sidebar_title', $page_hero_body_copy[0]->ID, false);
                $cta_location = get_the_permalink(get_sub_field('pick_your_page')[0]->ID);
              }
        ?>
          <div class="slide" style="background-image: linear-gradient(rgba(45, 57, 67, 0.7), rgba(45, 57, 67, 0.7)), <?php echo $hero_bg; ?>">
            <div class="site-width">
              <div class="color-boxes">
                <h1 class="color-box-headline--brand-two"><?php echo $page_hero_title; ?></h1>
              </div>
              <h2 class="mar-b-most"><?php echo $page_hero_body_copy; ?></h2>
              <a href="<?php echo $cta_location; ?>" class="btn-white--outline"><?php echo $cta_text; ?></a>
            </div>
          </div>
        <?php
            endwhile;
          endif;
        ?>
      </div>
    </section>

  <?php endif; ?>

<?php 
  else :
  /* INTEGRATIONS HERO */
?>

  <section class="hero" style="background-image: linear-gradient(rgba(45, 57, 67, 0.7), rgba(45, 57, 67, 0.7)), url(<?php echo get_stylesheet_directory_URI(); ?>/dist/img/octiv-pattern.svg), <?php echo $hero_bg; ?>;">
    <div class="site-width">
      <div class="hero-integration-logo-container">
        <div class="hero-integration-logo light-callout">
          <img src="<?php echo get_stylesheet_directory_URI(); ?>/dist/img/Octiv-Logo.svg" alt="Octiv Logo">
        </div>
        <div class="light-callout plus-sign">+</div>
        <div class="hero-integration-logo light-callout">
          <img src="<?php echo get_field('integration_logo'); ?>" alt="<?php echo get_the_title(); ?>">
        </div>
      </div>
    </div>
  </section>

<?php endif; ?>  