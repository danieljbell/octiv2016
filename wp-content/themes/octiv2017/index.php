<?php if (is_page(array('264', '298'))) {
  $slim_page = true;
} ?>

<?php get_header();  ?>

<main>

<?php get_template_part('partials/module/display', 'hero'); ?>  

<section class="pad-y-most">
  <div class="site-width">
    <?php if ($slim_page) : ?>
      <div class="two-third-only">
    <?php endif; ?>
      <?php the_content(); ?>
    <?php if ($slim_page) : ?>
      </div>
    <?php endif; ?>    
  </div>
</section>

</main>

<?php get_footer();  ?>