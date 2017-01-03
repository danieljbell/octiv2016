<?php get_header(); ?>

<div class="fixed-hero-section" style="background-image: url(<?php echo get_stylesheet_directory_URI(); ?>/dist/img/octiv-pattern.svg), linear-gradient(<?php echo get_field('integration_color'); ?>, <?php echo get_field('integration_color'); ?>);">
  <div class="site-width centered">
    <div class="two-third-only">
      <div class="third" style="align-items: center;">
        <div>
          <div class="box">
            <svg style="max-height: 50px;">
              <use xlink:href="#icon-octiv-logo">
            </svg>
          </div>
        </div>
        <div>
          <div class="integration-plus" style="color: <?php echo get_field('integration_color'); ?>;">+</div>
        </div>
        <div class="box"><img src="<?php echo get_field('integration_logo'); ?>" alt="<?php echo get_the_title(); ?>"></div>
      </div>
      <div>
        <a href="<?php echo get_the_permalink(); ?>#call-to-action" class="btn-white-outline">Let's Talk Octiv &amp; <?php echo get_the_title(); ?></a>
      </div>
    </div>
  </div>
</div>

<?php get_template_part('partials/display', 'breadcrumbs'); ?>

<section>
  <div class="site-width">
    <div class="half">
      <div>
        <h1>Octiv + <?php echo get_the_title(); ?></h1>
        <?php the_content(); ?>
      </div>
      <div>
        <!-- This font needs to be written in css for responsiveness -->
        <h4 style="font-size: 2em;">About <?php echo get_the_title(); ?></h4>
        <?php echo get_field('integration_description'); ?>
        <?php if (get_field('integration_link')) : ?>
          <a href="<?php echo get_field('integration_link'); ?>" class="btn-arrow">Learn More</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<section style="padding-bottom: 0;">
  <div class="site-width">
    <div class="fourth-3-fourth">
      <div class="sticky-sidebar">
        <h4>Events</h4>
        <hr>
        <ul class="nav sidebar-links" id="sidebar-links">
          <li><a href="#triggers">Triggers</a></li>
          <li><a href="#searches">Searches</a></li>
          <li><a href="#actions">Actions</a></li>
        </ul>
      </div>
      <div class="sticky-listing">
        <?php
          echo '<h3 id="triggers" style="padding-bottom: 0.5rem;">Triggers <em>Watch for Events</em></h3>';
          if (have_rows('trigger')) :
            echo '<div class="third">';
            while (have_rows('trigger')) :
              the_row();
              echo '<div class="card">';
                echo '<div>';
                  if (get_sub_field('trigger_link')) :
                    echo '<h4><a href="' . get_sub_field('trigger_link') . '">' . get_sub_field('trigger_title') . '</a></h4>';
                  else :
                    echo '<h4>' . get_sub_field('trigger_title') . '</h4>';
                  endif;
                  echo get_sub_field('trigger_description');
                  if (get_sub_field('trigger_link')) :
                    echo '<a href="' . get_sub_field('trigger_link') . '" class="btn-arrow">Learn More</a>';
                  endif;
                echo '</div>';
              echo '</div>';
            endwhile;
            echo '</div>';
          else :
            echo '<p>Sorry, we don\'t currently have any triggers for ' . get_the_title() . ' at this time.<p>';
          endif;
        ?>
        <?php
          echo '<h3 id="searches" style="padding-bottom: 0.5rem;">Searches <em>Look Up Existing Data</em></h3>';
          if (have_rows('search')) :
            echo '<div class="third">';
            while (have_rows('search')) :
              the_row();
              echo '<div class="card">';
                echo '<div>';
                  if (get_sub_field('search_link')) :
                    echo '<h4><a href="' . get_sub_field('search_link') . '">' . get_sub_field('search_title') . '</a></h4>';
                  else :
                    echo '<h4>' . get_sub_field('search_title') . '</h4>';
                  endif;
                  echo get_sub_field('search_description');
                  if (get_sub_field('search_link')) :
                    echo '<a href="' . get_sub_field('search_link') . '" class="btn-arrow">Learn More</a>';
                  endif;
                echo '</div>';
              echo '</div>';
            endwhile;
            echo '</div>';
          else :
            echo '<p>Sorry, we don\'t currently have any searches for ' . get_the_title() . ' at this time.<p>';
          endif;
        ?>
        <?php
          echo '<h3 id="actions" style="padding-bottom: 0.5rem;">Actions <em>Create New Items</em></h3>';
          if (have_rows('action')) :
            echo '<div class="third">';
            while (have_rows('action')) :
              the_row();
              echo '<div class="card">';
                echo '<div>';
                  if (get_sub_field('action_link')) :
                    echo '<h4><a href="' . get_sub_field('action_link') . '">' . get_sub_field('action_title') . '</a></h4>';
                  else :
                    echo '<h4>' . get_sub_field('action_title') . '</h4>';
                  endif;
                  echo get_sub_field('action_description');
                  if (get_sub_field('action_link')) :
                    echo '<a href="' . get_sub_field('action_link') . '" class="btn-arrow">Learn More</a>';
                  endif;
                echo '</div>';
              echo '</div>';
            endwhile;
            echo '</div>';
          else :
            echo '<p>Sorry, we don\'t currently have any actions for ' . get_the_title() . ' at this time.<p>';
          endif;
        ?>
      </div>
    </div>
  </div>
</section>

<div class="site-width">
  <hr>
</div>

<section>
  <div class="site-width">
    <h2 class="centered">Other Integrations You Might Find Interesting</h2>
  </div>
    <br>
    <br>
    <div class="centered-slider">
      <?php
        $args = array(
          'post_type' => 'integration',
          'posts_per_page' => 10,
          'post__not_in' => array($post->ID)
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) :
          while ($query->have_posts()) :
            $query->the_post();
            echo '<div class="card">';
              echo '<div class="">';
                echo '<div class="pos-rel integration-card-bg" style="background-image: url(' . get_field('integration_logo', $post->ID) . '), linear-gradient(#fff, #f0f0f0);">';
                  echo '<a href="' . get_the_permalink() . '" style="position: absolute; top: 0; right: 0; bottom: 0; left: 0;" title="' . get_the_title() . '"></a>';
                echo '</div>';
                echo '<h4><a href="' . get_the_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a></h4>';
                echo '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>';
                echo '<a href="' . get_the_permalink() . '" title="' . get_the_title() . '" class="btn-arrow">Learn More</a>';
              echo '</div>';
            echo '</div>';
          endwhile;
        endif;
        wp_reset_query();

      ?>
    </div>
    <div class="centered-slider-buttons"></div>
</section>

<section class="brand-callout" id="call-to-action">
  <div class="site-width">
    <div class="two-third-reversed">
      <div>
        <h2 style="text-transform: none;">The Best Apps.<br>Better Together.</h2>
        <p style="margin-bottom: 0;"><?php echo get_the_excerpt(); ?> Fill out the form to speak with a member of our sales team about unifying your document workflow with <?php echo get_the_title(); ?>.</p>
      </div>
      <div>
        <form action="#">
          <div class="third">
            <div>
              <label for="first_name">First Name</label>
              <input type="text" name="first_name">
            </div>
            <div>
              <label for="last_name">Last Name</label>
              <input type="text" name="last_name">
            </div>
            <div>
              <label for="email">Email</label>
              <input type="text" name="email">
            </div>
            <div>
              <label for="company">Company</label>
              <input type="text" name="company">
            </div>
            <div>
              <label for="company_size">Company Size</label>
              <select name="company_size" class="fancy">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
            </div>
            <div>
              <label for="phone_number">Phone Number</label>
              <input type="tel" name="phone_number">
            </div>
            <div></div>
            <div><a href="#" class="btn-white-outline" style="display: block;">Let's Talk</a></div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<style>
  .fixed-hero-section .btn-white-outline:hover {
    color: <?php echo get_field('integration_color'); ?>;
  }
  #site-footer>.site-width:first-of-type {
    border-top: 0;
  }
</style>

<?php get_footer(); ?>
