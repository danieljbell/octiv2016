<?php get_header(); ?>

<?php get_template_part('partials/module/display', 'hero'); ?>

<?php get_template_part('partials/module/display', 'breadcrumbs'); ?>

<section class="single-post-content">
  <div class="site-width">
    <div class="client-story-company-details">
      <img src="<?php echo get_field('client_logo'); ?>" alt="Company Logo" class="client-story-company-logo">
      <?php
        if (have_rows('client_details')) :
          echo '<ul>';
            while (have_rows('client_details')) :
              the_row();
              echo '<li><strong>' . get_sub_field('detail_title') . ':</strong><br>' . get_sub_field('detail_description') . '</li>';
            endwhile;
            $integrations = get_field('integrations');
            if ($integrations) :
              echo '<li style="list-style-type: none;" class="client-story-integrations-container">';
              echo '<strong>' . get_the_title() . '\'s Tech Stack:</strong>';
              echo '<ul style="list-style-type: none;">';
                foreach($integrations as $post) :
                  setup_postdata($post);
                  echo '<li><a href="' . get_the_permalink() . '" title="' . get_the_title() . '"><img src="' . get_field('integration_logo') . '"></a></li>';
                  wp_reset_postdata();
                endforeach;
              echo '</ul>';  
              echo '</li>';
            endif;
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
    <div class="site-width">
      <blockquote>
        <div class="quote"><?php echo get_field('highlighted_quote'); ?></div>
        <div class="person-details-container">
          <div class="person-headshot">
            <img src="<?php echo get_field('person_headshot'); ?>" alt="">
          </div>
          <div class="person-details-content">
            <p class="person-name"><?php echo get_field('person_name'); ?></p>
            <p class="person-title"><?php echo get_field('person_title'); ?></p>
            <p class="person-company"><?php echo get_field('person_company'); ?></p>
          </div>
        </div>
      </blockquote>
    </div>
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

<section id="call-to-action">
  <div class="site-width has-text-center">
    <hr>
    <div class="pad-y-more">
      <?php
        if (get_field('cta_heading_text')) :
          echo '<h2>' . get_field('cta_heading_text') . '</h2>';
        else :
          echo '<h2>Ready to Streamline Your Companies Workflows?</h2>';
        endif;
      ?>
      <?php
        if (get_field('cta_sub_heading_text')) :
          echo '<p>' . get_field('cta_sub_heading_text') . '</p>';
        else :
          echo '<p>Contact us today at <a href="tel:844-936-2848" class="no-style-text-link">844-936-2848</a> to learn more about how Octiv can help you.</p>';
        endif;
      ?>
      <?php
        if (get_field('has_custom_cta_link')) :
          echo '<a href="' . get_field('custom_cta_link_location') . '" class="btn-primary">' . get_field('custom_cta_link_text') . '</a>';
        else :
          echo '<button class="btn-primary rad-modal">Request A Demo</button>';
        endif;
      ?>
    </div>
  </div>  
</section>

<?php get_footer(); ?>