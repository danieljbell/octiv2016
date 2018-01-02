<?php
  $term = get_queried_object();
?>

<?php get_header(); ?>

<?php get_template_part('partials/module/display', 'hero'); ?>

<?php get_template_part('partials/module/display', 'breadcrumbs'); ?>

<?php // get_template_part('partials/module/display', 'page-sections'); ?>

<section class="page-sections pad-y-most">
  <ul class="page-section-list">
    <?php
      $count = 0;
      if (have_rows('page_section', $term)) :
        while (have_rows('page_section', $term)) : the_row();
          echo '<li>' . get_sub_field('section_title') . '</li>';
        endwhile;
      endif;
    ?>

<?php get_footer(); ?>