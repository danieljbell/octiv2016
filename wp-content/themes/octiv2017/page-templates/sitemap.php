<?php
/*
==============================
Template Name: HTML Sitemap
==============================
*/

$number_formatter = new NumberFormatter("en", NumberFormatter::SPELLOUT);
?>


<?php get_header(); ?>

<?php get_template_part('partials/module/display', 'hero'); ?>

<?php get_template_part('partials/module/display', 'breadcrumbs'); ?>

<main>

  <?php
    $args = array(
      'publicly_queryable' => true
    );
    $excludes = array('Media', 'Landing Pages', 'Features', 'Employee Testimonials', 'Support');
    $all_post_types = get_post_types($args, 'objects');
    $count = 0;
    foreach ($all_post_types as $post_type) {
      if (!in_array($post_type->label, $excludes)) {
        if ($post_type->label === 'Posts') {
          $post_name = 'Blog Posts';
        } elseif ($post_type->label === 'Library') {
          $post_name = 'Resources';
        } else {
          $post_name = $post_type->label;
        }
        $count++;
        if ($count > 3) {
          $count = 0;
        }
        $current_iteration = $number_formatter->format($count + 2);
        echo '<section class="pad-b-most">';
          echo '<div class="site-width">';
            echo '<div class="color-boxes">';
              echo '<h3 class="color-box-headline--brand-' . $current_iteration . '">' . $post_name . '</h3>';
            echo '</div>';
            $args = array(
              'post_type' => $post_type->name,
              'posts_per_page' => -1
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) :
              echo '<ul class="fourth" style="grid-row-gap: 0;">';
              while ($query->have_posts()) : $query->the_post();
                if ($post->post_type === 'library') {
                  if (!$post->post_parent > 0) {
                    echo '<li style="margin-bottom: 0.5rem;"><a href="' . get_the_permalink() . '" title="' . get_the_title() . '" style="text-decoration: none;">' . get_the_title() . '</a></li>';
                  }
                } else {
                  echo '<li style="margin-bottom: 0.5rem;"><a href="' . get_the_permalink() . '" title="' . get_the_title() . '" style="text-decoration: none;">' . get_the_title() . '</a></li>';
                }
              endwhile;
              echo '</ul>';
            endif;
            wp_reset_query();
          echo '</div>';
        echo '</section>';
      }
    }
  ?>

</main>

<?php get_footer(); ?>