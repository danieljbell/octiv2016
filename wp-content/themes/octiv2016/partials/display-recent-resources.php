<?php
$context = stream_context_create(array(
  'http' => array(
    'header'  => "Authorization: Basic " . base64_encode("$user:$pass")
  )
));
?>

<?php $rand_num = mt_rand(1,3); ?>

<section>
  <div class="site-width">
    <div class="centered">
      <h2>Resources to Boost Your Bottom Line</h2>
      <br>
      <br>
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
      <?php if ($rand_num === 1) { ?>
        <div class="card">
          <a href="/tour" class="card-tb" title="Octiv Guided Tour" style="background-image: url(/wp-content/uploads/2017/06/guided-tour-hero.jpg);"></a>
          <div>
            <p class="card-tag-client-stories"><?php echo file_get_contents('https://octiv.com/wp-content/uploads/2017/06/compass.svg', false, $context); ?>Tour</p>
            <h4 style="margin-bottom: 1rem;"><a href="/tour" title="Octiv Guided Tour">Octiv Guided Tour</a></h4>
            <p><a href="/tour" class="btn-arrow">Take the Tour Now</a></p>
          </div>
        </div>
      <?php } elseif ($rand_num === 2) { ?>
        <div class="card">
          <a href="/platform-demo" class="card-tb" title="Platform Demo" style="background-image: url(/wp-content/uploads/2017/06/generic-<?php echo $rand_num; ?>.jpg);"></a>
          <div>
            <p class="card-tag-webinars"><svg viewBox="0 0 16 11"><use xlink:href="#icon-webinar"></svg><span>Webinars</span></p>
            <h4 style="margin-bottom: 1rem;"><a href="/platform-demo" title="Platform Demo">On-Demand Webinar: Live Platform Demo</a></h4>
            <p><a href="/platform-demo" class="btn-arrow">Watch Now</a></p>
          </div>
        </div>
      <?php } else { ?>
        <div class="card">
          <a href="/experience" class="card-tb" title="Octiv Guided Tour" style="background-image: url(<?php echo '/wp-content/uploads/2017/06/generic-' . $rand_num . '.jpg';?>);"></a>
          <div>
            <p class="card-tag-client-stories"><?php echo file_get_contents('https://octiv.com/wp-content/uploads/2017/06/compass.svg', false, $context); ?>Experience</p>
            <h4 style="margin-bottom: 1rem;"><a href="/experience" title="Octiv Guided Tour">Experience Octiv in Action</a></h4>
            <p><a href="/experience" class="btn-arrow">Create Document Now</a></p>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>