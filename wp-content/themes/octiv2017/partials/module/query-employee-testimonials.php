<?php
  $args = array(
    'post_type'      => 'employee-testimonial',
    'orderby'        => 'rand',
    'posts_per_page' => 3
  );
  $query = new WP_Query($args);
  if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post(); ?>
      <li class="quote">
        <?php echo get_field('employee_quote'); ?>
        <div class="person-details-container">
          <div class="person-headshot has-person-headshot">
            <img src="<?php echo get_field('employee_headshot')[url] ?>" alt="<?php echo get_the_title(); ?>'s Headshot">
          </div>
          <div class="person-details-content">
            <p class="person-name"><?php echo get_the_title(); ?></p>
            <p class="person-title"><?php echo get_field('employee_title'); ?></p>
          </div>
        </div>
      </li>
  <?php
    endwhile;
  endif;
  wp_reset_query();
?>