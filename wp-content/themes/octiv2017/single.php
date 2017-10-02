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
    <div class="two-third">
      <section class="single-post-content">
        <?php echo the_content(); ?>  
      </section>
      <aside class="single-post-sidebar">
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
              'post_type' => 'page',
              'post_parent' => 65,
              'posts_per_page' => 1,
            );
            $whitepaper_ad = new WP_Query( $args );
            if ($whitepaper_ad->have_posts()) : while ($whitepaper_ad->have_posts()) : $whitepaper_ad->the_post(); ?>
              <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>" alt="" class="sidebar-ad-bg">
              <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>" alt="">
              <p class="sidebar-ad-title"><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></p>
              <a href="<?php echo get_the_permalink(); ?>" class="btn-primary">Learn More</a>
            <?php endwhile; endif; wp_reset_query(); ?>
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