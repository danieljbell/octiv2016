<?php get_header(); ?>

<?php get_template_part('partials/module/display', 'hero'); ?>

<?php get_template_part('partials/module/display', 'breadcrumbs'); ?>

<section class="page-sections pad-y-most">
  <ul class="page-section-list">
    <?php
      $count = 0;
      if (have_rows('page_section', 'options')) :
        while (have_rows('page_section', 'options')) : the_row();
          get_template_part('partials/module/display', 'page-sections');
        endwhile;
      endif;
    ?>
  </ul>
</section>

<?php get_footer(); ?>