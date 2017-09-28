<?php 

$user = 'octiv';
$pass = 'D@n13lR0cks!';
$context = stream_context_create(array(
  'http' => array(
    'header'  => "Authorization: Basic " . base64_encode("$user:$pass")
  )
));

get_header();

?>

<main>

  <?php get_template_part('partials/module/display', 'hero'); ?>

  <section style="margin-top: -3rem; margin-bottom: -3rem; position: relative; z-index: 2;">
    <div class="site-width">
      <div class="box--light">
        <div class="two-third-only has-text-center pad-a-tablet-up">
          <div class="color-boxes">
            <h2 class="color-box-headline--brand-three">Meet Sara</h2>
            <p class="color-box-subheadline--brand-three">New Video!</p>
          </div>
          <p class="pad-x font-bump">Her proposal is due by 5. See how Octiv offers a better way for all her documents to be created, shared, signed and stored.</p>
          <div class="video-outer">
            <div class="video-inner">
              <iframe src="https://fast.wistia.net/embed/iframe/hjy779ahf2?playbar=true&smallPlayButton=true&volumeControl=true&fullscreenButton=true&controlsVisibleOnLoad=false" name="wistia_embed" width="100%" height="100%" frameborder="0" scrolling="no" allowfullscreen="allowfullscreen"></iframe>
            </div>
          </div>
        </div>
        <div class="half has-text-center vertical-align box--light-highlight">
          <div class="pad-t-more pad-x-most">
            <div class="box--brand-two pad-a mar-b svg-icon white-icon" style="display: inline-block; width: inherit;">
              <?php echo file_get_contents(get_site_url() . '/wp-content/uploads/2017/01/doc-gen.svg', false, $context); ?>
            </div>
            <h3 class="font-color-brand-two"><span class="font-bump">Complete Document Generation Platform</span></h3>
            <p class="mar-b">Create, share, sign and store documents all in one platform, giving your team all the tools they need to close deals faster and deliver business results.</p>
            <a href="/platform" class="btn-brand-two--outline">Learn More</a>
          </div>
          <div class="pad-t-more pad-x-most">
            <div class="box--brand-three pad-a mar-b svg-icon white-icon" style="display: inline-block; width: inherit;">
              <?php echo file_get_contents(get_site_url() . '/wp-content/uploads/2017/01/plug.svg', false, $context); ?>
            </div>
            <h3 class="font-color-brand-three"><span class="font-bump">Connect Systems and Data</span></h3>
            <p class="mar-b">Octiv connects the systems and data that your teams use every day - CRM, eSignature, CPQ, storage - eliminating steps in the document workflow allowing you to close deals faster.</p>
            <a href="/platform/integrations" class="btn-brand-three--outline">Learn More</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php
    if (get_field('has_promoted_item')) :
      $promoted_item = get_field('pick_your_item');
      $promoted_item_ID = $promoted_item[0]->ID;
      $thumb_id = get_post_thumbnail_id($promoted_item_ID);
      $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
      $thumb_url = $thumb_url_array[0];
      $promoted_headline = $promoted_item[0]->post_title;
      $promoted_subheadline = $promoted_item[0]->post_excerpt;
      $promoted_body_copy = get_field('long_description', $promoted_item[0]->ID);
      $cta_link = get_the_permalink($promoted_item_ID);
      if (get_field('custom_promoted_item')) {
        $promoted_headline = get_field('custom_promoted_headline');
        $promoted_subheadline = get_field('custom_promoted_subheadline');
        $promoted_body_copy = get_field('custom_promoted_body_copy');
        $thumb_url = get_field('custom_promoted_image');
        $cta_link = get_field('custom_promoted_link');
      }
      if (get_field('promoted_item_cta_text')) {
        $cta_text = get_field('promoted_item_cta_text');
      } else {
        $cta_text = 'Learn More';
      }
  ?>
    <section class="has-text-center promoted-item-container" style="background-image: radial-gradient(rgba(45, 57, 67, 0.75),rgba(45, 57, 67, 0)), linear-gradient(rgba(45, 57, 67, 0.7), rgba(45, 57, 67, 0.7)), url(<?php echo $thumb_url; ?>);">
      <div class="site-width">
        <div class="half-only">
          <div class="color-boxes">
            <h2 class="color-box-headline--brand-four"><?php echo $promoted_headline; ?></h2>
            <p class="color-box-subheadline--brand-four"><?php echo $promoted_subheadline; ?></p>
            <p class="font-bump"><?php echo $promoted_body_copy; ?></p>
            <a href="<?php echo $cta_link; ?>" class="btn-white--outline"><?php echo $cta_text; ?></a>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>

  
  <?php
    if (get_field('has_promoted_item')) {
      echo '<section class="client-testimonial-slider">';
    } else {
      echo '<section class="client-testimonial-slider no-promoted-item">';
    }
    get_template_part('partials/module/display', 'client-testimonial-slider');
    echo '</section>';
  ?>

<section class="pad-y-most">
  <div class="site-width pad-y-most">
    <div class="color-boxes">
      <h2 class="color-box-headline--brand-five">Resources</h2>
      <p class="color-box-subheadline--brand-five">Tack back your time</p>
    </div>
    <div class="third">
      <?php
        $args = array(
          'post_type' => 'post',
          'posts_per_page' => 3
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) :
          while ($query->have_posts()) : $query->the_post();
            echo do_shortcode('[get_card_v3 excerpt="true"]');
          endwhile;
        endif;
      ?>
    </div>
  </div>
</section>

<?php echo get_template_part('partials/module/display', 'powers-documents'); ?>

</main>

<?php get_footer(); ?>