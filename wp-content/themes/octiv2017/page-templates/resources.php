<?php
/*
===================================
TEMPLATE NAME: Resource Layout
===================================
*/

?>

<?php get_header(); ?>

<main>
  
  <?php get_template_part('partials/module/display', 'hero'); ?>

  <section style="margin-top: -3rem; margin-bottom: -3rem; position: relative; z-index: 2;">
    <div class="site-width">
      <div class="box--light" style="height: 400px;">
        Promoted Items
      </div>
    </div>
  </section>

  <section class="persistent-nav brand-two-callout">
    <div class="site-width">
      <h3 class="has-text-center">Resource By Type</h3>
      <?php
        wp_nav_menu(
          array(
            'menu' => 'resource-links',
          )
        );
      ?>
    </div>
  </section>

  <section class="resource-grid">
    <div class="site-width">
      <div class="third-only pad-y-most">
        <div class="fancy-text-input">
          <input id="resource-search" class="text-search-bar" type="text" placeholder="Search All Blog Posts">
          <!-- <label for="resource-search">Search All Blog Posts</label> -->
        </div>
      </div>
      <div class="third mar-b-most">
        <?php
          $args = array(
            'post_type' => 'post',
            'posts_per_page' => 3
          );
          $query = new WP_Query($args);
        ?>
        <?php
          if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
              echo do_shortcode('[get_card_v3 excerpt="true"]');
            endwhile;
          endif;
          wp_reset_query();
        ?>
      </div>
      <div class="ajaxed-posts"></div>
      <div class="has-text-center mar-b-most">
        <button id="more-posts" class="btn-brand--outline">Load More Blog Posts</button>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>