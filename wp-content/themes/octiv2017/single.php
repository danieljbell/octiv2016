<?php
$user = 'octiv';
$pass = 'D@n13lR0cks!';
$context = stream_context_create(array(
  'http' => array(
    'header'  => "Authorization: Basic " . base64_encode("$user:$pass")
  )
));
?>

<?php
  /*
  ==============================
  GET GLOBAL PROMOTED ITEM
  ==============================
  */
  $pick_your_page = get_field('pick_your_page', 'option');

?>

<?php get_header(); ?>

<main>
  
  <?php echo get_template_part('partials/module/display', 'hero'); ?>

  <?php echo get_template_part('partials/module/display', 'breadcrumbs'); ?>

  <div class="site-width mar-b-most">
    <div class="two-third post-content">
      <section class="single-post-content">
        <?php echo the_content(); ?>  
        <?php if ($pick_your_page) : ?>
          <div class="has-text-center box--light mar-b-more pad-a-most" style="background-image: linear-gradient(rgba(255,255,255,0.85), rgba(255,255,255,0.85)), url('//fillmurray.com/800/500');">
            <div class="color-boxes">
              <h4 class="color-box-headline--brand-two"><?php echo get_the_title(); ?></h4>
            </div>
            <p><?php echo strip_tags(get_the_excerpt()); ?></p>
            <a href="<?php echo get_the_permalink(); ?>" class="btn-brand-two--outline" style="border-bottom: 1px solid #42b0d8; color: #42b0d8;">Learn More</a>
          </div>
        <?php endif; ?>
      </section>
      <aside class="single-post-sidebar">
        <div class="sidebar__inner">
          <ul class="post-author-container">
            <li class="post-author-headshot-container">
              <img src="<?php echo get_cupp_meta($user->ID, "thumbnail"); ?>" alt="<?php echo get_the_author(); ?>">
            </li>
            <li class="post-author-info">
              <a href="<?php echo get_author_posts_url($post->post_author); ?>"><?php echo get_the_author(); ?></a><br><?php echo get_the_date(); ?>
            </li>
          </ul>
          <div class="single-post-sidebar-ad-container">
            <?php
              $args = array(
                'post_type' => 'library',
                'posts_per_page' => 1,
                'tax_query' => array(
                  array(
                    'taxonomy' => 'library_type',
                    'field'    => 'slug',
                    'terms'    => 'whitepapers',
                  ),
                ),
              );
              $whitepaper_ad = new WP_Query( $args );
              if ($whitepaper_ad->have_posts()) : 
                while ($whitepaper_ad->have_posts()) : $whitepaper_ad->the_post(); 
            ?>
              <a href="<?php echo get_the_permalink(); ?>">
                <img src="<?php echo get_field('whitepaper_cover'); ?>" alt="<?php echo get_the_title(); ?> Cover">
              </a>
              <p class="has-text-center mar-t no-mar-b">Free Whitepaper</p>
              <a href="<?php echo get_the_permalink(); ?>">
                <h5 class="mar-b has-text-center"><?php echo get_the_title(); ?></h5>
              </a>
              <div class="has-text-center">
                <a href="<?php echo get_the_permalink(); ?>" class="btn-primary">Download Now</a>
              </div>
            <?php endwhile; endif; wp_reset_query(); ?>
          </div>
        </div>
      </aside>
    </div>
    <div class="two-third">
      <div>
        <h4>Share this Article</h4>
        <ul class="article-sharing-social-links">
          <li class="twitter-icon"><a href="http://twitter.com/intent/tweet?url=<?php echo the_permalink(); ?>&text=<?php echo the_title(); ?>" target="_blank" rel="noopener noreferrer"><?php echo file_get_contents(get_stylesheet_directory_URI() . '/dist/img/twitter-icon.svg', false, $context); ?></a></li>
          <li class="linkedin-icon"><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" target="_blank" rel="noopener noreferrer"><?php echo file_get_contents(get_stylesheet_directory_URI() . '/dist/img/linkedin-icon.svg', false, $context); ?></a></li>
          <li class="facebook-icon"><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank" rel="noopener noreferrer"><?php echo file_get_contents(get_stylesheet_directory_URI() . '/dist/img/facebook-icon.svg', false, $context); ?></a></li>
        </ul>
      </div>
    </div>
    <hr>
    <div class="post-author-bio-container">
      <div class="post-author-bio-headshot">
        <img src="<?php echo get_cupp_meta($user->ID, "full"); ?>" alt="<?php echo get_the_author(); ?>">
      </div>
      <div class="post-author-bio-content">
        <h4><a href="<?php echo get_author_posts_url($post->post_author); ?>"><strong><?php echo get_the_author(); ?></strong></a></h4>
        <p><em><?php echo the_author_meta('user_description'); ?></em></p>
        <br>
        <?php if (get_the_author_meta('twitter')) : ?>
        Follow on: <a href="http://twitter.com/<?php echo the_author_meta('twitter'); ?>" target="_blank">@<?php echo the_author_meta('twitter'); ?></a>
        <?php endif; ?>
      </div>
    </div>
    <hr>
    <h2 class="has-text-center pad-b">You May Also Like...</h2>
    <div class="third">
      <?php
        $args = array(
          'post_type' => 'post',
          'posts_per_page' => 3
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) :
          while ($query->have_posts()) : $query->the_post();
            echo do_shortcode('[get_card_v3 excerpt="true"]');
          endwhile;
        endif;
        wp_reset_query();
      ?>
    </div>
  </div>

  <?php echo get_template_part('partials/module/display', 'powers-documents'); ?>

</main>

<script type="text/javascript" async src="https://platform.twitter.com/widgets.js"></script>

<?php get_footer(); ?>