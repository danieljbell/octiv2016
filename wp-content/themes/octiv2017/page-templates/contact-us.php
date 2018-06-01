<?php
/*
==============================
Template Name: Contact Us
==============================
*/
?>

<?php get_header(); ?>

<?php get_template_part('partials/module/display', 'hero'); ?>

<section class="notch">
  <div class="site-width">
    <div class="box--light">
      <div class="half">
        <div>
          <?php the_content(); ?>
          <div class="video-outer">
            <div class="video-inner">
              <iframe width="100%" height="100%" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCbBbYVFTyjh95bPIy_3BmXsU_h3YtBwzY&q=Octiv,Indianapolis+IN" allowfullscreen></iframe>
            </div>
          </div>
        </div>
        <div>
          <iframe src="http://go.getconga.com/l/217282/2018-04-27/3dkf5" width="100%" height="500" type="text/html" frameborder="0" allowTransparency="true" style="border: 0"></iframe>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="client-testimonial-slider">
  <?php get_template_part('partials/module/display', 'client-testimonial-slider'); ?>
</section>

<?php get_template_part('partials/module/display', 'powers-documents'); ?>

<style>
  .notch {
    margin-bottom: -3rem;
  }
</style>

<script>
  var initialPath = window.location.pathname;
  window.history.replaceState( {} , 'bar', initialPath );
</script>

<?php get_footer(); ?>

<?php get_footer(); ?>