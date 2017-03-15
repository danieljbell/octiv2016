<?php get_header(); ?>

<?php $head_to_head_name = get_field('competitor_name'); ?>

<section class="fixed-hero-section">
  <div class="site-width white-text">
    <div class="centered half-only">
      <div style="margin-bottom: 0;">
        <h1><?php echo get_the_title(); ?></h1>
        <p class="font-bump">I bet you are having a problem with doing this thing. Here’s how we’re better.</p>
        <a href="#cta" class="btn-primary">HELP! Please save me from this slow hell.</a>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="site-width">
    <div class="centered">
      <h2>How Octiv Stacks up Against Spring CM</h2>
      <p>Octiv is so much better than Spring CM, just trust us ;)</p>
    </div>
  </div>
  <div class="head-to-head-slider-buttons"></div>
  <div class="head-to-head-slider">
    <?php
      $terms = get_terms(
        array(
            'taxonomy' => 'feature_type',
            'orderby' => 'id',
            'order' => 'ASC',
            'hide_empty' => false,
        )
      );
      foreach ($terms as $term) {
        echo '<div class="centered">';
          echo '<div class="two-third-only">';
            echo '<div>';
              echo '<h3>' . $term->name . '</h3>';
              echo '<p>' . $term->description . '</p>';
            echo '</div>';
          echo '</div>';
          echo '<table>';
            echo '<thead>';
              if ($term->name === 'Administration' || $term->name === 'Repository') {
                $color = '#42b0d8';
              } elseif ($term->name === 'Analytics') {
                $color = '#33ab40';
              } elseif ($term->name === 'Document Generation' || $term->name === 'Workflows') {
                $color = '#b949f5';
              } elseif ($term->name === 'Infrastructure &amp; Compliance') {
                $color = '#ed4c06';
              } elseif ($term->name === 'Integrations') {
                $color = '#fac500';
              }
              echo '<tr>';
                echo '<th style="width: 50%; background-color: ' . $color . ';">';
                  echo $term->name . ' Features';
                echo '</th>';
                echo '<th style="background-color: ' . $color . ';">';
                  echo '<svg><use xlink:href="#icon-octiv-logo"></svg>';
                echo '</th>';
                echo '<th style="background-color: ' . $color . ';">';
                  echo $head_to_head_name;
                echo '</th>';
              echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
              $args = array(
                'post_type' => 'features',
                'tax_query' => array(
              		array(
              			'taxonomy' => 'feature_type',
              			'field'    => 'slug',
              			'terms'    => $term->name,
              		),
              	),
              );
              $query = new WP_Query($args);
              if ($query->have_posts()) :
                while ($query->have_posts()) :
                  $query->the_post();
                  echo '<tr>';
                    echo '<td class="feature-container">' . get_the_title() . '<span><h4>' . get_the_title() . '</h4>' . get_the_excerpt() . '<a class="btn-arrow" href="' . get_the_permalink() . '">Learn More</a></span></td>';
                    echo '<td><svg style="fill: #ed4c06 !important;"><use xlink:href="#icon-checkmark"></svg></td>';
                    echo '<td>';
                      if (get_field('competitor_feature')) {
                        $values = get_field('competitor_feature');
                        foreach ($values as $value) {
                            if ($value === $head_to_head_name) {
                              echo '<svg style="fill: #ccc !important;"><use xlink:href="#icon-checkmark"></svg>';
                            }
                        }
                      }
                    echo '</td>';
                  echo '</tr>';
                endwhile;
              endif;
              wp_reset_query();
              if( have_rows('exclusive_features') ):
                while ( have_rows('exclusive_features') ) : the_row();
                  if ($term->name === get_sub_field('feature_category')) {
                    echo '<tr>';
                      echo'<td class="feature-container">' . get_sub_field('feature_title') . '<span><h4>' . get_sub_field('feature_title') . '</h4>' . get_sub_field('feature_description') . '</span></td>';
                      echo'<td></td>';
                      echo'<td><svg style="fill: #ccc !important;"><use xlink:href="#icon-checkmark"></svg></td>';
                    echo '</tr>';
                  }
                endwhile;
              endif;
            echo '</tbody>';
          echo '</table>';
        echo '</div>';
      }
    ?>
  </div>
  <div class="site-width">
    <div class="centered">

      <ul class="inline">
        <li><a href="#0" class="btn-primary">Have We Sold You Yet?</a></li>
        <li><a href="#0" class="btn-arrow">Our Info Wrong? Let Us Know</a></li>
      </ul>
    </div>
  </div>
</section>

<section style="padding-top: 0;">
  <div class="site-width">
    <hr>
  </div>
</section>

<section>
  <div class="site-width">
    <div class="centered">
      <h2>Our Clients Love Us, They <em>Really</em> Love Us</h2>
      <p>Take a look for yourself and see how we helped all these great peeps!</p>
    </div>
  </div>
</section>

<?php get_template_part('partials/display', 'client-testimonials'); ?>

<?php get_template_part('partials/display', 'basic-contact-us'); ?>

<?php get_footer(); ?>
