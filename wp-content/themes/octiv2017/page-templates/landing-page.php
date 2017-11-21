<?php
/*
==============================
TEMPLATE NAME: Landing Page
==============================
*/

get_header();


$has_client_stories = get_field('show_client_stories');

$cta_headline = get_field('cta_headline');
$cta_subheadline = get_field('cta_subheadline');
$form_id = get_field('marketo_form_id');
$redirect_link = get_field('form_redirect_link');

?>

<main>

  <?php get_template_part('partials/module/display', 'hero'); ?>

  <section class="notch">
    <div class="site-width">
      <div class="box--light">
        <?php the_content(); ?>
      </div>
    </div>
  </section>

  <?php if ($has_client_stories) : ?>
    <section class="pad-y-most">
      <div class="site-width">
        <div class="has-text-center">
          <div class="color-boxes">
            <h2 class="color-box-headline--brand-three">Success Stories with Octiv</h2>
            <p>See how our clients win by selecting a logo below.</p>
          </div>
        </div>
      </div>
      <ul class="client-thumbnail-slider no-bull">
        <?php
          $args = array(
            'post_type' => 'client-story',
            'posts_per_page' => -1,
            'order' => 'ASC',
            'orderby' => 'menu_order'
          );
          $query = new WP_Query($args);
          if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post(); ?>
<li class="has-text-center">
  <a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php get_the_title(); ?>" style="width: 100%; border: 1px solid #ccc; box-shadow: 3px 3px 6px rgba(0,0,0,0.1);">
  </a>
</li>
        <?php
            endwhile;
          endif;
          wp_reset_query();
        ?>
      </ul>
    </section>
  <?php endif; ?>

  <section id="call-to-action" class="brand-two-callout pad-y-most">
    <div class="site-width">
      <div class="half-only">
        <div class="color-boxes" style="margin-bottom: 0.5rem;">
          <h2 class="color-box-headline--white"><?php echo $cta_headline; ?></h2>
        </div>
        <p class="has-text-center"><?php echo $cta_subheadline; ?></p>
        <div id="form-container" class="two-third-only">
          <script src="//app-sj20.marketo.com/js/forms2/js/forms2.min.js"></script>
          <form id="mktoForm_<?php echo $form_id; ?>"></form>
          <script>MktoForms2.loadForm("//app-sj20.marketo.com", "625-MXY-689", <?php echo $form_id; ?>, function(form) {
            form.onSuccess(function(values, followUpUrl) {
              <?php if (!get_field('redirect_form_fields')) : ?>
              // Update the redirect url with form fields
              followUpUrl = <?php echo "'" . $redirect_link . "'"; ?>;
              // Redirect the page with form field
              location.href = followUpUrl;
              <?php
                else : 
                  echo get_field('form_redirect_block');
                endif;
              ?>
              // Return false to prevent the submission handler continuing with its own processing
              return false;
            });
          });</script>
        </div>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>