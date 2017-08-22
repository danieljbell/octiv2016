<?php get_header(); ?>

<?php get_template_part('partials/module/display', 'hero'); ?>

<?php get_template_part('partials/module/display', 'breadcrumbs'); ?>

<main>
  <section>
    <div class="site-width">
      <div class="two-third">
        <aside class="">
          <h4><?php echo get_the_title(); ?></h4>
          <hr>
          <ul>
            <li></li>
          </ul>
        </aside>
        <article>
          <h3>Why Octiv &amp; <?php echo get_the_title(); ?></h3>
          <?php echo get_the_content(); ?>
          <h3 class="pad-t">Key Capabilities</h3>
          <?php
            if( have_rows('key_capabilities') ):
              echo '<ul>';
              while ( have_rows('key_capabilities') ) : the_row();
                  echo '<li>' . get_sub_field('key_capability') . '</li>';
              endwhile;
              echo '</ul>';
          endif;
          ?>
          <h3 class="pad-t">Technical Requirements</h3>
          <?php
            if( have_rows('technical_requirements') ):
              echo '<ul>';
              while ( have_rows('technical_requirements') ) : the_row();
                  echo '<li>' . get_sub_field('technical_requirement') . '</li>';
              endwhile;
              echo '</ul>';
          endif;
          ?>
          <h3 class="pad-t">About <?php echo get_the_title(); ?></h3>
          <p><?php echo get_field('integration_description'); ?></p>
          <p>For more information about <?php echo get_the_title(); ?>, please visit their <a href="<?php echo get_field('integration_link'); ?>" target="_blank" rel="noopener noreferrer">website</a>.</p>
        </article>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>