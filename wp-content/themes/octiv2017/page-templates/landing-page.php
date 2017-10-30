<?php
/*
==============================
TEMPLATE NAME: Landing Page
==============================
*/

get_header();

?>

<main>

  <?php get_template_part('partials/module/display', 'hero'); ?>

  <section class="notch" style="margin-bottom: -3rem;">
    <div class="site-width">
      <div class="box--light">
        <?php the_content(); ?>
      </div>
    </div>
  </section>

  <section class="brand-two-callout pad-y-most" style="padding-top: 6rem;">
    <div class="site-width">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi veniam, excepturi a, sequi vel quasi voluptatum aperiam nulla eligendi nesciunt.
    </div>
  </section>

</main>

<?php get_footer(); ?>