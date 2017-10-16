<?php get_header(); ?>

<main>
  
  <?php
    // GETTING THE TAX OF THE LIBRARY TYPE TO DRIVE WHICH PARTIAL TO PULL IN
    $post_ID = get_queried_object()->ID;
    $post_tax = get_queried_object()->post_type . '_type';
    $post_tax_array = get_the_terms($post_ID, $post_tax);
    $post_tax_type = $post_tax_array[0]->slug;
  ?>

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
    if ($post_tax_type === 'tools-quizes') {
      get_template_part('partials/pages/display', 'library--tools-quizes');
    }
  ?>

</main>

<?php get_footer(); ?>