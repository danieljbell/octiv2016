<?php
  $queried_object = get_queried_object();
  $content_type = get_field('content_type', $queried_object);
?>

<?php if ($content_type === 'text') : ?>
  <section class="mar-y-most">
    <div class="site-width">
      <div class="two-third">
        <div>
          <?php the_content(); ?>
          <br>
          <div class="box--light">
            <h2>Did this article help?</h2>
            <p>Please provide us your feedback below.</p>
            <?php get_template_part('partials/pages/display', 'support--article-feedback-form'); ?>
          </div>
        </div>
        <aside>
          <?php 
            $parent_page_ID = $post->post_parent;
            $args = array(
              'post_type' => 'support',
              'post_parent' => $parent_page_ID,
              'posts_per_page' => 15,
              'orderby' => 'title',
              'order' => 'ASC',
              'post__not_in' => array($post->ID)
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
              echo '<h4>Related Articles</h4><hr style="margin: 0;"><ul>'; 
            while ( $query->have_posts() ) : 
              $query->the_post() 
          ?>

          <li style="font-size: 0.9em;line-height: 1.4em;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
              
          <?php endwhile; echo "</ul>"; endif; wp_reset_query(); ?>
        </aside>
      </div>
    </div>
  </section>
<?php elseif ($content_type === 'video') : ?>
  <?php $video_source = get_field('video_id', $queried_object); ?>
  <section class="mar-y-most">
      <div class="site-width">
        <div class="two-third">
          <div>
            <div class="video-outer" style="margin-bottom: 1rem;">
              <div class="video-inner">
                <?php echo '<iframe src="//fast.wistia.net/embed/iframe/' . $video_source . '?videoFoam=true" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="100%" height="100%" style="box-shadow: 0 0 15px rgba(0,0,0,0.15);"></iframe>'; ?>
              </div>
            </div>
            <?php the_content(); ?>
            <div class="box">
              <h2>Did this article help?</h2>
              <p>Please provide us your feedback below.</p>
              <?php get_template_part('partials/display', 'support-article-feedback'); ?>
            </div>
          </div>
          <div>
            <?php // get_sidebar('support'); ?>
          </div>
        </div>
      </div>
    </section>
<?php endif; ?>