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
      <div class="card <?php if ($class) {echo $class;} ?> ">
        <?php if ($thumb === 'true') : ?>
          <?php
            if (!get_post_thumbnail_id($post->ID)) :
              if ($thumb_modifier === 'client') {
                echo '<a href="' . get_the_permalink() . '" style="background-image: url(/wp-content/uploads/2017/06/WHITE-megaphone.png), radial-gradient(rgba(185,73,245,0.75), rgba(185,73,245,0)), url(/wp-content/themes/octiv2016/dist/img/octiv-pattern.svg), linear-gradient(rgba(185,73,245,1), rgba(185,73,245,1)); background-size: 125px, cover, cover, cover; background-repeat: no-repeat;" class="card-tb" title="' . get_the_title() . '"></a>';
              } else {
                echo '<a href="' . get_the_permalink() . '" style="background-image: url(/wp-content/themes/octiv2016/dist/img/octiv-pattern.svg), linear-gradient(rgba(237,76,6,1), rgba(237,76,6,1));" class="card-tb" title="' . get_the_title() . '"></a>';
              }
            else :
              if ($thumb_modifier === 'thought-leadership') {
                if (get_field('external_event')) {
                  echo '<a href="' . get_field('external_event_link') . '" style="background-image: url(/wp-content/uploads/2017/06/WHITE-light-bulb.png), radial-gradient(rgba(66,176,216,0.75) 20%, rgba(66,176,216,0)), linear-gradient(rgba(66,176,216,0.6),rgba(66,176,216,0.6)), url(' . wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ) . '); background-size: 125px, cover, cover, cover; background-repeat: no-repeat;" class="card-tb" title="' . get_the_title() . '"></a>';
                } else {
                  echo '<a href="' . get_the_permalink() . '" style="background-image: url(/wp-content/uploads/2017/06/WHITE-light-bulb.png), radial-gradient(rgba(66,176,216,0.75) 20%, rgba(66,176,216,0)), linear-gradient(rgba(66,176,216,0.6),rgba(66,176,216,0.6)), url(' . wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ) . '); background-size: 125px, cover, cover, cover; background-repeat: no-repeat;" class="card-tb" title="' . get_the_title() . '"></a>';
                }
              } elseif ($thumb_modifier === 'platform') {
                echo '<a href="' . get_the_permalink() . '" style="background-image: url(/wp-content/uploads/2017/06/WHITE-online-meetings.png), radial-gradient(rgba(51,171,64,0.75) 20%,rgba(51,171,64,0)), linear-gradient(rgba(51,171,64,0.6),rgba(51,171,64,0.6)), url(' . wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ) . '); background-size: 125px, cover, cover, cover; background-repeat: no-repeat;" class="card-tb" title="' . get_the_title() . '"></a>';
              } else {
                echo '<a href="' . get_the_permalink() . '" style="background-image: url(' . wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ) . ');" class="card-tb" title="' . get_the_title() . '"></a>';
              }
            endif;
          ?>
        <?php endif; ?>
        <div>
          <?php
            if ($tag === 'beta') :
              echo '<p class="card-tag-webinars float-r-a">Beta</p>';
            endif;
            if ($thumb_modifier === 'thought-leadership') :
              echo '<p class="card-tag-webinars">Thought Leadership</p>';
            endif;
            if ($thumb_modifier === 'platform') :
              echo '<p class="card-tag-blog">Platform</p>';
            endif;
            if ($thumb_modifier === 'client') :
              echo '<p class="card-tag-client-stories">Client</p>';
            endif;
            if ($tag === 'roadmap') :
              echo '<p class="card-tag-blog float-r-a">Roadmap</p>';
            endif;
            if ($tag === 'blog') :
              echo '<p class="card-tag-blog"><svg viewBox="0 0 11.5 11.5"><use xlink:href="#icon-blog"></svg><span>Blog</span></p>';
            endif;
            if ($tag === 'whitepapers') :
              echo '<p class="card-tag-whitepapers"><svg viewBox="0 0 16.2 11"><use xlink:href="#icon-whitepapers"></svg><span>downloads</span></p>';
            endif;
            if ($tag === 'client-stories') :
              echo '<p class="card-tag-client-stories"><svg viewBox="0 0 12.8 12.6"><use xlink:href="#icon-client-story"></svg><span>client stories</span></p>';
            endif;
            if ($tag === 'webinars') :
              echo '<p class="card-tag-webinars"><svg viewBox="0 0 16 11"><use xlink:href="#icon-webinar"></svg><span>webinars</span></p>';
            endif;
            if ($excerpt === 'true') :
              echo '<h4><a href="' . get_the_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a></h4>';
              the_excerpt();
            elseif ($excerpt === 'custom') :
              echo '<h4><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
              echo '<p>' . get_field('short_description', $post->ID) . '</p>';
            elseif ($excerpt === 'date') :
              $event_start = get_field('event_start_date');
              $event_start = substr($event_start, 0, 4) . '-'. substr($event_start, 4, 2) . '-' . substr($event_start, 6);
              $start_date = date_create($event_start);
              $start_date_year = date_format($start_date,"Y");
              $start_date_month = date_format($start_date,"F");
              $start_date_day = date_format($start_date,"j");
              if (get_field('event_end_date')) {
                $event_end = get_field('event_end_date');
                $event_end = substr($event_end, 0, 4) . '-'. substr($event_end, 4, 2) . '-' . substr($event_end, 6);
                $end_date = date_create($event_end);
                $end_date_day = date_format($end_date,"j");
              }
              if (get_field('external_event')) {
                echo '<h4><a href="' . get_field('external_event_link') . '" title="' . get_the_title() . '">' . get_the_title() . '</a></h4>';
              } else {
                echo '<h4><a href="' . get_the_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a></h4>';
              }
              echo '<p>';
                echo $start_date_month;
                echo ' ';
                echo $start_date_day;
                if ($start_date_day = $end_date_day) {
                  echo '-';
                  echo $end_date_day;
                }
                echo ', ';
                echo $start_date_year;
                echo '</p>';
            else :
              echo '<h4 style="margin-bottom: 1rem;"><a href="' . get_the_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a></h4>';
            endif;
          ?>
          <?php
            if (get_field('external_event')) {
              echo '<p><a href="' . get_field('external_event_link') .'" class="btn-arrow" title="' . get_the_title() . '">Learn More</a></p>';
            } else {
              echo '<p><a href="' . get_the_permalink() .'" class="btn-arrow" title="' . get_the_title() . '">Learn More</a></p>';
            }
          ?>
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



/*
==============================
VIDEO EMBED
==============================
*/
add_shortcode('get_current_customers', function($atts) {
  extract(shortcode_atts(
    array(
      'count' => '8',
      'columns' => 'fourth'
    ), $atts));

  ob_start();
  $args = array(
    'post_type' => 'page',
    'post_parent' => 74,
    'posts_per_page' => $count,
    'orderby' => 'menu_order'
  );

  $query = new WP_Query($args);

  if ($query->have_posts()) :
    echo '<ul class="' . $columns . '" style="list-style-type: none; padding-left: 0; margin-bottom: 0;">';
    while ($query->have_posts()) : $query->the_post();
      echo '<li><a href="' . get_the_permalink() . '" title="' . get_the_title() . '"><img src="' . get_field('client_logo') . '" alt="' . get_the_title() . '"></a></li>';
    endwhile;
    echo '</ul>';
  endif;
  wp_reset_query();

  return ob_get_clean();
});
