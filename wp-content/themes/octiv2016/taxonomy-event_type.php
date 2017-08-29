<?php get_header(); ?>

<?php
  $tax_title = str_replace('Event Type: ', '', get_the_archive_title());
  $queried_object = get_queried_object();
?>

<div class="fixed-hero-section" style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url(/wp-content/themes/octiv2016/dist/img/octiv-pattern.svg), url(/wp-content/uploads/2017/06/events-archive-bg.jpg);">
  <div class="site-width centered white-text">
    <h1><?php echo $tax_title; ?> Events</h1>
  </div>
</div>

<?php get_template_part('partials/display', 'breadcrumbs'); ?>




<section>
  <div class="site-width">
    <div class="fourth-3-fourth">
      <div class="filter-sidebar">
        <h4><?php echo $tax_title; ?> Events</h4>
        <hr>
        <ul class="nav sidebar-links" id="sidebar-links">
          <li><a href="#upcoming">Upcoming</a></li>
          <li><a href="#past">Past</a></li>
        </ul>
        <?php if ($queried_object->slug === 'online') : ?>
          <div class="mar-t"></div>
          <h4>Filters</h4>
          <hr>
          <ul class="no-bull filter-container">
            <li style="font-size: 0.85em;"><input type="checkbox" id="thought-leadership" checked><label for="thought-leadership">Thought Leadership</label></li>
            <li style="font-size: 0.85em;"><input type="checkbox" id="platform" checked><label for="platform">Platform</label></li>
            <li style="font-size: 0.85em;"><input type="checkbox" id="client" checked><label for="client">Client</label></li>
          </ul>
          <div class="mar-t"></div>
          <h4>Legend</h4>
          <hr>
          <ul class="no-bull" style="padding-left: 0;">
            <li class="pos-rel">
              <p class="card-tag-webinars" style="margin-bottom: 0;">Thought Leadership</p>
              <p style="font-size: 0.85em;">Get info you need straight from the experts.</p>
            </li>
            <li class="pos-rel">
              <p class="card-tag-blog" style="margin-bottom: 0;">Platform</p>
              <p style="font-size: 0.85em;">See the latest updates to the Octiv platform.</p>
            </li>
            <li class="pos-rel">
              <p class="card-tag-client-stories" style="margin-bottom: 0;">Client</p>
              <p style="font-size: 0.85em;">Learn how to get the most out of Octiv.</p>
            </li>
          </ul>
        <?php endif; ?>
      </div>
      <div class="sticky-listing">
        <section style="padding-top: 0;">
          <h3 id="upcoming" class="inline">Upcoming <?php echo $tax_title; ?> Events</h3>
          <?php
      			// global date param
      			$today = date('Ymd');

            // setting up args for upcoming events
      			$upcoming_args = array (
      			    'post_type' => 'events',
                'order' => 'DESC',
                'orderby' => 'meta_value',
                'meta_key' => 'event_start_date',
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
  				        'compare'	=> '>=',
  				        'value'		=> $today,
    				    )
    			    ),
      			);

            $upcoming_query = new WP_Query($upcoming_args);

            if ($upcoming_query->have_posts()) :
              echo '<div class="third" style="margin-top: 0.5rem;">';
              while ($upcoming_query->have_posts()) :
                $upcoming_query->the_post();
                if (get_field('webinar_type') === 'thought-leadership') {
                  $webinar_type = 'thought-leadership';
                } else if (get_field('webinar_type') === 'platform') {
                  $webinar_type = 'platform';
                } else if (get_field('webinar_type') === 'client') {
                  $webinar_type = 'client';
                }
                echo do_shortcode('[get_card thumb="true" thumb_modifier="' . $webinar_type . '" class="' . $webinar_type . '" excerpt="date"]');
              endwhile;
              echo '</div>';
              else :
                echo '<div>Sorry, there are no Upcoming ' . $tax_title . ' Events currently planned at this time.</div>';
            endif;

    			?>
        </section>
        <section style="padding-top: 0;">
          <h3 id="past" class="inline">Past <?php echo $tax_title; ?> Events</h3>
          <?php
      			// global date param
      			$today = date('Ymd');

            // setting up args for upcoming events
      			$past_args = array (
      			    'post_type' => 'events',
                'order' => 'DESC',
                'orderby' => 'meta_value',
                'meta_key' => 'event_start_date',
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
              echo '<div class="third" style="margin-top: 0.5rem;">';
              while ($past_query->have_posts()) :
                $past_query->the_post();
                if ($queried_object->slug === 'online') :
                  if (get_field('webinar_type') === 'thought-leadership') {
                    $webinar_type = 'thought-leadership';
                  } else if (get_field('webinar_type') === 'platform') {
                    $webinar_type = 'platform';
                  } else if (get_field('webinar_type') === 'client') {
                    $webinar_type = 'client';
                  }
                endif;
                echo do_shortcode('[get_card thumb="true" thumb_modifier="' . $webinar_type . '" class="' . $webinar_type . '" excerpt="date"]');
              endwhile;
              echo '</div>';
              else :
                echo '<div>Sorry, there are no Past ' . str_replace('Event Type: ', '', get_the_archive_title()) . ' Events at this time.</div>';
            endif;

    			?>
        </section>
      </div>
    </div>
  </div>
</section>


<?php get_footer(); ?>
