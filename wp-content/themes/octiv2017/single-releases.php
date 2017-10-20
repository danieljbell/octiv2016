<?php
$user = 'octiv';
$pass = 'D@n13lR0cks!';
$context = stream_context_create(array(
  'http' => array(
    'header'  => "Authorization: Basic " . base64_encode("$user:$pass")
  )
));
?>

<?php get_header(); ?>

<main>
  
  <?php echo get_template_part('partials/module/display', 'hero'); ?>

  <?php echo get_template_part('partials/module/display', 'breadcrumbs'); ?>

  <div class="site-width mar-b-most">
    <div class="two-third post-content">
      <section class="single-post-content">
        <h3>About the Release</h3>
        <?php echo the_content(); ?>
        <h2 class="pad-t"><?php the_title(); ?>'s Release Notes</h2>
          <p>The following features are included in the release. Please click the links below for descriptions of each new enhancement and update.</p>
          <dl class="accordian">
            <dt><h3>Released</h3></dt>
            <dd>
              <p class="brand-callout" style="color: #fff; padding: 1rem; font-weight: bold; margin-top: -1rem; margin-bottom: 2rem;">Released - Fully released updates that are now generally available for applicable customers.</p>
              <dl class="accordian">
                <?php
                  if ( have_rows('launched') ) :
                  while ( have_rows('launched') ) : the_row();
                    echo '<dt><h4>' . get_sub_field('launched_feature') . '</h4></dt>';
                    echo '<dd>';
                    echo '<p>' . get_sub_field('launched_description') . '</p>';
                    if (get_sub_field('feature_released')) :
                      echo '<p><strong>Released on: </strong><br>' . get_sub_field('feature_released') . '</p>';
                    endif;
                    echo '<p><strong>Feature Impact:</strong><br>' . get_sub_field('feature_impact') . '</p>';
                    echo '<p><strong>Available Plan:</strong><br>' . get_sub_field('available') . '</p>';
                    if (get_sub_field('link_source')) :
                      echo '<a href="' . get_sub_field('link_source') . '" class="btn-primary" style="margin-top: 1rem;">Learn More</a>';
                      if (get_sub_field('feature_image')) :
                        echo '<button class="mar-l btn-arrow" data-img-text="' . get_sub_field('launched_feature') . '" data-img="' . get_sub_field('feature_image') . '">View Screenshot <span class="arrow">&gt;</span></button>';
                      endif;
                      else :
                        if (get_sub_field('feature_image')) :
                          echo '<button class="btn-arrow" data-img-text="' . get_sub_field('launched_feature') . '" data-img="' . get_sub_field('feature_image') . '">View Screenshot <span class="arrow">&gt;</span></button>';
                        endif;
                    endif;
                    echo '</dd>';
                  endwhile;
                  else :
                    echo '<p style="padding-left: 1rem;">No released features at this time</p>';
                  endif;
                ?>
              </dl>
            </dd>
            <dt><h3>Planned</h3></dt>
            <dd>
              <p class="brand-callout" style="color: #fff; padding: 1rem; font-weight: bold; margin-top: -1rem; margin-bottom: 2rem;">Planned - Updates that are currently planned for release and are not yet available.</p>
              <dl class="accordian">
                <?php
                  if ( have_rows('planned') ) :
                  while ( have_rows('planned') ) : the_row();
                    echo '<dt><h4>' . get_sub_field('planned_feature') . '</h4></dt>';
                    echo '<dd>';
                    if (get_sub_field('feature_image')) :
                      echo '<img src="' . get_sub_field('feature_image') . '" alt="Product Screenshot">';
                    endif;
                    echo '<p>' . get_sub_field('planned_description') . '</p>';
                    if (get_sub_field('feature_released')) :
                      echo '<p><strong>Planned for: </strong><br>' . get_sub_field('feature_released') . '</p>';
                    endif;
                    echo '<p><strong>Feature Impact:</strong><br>' . get_sub_field('feature_impact') . '</p>';
                    echo '<p><strong>Available Plan:</strong><br>' . get_sub_field('available') . '</p>';
                    if (get_sub_field('link_source')) :
                      echo '<a href="' . get_sub_field('link_source') . '" class="btn-primary" style="margin-top: 1rem;">Learn More</a>';
                    endif;
                    echo '</dd>';
                  endwhile;
                  else :
                    echo '<p style="padding-left: 1rem;">No planned features at this time</p>';
                  endif;
                ?>
              </dl>
            </dd>
          </dl>
      </section>
      <aside class="releases-sidebar">
        <div class="sidebar__inner box--light pad-a" style="border-radius: 5px; background-image: linear-gradient(rgba(255,255,255,0.5), rgba(255,255,255,0));">
          <h4>Release Resources</h4>
          <?php
            if (have_rows('linked_pages')) :
              while (have_rows('linked_pages')) :
                the_row();
                  $linked_page = get_sub_field('event_page');
                
                  $args = array(
                    'post_type' => 'any', 
                    'page_id' => $linked_page
                  );
                
                  $query = new WP_Query( $args );
                
                  if ( $query->have_posts() ) : 
                    echo '<ul>';
                    while ( $query->have_posts() ) :
                      $query->the_post();
                        echo '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
                    endwhile;
                    echo '</ul>';
                  endif;
                  wp_reset_query();
              endwhile;
              else :
                echo 'Resources are coming soon, stay tuned!';
            endif;
          ?>
        </div>
      </aside>
    </div>
    
  </div>

  <?php echo get_template_part('partials/module/display', 'powers-documents'); ?>

</main>

<script type="text/javascript" async src="https://platform.twitter.com/widgets.js"></script>

<?php get_footer(); ?>