<?php
  $form_id = get_field('marketo_form_id');
  $redirect_link = get_field('form_redirect_link');
  $page_hero_button_text = 'Download Now';
  if (get_field('hero_button_text')) {
    $page_hero_button_text = get_field('hero_button_text');
  }
  $terms = get_the_terms($post->ID, $post->post_type . '_type');
  $page_term = substr($terms[0]->name, 0, -1);
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

<?php if (have_rows('preview_images')) : ?>
  
  <section class="whitepaper-sneak-peek">
    <div class="site-width has-text-center">
      <div class="color-boxes" style="margin-bottom: 0.5rem;">
        <h2 class="color-box-headline--brand-three">Take A Peek Inside</h2>
      </div>
      <p>Use the arrows below to get a quick glance at <?php echo get_the_title(); ?>.</p>
      <div class="half-only">
        <div id="arrow-append" class="mar-b"></div>
        <div class="whitepaper-slider">

<?php while (have_rows('preview_images')) : the_row(); ?>

      <div>
        <img src="<?php echo get_sub_field('preview_image'); ?>" alt="">
      </div>

<?php endwhile; ?>
        </div>
      </div>
    </div>
  </section>

<?php endif; ?>

<section id="call-to-action" class="brand-two-callout has-text-center pad-y-most">
  <div class="site-width">
    <div class="half-only">
      <div class="color-boxes" style="margin-bottom: 0.5rem;">
        <h2 class="color-box-headline--white">Get the <?php echo $page_term; ?> Now</h2>
      </div>
      <p>Fill out the form below and you'll get access to the <?php echo strtolower($page_term); ?>.</p>
      <div class="two-third-only">
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
            downloadLink.setAttribute('download', <?php echo "'" . get_the_title() . "'"; ?>);
            downloadLink.setAttribute('href', <?php echo "'" . $redirect_link . "'"; ?>);
            downloadLink.setAttribute('target', '_blank');
            downloadLink.dispatchEvent(evt);

            // Get the form's jQuery element and hide it
            form.getFormElem().hide();
            $('#call-to-action .color-box-headline--white').text('Thanks, ' + vals.FirstName + '!');
            $('#call-to-action p').html('If the whitepaper didn\'t already download, <a href="<?php echo $redirect_link; ?>" download>click here</a>.');
            return false;
          });
        });</script>
      </div>
    </div>
  </div>
</section>