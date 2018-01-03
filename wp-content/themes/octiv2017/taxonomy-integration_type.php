<?php
  $term = get_queried_object();
?>

<?php get_header(); ?>

<?php get_template_part('partials/module/display', 'hero'); ?>

<section class="notch">
  <div class="site-width">
    <div class="box--light">
      <div class="color-boxes">
        <h2 class="color-box-headline--brand-three"><?php echo get_field('notch_headline', $term); ?></h2>
      </div>
      <p class="has-text-center"><?php echo get_field('notch_body_copy', $term); ?></p>
      <ul class="integrations-category-slider hide">
        <?php
          $args = array(
            'post_type' => $post->post_type,
            'posts_per_page' => -1,
            'order' => 'ASC',
            'orderby' => 'menu_order',
            'tax_query' => array(
              array(
                'taxonomy' =>  $term->taxonomy,
                'field'    => 'slug',
                'terms'    => $term->slug,
              ),
            ),
          );
          $query = new WP_Query($args);
          if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
              echo '<li class="card"><a href="' . get_the_permalink() . '" title="' . get_the_title() . '"><img src="' . get_field('integration_logo') . '" alt="' . get_the_title() . '"></a></li>';
            endwhile;
          endif;
          wp_reset_query();
        ?>
      </ul>
    </div>
  </div>
</section>

<section class="page-sections pad-y-most">
  <ul class="page-section-list">
    <?php
      $count = 0;
      if (have_rows('page_section', $term)) :
        while (have_rows('page_section', $term)) : the_row();
          if (!get_sub_field('is_promoted_item')) {
            $count++;
          }
          if ($count > 2) {
            $count = -1;
          }
          echo do_shortcode('[page_section count="' . $count . '"]');
        endwhile;
      endif;
    ?>

<?php get_footer(); ?>