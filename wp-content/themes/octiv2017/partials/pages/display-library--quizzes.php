

<?php get_template_part('partials/module/display', 'hero'); ?>

<section class="notch">
  <div class="site-width">
    <div class="box--light">
      <?php the_content(); ?>
    </div>
  </div>
</section>


  <?php
    $args = array(
      'post_type' => 'library',
      'posts_per_page' => 3,
      'post__not_in' => array($post->ID),
      'tax_query' => array(
        array(
          'taxonomy' => 'library_type',
          'field'    => 'slug',
          'terms'    => 'quizzes',
        ),
      ),
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) : ?>
  <section class="other-quizzes">
    <div class="site-width has-text-center">
      <div class="color-boxes" style="margin-bottom: 0.5rem;">
        <h2 class="color-box-headline--brand-three">Other Quizzes You Might Want to Try</h2>
      </div>
      <p>Don't stop at just <?php echo get_the_title(); ?> Try another quiz now!</p>        
      <div class="third">
  <?php
    while ($query->have_posts()) : $query->the_post();
      echo do_shortcode('[get_card_v3]');
    endwhile; ?>
    </div>
  <?php      
      endif;
      wp_reset_query();
    ?>

  </div>
</section>

<?php get_template_part('partials/module/display', 'powers-documents'); ?>