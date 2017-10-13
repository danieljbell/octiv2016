<?php get_header(); ?>

<?php get_template_part('partials/module/display', 'hero'); ?>

<style>
  .hero {
    background-image: radial-gradient(rgba(45, 57, 67, 0.75),rgba(45, 57, 67, 0)), linear-gradient(rgba(45, 57, 67, 0.7), rgba(45, 57, 67, 0.7)), url(<?php echo get_stylesheet_directory_URI(); ?>/dist/img/octiv-pattern.svg), url('https://octiv.com/wp-content/uploads/2017/10/support-bg.jpg') !important;
  }
</style>

<section class="notch">
  <div class="site-width">
    <div class="half-only">
      <div class="two-third-only">
        <div class="box--light has-text-center">
          <h2>Need More Help?</h2>
          <p>Click the button if you need assistance from Octiv. If your request is urgent, please call global support 24 hours a day at 844-906-2848.</p>
          <button id="submit-ticket" class="btn-primary">Submit a "Help Me" Ticket</button>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="mar-y-most">
  <div class="site-width">
    <div class="fourth">
      <?php
        $args = array(
          'post_type' => 'support',
          'post_parent' => 0
        );

        $support_query = new WP_Query( $args );

        if ($support_query->have_posts()) :
          while ($support_query->have_posts()) :
            $support_query->the_post();
            echo do_shortcode('[get_card_v3 thumb="true"]');
          endwhile;
        endif;
        wp_reset_query();
      ?>
      <div class="card">
        <a href="/releases" class="card-image" style="background-image: url(/wp-content/uploads/2016/08/releases.png);"></a>
        <div class="card-content">
          <h4><a href="/releases">Releases</a></h4>
          <a href="/releases" class="btn-arrow">Learn More <span class="arrow">&gt;</span></a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>