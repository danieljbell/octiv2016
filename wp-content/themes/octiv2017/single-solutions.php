<?php get_header(); ?>

<main>

  <?php get_template_part('partials/module/display', 'hero'); ?>

  <section class="notch">
    <div class="site-width">
      <div class="box--light font-bump has-text-center">
        <?php echo the_content(); ?>
      </div>
    </div>
  </section>

  <style>
    .notch p:last-child {
      margin-bottom: 0;
    }
  </style>

  <?php get_template_part('partials/module/display', 'page-sections'); ?>

  <?php get_template_part('partials/module/display', 'picked-resources'); ?>

  <?php get_template_part('partials/module/display', 'powers-documents'); ?>

</main>

<?php get_footer(); ?>