<?php
/*
========================================
Template Name: Solutions Child Page
========================================
*/

get_header();

?>

<div class="fixed-hero-section">
  <div class="site-width white-text centered">
      <svg fill="#fff" style="filter: drop-shadow(0px 0px 8px rgba(0,0,0,1)); margin-bottom: 1.5rem;">
        <use xlink:href="#icon-CIOs">
      </svg>
      <h1><?php echo the_title(); ?></h1>
      <div class="font-bump two-third-only" style="margin-top: 0.5rem;">
        <div class="font-bump fancy-links">Octiv helps CIOs <a href="#">unify and standardize</a> a range of <a href="#">document workflows</a> that leverage <a href="#">current applications</a> and <a href="#">data</a>.</div>
      </div>
  </div>
</div>

<?php get_template_part('partials/display', 'breadcrumbs'); ?>

<?php
  if (have_rows('page_section')) :
    while (have_rows('page_section')) :
      the_row();
      echo '<section>';
        echo '<div class="site-width">';
          echo get_sub_field('section_title');
        echo '</div>';
      echo '</section>';
    endwhile;
  endif;
?>

<style>
  .fixed-hero-section {
    background-image: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)), url(<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>);
    background-repeat: no-repeat;
    background-size: cover;
  }
</style>

<?php get_footer(); ?>
