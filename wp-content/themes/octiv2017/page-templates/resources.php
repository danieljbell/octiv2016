<?php
/*
===================================
TEMPLATE NAME: Resource Layout
===================================
*/

$number_formatter = new NumberFormatter("en", NumberFormatter::SPELLOUT);

?>

<?php get_header(); ?>

<main>
  
  <?php get_template_part('partials/module/display', 'hero'); ?>

  <section class="promoted-container notch" style="margin-bottom: -3rem;">
    <div class="site-width">
      <div class="box--light">
        <?php
          $posts = get_field('pick_your_page');
          
          $current_iteration = $number_formatter->format(count($posts));
          if ($current_iteration === 'three') {
            echo '<ul class="third no-bull">';
          } elseif ($current_iteration === 'two') {
            echo '<ul class="half no-bull">';
          } else {
            echo '<ul class="no-bull">';
          }

          if (have_rows('resource_promoted_items')) :
            $count = 0;
            while (have_rows('resource_promoted_items')) : the_row();
              $posts = get_sub_field('pick_your_page');
              $count++;
              foreach ($posts as $post) :
                setup_postdata($post);
                if ($post->post_type === 'client-story') :
                  $thumb_path = get_field('client_testimonial_image');
                  $thumb_url = 'linear-gradient(rgba(51, 171, 64, 0.85), rgba(51, 171, 64, 0.85)), url(' . $thumb_path . ')';
                  if ($count === 2) {
                    $thumb_url = 'linear-gradient(rgba(185, 73, 245, 0.85), rgba(185, 73, 245, 0.85)), url(' . $thumb_path . ')';
                  }
                  if ($count === 3) {
                    $thumb_url = 'linear-gradient(rgba(250, 197, 0, 0.85), rgba(250, 197, 0, 0.85)), url(' . $thumb_path . ')';
                  }
                  echo '<li class="promoted-item" style="background-image: ' . $thumb_url . ';">';
                    echo '<img src="' . get_field('client_logo') . '" alt="' . get_the_title() . ' Logo" class="promoted-item-company-logo">';
                    echo '<p class="mar-b">' . strip_tags(get_the_excerpt()) . '</p>';
                    echo '<a href="' . get_the_permalink() . '" class="btn-white--outline">Learn More</a>';
                  echo '</li>';
                else :
                  $thumb_id = get_post_thumbnail_id();
                  $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
                  $thumb_path = $thumb_url_array[0];
                  $thumb_url = 'linear-gradient(rgba(51, 171, 64, 0.7), rgba(51, 171, 64, 0.7)), url(' . $thumb_path . ')';
                  if ($count === 2) {
                    $thumb_url = 'linear-gradient(rgba(185, 73, 245, 0.7), rgba(185, 73, 245, 0.7)), url(' . $thumb_path . ')';
                  }
                  echo '<li class="pad-y-more promoted-item promoted-item--dark" style="background-image: ' . $thumb_url . ';">';
                    echo '<h4 class="mar-b">' . get_the_title() . '</h4>';
                    echo '<p class="mar-b">' . strip_tags(get_the_excerpt()) . '</p>';
                    echo '<a href="' . get_the_permalink() . '" class="btn-white--outline">Learn More</a>';
                  echo '</li>';
                endif;
              endforeach;
              wp_reset_postdata();
            endwhile;
          endif;

          echo '</ul>';
        ?>
      </div>
    </div>
  </section>

  <section class="persistent-nav brand-two-callout">
    <div class="site-width">
      <h3 class="has-text-center">Resource By Type</h3>
      <?php
        wp_nav_menu(
          array(
            'menu' => 'resource-links',
            'menu_id' => 'persistent-nav-list'
          )
        );
      ?>
    </div>
  </section>

  <section class="resource-grid">
    <div class="site-width">
      <div id="searchable-resources" class="pad-t-more pad-b-most searchable-resources">
        <div class="filter-container">
          <div>
            <input type="text" v-model="keyword" class="text-search-bar" placeholder="Filter <?php echo get_the_title(); ?> by Term">
          </div>
          <?php if (get_field('post_type') !== 'client-story') : ?>
            <div>
              <h4>Categories</h4>
              <select v-model="selectedCats">
                <option value="">All <?php echo get_the_title(); ?> Posts</option>
                <?php
                  if (get_field('post_type') === 'posts') {
                    $all_cats = get_categories();
                  } else if (get_field('post_type') === 'events') {
                    $all_cats = get_terms('event_type');
                  } else if (get_field('post_type') === 'library') {
                    $all_cats = get_terms('library_type');
                  }
                  foreach ($all_cats as $single_cat) :

                    $cat_count = $single_cat->count;

                    if ($single_cat->slug === 'tools') {
                      $cat_count = ($single_cat->count % 2) + 2;
                    }
                ?>
                  <option value="<?php echo $single_cat->slug; ?>"><?php echo $single_cat->name . ' - ' . $cat_count; ?></option>
                <?php
                  endforeach;
                ?>
              </select>
            </div>
          <?php endif; ?>
        </div>
        <div id="resource-items" class="third">
          <div v-for="post in filteredList" class="card">
            <template v-if="post._embedded['wp:featuredmedia']">
              <a v-bind:href="post.link" class="card-image" v-bind:style="{ backgroundImage: 'url(' + post._embedded['wp:featuredmedia'][0].source_url + ')' }"></a>
            </template>
            <template v-else>
              <a v-bind:href="post.link" class="card-image" style="background-image: url('/wp-content/themes/octiv2017/dist/img/octiv-pattern.svg'), linear-gradient(green, green);"></a>
            </template>
            <div class="card-content">
              <h4><a v-bind:href="post.link" v-html="post.title.rendered"></a></h4>
              <p class="card-description" v-html="post.excerpt.rendered"></p>
              <a v-bind:href="post.link" class="btn-arrow">Learn More <span class="arrow">&gt;</span></a>
            </div>
          </div>
        </div>
        <div class="has-text-center">
          <button v-on:click="getMorePosts()" id="load-more-posts" class="btn-brand--outline mar-t-most">Load More Posts</button>
        </div>
      </div>
    </div>
  </section>

<?php get_template_part('partials/module/display', 'powers-documents'); ?>

</main>

<script>
  <?php
    /*
    ==============================
    DEFAULT VARIABLES
    ==============================
    */
    $postsPerPage = 99;
    
    if (get_field('post_type')) {
      echo "var pagePostType = '" . get_field('post_type') . "';";
      echo "var postTypeCats = [";
        if (get_field('post_type') !== 'client-story') :
          foreach ($all_cats as $single_cat) :
            echo "'" . $single_cat->slug . "',";
          endforeach;
        endif;
      echo "];";
    }
    if (get_field('post_count')) {
      echo "var postsPerPage = " . get_field('post_count') . ";";
    } else {
      echo "var postsPerPage = " . $postsPerPage . ";";
    }
    if (get_field('post_order')) {
      echo "var postOrder = '" . get_field('post_order') . "';";
    }
    if (get_field('post_order_by')) {
      echo "var postOrderBy = '" . get_field('post_order_by') . "';";
    } else {
      echo "var postOrderBy = 'date';";
    }
  ?>
</script>

<?php get_footer(); ?>