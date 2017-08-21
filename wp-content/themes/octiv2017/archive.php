<?php get_header(); ?>

<?php get_template_part('partials/module/display', 'hero'); ?>

<?php get_template_part('partials/module/display', 'breadcrumbs'); ?>

<section>
  <div class="site-width">
    <div class="third">
      <?php
        if (have_posts()) :
          while (have_posts()) :
            the_post();
              echo do_shortcode('[get_card_v3 excerpt="true"]');
          endwhile;
        endif;
      ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>