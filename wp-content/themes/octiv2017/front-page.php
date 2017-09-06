<?php get_header(); ?>

<main>

  <?php get_template_part('partials/module/display', 'hero'); ?>

  <section style="margin-top: -3rem; margin-bottom: -3rem; position: relative;">
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
        <div class="half has-text-center vertical-align">
          <div class="pad-t-more pad-x-most">
            <div class="box--brand-two pad-a mar-b" style="display: inline-block;">
              <img src="//fillmurray.com/65/65" alt="">
            </div>
            <h3 class="font-color-brand-two"><span class="font-bump">Complete Document Generation Platform</span></h3>
            <p class="no-mar-b">Create, share, sign and store documents all in one platform, giving your team all the tools they need to close deals faster and deliver business results.</p>
          </div>
          <div class="pad-t-more pad-x-most">
            <div class="box--brand-three pad-a mar-b" style="display: inline-block;">
              <img src="//fillmurray.com/65/65" alt="">
            </div>
            <h3 class="font-color-brand-three"><span class="font-bump">Connect Systems and Data</span></h3>
            <p class="no-mar-b">Octiv connects the systems and data that your teams use every day - CRM, eSignature, CPQ, storage - eliminating steps in the document workflow allowing you to close deals faster.</p>
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
      if (get_field('promoted_item_cta_text')) {
        $cta_text = get_field('promoted_item_cta_text');
      } else {
        $cta_text = 'Learn More';
      }
      if (get_field('promoted_item_cta_link')) {
        $cta_link = get_field('promoted_item_cta_link');
      } else {
        $cta_link = get_the_permalink($promoted_item_ID);
      }
  ?>
    <section class="has-text-center promoted-item-container" style="background-image: radial-gradient(rgba(45, 57, 67, 0.75),rgba(45, 57, 67, 0)), linear-gradient(rgba(45, 57, 67, 0.7), rgba(45, 57, 67, 0.7)), url(<?php echo $thumb_url; ?>);">
      <div class="site-width">
        <div class="half-only">
          <div class="color-boxes">
            <h2 class="color-box-headline--brand-four"><?php echo $promoted_item[0]->post_title; ?></h2>
            <p class="color-box-subheadline--brand-four"><?php echo $promoted_item[0]->post_excerpt; ?></p>
            <p class="font-bump"><?php echo get_field('long_description', $promoted_item[0]->ID); ?></p>
            <a href="<?php echo $cta_link; ?>" class="btn-white--outline"><?php echo $cta_text; ?></a>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <?php get_template_part('partials/module/display', 'client-testimonial-slider'); ?>

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

  <section class="pattern-callout pad-t-most has-text-center">
    <div class="site-width">
      <div class="color-boxes pad-t">
        <h2 class="color-box-headline--brand">Octiv Powers Documents</h2>
        <div class="document-container pad-x-most pad-y-more">
          <ul id="typed-strings">
              <li>Presentations</li>
              <li>Proposals</li>
              <li>Contracts</li>
              <li>Invoices</li>
              <li>Quotes</li>
          </ul>
          <p class="typed-paragraph">for <span id="typed"></span></p>
          <p class="font-bump">Create, share, sign and store documents, increase efficiency, accuracy and take back your time.</p>
          <button class="btn-primary rad-modal">Request A Demo</button>
        </div>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>