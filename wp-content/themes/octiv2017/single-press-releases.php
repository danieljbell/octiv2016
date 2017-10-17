<?php get_header(); ?>


<main>
  
  <?php get_template_part('partials/module/display', 'hero'); ?>

  <?php get_template_part('partials/module/display', 'breadcrumbs'); ?>

  <section class="pad-b-most">
    <div class="site-width">
      <div class="two-third">
        <article>
          <?php the_content(); ?>
          <hr>
          <h3>About Octiv</h3>
          <p>Octiv provides a document generation platform designed to create efficiencies in creating documents like proposals, quotes, contracts, presentations and more. Octiv integrates data from back-office systems to streamline workflows, save time and accelerate the document creation and delivery process. Founded in 2010, Octiv services more than 400 organizations including enterprises such as General Electric and Siemens, and high-growth companies such as Lindamood-Bell and G/O Digital. To learn more, visit <a href="/" title="Octiv Homepage">octiv.com</a>.</p>
          <p><strong>Media Contact</strong><br>Kelli Blystone<br><a href="tel:3175500148,721">317.550.0148 ext. 721</a><br><a href="mailto:kelli.blystone@octiv.com">kelli.blystone@octiv.com</a></p>
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