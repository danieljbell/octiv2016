<?php get_header(); ?>

<style>
  .hero {
    background-image: 
      linear-gradient(rgba(0,0,0,0), rgba(0,0,0,0)),
      linear-gradient(rgba(0,0,0,0), rgba(0,0,0,0)),
      url(<?php echo get_stylesheet_directory_URI(); ?>/dist/img/octiv-pattern.svg),
      linear-gradient(<?php echo get_field('integration_color'); ?>, <?php echo get_field('integration_color'); ?>) !important;
  }
  .plus-sign {
    color: <?php echo get_field('integration_color'); ?>;
  }
</style>

<main>
  
  <?php get_template_part('partials/module/display', 'hero'); ?>

  <?php get_template_part('partials/module/display', 'breadcrumbs'); ?>

  <section class="post-content">
    <div class="site-width">
      <div class="one-fourth">
        <aside id="sidebar">
          <div class="sidebar__inner">
            <h4><?php echo get_the_title(); ?></h4>
            <hr>
            <ul>
              <li><a href="#why">Why Octiv &amp; <?php echo get_the_title(); ?></a></li>
              <li><a href="#key-capabilities">Key Capabilities</a></li>
              <li><a href="#technical-requirements">Technical Requirements</a></li>
              <li><a href="#about">About <?php echo get_the_title(); ?></a></li>
            </ul>
          </div>
        </aside>
        <article>
          <h3 id="why">Why Octiv &amp; <?php echo get_the_title(); ?></h3>
          <?php echo get_the_content(); ?>
          <h3 id="key-capabilities" class="pad-t">Key Capabilities</h3>
          <?php
            if( have_rows('key_capabilities') ):
              echo '<ul>';
              while ( have_rows('key_capabilities') ) : the_row();
                  echo '<li>' . get_sub_field('key_capability') . '</li>';
              endwhile;
              echo '</ul>';
          endif;
          ?>
          <h3 id="technical-requirements" class="pad-t">Technical Requirements</h3>
          <?php
            if( have_rows('technical_requirements') ):
              echo '<ul>';
              while ( have_rows('technical_requirements') ) : the_row();
                  echo '<li>' . get_sub_field('technical_requirement') . '</li>';
              endwhile;
              echo '</ul>';
          endif;
          ?>
          <?php 
            $customer_success = get_field('customer_success');
            if ($customer_success) :
          ?>
          <h3 id="customer-success">See Success Stories with <?php echo get_the_title(); ?></h3>
          <ul class="customer-success-thumbnails third">
            <?php
              foreach($customer_success as $post) :
                setup_postdata($post);
                $thumb_id = get_post_thumbnail_id();
                $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
                $thumb_url = $thumb_url_array[0];
                echo '<li><a href="' . get_the_permalink() . '" title="' . get_the_title() . '"><img src="' . $thumb_url . '"></a></li>';
                wp_reset_postdata();
              endforeach;
            ?>
          </ul>
          <?php endif; ?>
          <h3 id="about" class="pad-t">About <?php echo get_the_title(); ?></h3>
          <p><?php echo get_field('integration_description'); ?></p>
          <p>For more information about <?php echo get_the_title(); ?>, please visit their <a href="<?php echo get_field('integration_link'); ?>" target="_blank" rel="noopener noreferrer">website</a>.</p>
        </article>
      </div>
    </div>
  </section>
  <section class="related-integrations">
    <div class="site-width">
      <hr>
      <h2 class="has-text-center mar-b">Other Integrations You Might Find Interesting</h2>
      <?php
        $args = array(
          'post_type' => 'integration',
          'posts_per_page' => 3
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) :
          echo '<div class="third">';
            while ($query->have_posts()) :
              $query->the_post();
                echo do_shortcode('[get_card_v3 title="false" has_cta_text="false"]');
            endwhile;
          echo '</div>';
        endif;
        wp_reset_query();
      ?>
    </div>
  </section>
  <?php get_template_part('partials/module/display', 'powers-documents'); ?>
</main>

<?php get_footer(); ?>