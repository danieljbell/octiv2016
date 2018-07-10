<?php
  $form_id = get_field('marketo_form_id');
  $redirect_link = $_SERVER['REQUEST_URI'] . 'view/?reg=true';
  if (get_field('form_redirect_link')) {
    $redirect_link = get_field('form_redirect_link');
  }
?>

<?php get_template_part('partials/module/display', 'hero'); ?>

<section class="notch">
  <div class="site-width">
    <div class="box--light">
      <?php if (get_field('tool_promo_image')) : ?>
      <div class="whitepaper-cover-container">
        <img src="<?php echo get_field('tool_promo_image'); ?>" alt="<?php echo get_the_title(); ?> Cover" class="whitepaper-cover">
      </div>
      <?php endif; ?>
      <?php the_content(); ?>
      <?php
        $page_hero_button_text = 'Download Now';
        if (get_field('hero_button_text')) {
          $page_hero_button_text = get_field('hero_button_text');
        }
      ?>
      <a href="#call-to-action" class="btn-primary"><?php echo $page_hero_button_text; ?></a>
    </div>
  </div>
</section>

<section id="call-to-action" class="brand-two-callout has-text-center pad-y-most">
  <div class="site-width">
    <div class="half-only">
      <div class="color-boxes" style="margin-bottom: 0.5rem;">
        <h2 class="color-box-headline--white">Get the <?php echo get_the_title(); ?> Now</h2>
      </div>
      <p>Fill out the form below and you'll get access to the <?php echo get_the_title(); ?>.</p>
      <div class="two-third-only">
        <?php if (!get_field('redirect_form_fields')) : ?>
          <iframe src="<?php echo $redirect_link; ?>" width="100%" height="500" type="text/html" frameborder="0" allowTransparency="true" style="border: 0"></iframe>
        <?php endif; ?>
        <?php if ($form_id) : ?>
          <iframe src="https://go.pardot.com/l/217282/2018-04-30/3dmm3" width="100%" height="500" type="text/html" frameborder="0" allowTransparency="true" style="border: 0"></iframe>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>