<?php
  $form_id = get_field('marketo_form_id');
  $redirect_link = get_field('form_redirect_link');
?>

<?php get_template_part('partials/module/display', 'hero'); ?>

<section class="notch">
  <div class="site-width">
    <div class="box--light">
      <div class="whitepaper-cover-container">
        <img src="<?php echo get_field('whitepaper_cover'); ?>" alt="<?php echo get_the_title(); ?> Cover" class="whitepaper-cover">
      </div>
      <?php the_content(); ?>
      <a href="#call-to-action" class="btn-primary">Download Now</a>
    </div>
  </div>
</section>

<section class="whitepaper-sneak-peek">
  <div class="site-width">
    <div class="has-text-center">
      <div class="color-boxes" style="margin-bottom: 0.5rem;">
        <h2 class="color-box-headline--brand-three">Take A Peek Inside</h2>
      </div>
      <p>Use the arrows below to get a quick glance at <?php echo get_the_title(); ?>.</p>
      <div class="half-only">
        <div class="whitepaper-slider">
          <div>
            <img src="//fillmurray.com/350/500" alt="">
          </div>
          <div>
            <img src="//placecage.com/350/500" alt="">
          </div>
          <div>
            <img src="//unsplash.it/350/500" alt="">
          </div>
          <div>
            <img src="//stevensegallery.com/350/500" alt="">
          </div>
          <div>
            <img src="//placekitten.com/350/500" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="call-to-action" class="brand-two-callout has-text-center pad-y-most">
  <div class="site-width">
    <div class="half-only">
      <div class="color-boxes" style="margin-bottom: 0.5rem;">
        <h2 class="color-box-headline--white">Get the Whitepaper Now</h2>
      </div>
      <p>Fill out the form below and you'll get access to the whitepaper.</p>
      <div class="two-third-only">
        <script src="//app-sj20.marketo.com/js/forms2/js/forms2.min.js"></script>
        <form id="mktoForm_<?php echo $form_id; ?>"></form>
        <script>MktoForms2.loadForm("//app-sj20.marketo.com", "625-MXY-689", <?php echo $form_id; ?>, function(form) {
          form.onSuccess(function(values, followUpUrl) {
            // Update the redirect url with form fields
            followUpUrl = <?php echo "'" . site_url() . $redirect_link . "'"; ?>;
            // Redirect the page with form field
            location.href = followUpUrl;
            // Return false to prevent the submission handler continuing with its own processing
            return false;
          });
        });</script>
      </div>
    </div>
  </div>
</section>