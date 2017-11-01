<?php get_header(); ?>

<main>
  
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
            $doc_types = get_field('document_types');
              if ($doc_types) :
                echo '<li style="list-style-type: none;" class="client-story-doctype-container">';
                echo '<strong>' . get_the_title() . ' Uses Octiv for:</strong>';
                echo '<ul style="list-style-type: none;">';
                  foreach($doc_types as $post) :
                    setup_postdata($post);
                    echo '<li><a href="' . get_the_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a></li>';
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
      <h3 class="pad-t">The Solution</h3>
      <?php echo get_field('the_solution'); ?>
    </div>
    <?php
      if (get_field('highlighted_quote')) :
    ?>
      <div class="client-story-quote">
        <div class="site-width">
          <blockquote>
            <div class="quote"><?php echo get_field('highlighted_quote'); ?></div>
              <?php
                if (get_field('person_headshot')) :
                  echo '<div class="person-details-container has-person-headshot">';
                    echo '<div class="person-headshot">';
                      echo '<img src="' . get_field('person_headshot') . '" alt="">';
                    echo '</div>';
                else :
                  echo '<div class="person-details-container">';
                endif;                
              ?>
              <div class="person-details-content">
                <p class="person-name"><?php echo get_field('person_name'); ?></p>
                <p class="person-title"><?php echo get_field('person_title'); ?></p>
                <p class="person-company"><?php echo get_field('person_company'); ?></p>
              </div>
            </div>
          </blockquote>
        </div>
      </div>
    <?php
      endif;
    ?>
    <div class="site-width client-story-the-result pad-b-more">
      <?php
        if (get_field('application_screenshot')) {
          echo '<div class="browser-window">';
            echo '<div>';
              echo '<img src="' . get_field('application_screenshot') . '" alt="' . $post->post_title . '\'s Octiv Screenshot">';
            echo '</div>';
          echo '</div>';
        }
      ?>
      <?php
        if (get_field('highlighted_quote')) :
          echo '<h3>The Result</h3>';
        else :
          echo '<h3 class="pad-t">The Result</h3>';
        endif;
      ?>
      <?php echo get_field('the_results'); ?>
    </div>
  </section>

  <?php // echo get_template_part('partials/module/display', 'call-to-action'); ?>

  <?php get_template_part('partials/module/display', 'powers-documents'); ?>

</main>

<?php get_footer(); ?>

