<?php
  $form_id = get_field('marketo_form_id');
  $redirect_link = get_field('form_redirect_link');
?>

<?php get_template_part('partials/module/display', 'hero'); ?>

<section class="notch">
  <div class="site-width">
    <div class="box--light">
      <div class="whitepaper-cover-container">
        <img src="<?php echo get_field('datasheet_cover'); ?>" alt="<?php echo get_the_title(); ?> Cover" class="whitepaper-cover">
      </div>
      <?php the_content(); ?>
      <a href="#call-to-action" class="btn-primary">Download Now</a>
    </div>
  </div>
</section>

<section id="call-to-action" class="brand-two-callout has-text-center pad-y-most">
  <div class="site-width">
    <div class="half-only">
      <div class="color-boxes" style="margin-bottom: 0.5rem;">
        <h2 class="color-box-headline--white">Get the Datasheet Now</h2>
      </div>
      <p>Fill out the form below and you'll get access to the datasheet.</p>
      <div class="two-third-only">
        <div class="success-message" style="display: none;">
          <div class="color-boxes" style="margin-bottom: 0.5rem;">
            <h2 class="color-box-headline--white">Thanks!</h2>
          </div>
          <p>If the datasheet didn't already download, use the button below to get it.</p>
          <a href="<?php echo $redirect_link; ?>" class="btn-white--outline" download>Download Datasheet</a>
        </div>
        <script src="//app-sj20.marketo.com/js/forms2/js/forms2.min.js"></script>
        <form id="mktoForm_<?php echo $form_id; ?>"></form>
        <script>MktoForms2.loadForm("//app-sj20.marketo.com", "625-MXY-689", <?php echo $form_id; ?>, function(form) {
          form.onSuccess(function(values, followUpUrl) {
            var vals = form.vals();
            var evt = new MouseEvent('click', {
              view: window,
              bubbles: false,
              cancelable: true
            });

            var downloadLink = document.createElement('a');
            downloadLink.setAttribute('download', <?php echo "'Octiv - " . get_the_title() . " Datasheet'"; ?>);
            downloadLink.setAttribute('href', <?php echo "'" . $redirect_link . "'"; ?>);
            downloadLink.setAttribute('target', '_blank');
            downloadLink.dispatchEvent(evt);
            $('#call-to-action .color-boxes').first().hide().next().hide();
            form.getFormElem().hide();
            var successMessage = $('.success-message');
            successMessage.find('h2').text('Thanks ' + vals.FirstName + '!');
            successMessage.show();
            return false;
          });
        });</script>
      </div>
    </div>
  </div>
</section>