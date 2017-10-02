<?php
/*
==============================
TEMPLATE NAME: Landing Page
==============================
*/

get_header();

?>

<main>

  <?php get_template_part('partials/module/display', 'hero'); ?>

  <section class="page-content">
    <div class="site-width">
      <div class="two-third">
        <div class="content-container">
          <?php if (get_field('show_cover_on_lp')) {
            echo '<img src="' . get_field('cover_image') . '" alt="' . get_the_title() . ' Cover" class="content-cover">';
          } ?>
          <?php the_content(); ?>
        </div>
        <aside>
          asdfasf
        </aside>
      </div>
    </div>
  </section>
  
</main>

<?php get_footer(); ?>