<?php get_header(); ?>

<?php
/*
==============================
PAGE VARAIBLES
==============================
*/
$today = date('Ymd');
?>

<main>

  <?php get_template_part('partials/module/display', 'hero'); ?>

  <?php get_template_part('partials/module/display', 'breadcrumbs'); ?>

  <section id="upcoming-releases" class="pad-y-most">
    <div class="site-width">
      <div class="color-boxes">
        <h2 class="color-box-headline--brand-three">Upcoming Releases</h2>
      </div>
      <div class="third pad-t">
        <?php
          $args = array(
            'post_type' => 'releases',
            'post_parent' => 0,
            'meta_query' => array(
              array(
                'key'   => 'release_date',
                'compare' => '>=',
                'value'   => $today,
              )
            ),
          );
          $query = new WP_Query($args);
          if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
              echo do_shortcode('[get_card_v3 excerpt="false"]');
            endwhile;
          endif;
          wp_reset_query();
        ?>
      </div>
    </div>
  </section>

  <div class="site-width">
    <hr>
  </div>

  <section id="past-releases" class="pad-y-most">
    <div class="site-width">
      <div class="color-boxes">
        <h2 class="color-box-headline--brand-four">Past Releases</h2>
      </div>
      <div class="third pad-t">
        <?php
          $args = array(
            'post_type' => 'releases',
            'post_parent' => 0,
            'meta_query' => array(
              array(
                'key'   => 'release_date',
                'compare' => '<=',
                'value'   => $today,
              )
            ),
          );
          $query = new WP_Query($args);
          if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
              echo do_shortcode('[get_card_v3 excerpt="false"]');
            endwhile;
          endif;
          wp_reset_query();
        ?>
      </div>
    </div>
  </section>
  
  <?php get_template_part('partials/module/display', 'powers-documents'); ?>

</main>

<?php get_footer(); ?>