<?php
/*
==============================
Template Name: Company Page
==============================
*/
?>

<?php get_header(); ?>

<main>
  
  <?php get_template_part('partials/module/display', 'hero'); ?>

  <?php get_template_part('partials/module/display', 'breadcrumbs'); ?>

  <section id="about">
    <div class="site-width">
      <div class="half vertical-align">
        <div>
          <h2>About Octiv</h2>
          <?php echo get_field('about_octiv'); ?>
        </div>
        <div class="third vertical-align has-text-center">
          <?php 
            if( have_rows('awards') ):
              while ( have_rows('awards') ) : the_row();
                $award_image = get_sub_field('award_logo');
                echo '<div>';
                  if (get_sub_field('award_link')) {
                    echo '<a href="' . get_sub_field('award_link') . '">';
                      echo '<img src="' . $award_image[url] . '" alt="' . $award_image[title] . '" style="width: 100%;">';
                    echo '</a>';
                  } else {
                    echo '<img src="' . $award_image[url] . '" alt="' . $award_image[title] . '" style="width: 100%;">';
                  }
                echo '</div>';
              endwhile;
            endif;
          ?>
        </div>
      </div>
    </div>
  </section>
  <section id="careers">
    <div class="site-width">
      <hr>
      <div class="has-text-center pad-y-more mar-b-more">
        <h2>Want to Join Our Growing Team?</h2>
        <p>View our career opportunities now!</p>
        <a href="/company/careers" class="btn-primary">View All Opportunities</a>
      </div>
    </div>
  </section>
  <section id="employee-testimonials">
    <ul class="third employee-testimonials-list">
      <?php get_template_part('partials/module/query', 'employee-testimonials'); ?>
    </ul>
  </section>
  <section id="leadership" class="pad-y-most">
    <div class="site-width">
      <h2 class="has-text-center mar-b-more">Leadership</h2>
      <ul class="third leadership-grid">
        <?php
          if (have_rows('company_leadership')) :
            while (have_rows('company_leadership')) : the_row();
              echo '<li class="has-text-center">';
                echo '<div class="headshot-container">';
                  echo '<img src="' . get_sub_field('leader_headshot') . '" alt="' . get_sub_field('leader_name') . '" class="leadership-headshot">';
                  echo '<div class="read-bio">'; 
                  $person_slug = str_replace(" ", "-", strtolower(get_sub_field('leader_name')));
        ?>
<button class="launch-bio-modal btn-white--outline" data-parameter="<?php echo $person_slug; ?>" data-name="<?php echo get_sub_field('leader_name'); ?>" data-title="<?php echo get_sub_field('leader_title'); ?>" data-bio="<?php echo get_sub_field('leader_biography'); ?>" data-headshot="<?php echo get_sub_field('leader_headshot'); ?>" data-linkedin="<?php echo get_sub_field('leader_linkedin_url'); ?>" data-twitter="<?php echo get_sub_field('leader_twitter_url'); ?>">Read Bio</button>
                <?php  
                  echo '</div>';
                echo '</div>';
                echo '<div class="leadership-content">';
                  echo '<h4>' . get_sub_field('leader_name') . '</h4>';
                  echo '<p>' . get_sub_field('leader_title') . '</p>';
                  echo '<a href="' . get_sub_field('leader_linkedin_url') . '" title="' . get_sub_field('leader_name') . '\'s LinkedIn"><img src="' . get_stylesheet_directory_URI() . '/dist/img/linkedin-icon.svg" alt="LinkedIn Icon"></a>';
                echo '</div>';
              echo '</li>';
            endwhile;
          endif;
        ?>
      </ul>
    </div>
  </section>
  <section id="board-of-directors" class="light-callout pad-y-most">
    <div class="site-width">
      <h2 class="has-text-center mar-b-more">Board of Directors</h2>
      <ul class="third leadership-grid">
        <?php
          if (have_rows('board_leadership')) :
            while (have_rows('board_leadership')) : the_row();
              echo '<li class="has-text-center">';
                echo '<img src="' . get_sub_field('leader_headshot') . '" alt="' . get_sub_field('leader_name') . '" class="leadership-headshot">';
                echo '<div class="leadership-content">';
                  echo '<h4>' . get_sub_field('leader_name') . '</h4>';
                  echo '<p>' . get_sub_field('leader_title') . '</p>';
                  echo '<a href="' . get_sub_field('leader_linkedin_url') . '" title="' . get_sub_field('leader_name') . '\'s LinkedIn"><img src="' . get_stylesheet_directory_URI() . '/dist/img/linkedin-icon.svg" alt="LinkedIn Icon"></a>';
                echo '</div>';
              echo '</li>';
            endwhile;
          endif;
        ?>
      </ul>
    </div>
  </section>

</main>

<?php get_footer(); ?>