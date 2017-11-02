<?php
/*
==============================
Template Name: Careers
==============================
*/
$greenhouse_page = parse_str($_SERVER['gh_jid']);
?>

<?php get_header(); ?>

  <main>

    <?php get_template_part('partials/module/display', 'hero'); ?>

    <?php get_template_part('partials/module/display', 'breadcrumbs'); ?>

    <?php if (isset($_GET['gh_jid'])) : ?>
      
      <section id="openings">
        <div class="site-width">
          <div id="grnhse_app"></div>
        </div>
      </section>

    <?php else : ?>

      <section class="pad-y-most">
        <div class="site-width">
          <div class="half vertical-align">
            <div>
              <h2>Come Join Our Growing Team</h2>
              <p>Octiv was founded to provide sales teams a better way to create the assets they need to close deals. We’re passionate about bringing insight, analytics and automation to sales and have earned our position as an industry leader by empowering hundreds of companies around the world to create, deliver and track sales materials online.</p>
              <a href="/company/careers/#openings" class="btn-primary">View All Opportunities</a>
            </div>
            <div style="background-image: url(http://octiv.staging.wpengine.com/wp-content/uploads/2017/11/octiv-office-1.jpg); background-size: cover; background-position: center; min-height: 325px;">
            </div>
          </div>
        </div>
      </section>

      <section id="employee-testimonials" class="pad-y-most">
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

    <?php endif; ?>

    <?php
      if ($post->ID === 148 || $greenhouse_page) :
        echo '<script src="https://boards.greenhouse.io/embed/job_board/js?for=octiv"></script>';
      endif;
    ?>
    
  </main>
<?php //endif; ?>



<?php get_footer(); ?>