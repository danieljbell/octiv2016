<?php
/*
==============================
GET CARD LAYOUT
==============================
*/
add_shortcode('get_card', function($atts) {
  extract(shortcode_atts(
    array(
      'thumb' => 'false',
      'thumb_modifier' => '',
      'excerpt' => 'false',
      'class' => '',
      'tag' => '',
    ), $atts));
    ob_start(); ?>
<div class="card">
  <a class="card-image" href="<?php echo get_the_permalink(); ?>" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>);"></a>
  <h4><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
  <div class="card-description"><?php echo the_excerpt(); ?></div>
  <a href="<?php echo get_the_permalink(); ?>" class="btn-arrow">Learn More <span class="arrow">></span></a>
</div>      
<?php
    return ob_get_clean();
});


/*
==============================
GET TEMPLATE PART
==============================
*/
add_shortcode('get_partial', function($atts) {
  $atts = shortcode_atts(
    array(
      'name' => ''
    ), $atts);
    ob_start();
    get_template_part('partials/display', $atts[name]);
    $ret = ob_get_contents();
    ob_end_clean();
    return $ret;
});

/*
==============================
GET HERO
==============================
*/
add_shortcode('get_hero', function($atts) {
  extract(shortcode_atts(
    array(
      'title' => single_post_title('', false),
      'img' => '',
    ), $atts));
    ob_start(); ?>
<section class="hero"
  <?php if( $img ) : ?>
    style="
      background-image: linear-gradient(rgba(0,0,0,0.65),rgba(0,0,0,0.65)),url(<?php echo $img; ?>);
      background-size: cover;
      background-position: center;
    "
  <?php endif; ?>>
  <div class="site-width">
    <h1><?php echo $title; ?></h1>
    <?php
    echo (!is_single() ? '<a href="#0" class="btn-primary rad-modal">Some CTA Button</a>' : '<h2>' . get_the_excerpt() . '</h2>');
    ?>
  </div>
</section>
<?php
    return ob_get_clean();
});



/*
==============================
SET UP CONTAINER
==============================
*/
add_shortcode('container', function($atts, $content = null) {
  return '<section><div class="site-width">' . do_shortcode($content) . '</div></section>';
});



/*
==============================
VIDEO EMBED
==============================
*/
add_shortcode('embed_video', function($atts) {
  extract(shortcode_atts(
    array(
      'src' => '',
    ), $atts));
    ob_start(); ?>
  <div class="video-outer">
    <div class="video-inner">
      <iframe src="<?php echo $src; ?>" frameborder="0" height="100%" width="100%"></iframe>
    </div>
  </div>
<?php
    return ob_get_clean();
});
