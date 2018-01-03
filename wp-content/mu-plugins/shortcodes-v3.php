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
    if (!$card_image) {
      $card_image = get_field('integration_logo');
    }
    if (!$card_image) {
      $card_image = '/wp-content/themes/octiv2017/dist/img/default-thumbnail.jpg';
    }
  ?>
  
  <div class="card <?php if ($class) { echo $class; } ?>">
    <?php if ($thumb != 'false') : ?>
      <a class="card-image" href="<?php echo get_the_permalink(); ?>" style="background-image: url(<?php echo $card_image; ?>);"></a>
    <?php endif; ?>
    
    <?php if (!$is_integration_archive) : ?>
      <?php if ($title != 'false' && $has_cta_text != 'false') : ?>
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

add_shortcode('display_headshots', function($atts) {
  extract(shortcode_atts(
    array(
      'post_type' => '',
    ), $atts)
  );
  ob_start();
?>
  <?php
    if (have_rows('speakers', $post_type)) :
      echo '<ul class="event-headshot-listing">';
      while (have_rows('speakers', $post_type)) :
        the_row();
          echo '<li class="speaker-item">';
            echo '<div class="person-headshot">';
              echo '<img src="' . get_sub_field('speaker_headshot') . '" alt="' . get_sub_field('speaker_name') . '">';
            echo '</div>';
            echo '<div class="speaker-details">';
              echo '<p class="speaker-name">' . get_sub_field('speaker_name') . '</p>';
              echo '<p class="speaker-company">' . get_sub_field('speaker_company') . '</p>';
            echo '</div>';
          echo '</li>';
      endwhile;
      echo '</ul>';
    endif;
  ?>
<?php
    return ob_get_clean();
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
    ), $atts)
  );
  ob_start();
?>

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
      <div class="badge-contracts"><a href="/solutions/for-contracts/"><span>Contracts</span></a></div>
      <div class="badge-proposals"><a href="/solutions/for-proposals/"><span>Proposals</span></a></div>
      <div class="badge-quotes"><a href="/solutions/for-quotes/"><span>Quotes</span></a></div>
      <div class="badge-invoices"><a href="/solutions/for-invoices/"><span>Invoices</span></a></div>
    </div>
  </div>
<?php endif; ?>

<?php if ($tag === 'platform--share') : ?>
  <div class="animation-platform--share">
    <div class="badge">
      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 225.6 284.5" xml:space="preserve">
        <polygon style="fill: #fff" points="225.6,284.5 0.2,284.5 0,0 225.6,0 "/>
        <rect x="27.6" y="222.5" width="172.1" height="10.3"/>
        <rect x="27.6" y="203.4" width="20.7" height="10.3"/>
        <rect x="180.6" y="203.4" width="18.7" height="10.3"/>
        <rect class="purple-edit" x="27.6" y="184.3" width="172.1" height="10.3"/>
        <rect x="27.6" y="159.7" width="172.1" height="10.3"/>
        <rect x="27.6" y="141.4" width="56" height="10.3"/>
        <rect class="purple-edit" x="143.7" y="141.4" width="56" height="10.3"/>
        <rect class="blue-edit" x="27.6" y="123" width="172.1" height="10.3"/>
        <rect x="27.6" y="104.7" width="78.4" height="10.3"/>
        <rect x="27.6" y="86" width="78.4" height="10.3"/>
        <rect class="blue-edit" x="27.6" y="67.3" width="78.4" height="10.3"/>
        <rect x="27.6" y="48.6" width="78.4" height="10.3"/>
        <rect x="27.8" y="29.8" width="78.2" height="10.3"/>
        <rect x="32.9" y="252.2" transform="matrix(0.7071 0.7071 -0.7071 0.7071 192.5993 52.0808)" width="1.1" height="12.7"/>
        <rect x="32.9" y="252.2" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -173.015 99.3616)" width="1.1" height="12.7"/>
        <rect x="28.3" y="266.8" width="171.8" height="1.3"/>
        <rect x="89.1" y="139.8" class="st2" width="50.5" height="12.9"/>
        <rect class="green-edit" x="54.7" y="202.2" class="st2" width="121.4" height="12.9"/>
        <path class="st2" d="M190.4,114.8h-60.6c-5.4,0-9.8-4.4-9.8-9.8V42.8c0-5.4,4.4-9.8,9.8-9.8h60.6c5.4,0,9.8,4.4,9.8,9.8V105
          C200.2,110.4,195.8,114.8,190.4,114.8z"/>
        <polygon class="blue-edit" points="193.8,78.4 177.2,60.7 149.2,87.6 126.5,75.1 126.5,106.1 193.8,106.1 "/>
        <circle class="blue-edit" cx="143.7" cy="63.2" r="7.8"/>
      </svg>
      <img src="/wp-content/themes/octiv2017/dist/img/blue-person.jpg" alt="Blue Person" class="badge-person blue-person">
      <img src="/wp-content/themes/octiv2017/dist/img/green-person.jpg" alt="Green Person" class="badge-person green-person">
      <img src="/wp-content/themes/octiv2017/dist/img/purple-person.jpg" alt="Purple Person" class="badge-person purple-person">
    </div>
  </div>
<?php endif; ?>

<?php if ($tag === 'platform--sign') : ?>
  <div class="animation-platform--sign">
    <div class="badge">
      <svg class="sign-document" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 225.6 284.5" xml:space="preserve">
        <polygon style="fill: #fff" points="225.6,284.5 0.2,284.5 0,0 225.6,0 "/>
        <rect x="27.6" y="222.5" width="172.1" height="10.3"/>
        <rect x="27.6" y="203.4" width="20.7" height="10.3"/>
        <rect x="180.6" y="203.4" width="18.7" height="10.3"/>
        <rect class="purple-edit" x="27.6" y="184.3" width="172.1" height="10.3"/>
        <rect x="27.6" y="159.7" width="172.1" height="10.3"/>
        <rect x="27.6" y="141.4" width="56" height="10.3"/>
        <rect class="purple-edit" x="143.7" y="141.4" width="56" height="10.3"/>
        <rect class="blue-edit" x="27.6" y="123" width="172.1" height="10.3"/>
        <rect x="27.6" y="104.7" width="78.4" height="10.3"/>
        <rect x="27.6" y="86" width="78.4" height="10.3"/>
        <rect class="blue-edit" x="27.6" y="67.3" width="78.4" height="10.3"/>
        <rect x="27.6" y="48.6" width="78.4" height="10.3"/>
        <rect x="27.8" y="29.8" width="78.2" height="10.3"/>
        <rect x="32.9" y="252.2" transform="matrix(0.7071 0.7071 -0.7071 0.7071 192.5993 52.0808)" width="1.1" height="12.7"/>
        <rect x="32.9" y="252.2" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -173.015 99.3616)" width="1.1" height="12.7"/>
        <rect x="28.3" y="266.8" width="171.8" height="1.3"/>
        <rect x="89.1" y="139.8" class="st2" width="50.5" height="12.9"/>
        <rect class="green-edit" x="54.7" y="202.2" class="st2" width="121.4" height="12.9"/>
        <path class="st2" d="M190.4,114.8h-60.6c-5.4,0-9.8-4.4-9.8-9.8V42.8c0-5.4,4.4-9.8,9.8-9.8h60.6c5.4,0,9.8,4.4,9.8,9.8V105
          C200.2,110.4,195.8,114.8,190.4,114.8z"/>
        <polygon class="blue-edit" points="193.8,78.4 177.2,60.7 149.2,87.6 126.5,75.1 126.5,106.1 193.8,106.1 "/>
        <circle class="blue-edit" cx="143.7" cy="63.2" r="7.8"/>
      </svg>
      <svg class="animated-signature" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 303.9 51.5" xml:space="preserve">
        <path d="M302.8,23c-14.7,3-29.1,5.3-44.5,7.3l-11.2,1.4l3.5-2.3c9.8-6.7,18.4-13.9,22.2-16c0.4-0.2,0.7-0.4,0.9-0.6 c0.1-0.1,0.4-0.4-0.2-0.8c-0.6-0.3-1.5-0.2-1.6-0.2c-2.6,0.2-13.8,3.8-26.1,7.3c-5.9,1.7-11.8,3.3-16.5,4.5 c-3.9,0.9-6.5,1.3-7.8,1.4l-0.8,0l0-0.1c0-0.2,0.2-0.5,1-1.2l-2.1-0.7c-2.4,1.1-4.5,1.7-6.3,2.1l-0.7,0.1v-0.7c-0.8,0-1.5,0-2.1,0 l-0.3,0l-3.3,0.1c-13.3,0.7-26.1,3.8-36.9,5.7c-6.5,1.2-13.9,2.2-20,4.1c-0.9,0.3-2,0.9-2.9,1.5l-0.1,0l0.1-0.7 c3.3-10.2,29.6-24.1,37.7-33.9l-2.5-0.4c-6.3,7.7-24.9,18.4-33.6,27.7c-15.6,0.1-27.6,3-40.9,3.7l-2.8,0.1l0.1-0.1 c0.6-0.4,1.2-0.8,1.7-1.2l-2.1-0.7C99.8,33,93,35.5,89.3,36c-1.3,0.2-1.7,0.1-1.8-0.6c0-1,1.2-3,4.5-6.2c0.3-0.3,0.9-0.7,1.6-1.1 l0.5-0.2l2.9-0.4c1.4-0.2,2.9-0.5,4.2-0.8c5.7-1.2,11.8-2.9,13.3-4c1.5-1.1,2.3-2,2-2.6c-0.2-0.4-0.9-0.7-1.8-0.8 c-2.7-0.2-8.4,1.7-13.2,3.6c-2.5,1-5.1,2.1-7.2,3.1l-1.7,0.9L92,26.8c-2.1,0.2-3.5,0.2-4,0l-1.5-0.1c-3.6,0.8-5.8,1.9-8.7,2.4h-0.1 l0.1-0.3c-0.1-0.4-0.9-0.6-1.8-0.6C75,28.4,72.2,29,69,29.9l-0.7,0.2l2.4-2.1c0.8-0.7,1.5-1.5,2.1-2.2c7.8-8.8,5.8-17.2-13.5-17 C62,6,64.6,3.3,67.1,0.4L64.8,0c-2.7,3-5.5,6-8.4,8.9c-6.2,0.3-13.9,1.4-23.4,3.5C19.7,15.3,7.1,19.1,0,25.3l2.3,0.5 C9,19.9,21,16.3,34.1,13.4c8.6-1.9,15.5-2.9,21.1-3.3c-7.1,7.2-14.6,14.4-22.4,21.5C21.8,33.8,11,36.6,8.8,38 C7,39.1-1.8,44.6,6.9,46c3.5,0.6,6.9,0.9,10.4,0.9c0.4,0,0.9,0,1.3,0c-0.2,0.2-0.3,0.5-0.5,0.7c-1,1.3-1.9,2.7-1.9,3.2 c0,0,0,0.4,0.8,0.6c0.2,0,0.5,0.1,0.7,0.1c0.6,0,1-0.2,1-0.2c0.3-0.1,0.6-0.3,0.9-0.6c1.6-1.2,1.8-2.4,2.6-3.4l-1.1-0.2l0.2-0.3 c15.7-0.6,30.4-5.9,40.7-12.4l3.2-2.2l2.1-0.6c2-0.6,4.1-1.1,5.7-1.5l1-0.2l0.6,0.7c4.1,0,7.5-1.2,10.4-2.1l2.1-0.6l0.2,0.1 c0.4,0.1,0.9,0.1,1.5,0.1l1.7-0.1l-0.9,0.6c-3.3,3.3-4.7,5.4-4.7,6.7c0,1.6,2.2,2.1,5,1.7c2.2-0.3,5.2-1.1,8.2-2.2l3.6-1.4l0.3,0.3 c15.9,0,28.9-3.6,45.7-3.8c-2.2,2.6-3.6,5.1-3.6,7.4c0,0.1,0,0.2,0,0.3c0.2,0.6,1.7,0.8,2.6,0.4c1.3-0.5,3.1-2.1,4.7-2.6 c5.8-1.8,12.6-2.8,19.5-4c9.6-1.7,20-4.1,30.8-5.2l4.1-0.3c0.1,0.2,0.5,0.5,1,0.6c1.7,0.4,5.4,0.3,9.9-1.1l1.4-0.5l0.2,0.3 c0.2,0.2,0.6,0.4,1.1,0.6c2.3,0.5,6.9-0.4,11.2-1.4c4.9-1.2,10.8-2.8,16.7-4.5c6.1-1.8,13.7-4.1,18.9-5.6l2.7-0.8l-2,1.4 c-4.6,3.3-11.5,8.7-18.6,13.6c-1.2,0.9-2.5,1.7-3.7,2.5l-1.5,0.9l-0.6,0.1l-0.1,0c-0.7,0.1-10.3,1.8-17.7,3.6 c-3.6,0.9-7,1.9-8.2,2.9c-1.8,1.4,0.6,2.4,5,2.8c0.5,0,1.1,0.1,1.6,0.1c6.1-0.1,13.3-3.4,20.2-7.5l1.4-0.9l14.3-1.8 c15.5-2.1,30-4.3,44.9-7.4L302.8,23z M99.5,25.1c1.2-0.5,2.4-1,3.7-1.5c4.6-1.8,8.8-3,10.5-3.2l0.2,0l-0.2,0.3 c-0.2,0.3-0.7,0.7-1.5,1.3c-1,0.8-6.2,2.3-12.1,3.5L97.5,26L99.5,25.1z M17.4,45.8c-3.2,0-6.4-0.3-9.6-0.8c-4.8-0.8-0.1-4.3,3.1-6.3 c1.5-1,10.3-3.4,20.1-5.4c-3.7,3.4-7,6.7-9.9,10.4c-0.5,0.6-1,1.3-1.7,2.1C18.8,45.8,18.1,45.8,17.4,45.8z M59.8,33.9 c-9.8,6.1-23.4,11-37.6,11.8c0.5-0.6,0.9-1.2,1.3-1.7c3.2-4.1,6.9-7.6,11.1-11.5c1.9-0.4,3.8-0.7,5.6-1c6.4-1.1,12-1.6,15.1-1.3 c2.3,0.2,3.6,0.9,0.7,3.5l1.9,0.7c0.3-0.1,0.8-0.2,1.4-0.4l0.8-0.2L59.8,33.9z M65.8,29.7l-2.4,1.7l-0.8,0.2l-2.7,0.8l0.1-0.2 c0.9-1.7-0.5-2.9-4.1-3.2c-3.9-0.3-10.1,0.3-16.5,1.4c-1,0.2-2,0.3-3,0.5c7.6-7,14.9-13.9,21.8-21c6.2-0.2,10.3,0.6,12.9,1.9 c5.1,2.6,4.5,7.8-0.6,13.5C69.1,26.8,67.5,28.3,65.8,29.7z M207.4,26l-0.1-0.2l0.5,0.2L207.4,26z M237.3,35.6 c-5.4,2.9-10.2,4.7-14,4.8c-0.4,0-0.8,0-1.2,0c-2.1-0.2-3-0.4-3.3-0.6c-0.1-0.1-0.3-0.2,0.1-0.4c0.9-0.7,3.6-1.5,7.3-2.5 c4.5-1.1,9.9-2.2,13.4-2.9l0.9-0.2L237.3,35.6z M154,30.5c3.8-1.8,8.8-2.3,13.8-2.4l0.1,1.2c-4.7,0.1-8.8,0.5-12,2L154,30.5z"/>
      </svg>
      <img src="/wp-content/themes/octiv2017/dist/img/blue-person.jpg" alt="Blue Person" class="badge-person blue-person">
      <img src="/wp-content/themes/octiv2017/dist/img/green-person.jpg" alt="Green Person" class="badge-person green-person">
      <img src="/wp-content/themes/octiv2017/dist/img/purple-person.jpg" alt="Purple Person" class="badge-person purple-person">
      <img src="/wp-content/themes/octiv2017/dist/img/yellow-person.jpg" alt="Yellow Person" class="badge-person yellow-person">
    </div>
  </div>
<?php endif; ?>

<?php if ($tag === 'platform--store') : ?>
  <div class="animation-platform--store">
    <div class="badge">
      <div class="badge--inner">
        <img src="/wp-content/themes/octiv2017/dist/img/octiv-shell.svg" alt="" class="octiv-shell">
        <img src="/wp-content/themes/octiv2017/dist/img/app-header.svg" alt="" class="application-header">
        <img src="/wp-content/themes/octiv2017/dist/img/repository-list.svg" alt="" class="repository-list">
      </div>
    </div>
  </div>
<?php endif; ?>

<?php if ($tag === 'platform--analyze') : ?>
  <div class="animation-platform--analyze">
    <div class="badge">
      <svg class="analyze-phone" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22.71 37">
        <defs>
          <style>.cls-1{fill:#fff;}.cls-2{fill:#828282;}.cls-3{fill:#ed4c06;}</style>
        </defs>
        <title>phone</title>
        <rect class="cls-1" y="4.92" width="22.7" height="25.14"/>
        <path class="cls-2" d="M11.4,31.4a1.9,1.9,0,1,0,1.9,1.9,1.9,1.9,0,0,0-1.9-1.9m0,2.9a1,1,0,1,1,1-1,1,1,0,0,1-1,1M9.7,2.5H13v.8H9.7ZM20.5,0H2.3A2.33,2.33,0,0,0,0,2.3V34.7A2.26,2.26,0,0,0,2.3,37H20.4a2.26,2.26,0,0,0,2.3-2.3V2.3A2.18,2.18,0,0,0,20.5,0M2.3,1.3H20.4a1,1,0,0,1,1,1V4.4H1.3V2.3a1,1,0,0,1,1-1m-1,3.9H21.5V29.7H1.3ZM20.5,35.8H2.3a1,1,0,0,1-1-1V30.6H21.5v4.2a1.08,1.08,0,0,1-1,1"/>
        <rect class="phone-notification cls-3" x="3.12" y="7.78" width="16.47" height="18.87"/>
        <path class="cls-1 phone-notification" d="M13.47,12.23a.38.38,0,0,1-.27-.11l-.71-.71a.38.38,0,1,1,.54-.54l.71.71a.38.38,0,0,1,0,.54A.39.39,0,0,1,13.47,12.23ZM11.33,15a.38.38,0,0,0,0-.54l-1.17-1.17a.38.38,0,0,0-.54.54L10.79,15a.39.39,0,0,0,.54,0Zm2.41-1.11a.38.38,0,0,0,0-.54l-2.47-2.47a.38.38,0,1,0-.54.54l2.47,2.47a.38.38,0,0,0,.27.11A.37.37,0,0,0,13.74,13.88Zm0,1.76a.38.38,0,0,0,0-.54L9.51,10.87a.38.38,0,0,0-.54.54l4.23,4.23a.39.39,0,0,0,.54,0Z"/>
        <path class="cls-1 phone-notification" d="M7.39,18,7,17.24h.3l.11.29.1.27h0l.1-.27.11-.29H8l-.38.8v.44H7.39Z"/>
        <path class="cls-1 phone-notification" d="M8.45,17.52A.5.5,0,1,1,8,18,.46.46,0,0,1,8.45,17.52Zm0,.77c.11,0,.17-.1.17-.27s-.06-.27-.17-.27-.17.11-.17.27S8.34,18.28,8.45,18.28Z"/>
        <path class="cls-1 phone-notification" d="M9.09,17.54h.28v.55c0,.14,0,.18.12.18s.11,0,.17-.1v-.63h.28v.95H9.71l0-.13h0a.37.37,0,0,1-.3.15c-.21,0-.29-.15-.29-.38Z"/>
        <path class="cls-1 phone-notification" d="M10.19,17.54h.23l0,.17h0a.32.32,0,0,1,.27-.19l.11,0,0,.24-.1,0a.23.23,0,0,0-.21.17v.55h-.28Z"/>
        <path class="cls-1 phone-notification" d="M11.3,17.86a.57.57,0,1,1,1.13,0,.57.57,0,1,1-1.13,0Zm.84,0c0-.25-.11-.4-.28-.4s-.28.15-.28.4.11.41.28.41S12.15,18.11,12.15,17.86Z"/>
        <path class="cls-1 phone-notification" d="M13.08,17.52a.38.38,0,0,1,.28.11l-.13.17a.2.2,0,0,0-.13-.06c-.14,0-.22.11-.22.27s.09.27.21.27a.27.27,0,0,0,.17-.07l.11.18a.49.49,0,0,1-.32.12.46.46,0,0,1-.47-.5A.48.48,0,0,1,13.08,17.52Z"/>
        <path class="cls-1 phone-notification" d="M13.57,17.76h-.13v-.21h.15l0-.25h.23v.25h.23v.22h-.23v.38c0,.11,0,.15.12.15l.09,0,0,.2a.69.69,0,0,1-.21,0c-.24,0-.33-.15-.33-.37Z"/>
        <path class="cls-1 phone-notification" d="M14.24,17.25a.15.15,0,0,1,.16-.15.15.15,0,1,1,0,.29A.15.15,0,0,1,14.24,17.25Zm0,.29h.28v.95h-.28Z"/>
        <path class="cls-1 phone-notification" d="M14.69,17.54H15l.12.45.08.29h0l.07-.29.12-.45h.27l-.31.95H15Z"/>
        <path class="cls-1 phone-notification" d="M5.67,19.42a.31.31,0,0,1,.23.1v-.47h.28v1.34H5.94l0-.09h0a.37.37,0,0,1-.25.12c-.24,0-.39-.19-.39-.5A.44.44,0,0,1,5.67,19.42Zm.07.76a.18.18,0,0,0,.15-.09v-.39a.22.22,0,0,0-.16-.06c-.09,0-.17.08-.17.26S5.63,20.19,5.74,20.19Z"/>
        <path class="cls-1 phone-notification" d="M6.83,19.42a.5.5,0,1,1-.46.5A.46.46,0,0,1,6.83,19.42Zm0,.77c.11,0,.17-.1.17-.27s-.06-.27-.17-.27-.17.11-.17.27S6.71,20.19,6.83,20.19Z"/>
        <path class="cls-1 phone-notification" d="M7.91,19.42a.38.38,0,0,1,.28.11l-.13.17a.2.2,0,0,0-.13-.06c-.14,0-.22.11-.22.27s.09.27.21.27a.27.27,0,0,0,.17-.07l.11.18a.49.49,0,0,1-.32.12.46.46,0,0,1-.47-.5A.48.48,0,0,1,7.91,19.42Z"/>
        <path class="cls-1 phone-notification" d="M8.36,19.45h.28V20c0,.14,0,.18.12.18s.11,0,.17-.1v-.63h.28v.95H9l0-.13H9a.37.37,0,0,1-.3.15c-.21,0-.29-.15-.29-.38Z"/>
        <path class="cls-1 phone-notification" d="M9.45,19.45h.23l0,.12h0a.4.4,0,0,1,.29-.14.26.26,0,0,1,.26.16.41.41,0,0,1,.3-.16c.2,0,.3.14.3.38v.59h-.28v-.55c0-.14,0-.18-.12-.18a.25.25,0,0,0-.16.09v.64H10v-.55c0-.14,0-.18-.12-.18a.25.25,0,0,0-.16.09v.64H9.45Z"/>
        <path class="cls-1 phone-notification" d="M11.48,19.42a.4.4,0,0,1,.4.45.56.56,0,0,1,0,.12H11.3a.23.23,0,0,0,.25.21.38.38,0,0,0,.2-.06l.09.17a.62.62,0,0,1-.34.11.5.5,0,0,1,0-1Zm.16.4c0-.11,0-.19-.16-.19s-.16.06-.18.19Z"/>
        <path class="cls-1 phone-notification" d="M12.07,19.45h.23l0,.12h0a.44.44,0,0,1,.3-.14c.21,0,.29.14.29.38v.59h-.28v-.55c0-.14,0-.18-.12-.18a.24.24,0,0,0-.18.09v.64h-.28Z"/>
        <path class="cls-1 phone-notification" d="M13.2,19.67h-.13v-.21h.15l0-.25h.23v.25h.23v.22h-.23V20c0,.11,0,.15.12.15l.09,0,0,.2a.69.69,0,0,1-.21,0c-.24,0-.33-.15-.33-.37Z"/>
        <path class="cls-1 phone-notification" d="M14.21,19.45h.28l.09.44,0,.28h0c0-.1,0-.19.06-.28l.11-.44H15l.11.44c0,.09,0,.19.06.28h0c0-.1,0-.19,0-.28l.09-.44h.26l-.23.95H15L15,20c0-.09,0-.18-.05-.28h0c0,.1,0,.19,0,.28l-.08.38h-.32Z"/>
        <path class="cls-1 phone-notification" d="M16.25,19.79a.13.13,0,0,0-.15-.14.51.51,0,0,0-.25.09l-.1-.19a.78.78,0,0,1,.41-.12c.24,0,.38.14.38.43v.54H16.3l0-.1h0a.41.41,0,0,1-.28.12.27.27,0,0,1-.28-.29C15.71,19.93,15.87,19.82,16.25,19.79Zm-.16.41a.21.21,0,0,0,.16-.08V20c-.2,0-.26.08-.26.16S16,20.2,16.09,20.2Z"/>
        <path class="cls-1 phone-notification" d="M16.81,20.11a.41.41,0,0,0,.24.1c.08,0,.12,0,.12-.08S17.08,20,17,20s-.25-.12-.25-.28.14-.3.36-.3a.54.54,0,0,1,.33.12l-.13.17a.35.35,0,0,0-.2-.08c-.07,0-.11,0-.11.07s.09.08.19.12.26.11.26.28-.14.31-.39.31a.61.61,0,0,1-.36-.13Z"/>
        <path class="cls-1 phone-notification" d="M6.53,21.35h.28v.94c0,.21-.08.38-.34.38a.43.43,0,0,1-.17,0l0-.21h.07c.07,0,.1,0,.1-.15Zm0-.29a.16.16,0,1,1,.16.15A.15.15,0,0,1,6.5,21.07Z"/>
        <path class="cls-1 phone-notification" d="M7,21.35h.28v.55c0,.14,0,.18.12.18s.11,0,.17-.1v-.63h.28v.95H7.66l0-.13h0a.37.37,0,0,1-.3.15c-.21,0-.29-.15-.29-.38Z"/>
        <path class="cls-1 phone-notification" d="M8.18,22a.41.41,0,0,0,.24.1c.08,0,.12,0,.12-.08s-.1-.09-.19-.13-.25-.12-.25-.28.14-.3.36-.3a.55.55,0,0,1,.33.12l-.13.17a.35.35,0,0,0-.2-.08c-.07,0-.11,0-.11.07s.09.08.19.12.26.11.26.28-.14.31-.39.31a.61.61,0,0,1-.36-.13Z"/>
        <path class="cls-1 phone-notification" d="M9,21.57H8.89v-.21H9l0-.25H9.3v.25h.23v.22H9.3V22c0,.11,0,.15.12.15l.09,0,0,.2a.7.7,0,0,1-.21,0c-.24,0-.33-.15-.33-.37Z"/>
        <path class="cls-1 phone-notification" d="M10.51,21.33a.5.5,0,1,1-.46.5A.46.46,0,0,1,10.51,21.33Zm0,.77c.11,0,.17-.11.17-.27s-.06-.27-.17-.27-.17.1-.17.27S10.4,22.1,10.51,22.1Z"/>
        <path class="cls-1 phone-notification" d="M11.45,22.37v.28h-.28v-1.3h.23l0,.09h0a.42.42,0,0,1,.27-.12c.23,0,.37.19.37.48s-.19.51-.4.51a.33.33,0,0,1-.23-.1Zm.15-.28c.1,0,.18-.08.18-.28s-.05-.26-.16-.26a.22.22,0,0,0-.16.09V22A.22.22,0,0,0,11.6,22.09Z"/>
        <path class="cls-1 phone-notification" d="M12.65,21.33a.4.4,0,0,1,.4.45.56.56,0,0,1,0,.12h-.57a.23.23,0,0,0,.25.21.38.38,0,0,0,.2-.06l.09.17a.62.62,0,0,1-.34.11.5.5,0,0,1,0-1Zm.16.4c0-.11,0-.19-.16-.19s-.16.06-.18.19Z"/>
        <path class="cls-1 phone-notification" d="M13.24,21.35h.23l0,.12h0a.44.44,0,0,1,.3-.14c.21,0,.29.15.29.38v.59h-.28v-.55c0-.14,0-.18-.12-.18a.24.24,0,0,0-.18.09v.64h-.28Z"/>
        <path class="cls-1 phone-notification" d="M14.73,21.33a.4.4,0,0,1,.4.45.56.56,0,0,1,0,.12h-.57a.23.23,0,0,0,.25.21A.38.38,0,0,0,15,22l.09.17a.62.62,0,0,1-.34.11.5.5,0,0,1,0-1Zm.16.4c0-.11,0-.19-.16-.19s-.16.06-.18.19Z"/>
        <path class="cls-1 phone-notification" d="M15.67,21.33a.31.31,0,0,1,.23.1V21h.28V22.3h-.23l0-.09h0a.37.37,0,0,1-.25.12c-.24,0-.39-.19-.39-.5A.44.44,0,0,1,15.67,21.33Zm.07.76a.18.18,0,0,0,.15-.09v-.39a.22.22,0,0,0-.16-.06c-.09,0-.17.08-.17.26S15.62,22.09,15.73,22.09Z"/>
      </svg>
    </div>
  </div>
<?php endif; ?>

<?php if ($tag === 'platform--manage') : ?>
  <div class="animation-platform--manage">
    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 374.2 377.9" xml:space="preserve">
      <g class="manage--container rotateClockwise">
        <path class="manage--analyze" d="M63.1,97.3c-0.8-1.6-2-3.5-2.9-5.1l0.1-0.1c1.6,1,3.4,2.4,4.9,3.4l1.1,0.7l-2.5,2.3L63.1,97.3z  M188.2,37.4l-14.7,38.1c-42.6,6.1-78.6,35.7-92.2,77.6l-0.1,0l-30.6-25L11,130.3l-1.1-0.4C33.6,57,98.3,6.3,173.7,0L188.2,37.4z  M76.4,97.2l-16.3-9.7l-4.3,3.9l8.1,17.2l3.6-3.3l-1.9-3.5l3.8-3.4l3.3,2.3L76.4,97.2z M86.9,87.7l-5.8-6.4 c-2.3-2.6-4.8-3.4-7.1-1.3c-1.4,1.3-1.8,2.9-1.9,4.5L72,84.6l-1.4-1l-2.9,2.6l9.4,10.4l3.6-3.2l-6.2-6.8c0.1-1,0.2-1.6,0.9-2.2 c0.7-0.6,1.3-0.6,2.5,0.7l5.4,5.9L86.9,87.7z M97.9,77.7l-5.2-5.8c-3.1-3.4-6-3.4-8.7-0.9c-1.6,1.5-2.7,3.3-3.3,5.5l3.4,1.2 c0.5-1.6,1.1-2.6,1.8-3.2c0.9-0.8,1.7-0.9,2.4-0.2c-3.6,4-4.2,6.7-2.2,8.9c1.5,1.7,4.1,2.1,6,0.4c1.1-1,1.6-2.3,1.7-3.8l0.1-0.1 l1.2,0.8L97.9,77.7z M105,71.1l-2.8-2.2c-0.1,0.2-0.2,0.3-0.3,0.4c-0.2,0.2-0.8,0.3-1.4-0.4L90.5,58L87,61.3L96.8,72 c2.1,2.3,4.3,3.2,6.7,1C104.3,72.3,104.8,71.6,105,71.1z M112.2,64.4L106.4,51l-3.4,3.1l2.6,4.9c0.7,1.2,1.3,2.4,2,3.5l-0.1,0.1 c-1.2-0.8-2.3-1.6-3.4-2.3l-4.9-2.8l-3.6,3.2l13,6.4l0.3,0.6c0.4,0.8,0.3,1.6-0.7,2.5c-0.2,0.2-0.6,0.4-0.8,0.5l1.8,3.3 c0.6-0.3,1.1-0.6,1.8-1.2C113.7,70.4,113.6,68.2,112.2,64.4z M125.2,52.8l-2.5-2.8l-4.1,3.7l-1.2-9.3l-1.7-1.9l-7.9,7.2l2.5,2.8 l3.5-3.2l1.2,9.3l1.7,1.9L125.2,52.8z M134.4,42.7l-3.1-1.1c-0.4,1.1-0.8,1.9-1.5,2.5c-1.2,1.1-2.4,1.5-4,0.4l5.9-5.4 c-0.2-0.3-0.6-0.9-1.1-1.5c-2.5-2.8-6-3.7-9.1-0.9c-2.5,2.3-3.1,6.6,0,9.9c3.1,3.4,7.3,3.3,10.3,0.6C132.9,46.3,134,44.5,134.4,42.7 z M89.1,79.7c0.4,0.5,1,0.4,1.6-0.1c0.6-0.5,0.6-1.1,0.6-1.9l-1.3-1.4C88.6,78.1,88.6,79.2,89.1,79.7z M124,39.4 c-0.8,0.7-1.1,1.8-0.2,3.1l3.1-2.8C126.1,38.8,125.1,38.4,124,39.4z"/>
        <path class="manage--store" d="M77.1,168.3l-30.2-24.6l-1.2-1l-1.5,0.1L5.4,145c-18,73.8,9.8,151.3,71.7,196.9l10.3-39.1L121,281 C85.6,254.7,68.9,210.9,77.1,168.3z M28.5,208.9c-0.8-2.2-0.9-4.9,0.1-7.4l4,1.4c-0.5,1.6-0.6,3.3-0.2,4.6c0.5,1.4,1.2,1.8,1.9,1.5 c0.8-0.3,0.8-1.3,0.8-2.9l0.1-2.5c0.1-2.1,1-4.3,3.5-5.2c2.9-1.1,6.3,0.7,7.7,4.4c0.7,1.9,0.8,4.4-0.2,6.5l-3.7-1.2 c0.4-1.5,0.4-2.6,0-3.9c-0.4-1.1-1.1-1.6-1.8-1.4c-0.8,0.3-0.7,1.4-0.8,3.2l0,2.4c-0.1,2.4-1.1,4.2-3.4,5.1 C33.5,214.6,30,213.1,28.5,208.9z M33.8,223.5c-1.3-3.4,0.4-5.6,3.6-6.8L42,215l-0.6-1.7l3.4-1.2l0.9,1.9l3.6-0.7l1.4,3.7l-3.4,1.3 l1.1,3l-3.5,1.3l-1.1-3l-4.5,1.7c-1.4,0.5-1.6,1.4-1.3,2.3c0.2,0.4,0.4,0.8,0.6,1.1l-3,1.9C35,225.8,34.4,225,33.8,223.5z  M37.8,234.3c-1.2-3.4,0.1-7.4,4.5-9.1c4.4-1.6,8,0.6,9.3,4c1.2,3.4-0.1,7.4-4.5,9.1C42.7,239.9,39,237.6,37.8,234.3z M41.5,243.3 l13.1-4.8l1.4,3.7l-2.1,1.1l0,0.1c2.1,0.3,3.5,1.5,3.9,2.8c0.3,0.8,0.4,1.3,0.3,1.7l-4.2,0.7c-0.1-0.5-0.1-1-0.3-1.5 c-0.3-0.9-1.4-1.9-3.2-1.9l-7.3,2.7L41.5,243.3z M56.9,263.3c-0.8,0.3-1.5,0.4-1.9,0.5l-2.8-7.5c-1.5,1-1.6,2.4-1.1,3.9 c0.3,0.9,0.9,1.6,1.8,2.4l-2.1,2.5c-1.5-1.1-2.7-2.7-3.3-4.2c-1.4-3.8,0-7.7,4.4-9.3c4.3-1.6,8,0.6,9.2,3.8 C62.6,259.1,60.5,262,56.9,263.3z M45.4,233.6c-2,0.7-3.5,0.7-4-0.7c-0.5-1.4,0.6-2.4,2.6-3.1c2-0.7,3.5-0.7,4,0.7 C48.5,231.9,47.4,232.9,45.4,233.6z M57.8,256.6c0.5,1.4-0.2,2.1-1.3,2.5l-1.4-3.9C56.6,255,57.4,255.6,57.8,256.6z"/>
        <path class="manage--sign" d="M191.8,348.3c0,0.8-1.2,1.3-2.7,1.3c-1.6,0-2.7-0.4-2.7-1.3c0-0.4,0.2-0.7,0.5-1 c0.4,0.1,0.9,0.2,2,0.2h1.1C191.2,347.4,191.8,347.5,191.8,348.3z M188.8,339.5c0.9,0,1.5-0.6,1.5-2c0-1.3-0.6-1.9-1.5-1.9 s-1.5,0.6-1.5,1.9C187.3,338.8,187.9,339.5,188.8,339.5z M296.5,341.7c-33.2,24.1-72.1,36.1-111,36.1c-33.2,0-66.5-8.8-96.2-26.4 l10.5-39.7l0.9-0.6l0,0l32.6-21c37.7,19.4,83.4,16.5,118.7-8.8l10.1,38.2L296.5,341.7z M172.5,341.3c0-2.5-1.3-4.1-3.6-5l-2.2-0.9 c-1.7-0.6-2.7-1-2.7-1.8c0-0.8,0.7-1.2,1.9-1.2c1.3,0,2.4,0.4,3.6,1.3l2.4-3c-1.7-1.7-4-2.4-6-2.4c-4,0-6.8,2.5-6.8,5.7 c0,2.6,1.7,4.3,3.7,5.1l2.3,1c1.5,0.6,2.5,0.9,2.5,1.8c0,0.8-0.6,1.3-2.1,1.3c-1.3,0-3-0.7-4.3-1.8l-2.7,3.3c2,1.8,4.6,2.6,6.9,2.6 C169.9,347.1,172.5,344.3,172.5,341.3z M180,332.7h-4.8v14h4.8V332.7z M180.3,328.6c0-1.4-1.1-2.4-2.7-2.4c-1.6,0-2.7,1-2.7,2.4 c0,1.4,1.1,2.4,2.7,2.4C179.2,331,180.3,330,180.3,328.6z M196.4,347.4c0-2.6-2-3.6-5.5-3.6h-2.1c-1.4,0-2-0.2-2-0.8 c0-0.4,0.1-0.6,0.3-0.8c0.6,0.1,1.1,0.2,1.6,0.2c3.1,0,5.7-1.3,5.7-4.6c0-0.6-0.1-1.1-0.2-1.5h2v-3.5H191c-0.7-0.2-1.5-0.3-2.2-0.3 c-3.1,0-6,1.6-6,5.1c0,1.6,0.9,2.9,1.9,3.6v0.1c-1,0.7-1.6,1.7-1.6,2.6c0,1.2,0.6,1.9,1.3,2.4v0.1c-1.3,0.7-2,1.5-2,2.7 c0,2.5,2.7,3.5,5.9,3.5C193.3,352.5,196.4,350.4,196.4,347.4z M211.4,338.1c0-3.5-1.3-5.7-4.4-5.7c-1.9,0-3.3,1-4.4,2h-0.1l-0.3-1.7 h-3.9v14h4.8v-9.2c0.7-0.7,1.2-1.1,2.1-1.1c1,0,1.4,0.4,1.4,2.2v8h4.8V338.1z"/>
        <path class="manage--share" d="M326.6,232.5l1.8,0.6c0.4,0.6,0.6,1.2,0.4,1.9c-0.2,0.8-0.7,1.1-1.3,0.9 C326.8,235.7,326.3,234.8,326.6,232.5z M329.9,206.4c-0.3,1,0,2,1.4,2.8l1.2-4C331.4,204.9,330.4,205,329.9,206.4z M307.7,331.9 l-33.2-21.4l-10.6-40.1c31.4-29.9,43.3-75.3,29.7-117.5l41.2,2.3l30.4-24.8C388.5,203.7,365.5,282.7,307.7,331.9z M319.7,257.5 c-2.4-0.7-4.3,0-5.8,1.9l-1.5,1.9c-1.1,1.4-1.7,2.3-2.5,2c-0.8-0.2-1-1.1-0.6-2.2c0.4-1.3,1.1-2.2,2.3-3.1l-2.2-3.2 c-2.1,1.1-3.5,3.1-4.1,5.1c-1.2,3.8,0.5,7.2,3.4,8.1c2.5,0.8,4.6-0.4,5.9-2l1.6-1.9c1-1.3,1.6-2.1,2.4-1.8c0.8,0.2,1.1,1,0.6,2.4 c-0.4,1.3-1.6,2.6-2.9,3.6l2.4,3.6c2.3-1.4,3.8-3.6,4.5-5.8C324.6,261.7,322.7,258.4,319.7,257.5z M329.6,243.9l-8.2-2.5 c-3.3-1-5.8-0.4-6.7,2.5c-0.6,1.8,0,3.4,0.5,4.5l-2.2-0.9l-4.3-1.3l-1.4,4.6l18.6,5.7l1.4-4.6l-8.8-2.7c-0.4-0.9-0.7-1.5-0.4-2.3 c0.3-0.9,0.8-1.2,2.6-0.7l7.7,2.3L329.6,243.9z M334,229.7l-7.4-2.3c-4.4-1.3-6.9,0.2-8,3.6c-0.6,2.1-0.6,4.2,0,6.4l3.5-0.7 c-0.3-1.6-0.4-2.8-0.1-3.7c0.4-1.2,1-1.6,2-1.4c-1,5.3-0.1,7.9,2.6,8.8c2.2,0.7,4.6-0.2,5.4-2.8c0.4-1.4,0.2-2.8-0.5-4.2l0-0.1 l1.4,0.1L334,229.7z M336.3,222.2l-7.4-2.3c-1.5-1.2-1.7-2.5-1.4-3.5c0.2-0.6,0.4-1,0.7-1.4l-3.7-2c-0.3,0.3-0.5,0.7-0.8,1.6 c-0.4,1.3-0.1,3.1,1.5,4.6l0,0.1l-2.4-0.4l-1.1,3.7l13.4,4.1L336.3,222.2z M340.5,203.9l-3.2,0.7c0.2,1.1,0.2,2.1,0,3 c-0.5,1.5-1.4,2.5-3.2,2.4l2.3-7.6c-0.3-0.2-1-0.5-1.8-0.7c-3.6-1.1-7.1-0.1-8.3,3.9c-1,3.3,0.7,7.2,5,8.6c4.4,1.4,7.9-0.8,9.1-4.8 C341.1,207.8,341.1,205.7,340.5,203.9z"/>
        <path class="manage--create" d="M279.2,74.7l-1.1,1.6c-0.7,0.2-1.3,0.3-2-0.2c-0.7-0.5-0.9-1-0.5-1.6 C276.1,73.9,277.1,73.7,279.2,74.7z M268.3,62c-0.9-0.6-2-0.6-3,0.5l3.4,2.3C269.4,63.8,269.5,62.8,268.3,62z M360.4,115.9 L330,140.7l-41.8-2.3c-18.6-37.4-56.6-61.8-99.3-62.8l14.7-38.1l-14.3-37C264.8,1.7,331.6,47.2,360.4,115.9z M247.2,57.9l-0.6-3.9 c-1.1,0.3-2.3,0.2-3.5-0.6c-2-1.3-2.2-3.8-0.3-6.6c1.8-2.7,4.5-3.3,6.3-2.1c1,0.7,1.4,1.5,1.7,2.6l3.8-1c-0.4-1.8-1.4-3.8-3.3-5.1 c-3.9-2.6-9.3-2.1-12.7,3c-3.5,5.2-1.8,10,2.1,12.6C242.7,58.1,245,58.5,247.2,57.9z M259.4,56.7c0.5,0.3,0.8,0.7,1.2,1.1l3-3 c-0.2-0.4-0.6-0.7-1.3-1.2c-1.1-0.8-2.9-0.9-4.8,0.1l-0.1-0.1l1.1-2.2l-3.3-2.2l-7.8,11.6l4,2.7l4.3-6.5 C257.2,55.9,258.6,56.1,259.4,56.7z M271.6,67.9c2.1-3.1,2.2-6.7-1.3-9c-2.8-1.9-7.1-1.4-9.7,2.3c-2.6,3.9-1.5,7.8,1.9,10.1 c1.3,0.9,3.3,1.5,5.1,1.5l0.3-3.2c-1.1-0.1-2-0.4-2.8-0.9c-1.3-0.9-2-2-1.4-3.8l6.6,4.4C270.6,69.2,271.1,68.6,271.6,67.9z  M284,76.1c2.6-3.8,1.8-6.7-1.2-8.7c-1.8-1.2-3.9-1.8-6.1-1.9l-0.4,3.5c1.6,0.2,2.7,0.4,3.6,1c1,0.7,1.3,1.4,0.8,2.3 c-4.8-2.5-7.5-2.4-9.2,0c-1.3,1.9-1.1,4.5,1.1,5.9c1.3,0.8,2.7,1,4.1,0.8l0.1,0.1l-0.5,1.3l3.3,2.2L284,76.1z M289.8,82.7l2.7-4 l2.6,1.8l2.1-3.1l-2.6-1.8l2-3l-3.3-2.2l-2.5,2.7l-1.9-1l-2,3l1.5,1l-2.7,4c-1.9,2.8-1.9,5.6,1.1,7.6c1.3,0.9,2.3,1.2,3,1.4l1.3-3.3 c-0.3-0.1-0.8-0.3-1.1-0.5C289.3,84.8,288.9,84,289.8,82.7z M304.3,81.8c-2.8-1.9-7.1-1.4-9.7,2.3c-2.6,3.9-1.5,7.8,1.9,10.1 c1.3,0.9,3.3,1.5,5.1,1.5l0.3-3.2c-1.1-0.1-2-0.4-2.8-0.9c-1.3-0.9-2-2-1.4-3.8l6.6,4.4c0.3-0.2,0.8-0.8,1.2-1.5 C307.7,87.7,307.7,84.1,304.3,81.8z M302.4,84.9c-0.9-0.6-2-0.6-3,0.5l3.4,2.3C303.4,86.7,303.6,85.7,302.4,84.9z"/>
      </g>
      <path class="manage--octiv-logo" d="M240.7,166.2c-2.5,0-5.2-1-7.1-2.9l-18.6-18.6c-3.9-3.9-3.9-10.3,0-14.2c3.9-3.9,10.3-3.9,14.2,0l18.6,18.6 c3.9,3.9,3.9,10.3,0,14.2C245.7,165.2,243.2,166.2,240.7,166.2 M177.4,241.4c-2.5,0-5.2-1-7.1-2.9l-30.5-30.7 c-3.9-4-3.9-10.3,0-14.2c3.9-3.9,10.3-3.9,14.2,0l30.7,30.7c3.9,3.9,3.9,10.3,0,14.2C182.6,240.5,180.1,241.4,177.4,241.4  M240.7,212.3c-2.5,0-5.2-1-7.1-2.9l-64.8-64.8c-3.9-3.9-3.9-10.3,0-14.2c4-3.9,10.3-3.9,14.2,0l64.8,64.8c3.9,3.9,3.9,10.3,0,14.2 C245.9,211.4,243.2,212.3,240.7,212.3 M240.7,258.4c-2.5,0-5.2-1-7.1-2.9l-111-111c-3.9-3.9-3.9-10.3,0-14.2c4-3.9,10.3-3.9,14.2,0 l111,111c3.9,3.9,3.9,10.3,0,14.2C245.7,257.5,243.2,258.4,240.7,258.4"/>
    </svg>
  </div>
<?php endif; ?>
<?php
  $integration_tags = array('integration--crm', 'integration--esignature', 'integration--cpq', 'integration--file-storage', 'integration--email', 'integration--finance', 'integration--forms', 'integration--sso');
  if (in_array($tag, $integration_tags)) :
    $meta_term = str_replace('integration--', '', $tag);
?>
  <div class="animation-integration--crm">
    <div class="badge">
      <ul class="animated-integrations-list">
        <?php
          $args = array(
            'post_type' => 'integration',
            'posts_per_page' => 6,
            'order' => 'ASC',
            'orderby' => 'menu_order',
            'tax_query' => array(
              array(
                'taxonomy' => 'integration_type',
                'field'    => 'slug',
                'terms'    => $meta_term,
              ),
            ),
          );
          $query = new WP_Query($args);
          if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post(); ?>
  <li><a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo get_field('integration_logo'); ?>" alt=""></a></li>
<?php
            endwhile;
          endif;
          wp_reset_query();
        ?>
      </ul>
    </div>
  </div>
<?php endif; ?>

<?php return ob_get_clean(); }); 


/*
==============================
PAGE SECTIONS AS SHORTCODE
==============================
*/
add_shortcode('page_section', function($atts) {
  extract(shortcode_atts(
    array(
      'count' => '',
    ), $atts)
  );
  ob_start();
?>
<?php
  $number_formatter = new NumberFormatter("en", NumberFormatter::SPELLOUT);
?>

<?php 
  
  $section_title = get_sub_field('section_title');
  $section_content = get_sub_field('section_content');
  $image_frame_class = get_sub_field('image_frame');
  $section_link = get_sub_field('section_call_to_action_link');
  $image_link = get_sub_field('is_image_linked');
  $image_link_location = get_sub_field('image_link');
  $section_class = 'reverse';
  if ($count % 2 == 0) {
    $section_class = 'swap-order';
  }
  if ($count > 3) {
    $count = 0;
  }
  $current_iteration = $number_formatter->format($count + 2);
  
  if (is_tax('integration_type')) {
    $current_iteration = $number_formatter->format($count + 3);
  }

  $is_video = get_sub_field('is_video_modal');
?>
<li class="page-section-item">
  <?php if (!get_sub_field('is_promoted_item')) : ?>
  <div class="site-width">
    <div class="half vertical-align <?php echo $section_class; ?>">
      <div>
        <div class="color-boxes">
          <h2 class="color-box-headline--brand-<?php echo $current_iteration; ?>"><?php echo $section_title; ?></h2>
        </div>
        <p><?php echo $section_content; ?></p>
        <?php if ($section_link) : ?>
          <a href="<?php echo $section_link; ?>" class="btn-brand-<?php echo $current_iteration; ?>--outline"><?php echo get_sub_field('section_call_to_action_title'); ?></a>
        <?php endif; ?>
      </div>
      <?php

        if (!get_sub_field('is_animation')) {

          if ($image_frame_class === 'browser-window') { echo '<div class="browser-window">'; }
        
          echo '<div class="img-container">';
            if ($image_link_location) {
              echo '<a href="' . $image_link_location . '">';
            }
            if ($is_video) {
              echo '<a href="#0" class="launch-video-modal" data-modal-type="' . get_sub_field('gated_or_ungated') . '" data-modal-id="' . get_sub_field('marketo_form_id') . '" data-modal-headline="' . get_sub_field('modal_headline') . '" data-modal-body="' . get_sub_field('modal_body') . '" data-video-provider="' . get_sub_field('video_provider') . '" data-video-id="' . get_sub_field('video_id') . '">';
            }
            echo '<img src="' . get_sub_field('section_image') . '" alt="' . get_sub_field('section_title') . '">';
            if ($image_link_location || $is_video) {
              echo '</a>';
            }
          echo '</div>';
          
          if ($image_frame_class) { echo '</div>'; }

        } else {

          $picked_animation = get_sub_field('choose_animation');
          echo '<div>' . do_shortcode('[custom_animation tag="' . $picked_animation . '"]') . '</div>';

        }
      ?>
    </div>
  </div>
  <?php else : 
    $custom_page = get_sub_field('pick_your_page')[0];
    $custom_page_ID = get_sub_field('pick_your_page')[0]->ID;
    $cta_text = 'Learn More';
    $cta_link = get_the_permalink($custom_page_ID);
    $thumb_id = get_post_thumbnail_id(get_sub_field('pick_your_page')[0]->ID);
    $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
    $thumb_url = $thumb_url_array[0];
    $promoted_headline = $custom_page->post_title;
    $promoted_body = $custom_page->post_excerpt;
    $promoted_class = 'page-section-promoted-item';
    $button_class = 'btn-primary';
    if (get_field('hero_image', $custom_page_ID)) {
      $thumb_url = get_field('hero_image', $custom_page_ID);
    }
    if (get_field('hero_title', $custom_page_ID)) {
      $promoted_headline = get_field('hero_title', $custom_page_ID);
    }
    if (get_field('hero_button_text', $custom_page_ID)) {
      $cta_text = get_field('hero_button_text', $custom_page_ID);
    }
    if ($custom_page->post_type === 'client-story') {
      $thumb_url = get_field('client_testimonial_image', $custom_page_ID);
      $promoted_body = get_field('highlighted_quote', $custom_page_ID);
      $promoted_class = 'client-story-quote';
      $company_logo = get_field('client_logo', $custom_page_ID);
      $button_class = 'btn-white--outline';
    }
  ?>
  <div class="<?php echo $promoted_class; ?>" style="background-image: linear-gradient(rgba(45, 57, 67, 0.7), rgba(45, 57, 67, 0.7)), url(<?php echo $thumb_url; ?>);">
    <div class="site-width">
      <?php if ($custom_page->post_type === 'client-story') : ?>
        <img src="<?php echo $company_logo; ?>" alt="" class="promoted-item-company-logo">
        <blockquote>
          <p class="quote"><?php echo $promoted_body; ?></p>
          <?php
            if (get_field('person_headshot', $custom_page_ID)) :
              echo '<div class="person-details-container has-person-headshot">';
                echo '<div class="person-headshot">';
                  echo '<img src="' . get_field('person_headshot', $custom_page_ID) . '" alt="">';
                echo '</div>';
            else :
              echo '<div class="person-details-container">';
            endif;                
          ?>
          <div class="person-details-content">
            <p class="person-name"><?php echo get_field('person_name', $custom_page_ID); ?></p>
            <p class="person-title"><?php echo get_field('person_title', $custom_page_ID); ?></p>
            <p class="person-company"><?php echo get_field('person_company', $custom_page_ID); ?></p>
          </div>
        </blockquote>
        <a href="<?php echo $cta_link; ?>" class="<?php echo $button_class; ?>">Learn More</a>
      <?php else : ?>
        <div class="color-boxes">
          <h2 class="color-box-headline--brand"><?php echo $promoted_headline; ?></h2>
        </div>
        <div class="two-third-only">
          <p><?php echo $promoted_body; ?></p>
          <a href="<?php echo $cta_link; ?>" class="<?php echo $button_class; ?>"><?php echo $cta_text; ?></a>
        </div>
      <?php endif; ?>
    </div>
  </div>
  <?php endif; ?>
</li>

<?php return ob_get_clean(); }); 