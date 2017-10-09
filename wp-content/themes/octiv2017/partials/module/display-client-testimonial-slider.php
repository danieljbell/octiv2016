<?php
  $args = array(
    'post_type' => 'client-story',
    'orderby' => 'menu_order',
    'order' => 'ASC'
  );
  $query = new WP_Query($args);
  if ($query->have_posts()) :
    echo '<ul class="slider-for">';
    while ($query->have_posts()) : $query->the_post();
      $thumb_url = get_field('client_testimonial_image');
  ?>
    <li style="background-image: radial-gradient(rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0)), linear-gradient(rgba(255, 255, 255, 0.6), rgba(255, 255, 255, 0.6)), url(<?php echo $thumb_url; ?>);">
      <div class="site-width">
        <div class="two-third-only">
          <img src="<?php echo get_field('client_logo'); ?>" alt="<?php echo get_the_title(); ?>" class="client-testimonial-logo">
          <p><?php echo strip_tags( get_the_excerpt() ); ?></p>
          <a href="<?php echo get_the_permalink(); ?>" class="btn-dark--outline">Learn More</a>
        </div>
      </div>
    </li>
  <?php 
    endwhile;
    echo '</ul>';
  endif;
  $query->rewind_posts();
  if ($query->have_posts()) :
    echo '<ul class="slider-nav">';
    while ($query->have_posts()) : $query->the_post(); ?>
      <li>
        <img src="<?php echo get_field('client_logo'); ?>" alt="<?php echo get_the_title(); ?>">
      </li>
  <?php
    endwhile;
    echo '</ul>';
  endif;
  ?>
<?php wp_reset_query(); ?>