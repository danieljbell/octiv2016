<?php
if (have_rows('client_stories')) :
  if (count(get_field('client_stories')) > 1) {
    echo '<div class="slider">';
  }
  while (have_rows('client_stories')) :
    the_row();
    $args = array(
      'post_type' => 'any',
      'page_id' => get_sub_field('client_story')
    );
    $query = new WP_Query( $args );
    if ($query->have_posts()) :
      while ($query->have_posts()) :
        $query->the_post(); ?>
      <section style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(<?php echo get_field('client_testimonial_image'); ?>);">
        <div class="site-width">
          <div class="fourth-3-fourth">
            <div class="centered">
              <img src="<?php echo get_field('client_logo'); ?>" alt="<?php echo get_field('client_testimonial_company'); ?>" class="client-logo">
              <a href="<?php echo get_the_permalink(); ?>" class="btn-white-outline">View Case Study</a>
            </div>
            <div class="white-text">
              <?php
                if (get_sub_field('override_content')) {
                  echo '<h4>' . get_sub_field('content_override') . '</h4>';
                } else {
                  echo '<h4>' . get_field('client_testimonial') . '</h4>';
                }
              ?>
            </div>
          </div>
        </div>
      </section>        
<?php endwhile;
    endif;
    wp_reset_query();
  endwhile;
  if (count(get_field('client_stories')) > 1) {
    echo '</div>';
  }
endif;
?>

<!-- <section class="fat-section" style="background-image: url(//fillmurray.com/1920/400);">
  <div class="site-width">stuff</div>
</section> -->


<!-- <div role="listitem" style="background-image: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)), url(' . get_field('client_testimonial_image') . ');">
  <div class="site-width">
    <div class="centered">
      <img src="' . get_field('client_logo') . '" alt="' . get_field('client_testimonial_company') . '">
      <br>
      <a href="' . get_the_permalink() . '" class="btn-white-outline">Read Case Study</a>
    </div>
    <div>
      <h4>' . get_field('client_testimonial') . '</h4>
    </div>
  </div>
</div> -->