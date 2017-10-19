<?php

  $has_reg = $_GET['reg'];
  $parent_page = '/?page_id=' . $post->post_parent;

  // GETTING THE TAX OF THE LIBRARY TYPE TO DRIVE WHICH PARTIAL TO PULL IN
  $post_ID = get_queried_object()->ID;
  $post_tax = get_queried_object()->post_type . '_type';
  $post_tax_array = get_the_terms($post_ID, $post_tax);
  $post_tax_type = $post_tax_array[0]->slug;

  if ($post->post_parent > 0) {
    if (!$has_reg || $has_reg != 'true') {
      header("Location: $parent_page");
    } else {
      get_template_part('partials/pages/display', 'library--tools-child');
    }
  }
?>

<?php get_header(); ?>

<main>

  <?php
    if ($post_tax_type === 'whitepapers') {
      get_template_part('partials/pages/display', 'library--whitepaper');
    }
  ?>

  <?php
    if ($post_tax_type === 'infographics') {
      get_template_part('partials/pages/display', 'library--infographics');
    }
  ?>

  <?php
    if ($post_tax_type === 'videos') {
      get_template_part('partials/pages/display', 'library--videos');
    }
  ?>

  <?php
    if ($post_tax_type === 'quizzes') {
      get_template_part('partials/pages/display', 'library--quizzes');
    }
  ?>

  <?php
    if ($post_tax_type === 'datasheets') {
      get_template_part('partials/pages/display', 'library--datasheets');
    }
  ?>

  <?php
    if ($post_tax_type === 'tools') {
      get_template_part('partials/pages/display', 'library--tools');
    }
  ?>

</main>

<?php get_footer(); ?>