<?php get_header(); ?>

<main>
  
  <?php get_template_part('partials/module/display', 'hero'); ?>

  <section class="pad-y-most">
    <div class="site-width">
      <?php
        if (have_posts()) :
          echo '<div class="third">';
          while (have_posts()) : the_post();
            echo do_shortcode('[get_card_v3 thumb="false"]');
          endwhile;
          echo '</ul>';
        endif;
      ?>
    </div>
  </section>

</main>

<?php get_footer(); ?>