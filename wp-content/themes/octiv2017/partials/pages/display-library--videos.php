<?php
  // page request variables
  $has_reg = $_GET['reg'];
  $has_first_name = $_GET['first_name'];
  $video_gate = get_field('gated_or_open');
  $form_id = '1041';
  if (get_field('marketo_form_id')) {
    $form_id = get_field('marketo_form_id');
  }
  $thumb_id = get_post_thumbnail_id();
  $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
  $thumb_url = $thumb_url_array[0];
?>

<?php get_template_part('partials/module/display', 'hero'); ?>

<section class="notch">
  <div class="site-width">
    <div class="box--light">
      <div class="two-third-only">
        <div class="video-outer" <?php if ($video_gate === 'gated') : ?> style="display: none;" <?php endif; ?>>
          <div class="video-inner">
            <?php
              $video_host = get_field('video_host');
              if ($video_host === 'youtube') {
                echo '<iframe src="https://www.youtube.com/embed/' . get_field('video_id') . '?rel=0&amp;showinfo=0&amp;modestbranding=1&amp;VQ=HD720" frameborder="0" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen" webkitallowfullscreen="webkitallowfullscreen" width="100%" height="100%" style="box-shadow: 0 0 15px rgba(0,0,0,0.15);"></iframe>';
              }
              ?>
          </div>
        </div>
      </div>
      <?php if ($video_gate === 'gated') : ?>
        <div class="half">
          <div class="page-content">
            <img src="<?php echo $thumb_url; ?>" alt="<?php echo get_the_title(); ?> Featured Image" class="mar-b" style="width: initial; max-width: 100%;">
            <?php the_content(); ?>
          </div>
          <div>
            <script src="//app-sj20.marketo.com/js/forms2/js/forms2.min.js"></script>
            <form id="mktoForm_<?php echo $form_id; ?>"></form>
            <script>MktoForms2.loadForm("//app-sj20.marketo.com", "625-MXY-689", <?php echo $form_id; ?>, function(form) {

              form.onSuccess(function(values, followUpUrl) {
                form.getFormElem().hide();
                $('.notch .page-content').hide();

                $('.notch .video-outer').show();

                // Return false to prevent the submission handler continuing with its own processing
                return false;
              });
            });</script>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php
    $args = array(
      'post_type' => 'library',
      'posts_per_page' => 3,
      'post__not_in' => array($post->ID),
      'tax_query' => array(
        array(
          'taxonomy' => 'library_type',
          'field'    => 'slug',
          'terms'    => 'videos',
        ),
      ),
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) : ?>
  <section class="other-videos pad-y-most">
    <div class="site-width">
      <div class="color-boxes">
        <h2 class="color-box-headline--brand-three">Other Videos You Might Want to Watch</h2>
      </div>
      <div class="third">
  <?php
    while ($query->have_posts()) : $query->the_post();
      echo do_shortcode('[get_card_v3 excerpt="true"]');
    endwhile; ?>
      </div>
    </div>
  </section>
  <?php      
      endif;
      wp_reset_query();
    ?>