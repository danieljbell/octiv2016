<?php get_header(); ?>

<main>
  
  <?php get_template_part('partials/module/display', 'hero'); ?>

  <?php get_template_part('partials/module/display', 'breadcrumbs'); ?>

  <section class="pad-b-most">
    <div class="site-width">
      <?php
        $args = array(
          'post_type' => 'press-releases',
          'posts_per_page' => 10
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) :
          echo '<ul class="press-release-listing">';
          while ($query->have_posts()) : $query->the_post(); ?>
          <li class="press-release-item">
            <time><?php echo get_the_date(); ?></time>
            <h3><a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a></h3>
            <p><?php echo strip_tags(get_the_excerpt()); ?></p>
          </li>
      <?php
          endwhile;
          echo '</ul>';
        endif;
      ?>
      <div class="has-text-center">
        <button id="load-more-press" class="btn-primary">Load More Press Releases</button>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>