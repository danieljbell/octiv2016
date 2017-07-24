<?php
/*
==============================
Template Name: HTML Sitemap
==============================
*/

get_header();

$rand_num = mt_rand(1,4);
?>

<div class="fixed-hero-section" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(/wp-content/themes/octiv2016/dist/img/octiv-pattern.svg), url(/wp-content/uploads/2017/06/generic-<?php echo $rand_num; ?>.jpg);">
  <div class="site-width white-text centered">
    <h1><?php the_title(); ?></h1>
  </div>
</div>

<?php get_template_part('partials/display', 'breadcrumbs'); ?>

<div id="sitemap-list">

<section>
  <div class="site-width">
    <h2><a href="/platform" title="Platform">Platform</a></h2>
    <hr>
    <ul class="no-bul">
      <li>
        <h4><a href="/platform/features" title="Platform Features">Features</a></h4>
        <?php
          $args = array(
            'post_type' => 'features',
            'posts_per_page' => -1,
            'orderby'=> 'title',
            'order' => 'ASC'
          );
          $all_CPT_posts = get_posts( $args ); 
          if ($all_CPT_posts) {
            echo '<ul class="fourth" style="list-style-type: disc;">';
              foreach( $all_CPT_posts as $post ) :  setup_postdata($post); 
                echo '<li><a href="' . get_the_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a></li>';
              endforeach;
            echo '</ul>';
          }
        ?>
      </li>
      <li>
        <h4><a href="/platform/integrations" title="Integrations">Integrations</a></h4>
        <?php
          $args = array(
            'post_type' => 'integration',
            'posts_per_page' => -1,
            'orderby'=> 'title',
            'order' => 'ASC'
          );
          $all_CPT_posts = get_posts( $args ); 
          if ($all_CPT_posts) {
            echo '<ul class="fourth" style="list-style-type: disc;">';
              foreach( $all_CPT_posts as $post ) :  setup_postdata($post); 
                echo '<li><a href="' . get_the_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a></li>';
              endforeach;
            echo '</ul>';
          }
        ?>
      </li>
      <li>
        <h4><a href="/releases" title="Releases">Releases</a></h4>
        <?php
          $args = array(
            'post_type' => 'releases',
            'posts_per_page' => -1,
            'orderby'=> 'title',
            'order' => 'ASC'
          );
          $all_CPT_posts = get_posts( $args ); 
          if ($all_CPT_posts) {
            echo '<ul class="fourth" style="list-style-type: disc;">';
              foreach( $all_CPT_posts as $post ) :  setup_postdata($post); 
                echo '<li><a href="' . get_the_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a></li>';
              endforeach;
            echo '</ul>';
          }
        ?>
      </li>
    </ul>
  </div>
</section>

<div class="site-width">
  <hr>
</div>

<section>
  <div class="site-width">
    <h2><a href="/solutions">Solutions</a></h2>
    <hr>
    <?php
      $args = array(
        'post_type' => 'solutions',
        'posts_per_page' => -1,
        'orderby'=> 'title',
        'order' => 'ASC'
      );
      $all_CPT_posts = get_posts( $args ); 
      if ($all_CPT_posts) {
        echo '<ul class="fourth" style="list-style-type: disc;">';
          foreach( $all_CPT_posts as $post ) :  setup_postdata($post); 
            echo '<li><a href="' . get_the_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a></li>';
          endforeach;
        echo '</ul>';
      }
    ?>
  </div>
</section>

<section>
  <div class="site-width">
    <h2><a href="/resources">Resources</a></h2>
    <hr>
    <ul class="no-bul">
      <li>
        <h4><a href="/resources/blog">Blog</a></h4>
        <?php
          $args = array(
            'post_type' => 'post',
            'posts_per_page' => -1,
            'orderby'=> 'title',
            'order' => 'ASC'
          );
          $all_CPT_posts = get_posts( $args ); 
          if ($all_CPT_posts) {
            echo '<ul class="fourth" style="list-style-type: disc;">';
              foreach( $all_CPT_posts as $post ) :  setup_postdata($post); 
                echo '<li><a href="' . get_the_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a></li>';
              endforeach;
            echo '</ul>';
          }
        ?>
      </li>
      <li>
        <h4><a href="/resources/client-stories">Client Stories</a></h4>
        <?php
          $args = array(
            'post_type' => 'page',
            'post_parent' => 74,
            'posts_per_page' => -1,
            'orderby'=> 'title',
            'order' => 'ASC'
          );
          $all_CPT_posts = get_posts( $args ); 
          if ($all_CPT_posts) {
            echo '<ul class="fourth" style="list-style-type: disc;">';
              foreach( $all_CPT_posts as $post ) :  setup_postdata($post); 
                echo '<li><a href="' . get_the_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a></li>';
              endforeach;
            echo '</ul>';
          }
        ?>
      </li>
      <li>
        <h4><a href="/resources/downloads">Downloads</a></h4>
        <?php
          $args = array(
            'post_type' => 'page',
            'post_parent' => 65,
            'posts_per_page' => -1,
            'orderby'=> 'title',
            'order' => 'ASC'
          );
          $all_CPT_posts = get_posts( $args ); 
          if ($all_CPT_posts) {
            echo '<ul class="fourth" style="list-style-type: disc;">';
              foreach( $all_CPT_posts as $post ) :  setup_postdata($post); 
                echo '<li><a href="' . get_the_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a></li>';
              endforeach;
            echo '</ul>';
          }
        ?>
      </li>
      <li>
        <h4><a href="/resources/events">Events</a></h4>
        <?php
          $args = array(
            'post_type' => 'events',
            'posts_per_page' => -1,
            'orderby'=> 'title',
            'order' => 'ASC'
          );
          $all_CPT_posts = get_posts( $args ); 
          if ($all_CPT_posts) {
            echo '<ul class="fourth" style="list-style-type: disc;">';
              foreach( $all_CPT_posts as $post ) :  setup_postdata($post); 
                echo '<li><a href="' . get_the_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a></li>';
              endforeach;
            echo '</ul>';
          }
        ?>
      </li>
    </ul>
  </div>
</section>

<section>
  <div class="site-width">
    <h2><a href="/company">Company</a></h2>
    <hr>
    <?php
      $args = array(
        'post_type' => 'page',
        'post_parent' => 144,
        'posts_per_page' => -1,
        'orderby'=> 'title',
        'order' => 'ASC'
      );
      $all_CPT_posts = get_posts( $args ); 
      if ($all_CPT_posts) {
        echo '<ul class="fourth" style="list-style-type: disc;">';
          foreach( $all_CPT_posts as $post ) :  setup_postdata($post); 
            echo '<li><a href="' . get_the_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a></li>';
          endforeach;
        echo '</ul>';
      }
    ?>
  </div>
</section>

<section>
  <div class="site-width">
    <h2><a href="/press-releases">Press Releases</a></h2>
    <hr>
    <?php
      $args = array(
        'post_type' => 'press-releases',
        'posts_per_page' => -1,
        'orderby'=> 'title',
        'order' => 'ASC'
      );
      $all_CPT_posts = get_posts( $args ); 
      if ($all_CPT_posts) {
        echo '<ul class="fourth" style="list-style-type: disc;">';
          foreach( $all_CPT_posts as $post ) :  setup_postdata($post); 
            echo '<li><a href="' . get_the_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a></li>';
          endforeach;
        echo '</ul>';
      }
    ?>
  </div>
</section>


    

</div>

<?php get_footer(); ?>