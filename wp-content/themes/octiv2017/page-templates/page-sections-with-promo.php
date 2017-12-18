<?php
/*
=======================================
TEMPLATE NAME: Page Sections with Promo
=======================================
*/
$url_array = explode("/", $_SERVER['REQUEST_URI']);
$direct_child_singular = substr($url_array[1], 0, -1);
$meta_term = $url_array[2];
// print_r($direct_child_singular);
?>

<?php get_header(); ?>

<main>

<?php get_template_part('partials/module/display', 'hero'); ?>

<section class="notch">
  <div class="site-width">
    <div class="box--light">
      <div class="color-boxes">
        <h2 class="color-box-headline--brand-three">seomth</h2>
      </div>
      <p class="has-text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat iste eius asperiores nam nobis vitae?</p>
      <ul class="integrations-category-slider hide">
        <?php
          $args = array(
            'post_type' => $direct_child_singular,
            'posts_per_page' => -1,
            'order' => 'ASC',
            'orderby' => 'menu_order',
            'tax_query' => array(
              array(
                'taxonomy' => $direct_child_singular . '_type',
                'field'    => 'slug',
                'terms'    => $meta_term,
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

<?php get_template_part('partials/module/display', 'page-sections'); ?>
  
<?php get_template_part('partials/module/display', 'powers-documents'); ?>

</main>

<?php get_footer(); ?>