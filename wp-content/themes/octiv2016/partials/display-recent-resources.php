<?php
$context = stream_context_create(array(
  'http' => array(
    'header'  => "Authorization: Basic " . base64_encode("$user:$pass")
  )
));
?>

<section>
  <div class="site-width">
    <div class="centered">
      <h2>Get the Latest and Greatest from Octiv</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex neque ad dignissimos reprehenderit aperiam repellendus.</p>
    </div>
    <div class="third">
      <?php 
      // QUERY FOR LATEST BLOG POST
        $args = array(
          'post_type' => 'post',
          'posts_per_page' => 1
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
          while ( $query->have_posts() ) :
            $query->the_post();
            echo do_shortcode('[get_card thumb="true" tag="blog"]');
          endwhile;
        endif;
        wp_reset_query();
      ?>
      <?php 
      // QUERY FOR LATEST DOWNLOAD
        $args = array(
          'post_type' => 'page',
          'post_parent' => 65,
          'post__not_in' => array( 3025 ),
          'posts_per_page' => 1
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
          while ( $query->have_posts() ) :
            $query->the_post();
            echo do_shortcode('[get_card thumb="true" tag="whitepapers"]');
          endwhile;
        endif;
        wp_reset_query();
      ?>
      <div class="card">
        <a href="/tour" class="card-tb" title="Octiv Guided Tour" style="background-image: url(/wp-content/uploads/2017/06/guided-tour-hero.jpg);"></a>
        <div>
          <p class="card-tag-client-stories"><?php echo file_get_contents('https://octiv.com/wp-content/uploads/2017/06/compass.svg', false, $context); ?>Tour</p>
          <h4 style="margin-bottom: 1rem;"><a href="/tour" title="Octiv Guided Tour">Octiv Guided Tour</a></h4>
          <p><a href="/tour" class="btn-arrow">Take the Tour Now</a></p>
        </div>
      </div>
    </div>
  </div>
</section>