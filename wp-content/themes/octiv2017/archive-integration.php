<?php get_header(); ?>

<?php get_template_part('partials/module/display', 'hero'); ?>

<?php get_template_part('partials/module/display', 'breadcrumbs'); ?>

<section>
  <div class="site-width">
    <div class="one-fourth">
      <div>
      <h4><?php echo get_the_title(); ?></h4>
      <hr>
      <ul>
        <li>stuff 1</li>
        <li>stuff 2</li>
        <li>stuff 3</li>
        <li>stuff 4</li>
      </ul>
      </div>
      <div class="third">
        <?php
          if (have_posts()) :
            while (have_posts()) : the_post();
              echo do_shortcode('[get_card_v3 excerpt="false" thumb="false"]');
            endwhile;
          endif;
        ?>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>