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
        <script src="//app-sj20.marketo.com/js/forms2/js/forms2.min.js"></script>
        <form id="mktoForm_<?php echo $form_id; ?>"></form>
        <script>MktoForms2.loadForm("//app-sj20.marketo.com", "625-MXY-689", <?php echo $form_id; ?>, function(form) {
          form.onSuccess(function(values, followUpUrl) {
            <?php if (!get_field('redirect_form_fields')) : ?>
              // Update the redirect url with form fields
              followUpUrl = <?php echo "'" . $redirect_link . "'"; ?>;
            <?php
              else : 
                echo get_field('form_redirect_block');
              endif;
            ?>
            
            // Redirect the page with form field
            location.href = followUpUrl;

            // SEND CUSTOM EVENT TO GOOGLE TAG MANAGER
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({
              event: 'formSubmissionSuccess',
              formID: '<?php echo $form_id; ?>'
            });

            // Return false to prevent the submission handler continuing with its own processing
            return false;
          });
        });</script>
      </div>
    </div>
  </div>
</section>