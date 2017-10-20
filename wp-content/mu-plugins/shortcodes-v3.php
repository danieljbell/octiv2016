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