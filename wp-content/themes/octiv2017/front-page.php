<?php get_header(); ?>

<?php get_template_part('partials/module/display', 'hero'); ?>

<section style="margin-top: -3rem; margin-bottom: -3rem; position: relative;">
  <div class="site-width">
    <div class="box">
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
    </div>
  </div>
</section>

<section style="padding-top: 6rem; padding-bottom: 3rem; background-image: url(//unsplash.it/1280/600);">
  <div class="site-width">
    <h2>Promoted Item Thingy</h2>
  </div>
</section>

<?php get_template_part('partials/module/display', 'client-testimonial-slider'); ?>

<section>
  <div class="site-width">
    recent resources
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

<?php get_footer(); ?>