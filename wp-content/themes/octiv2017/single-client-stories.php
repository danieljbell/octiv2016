<?php get_header(); ?>

<?php get_template_part('partials/module/display', 'hero'); ?>

<?php get_template_part('partials/module/display', 'breadcrumbs'); ?>

<section class="single-post-content">
  <div class="site-width">
    <div class="client-story-company-details">
      <img src="<?php echo get_field('client_logo'); ?>" alt="Company Logo" class="client-story-company-logo">
      <?php
        if (have_rows('client_details')) :
          echo '<ul class="has-text-left">';
            while (have_rows('client_details')) :
              the_row();
              echo '<li><strong>' . get_sub_field('detail_title') . ':</strong><br>' . get_sub_field('detail_description') . '</li>';
            endwhile;
          echo '</ul>';
        endif;
      ?>
    </div>
    <div class="client-story-intro"><?php echo get_field('intro'); ?></div>
    <h3 class="pad-t">The Problem</h3>
    <?php echo get_field('the_problem'); ?>
  </div>
  <div class="site-width">
    <h3>The Solution</h3>
    <?php echo get_field('the_solution'); ?>
  </div>
  <div class="client-story-quote">
    <blockquote>
      <div class="quote">Eleven days after purchasing Octiv, I created a 99-page document with 17 signature blocks in less than 30 minutes. My client was able to review and sign the document in less than five minutes.</div>
      <div class="person-details-container">
        <div class="person-headshot">
          <img src="//fillmurray.com/100/100" alt="">
        </div>
        <div class="person-details-content">
          <p class="person-name">Bill Murray</p>
          <p class="person-title">CEO</p>
          <p class="person-company">Bill Murray, INC.</p>
        </div>
      </div>
    </blockquote>
  </div>
  <div class="site-width">
    <?php
      if (get_field('application_screenshot')) {
        echo '<div class="browser-window">';
          echo '<div>';
            echo '<img src="' . get_field('application_screenshot') . '" alt="' . $post->post_title . '\'s Octiv Screenshot">';
          echo '</div>';
        echo '</div>';
      }
    ?>
    <h3 class="pad-t">The Result</h3>
    <?php echo get_field('the_results'); ?>
  </div>
</section>

<?php get_footer(); ?>