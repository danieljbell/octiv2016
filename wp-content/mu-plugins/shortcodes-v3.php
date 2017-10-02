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
      'thumb' => 'false',
      'excerpt' => 'false',
      'class' => '',
      'tag' => '',
    ), $atts));
    ob_start(); ?>

<?php if ($location != 'mega-menu-promo') : ?> 

  <?php
    $card_image = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
  ?>
  
  <div class="card <?php if ($class) { echo $class; } ?>">
    <?php if (!is_post_type_archive('integration')) : ?>
      <a class="card-image" href="<?php echo get_the_permalink(); ?>" style="background-image: url(<?php echo $card_image; ?>);"></a>
    <?php endif; ?>
    <div class="card-content">
      <?php if (!is_post_type_archive('integration')) : ?>
        <h4><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
      <?php else : ?>
        <a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo get_field('integration_logo'); ?>" alt="<?php echo get_the_title(); ?>"></a>
      <?php endif; ?>
      <?php
        if ($excerpt != 'false') { 
          echo '<div class="card-description">' . strip_tags(get_the_excerpt()) . '</div>'; 
        }
      ?>
      <?php if (!is_post_type_archive('integration')) : ?>
        <a href="<?php echo get_the_permalink(); ?>" class="btn-arrow">Learn More <span class="arrow">></span></a>
      <?php endif; ?>
    </div>
  </div>

<?php else : ?>


<?php endif; ?>
  
<?php
    return ob_get_clean();
});