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
        <p class="font-bump"><?php echo get_the_excerpt(); ?></p>
        <a href="<?php echo get_the_permalink(); ?>#call-to-action" class="btn-white-outline">Let's Talk Octiv &amp; <?php echo get_the_title(); ?></a>
      </div>
    </div>
  </div>
</div>

<?php get_template_part('partials/display', 'breadcrumbs'); ?>

<section style="padding-bottom: 0;">
  <div class="site-width">
    <div class="fourth-3-fourth">
      <div class="sticky-sidebar" id="sticky-sidebar">
        <h4>Octiv + <?php echo get_the_title(); ?></h4>
        <hr>
        <ul class="nav sidebar-links" id="sidebar-links">
          <li><a href="#about-integration">About <?php echo get_the_title(); ?></a></li>
          <li><a href="#key-capabilities">Key Capabilities</a></li>
          <li><a href="#business-use-cases">Business Use Cases</a></li>
          <li><a href="#technical-requirements">Technical Requirements</a></li>
        </ul>
      </div>
      <div class="sticky-listing">
        <div>
          <section style="padding-top: 0;">
            <h3 id="about-integration" style="padding-bottom: 0.5rem;">Why Octiv + <?php echo get_the_title(); ?></h3>
            <?php echo the_content(); ?>
          </section>
          <section style="padding-top: 0;">
            <h3 id="key-capabilities" style="padding-bottom: 0.5rem;">Key Capabilities</h3>
              <?php
              if (have_rows('key_capabilities')) :
                echo '<ul class="list-is-collapsed">';
                while (have_rows('key_capabilities')) :
                  the_row();
                  echo '<li>' . get_sub_field('key_capability') . '</li>';
                endwhile;
              else :
                echo 'No key capabilites have been identified at this time.';
              endif;
              ?>
            </ul>
          </section>
          <section style="padding-top: 0;">
            <h3 id="business-use-cases" style="padding-bottom: 0.5rem;">Business Use Cases</h3>
            <?php
            if (have_rows('business_use_cases')) :
              echo '<ul class="list-is-collapsed">';
              while (have_rows('business_use_cases')) :
                the_row();
                echo '<li>' . get_sub_field('business_use_case') . '</li>';
              endwhile;
            else :
              echo 'No business use cases have been identified at this time.';
            endif;
            ?>
          </section>
          <section style="padding: 0;">
            <h3 id="technical-requirements" style="padding-bottom: 0.5rem;">Technical Requirements</h3>
            <?php
            if (have_rows('technical_requirements')) :
              echo '<ul class="list-is-collapsed">';
              while (have_rows('technical_requirements')) :
                the_row();
                echo '<li>' . get_sub_field('technical_requirement') . '</li>';
              endwhile;
            else :
              echo 'No technical requirements have been identified at this time.';
            endif;
            ?>
          </section>
        </div>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="site-width">
    <hr>
    <br class="hide-md">
    <br class="hide-md">
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
            $thing = get_the_terms($post->ID, 'integration_type');
            echo '<div class="card">';
              echo '<div class="">';
                echo '<div class="pos-rel integration-card-bg" style="background-image: url(' . get_field('integration_logo', $post->ID) . '), linear-gradient(#fff, #f0f0f0);">';
                  echo '<a href="' . get_the_permalink() . '" style="position: absolute; top: 0; right: 0; bottom: 0; left: 0;" title="' . get_the_title() . '"></a>';
                echo '</div>';
                echo '<span class="card-tag-whitepapers">' . $thing[0]->name . '</span>';
                echo '<h4><a href="' . get_the_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a></h4>';
                echo '<p>' . get_field('integration_description', $post->ID, false) . '</p>';
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
        <script src="//app-sj20.marketo.com/js/forms2/js/forms2.min.js"></script>
					<form id="mktoForm_1008"></form>
				<script>
					MktoForms2.loadForm("//app-sj20.marketo.com", "625-MXY-689", 1008, function(form) {
            // Select Newsletter Asterix and Remove it from the DOM
						var newsletterBox = document.querySelector('label[for="subscriptionNewsletter"]');
						newsletterBox.querySelector('.mktoAsterix').remove();

						//Add an onSuccess handler
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
</section>

<style>
  label[for="subscriptionNewsletter"] {
    margin-top: 1.75rem;
    padding-left: 1.25rem;
  }
  label[for="subscriptionNewsletter"] + div {
    margin-top: -1.25rem;
    margin-bottom: 1rem;
  }
  @media screen and (min-width: 1280px) {
    label[for="subscriptionNewsletter"] {
      margin-top: 1rem;
    }
    label[for="subscriptionNewsletter"] + div {
      display: block;
      margin-top: -2.5rem;
      margin-bottom: 1rem;
    }
  }
  select {
    color: #000;
  }
  .fixed-hero-section .btn-white-outline:hover {
    color: <?php echo get_field('integration_color'); ?> !important;
  }
  #site-footer>.site-width:first-of-type {
    border-top: 0;
  }
  .list-toggle:before {
    content: '';
    width: 100%;
    display: block;
    border-bottom: 1px solid #ccc;
    margin-bottom: -0.75rem;
    position: relative;
    /*z-index: -1;*/
    margin-left: -1.25rem;
    margin-top: -2.5rem;
    padding-top: 1rem;
    padding-left: 1.25rem;
    height: 2rem;
    background-image: linear-gradient(rgba(255,255,255,0), rgba(255,255,255,0.9) 50%);
  }
  .list-toggle {
    text-align: center;
    list-style-type: none;
    display: block;
  }
  .list-toggle span {
    background-color: #fff;
    padding: 0 1rem;
    font-style: italic;
    position: relative;
    z-index: 1;
  }
  .list-toggle.less:before {
    background-image: initial;
  }
  .list-toggle.less:before,
  .list-toggle.less span {
    transform: translateY(1rem);
    margin-bottom: 0;
  }
</style>

<?php get_footer(); ?>
