<?php
/*
==============================
Template Name: Careers
==============================
*/

?>

<?php get_header(); ?>

<main>

  <?php get_template_part('partials/module/display', 'hero'); ?>

  <?php get_template_part('partials/module/display', 'breadcrumbs'); ?>

  <section>
    <div class="site-width">
      <div class="half pad-y-more">
        <div>
          <h2>Come Join Our Growing Team</h2>
          <p>Octiv was founded to provide sales teams a better way to create the assets they need to close deals. We’re passionate about bringing insight, analytics and automation to sales and have earned our position as an industry leader by empowering hundreds of companies around the world to create, deliver and track sales materials online.</p>
          <a href="/company/careers/#openings" class="btn-primary">View All Opportunities</a>
        </div>
        <div style="background-image: url(/wp-content/uploads/2016/07/team-togetherness.jpg); background-size: cover; background-position: center;">
          <!-- <img src="/wp-content/uploads/2016/07/team-togetherness.jpg" alt="Team" style="width: 100%;"> -->
        </div>
      </div>
    </div>
  </section>

  <section id="employee-testimonials">
    <ul class="third employee-testimonials-list">
      <?php get_template_part('partials/module/query', 'employee-testimonials'); ?>
    </ul>
  </section>

  <section id="openings">
    <div class="site-width">
      <h2 class="has-text-center">Current Openings</h2>
      <div id="grnhse_app"></div>
    </div>
  </section>

  <?php
    $greenhouse_page = parse_str($_SERVER['gh_jid']);
    if ($post->ID === 148 || $greenhouse_page) :
      echo '<script src="https://boards.greenhouse.io/embed/job_board/js?for=octiv"></script>';
    endif;
  ?>
  
</main>

<?php get_footer(); ?>