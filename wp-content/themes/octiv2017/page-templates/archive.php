<?php
/*
==============================
Template Name: Archive
==============================
*/

?>

<?php get_header(); ?>

<?php get_template_part('partials/module/display', 'hero'); ?>

<?php get_template_part('partials/module/display', 'breadcrumbs'); ?>

<section>
  <div class="site-width">
    <div class="third">
      <?php
      echo $post->ID;
        $args = array(
          'post_type' => 'any',
          'post_parent' => $post->ID
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) :
          while ($query->have_posts()) :
            $query->the_post();
              echo do_shortcode('[get_card_v3 excerpt="true"]');
          endwhile;
        endif;
      ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>