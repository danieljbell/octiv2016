<?php get_header(); ?>

<?php $tax_title = str_replace('Event Type: ', '', get_the_archive_title()); ?>

<div class="fixed-hero-section">
  <div class="site-width white-text">
    <h1><?php echo $tax_title; ?></h1>
  </div>
</div>

<?php get_template_part('partials/display', 'breadcrumbs'); ?>

<section>
  <div class="site-width">
    <div class="fourth-3-fourth">
      <div class="sticky-sidebar" id="sticky-sidebar">
        <h4><?php echo $tax_title; ?></h4>
        <hr>
        <ul class="nav sidebar-links" id="sidebar-links">
          <li><a href="#upcoming">Upcoming</a></li>
          <li><a href="#past">Past</a></li>
        </ul>
      </div>
      <div class="sticky-listing">
        <section style="padding-top: 0;">
          <h3 id="upcoming">Upcoming <?php echo $tax_title; ?></h3>
          <?php post_type_archive_title(); ?>
          <?php
      			// global date param
      			$today = date('Ymd');

            // setting up args for upcoming events
      			$upcoming_args = array (
      			    'post_type' => 'events',
                'tax_query' => array(
              		array(
              			'taxonomy' => 'event_type',
              			'field'    => 'slug',
              			'terms'    => str_replace('Event Type: ', '', get_the_archive_title()),
              		),
              	),
      			    'meta_query' => array(
      					array(
  				        'key'		=> 'event_start_date',
  				        'compare'	=> '>',
  				        'value'		=> $today,
    				    )
    			    ),
      			);

            $upcoming_query = new WP_Query($upcoming_args);

            if ($upcoming_query->have_posts()) :
              echo '<div class="third">';
              while ($upcoming_query->have_posts()) :
                $upcoming_query->the_post();
                echo do_shortcode('[get_card excerpt="date"]');
              endwhile;
              echo '</div>';
              else :
                echo 'Sorry, there are no ' . $tax_title . ' currently planned at this time.';
            endif;

    			?>
        </section>
        <section style="padding-top: 0;">
          <h3 id="past">Past <?php echo $tax_title; ?></h3>
          <?php
      			// global date param
      			$today = date('Ymd');

            // setting up args for upcoming events
      			$past_args = array (
      			    'post_type' => 'events',
                'tax_query' => array(
              		array(
              			'taxonomy' => 'event_type',
              			'field'    => 'slug',
              			'terms'    => str_replace('Event Type: ', '', get_the_archive_title()),
              		),
              	),
      			    'meta_query' => array(
      					array(
  				        'key'		=> 'event_start_date',
  				        'compare'	=> '<',
  				        'value'		=> $today,
    				    ),
    			    ),
      			);

            $past_query = new WP_Query($past_args);

            if ($past_query->have_posts()) :
              echo '<div class="third">';
              while ($past_query->have_posts()) :
                $past_query->the_post();
                echo do_shortcode('[get_card tag="past" excerpt="date"]');
              endwhile;
              echo '</div>';
              else :
                echo 'Sorry, there are no past ' . str_replace('Event Type: ', '', get_the_archive_title()) . ' at this time.';
            endif;

    			?>
        </section>
      </div>
    </div>
  </div>
</section>


<?php get_footer(); ?>
