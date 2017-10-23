<?php
/*
==============================
GET CARD LAYOUT
==============================
*/
add_shortcode('get_card_v3', function($atts) {
  extract(shortcode_atts(
    array(
      'location' => '',
      'thumb' => 'true',
      'excerpt' => 'false',
      'title' => 'true',
      'has_cta_text' => 'true',
      'class' => '',
      'tag' => '',
    ), $atts));
    ob_start(); ?>

<?php if ($location != 'mega-menu-promo') : ?> 

  <?php
    $card_image = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
    if (is_page('integrations') || is_singular('integration')) {
      $is_integration_archive = true;
      $card_image = get_field('integration_logo');
    }
  ?>
  
  <div class="card <?php if ($class) { echo $class; } ?>">
    <?php if ($thumb != 'false') : ?>
      <a class="card-image" href="<?php echo get_the_permalink(); ?>" style="background-image: url(<?php echo $card_image; ?>);"></a>
    <?php endif; ?>
    
    <?php if (!$is_integration_archive) : ?>
    <div class="card-content">
      <?php if ($title != 'false') : ?>
        <h4><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
      <?php endif; ?>
      <?php
        if ($excerpt != 'false') { 
          echo '<p class="card-description">' . strip_tags(get_the_excerpt()) . '</p>'; 
        }
      ?>
      <?php if ($has_cta_text != 'false') : ?>
        <a href="<?php echo get_the_permalink(); ?>" class="btn-arrow">Learn More <span class="arrow">></span></a>
      <?php endif; ?>
    </div>
    <?php endif; ?>
  </div>

<?php else : ?>


<?php endif; ?>
  
<?php
    return ob_get_clean();
});


/*
==============================
GET SAAS BUYER JOURNEY
==============================
*/
add_shortcode('get_saas_buyer_journey', function($atts) {
  return file_get_contents('./wp-content/themes/octiv2016/page-templates/buyer-journey.php', false, $context);
});



/*
==============================
CUSTOM ANIMATIONS
==============================
*/
add_shortcode('custom_animation', function($atts) {
  extract(shortcode_atts(
    array(
      'tag' => '',
    ), $atts));
    ob_start(); ?>

<?php if ($tag === 'platform--create') : ?>
  <div class="animation-platform--create">
    <div class="octiv-badge">
      <svg viewBox="0 0 126.1 126.1">
        <path d="M116.4,37.3c-2.6,0-5-1-6.8-2.8l-18-18c-3.8-3.8-3.7-9.9,0.1-13.7c3.8-3.8,9.9-3.7,13.7,0.1l18,18 c3.7,3.8,3.7,9.9,0,13.6C121.5,36.3,119,37.3,116.4,37.3z M55.6,109.7c-2.6,0-5-1-6.8-2.8L19.2,77.3c-3.7-3.8-3.6-9.9,0.3-13.6 c3.7-3.6,9.6-3.6,13.3,0l29.6,29.5c3.7,3.8,3.7,9.9,0,13.6C60.6,108.6,58.2,109.7,55.6,109.7z M116.4,81.7c-2.6,0-5-1-6.8-2.8 L47.3,16.5c-3.7-3.8-3.7-9.9,0-13.6C51-0.9,57-1,60.8,2.7c0,0,0.1,0.1,0.1,0.1l62.3,62.3c3.7,3.8,3.7,9.9,0,13.6 C121.5,80.7,119,81.7,116.4,81.7z M116.4,126.1c-2.6,0-5-1-6.8-2.8L2.8,16.5c-3.8-3.8-3.7-9.9,0-13.7s9.9-3.7,13.7,0l106.7,106.7 c3.7,3.8,3.7,9.9,0,13.6C121.4,125.1,119,126.1,116.4,126.1z"/>
      </svg>
    </div>
    <div class="document-inputs">
      <div class="badge-img">
        <svg viewBox="0 0 62.4 39.6">
          <path d="M20.3,9.9c2,0,3.5,1.6,3.5,3.5S22.3,17,20.3,17c-2,0-3.5-1.6-3.5-3.5c0,0,0,0,0,0C16.8,11.5,18.4,9.9,20.3,9.9L20.3,9.9z M62.4,0H0v39.6h62.4V0z M30.4,38H11.5l9.4-9.4L30.4,38z M25.1,30.7l8.9-8.9L50.3,38H32.5L25.1,30.7z M60.9,38h-8.6l0.1-0.1
          L34.1,19.7l-10.1,10l-3.2-3.2L9.4,38L9.5,38h-8V1.5h59.3V38z"/>
        </svg>
      </div>
      <div class="badge-line-chart">
        <svg viewBox="0 0 51.73 51.73">
          <path d="M.6,0A.6.6,0,0,0,0,.6V51.13a.6.6,0,0,0,.6.6H51.13a.6.6,0,0,0,0-1.2H1.2V.6A.6.6,0,0,0,.6,0Zm43,11.43a3,3,0,0,0-1.82,5.13L34,28.72a2.94,2.94,0,0,0-1.56-.45A3,3,0,0,0,30,29.55l-6.78-4.38a3,3,0,0,0,.22-1.11,3,3,0,1,0-5.11,2.14L11,38a2.93,2.93,0,0,0-.79-.11,3,3,0,1,0,1.86.66l7.26-11.71a3,3,0,0,0,1.11.22,3,3,0,0,0,2.12-.88l7,4.49a3.15,3.15,0,0,0-.05.6,3,3,0,1,0,5.47-1.73L42.8,17.22a3,3,0,0,0,1.11.22,3,3,0,0,0,0-6h-.3Zm.3,1.2a1.8,1.8,0,1,1-1.8,1.8h0a1.8,1.8,0,0,1,1.8-1.8ZM20.45,22.26a1.8,1.8,0,1,1-1.8,1.8h0A1.8,1.8,0,0,1,20.45,22.26Zm12,7.22a1.8,1.8,0,1,1-1.8,1.8h0A1.8,1.8,0,0,1,32.48,29.47ZM10.23,39.1a1.8,1.8,0,1,1-1.8,1.8h0A1.8,1.8,0,0,1,10.23,39.1Z"/>
        </svg>
      </div>
      <div class="badge-table">
        <svg viewBox="0 0 59.2 40.4">
          <path d="M59.2,7.1H0V0h59.2V7.1z M58.4,7.7H0.7v7.5h57.7L58.4,7.7 M59.2,7.1v8.8H0V7.1L59.2,7.1z M58.4,15.9H0.7v7.5 h57.7V15.9 M59.2,15.2v8.8H0v-8.8L59.2,15.2z M58.4,24.1H0.7v7.5h57.7V24.1 M59.2,23.4v8.8H0v-8.8L59.2,23.4z M58.4,32.2H0.7v7.5 h57.7V32.2 M59.2,31.6v8.8H0v-8.8L59.2,31.6z M58.7,7.8H18.5v7.5h40.2L58.7,7.8 M59.2,7.1v8.8H18V7.1L59.2,7.1z M58.7,15.9H18.5v7.5 h40.2V15.9 M59.2,15.2v8.8H18v-8.8L59.2,15.2z M58.7,24.1H18.5v7.5h40.2V24.1 M59.2,23.4v8.8H18v-8.8L59.2,23.4z M58.7,32.2H18.5 v7.5h40.2V32.2 M59.2,31.6v8.8H18v-8.8L59.2,31.6z M58.8,7.8H31.5v7.5h27.3L58.8,7.8 M59.2,7.1v8.8h-28V7.1L59.2,7.1z M58.8,15.9 H31.5v7.5h27.3V15.9 M59.2,15.3v8.8h-28v-8.8L59.2,15.3z M58.8,24.1H31.5v7.5h27.3V24.1 M59.2,23.4v8.8h-28v-8.8L59.2,23.4z M58.8,32.2H31.5v7.5h27.3V32.2 M59.2,31.6v8.8h-28v-8.8L59.2,31.6z M59,7.7H44.1v7.5H59L59,7.7 M59.2,7.1v8.8H43.9V7.1L59.2,7.1z M59,15.9H44.1v7.5H59L59,15.9 M59.2,15.3v8.8H43.9v-8.8L59.2,15.3z M59,24.1H44.1v7.5H59V24.1 M59.2,23.4v8.8H43.9v-8.8L59.2,23.4z M59,32.2H44.1v7.5H59V32.2 M59.2,31.6v8.8H43.9v-8.8L59.2,31.6z"/>
        </svg>
      </div>
      <div class="badge-video">
        <svg viewBox="0 0 60.7 34.2">
          <path d="M59.8,1v32.3H1V1H59.8 M60.7,0H0v34.2h60.7L60.7,0z M23,28.1l19-11l-19-11L23,28.1z"/>
        </svg>
      </div>
      <div class="badge-bar-chart">
        <svg viewBox="0 0 58.3 51">
          <path d="M11.1,25.1v25.2H0.6V25.1L11.1,25.1 M11.7,24.5H0V51h11.7V24.5z M26.6,12.3v38.1H16.1V12.3H26.6 M27.2,11.6 H15.5V51h11.7V11.6z M57.7,33.4v16.9H47.2V33.4H57.7 M58.3,32.8H46.6V51h11.7L58.3,32.8z M42.7,0H31.1v51h11.7V0z"/>
        </svg>
      </div>
      <div class="badge-pie-chart">
        <svg viewBox="0 0 60.6 60.6">
          <path d="M11,53.6l-0.2-0.2C-2,42.7-3.6,23.6,7.1,10.8C12.7,3.9,21,0,29.8,0c0.2,0,0.3,0,0.5,0l0.2,0l0,30.4l-0.1,0.1L11,53.6z M29.8,0.5C21.1,0.5,13,4.4,7.5,11.1C-3,23.7-1.5,42.3,10.9,52.9L30,30.2l0-29.7C30,0.5,29.9,0.5,29.8,0.5z M30.3,30.3l29.6,5.2 C57,51.9,41.4,62.8,25.1,59.9C19.8,59,15,56.8,11,53.3L30.3,30.3z M30.3,60.6c-1.7,0-3.5-0.2-5.3-0.5c-5.3-0.9-10.2-3.1-14.2-6.6 l-0.2-0.2l0.2-0.2L30.2,30l30,5.3l0,0.2C57.5,50.2,44.7,60.6,30.3,60.6z M11.3,53.3c3.9,3.3,8.7,5.5,13.8,6.3 c16.1,2.8,31.5-7.9,34.5-23.9l-29.2-5.2L11.3,53.3z M60.1,35.8l-30-5.3V0h0.2C47,0,60.6,13.6,60.6,30.3c0,1.8-0.1,3.5-0.5,5.3 L60.1,35.8z M30.5,30.1l29.1,5.1c0.3-1.6,0.4-3.3,0.4-4.9C60.1,14,46.8,0.6,30.5,0.5V30.1z"/>
        </svg>
      </div>
    </div>
    <div class="document-outputs">
      <div class="badge-contracts"><a href="#"><span>Contracts</span></a></div>
      <div class="badge-proposals"><a href="#"><span>Proposals</span></a></div>
      <div class="badge-quotes"><a href="#"><span>Quotes</span></a></div>
      <div class="badge-invoices"><a href="#"><span>Invoices</span></a></div>
    </div>
  </div>
<?php endif; ?>

<?php return ob_get_clean(); }); ?>