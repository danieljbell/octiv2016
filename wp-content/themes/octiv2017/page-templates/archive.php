<?php
/*
==============================
Template Name: Archive
==============================
*/
$post_type = get_field('post_type');
$post_parent = get_field('post_parent');
if ($post_type === 'post' || $post_type === 'solutions') {
  $post_parent = '0';
}
?>

<?php get_header(); ?>

<?php get_template_part('partials/module/display', 'hero'); ?>

<?php get_template_part('partials/module/display', 'breadcrumbs'); ?>

<section>
  <div class="site-width">
    <div class="third">
      <?php
        // print_r($post_type);
        // echo '<br>';
        // print_r($post_parent);
        $args = array(
          'post_type' => $post_type,
          'post_parent' => $post_parent,
          'posts_per_page' => -1
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) :
          while ($query->have_posts()) :
            $query->the_post();
              echo do_shortcode('[get_card_v3 excerpt="true"]');
          endwhile;
        endif;
        wp_reset_query();
      ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>