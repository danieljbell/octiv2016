<?php get_header(); ?>


<main>
  
  <?php get_template_part('partials/module/display', 'hero'); ?>

  <?php get_template_part('partials/module/display', 'breadcrumbs'); ?>

  <section class="pad-b-most">
    <div class="site-width">
      <div class="two-third">
        <article>
          <?php the_content(); ?>
        </article>
        <aside>
          <h4>Other Recent Press Releases</h4>
          <hr style="margin: 0;">
          <?php
            $args = array(
              'post_type' => 'press-releases',
              'posts_per_page' => 5
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) :
              echo '<ul class="press-sidebar-links">';
              while ($query->have_posts()) : $query->the_post();
                echo '<li><a href="' . get_the_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a></li>';
              endwhile;
              echo '</ul>';
              echo '<div class="has-text-center">';
                echo '<a href="/press-releases" class="btn-brand--outline" title="View All Press Releases">View All Press Releases</a>';
              echo '</div>';
            endif;
          ?>
        </aside>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>