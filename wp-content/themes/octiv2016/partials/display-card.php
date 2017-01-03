<?php
  $queried_object = get_permalink();
  $parsed_url = explode( '/', $queried_object );
  $cat = $parsed_url[4];
?>

<div class="card">
  <a href="<?php the_permalink(); ?>" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>);" class="card-tb"></a>
  <div>
    <?php
      // IF NOT support archive, releases archive, or author get card tag
      if (!is_post_type_archive('support') && !is_post_type_archive('releases') && !is_author() && !is_post_type_archive('events') && !is_post_type_archive('catalog') && !is_tax('event_type')) :
        echo '<a href="';
          // test $cat for the correct url
          if ($cat === 'whitepapers') :
            echo '/resources/whitepapers';
          elseif ($cat === 'webinars') :
            echo '/resources/webinars';
          elseif ($cat === 'client-stories') :
            echo '/resources/client-stories';
          else :
            echo '/resources/blog';
          endif;
        echo '" class="card-tag-';
          // test $cat for the tag name
          if (is_single() || is_page(263) || is_front_page() || is_category() || is_page_template('page-templates/page-resources.php')) :
            // get blog tag
            if ($cat != 'whitepapers' && $cat != 'webinars' && $cat != 'client-stories') :
              echo 'blog';
            else :
              echo $cat;
            endif;
          else :
            if ($cat === 'in-person') :
              echo 'events';
            else :
              echo $cat;
            endif;
          endif;
        echo '">';
          // test $cat for the tag text
          if ($cat === 'whitepapers') :
            echo '<svg viewBox="0 0 16.2 11"><use xlink:href="#icon-whitepapers"></svg><span>whitepapers</span>';
          elseif ($cat === 'webinars') :
            echo '<svg viewBox="0 0 16 11"><use xlink:href="#icon-webinar"></svg><span>webinars</span>';
          elseif ($cat === 'client-stories') :
            echo '<svg viewBox="0 0 12.8 12.6"><use xlink:href="#icon-client-story"></svg><span>client stories</span>';
          elseif ($cat === 'in-person') :
            echo '<svg viewBox="0 0 112.8 127.7"><use xlink:href="#icon-calendar"></svg><span>Events</span>';
          else :
            echo '<svg viewBox="0 0 11.5 11.5"><use xlink:href="#icon-blog"></svg><span>blog</span>';
          endif;
        echo '</a>';
      endif;
    ?>
    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
    <?php
      if (!is_post_type_archive('support')) :
        // GET THE SHORT DESCRIPTION FOR ANY RESOURCES
        if (get_field('short_description')) :
          echo '<p>' . get_field('short_description') . '</p>';
        // GET THE RELEASE DATE FOR PRODUCT RELEASES
        elseif (get_field( 'release_date' )) :
					echo '<p>' . get_field( 'release_date' ) . '</p>';
        else :
          the_excerpt();
        endif;
      else :
        echo '<p>&nbsp;</p>';
      endif;
    ?>
    <a href="<?php the_permalink(); ?>" class="btn-arrow">View More</a>
  </div>
</div>