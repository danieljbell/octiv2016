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
      'excerpt' => 'false',
      'tag' => '',
    ), $atts));
    ob_start(); ?>
      <div class="card">
        <?php if ($thumb === 'true') : ?>
          <a href="<?php the_permalink(); ?>" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>);" class="card-tb"></a>
        <?php endif; ?>
        <div>
          <?php
            if ($tag === 'beta') :
              echo '<p class="card-tag-webinars float-r-a">Beta</p>';
            endif;
            if ($tag === 'roadmap') :
              echo '<p class="card-tag-blog float-r-a">Roadmap</p>';
            endif;
            if ($tag === 'blog') :
              echo '<p class="card-tag-blog"><svg viewBox="0 0 11.5 11.5"><use xlink:href="#icon-blog"></svg><span>Blog</span></p>';
            endif;
            if ($tag === 'whitepapers') :
              echo '<p class="card-tag-whitepapers"><svg viewBox="0 0 16.2 11"><use xlink:href="#icon-whitepapers"></svg><span>whitepapers</span></p>';
            endif;
            if ($tag === 'client-stories') :
              echo '<p class="card-tag-client-stories"><svg viewBox="0 0 12.8 12.6"><use xlink:href="#icon-client-story"></svg><span>client stories</span></p>';
            endif;
            if ($tag === 'webinars') :
              echo '<p class="card-tag-webinars"><svg viewBox="0 0 16 11"><use xlink:href="#icon-webinar"></svg><span>webinars</span></p>';
            endif;
            if ($excerpt === 'true') :
              echo '<h4><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
              the_excerpt();
            elseif ($excerpt === 'custom') :
              echo '<h4><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
              echo '<p>' . get_field('short_description', $post->ID) . '</p>';
            else :
              echo '<h4 style="margin-bottom: 1rem;"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
            endif;
          ?>
          <p><a href="<?php the_permalink(); ?>" class="btn-arrow">Learn More</a></p>
        </div>
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
      'img' => ''
    ), $atts));
    ob_start(); ?>
<div class="fixed-hero-section"
  <?php if( $img ) : ?>
    style="
      background-image: linear-gradient(rgba(0,0,0,0.65),rgba(0,0,0,0.65)),url(<?php echo $img; ?>);
      background-size: cover;
    "
  <?php endif; ?>>
  <div class="site-width white-text">
    <h1><?php echo $title; ?></h1>
  </div>
</div>
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
