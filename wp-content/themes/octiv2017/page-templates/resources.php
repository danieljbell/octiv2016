<?php
/*
===================================
TEMPLATE NAME: Resources
===================================
*/

?>

<?php get_header(); ?>

<main>
  
  <?php get_template_part('partials/module/display', 'hero'); ?>

  <section style="margin-top: -3rem; margin-bottom: -3rem; position: relative; z-index: 2;">
    <div class="site-width">
      <div class="box--light" style="height: 400px;">
        Promoted Items
      </div>
    </div>
  </section>

  <section class="persistent-nav brand-two-callout">
    <div class="site-width">
      <h3 class="has-text-center">Resource By Type</h3>
      <ul>
        <li><a href="#0">item 1</a></li>
        <li><a href="#0">item 2</a></li>
        <li><a href="#0">item 3</a></li>
        <li><a href="#0">item 4</a></li>
        <li><a href="#0">item 5</a></li>
        <li><a href="#0">item 6</a></li>
      </ul>
    </div>
  </section>

  <section class="resource-grid">
    <div class="site-width">
      <div class="third-only pad-y-most">
        <div class="fancy-text-input">
          <input id="resource-search" class="text-search-bar" type="text" placeholder="Search All Blog Posts">
          <!-- <label for="resource-search">Search All Blog Posts</label> -->
        </div>
      </div>
      <div class="third">
        <?php
          if (have_posts()) :
            while (have_posts()) : the_post();
              echo '<h2>' . get_the_title() . '</h2>';
            endwhile;
          endif;
        ?>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>