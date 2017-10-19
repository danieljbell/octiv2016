<?php
/*
==============================
Template Name: Archive
==============================
*/
?>

<?php get_header(); ?>

<?php
  $integration_categories = get_terms('integration_type');
  // create and empty array to fill with the acf order
  $sorted_cats = array();

  // loop through each term and push to the $sorted_cats array
  foreach($integration_categories as $cat){
    $ordr = get_field( 'order', $cat );
    $sorted_cats[$ordr] = $cat;
  }

  // sort the cats ASC
  ksort($sorted_cats);
?>

<main>

  <?php get_template_part('partials/module/display', 'hero'); ?>

  <?php get_template_part('partials/module/display', 'breadcrumbs'); ?>

  <section class="post-content mar-b-most">
    <div class="site-width">
      <div class="one-fourth">
        <aside id="sidebar">
          <div class="sidebar__inner">
            <h4>Integrations</h4>
            <hr style="margin: 0.25rem 0;">
            <ul class="no-bull">
              <?php foreach ($sorted_cats as $single_cat) : ?>
                <li><a href="#<?php echo $single_cat->slug; ?>"><?php echo $single_cat->name; ?></a></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </aside>
        <ul class="no-bull">
          <?php foreach ($sorted_cats as $single_cat) : ?>
            <li id="<?php echo $single_cat->slug; ?>" class="mar-b-most">
              <h3 style="margin-bottom: 0.5rem;"><?php echo $single_cat->name; ?></h3>
              <ul class="third no-bull">
                <?php
                  $args = array(
                    'post_type' => 'integration',
                    'posts_per_page' => -1,
                    'orderby' => 'menu_order',
                    'order' => 'ASC',
                    'tax_query' => array(
                      array(
                        'taxonomy' => 'integration_type',
                        'field' => 'slug',
                        'terms' => $single_cat->slug,
                      ),
                    ),
                  );
                  $query = new WP_Query($args);
                  if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                      echo do_shortcode('[get_card_v3 title="false" has_cta_text="false"]');
                    endwhile;
                  endif;
                  wp_reset_query();
                ?>
              </ul>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>