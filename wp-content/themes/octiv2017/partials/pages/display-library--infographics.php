<?php
  $form_id = get_field('marketo_form_id');
  $redirect_link = get_field('form_redirect_link');
?>

<?php get_template_part('partials/module/display', 'hero'); ?>

<section class="notch">
  <div class="site-width">
    <div class="box--light">
      <div class="whitepaper-cover-container">
        <img src="<?php echo get_field('infographic_cover'); ?>" alt="<?php echo get_the_title(); ?> Cover" class="whitepaper-cover">
      </div>
      <?php the_content(); ?>
      <a href="<?php echo get_field('form_redirect_link'); ?>" class="btn-primary" download>Download Now</a>
    </div>
  </div>
</section>