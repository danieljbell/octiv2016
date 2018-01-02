<?php get_header(); ?>

<?php get_template_part('partials/module/display', 'hero'); ?>

<?php get_template_part('partials/module/display', 'breadcrumbs'); ?>

<section class="page-sections pad-y-most">
  <ul class="page-section-list">
    <?php
      $count = 0;
      if (have_rows('page_section', 'options')) :
        while (have_rows('page_section', 'options')) : the_row();
          if (!get_sub_field('is_promoted_item')) {
            $count++;
          }
          echo do_shortcode('[page_section count="' . $count . '"]');
        endwhile;
      endif;
    ?>
  </ul>
</section>

<?php get_footer(); ?>