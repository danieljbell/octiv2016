<?php get_header(); ?>

<?php $no_images = array('support', 'press-releases'); ?>

<main>
  
  <?php get_template_part('partials/module/display', 'hero'); ?>

  <section class="pad-y-most">
    <div class="site-width">
      <?php
        if (have_posts()) :
          echo '<div id="post-list" class="third">';
          while (have_posts()) : the_post();
            if (in_array($_GET['post_type'], $no_images)) {
              echo do_shortcode('[get_card_v3 thumb="false"]');
            } else {
              if (($post->post_type === 'library')) {
                if ($post->post_parent === 0) {
                  echo do_shortcode('[get_card_v3 thumb="true" class="sidebar-card"]');
                }
              } elseif ($post->post_type === 'integration') {
                echo do_shortcode('[get_card_v3 class="sidebar-card integration-search"]');
              } else {
                echo do_shortcode('[get_card_v3 thumb="true" class="sidebar-card"]');
              }
            }
          endwhile;
          echo '</ul>';
        endif;
      ?>
    </div>
  </section>

</main>

<?php get_footer(); ?>