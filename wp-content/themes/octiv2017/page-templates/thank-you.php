<?php
/*
=========================
TEMPLATE NAME: Thank You
=========================
*/
?>

<?php get_header(); ?>

<?php get_template_part('partials/module/display', 'hero'); ?>

<?php get_template_part('partials/display', 'breadcrumbs'); ?>

<section class="notch">
  <div class="site-width">
    <div class="box--light">
      <ul class="third no-mar-b" style="position: relative; z-index: 1;">
        <?php get_template_part('partials/module/query', 'recent-resources'); ?>
      </ul>
    </div>
  </div>
</section>

<section class="client-testimonial-slider">
  <?php get_template_part('partials/module/display', 'client-testimonial-slider'); ?>
</section>

<?php get_template_part('partials/module/display', 'powers-documents'); ?>

<style>
  .notch {
    margin-bottom: -3rem;
  }
</style>

<script>
  var initialPath = window.location.pathname;
  window.history.replaceState( {} , 'bar', initialPath );
</script>

<?php get_footer(); ?>