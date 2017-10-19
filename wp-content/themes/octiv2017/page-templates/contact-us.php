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
          <script src="//app-sj20.marketo.com/js/forms2/js/forms2.min.js"></script>
          <form id="mktoForm_1008"></form>
        <script>
          MktoForms2.loadForm("//app-sj20.marketo.com", "625-MXY-689", 1008, function(form) {
            form.onSuccess(function(values, followUpUrl) {
              // Get the form field values
              var vals = form.vals();
              // Update the redirect url with form fields
              followUpUrl = window.location.origin + '/thank-you/?first_name=' + vals.FirstName;
              // Redirect the page with form field
              location.href = followUpUrl;
              // Return false to prevent the submission handler continuing with its own processing
              return false;
            });
          });
        </script>
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