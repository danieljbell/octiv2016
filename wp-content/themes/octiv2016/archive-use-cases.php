<?php get_header(); ?>

<div class="fixed-hero-section">
  <div class="site-width white-text">
    <h1><?php echo str_replace('Archives: ','',get_the_archive_title()); ?></h1>
  </div>
</div>

<?php get_template_part('partials/display', 'breadcrumbs'); ?>

<section>
  <div class="site-width">
    <div class="fourth-3-fourth">
      <div class="sticky-sidebar" id="sticky-sidebar">
        <h4><?php echo str_replace('Archives: ','',get_the_archive_title()); ?></h4>
        <hr>
      </div>
      <div class="sticky-listing">
        stuff
      </div>
    </div>
  </div>
</section>


<?php get_footer(); ?>
