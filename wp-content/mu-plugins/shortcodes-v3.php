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
  
  <div class="card <?php if ($class) { echo $class; } ?>">
    <a class="card-image" href="<?php echo get_the_permalink(); ?>" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>);"></a>
    <div class="card-content">
      <h4><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
      <?php if ($excerpt != 'false') { echo '<div class="card-description">' . the_excerpt() . '</div>'; } ?>
      <a href="<?php echo get_the_permalink(); ?>" class="btn-arrow">Learn More <span class="arrow">></span></a>
    </div>
  </div>

<?php else : ?>
  <?php echo $item->url; ?>
  <!-- <div class="card <?php if ($class) { echo $class; } ?>">
    <a class="card-image" href="<?php echo $item->url; ?>" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>);"></a>
    <div class="card-content">
      <h4><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
      <?php if ($excerpt != 'false') { echo '<div class="card-description">' . the_excerpt() . '</div>'; } ?>
      <a href="<?php echo get_the_permalink(); ?>" class="btn-arrow">Learn More <span class="arrow">></span></a>
    </div>
  </div> -->

<?php endif; ?>
  
<?php
    return ob_get_clean();
});