<?php get_header();  ?>

<main>

  <?php // echo do_shortcode('[get_hero title="cool man" img="https://fillmurray.com/1920/500"]'); ?>

  <div class="site-width">
    <h3>grid</h3>
    <div class="half">
      <?php
        $args = array(
          'post_type' => 'post'
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) :
          while ($query->have_posts()) :
            $query->the_post();
              echo do_shortcode('[get_card]');
          endwhile;
        endif;
        wp_reset_query();
      ?>
    </div>
  </div>
  <section style="min-height: 1000px;">
    space
  </section>

</main>

<?php get_footer();  ?>