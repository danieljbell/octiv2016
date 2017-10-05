<?php get_header(); ?>

<main>
  
<?php get_template_part('partials/module/display', 'hero'); ?>

<?php get_template_part('partials/module/display', 'breadcrumbs'); ?>

<section>
  <div class="site-width">
    <div class="one-fourth">
      <div>
        <input type="text" v-model="keyword" class="text-search-bar" placeholder="Search Blog Posts">
        <h4>Filter</h4>
        <hr>
        <ul>
          <li>thing</li>
          <li>thing</li>
          <li>thing</li>
        </ul>
      </div>
      <div class="half">
        <?php
          if (have_posts()) :
            while (have_posts()) : the_post();
              echo do_shortcode('[get_card_v3 excerpt="true"]');
            endwhile;
          endif;
        ?>
      </div>
    </div>
  </div>
</section>

<?php get_template_part('partials/module/display', 'powers-documents'); ?>

</main>

<?php get_footer(); ?>