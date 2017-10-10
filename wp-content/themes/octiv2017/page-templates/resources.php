<?php
/*
===================================
TEMPLATE NAME: Resource Layout
===================================
*/

?>

<?php get_header(); ?>

<main>
  
  <?php get_template_part('partials/module/display', 'hero'); ?>

  <section class="promoted-container" style="margin-top: -3rem; margin-bottom: -3rem; position: relative; z-index: 2;">
    <div class="site-width">
      <div class="box--light">
        <?php
          $promoted_items = get_field('pick_your_page');
          $promoted_count = count($promoted_items);
          
          echo '<div class="">';
            foreach ($promoted_items as $item) : ?>
              <?php
                $args = array(
                  'post_type' => $item->post_type,
                  'posts_per_page' => 1,
                  'page_id' => $item->ID
                );
                $query = new WP_Query($args);
                if ($query->have_posts()) :
                  while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="promoted-item">
                      <img src="<?php echo get_field('client_logo'); ?>" alt="<?php echo get_field('person_company'); ?>" class="promoted-item-company-logo">
                      <p class="quote"><?php echo get_field('highlighted_quote'); ?></p>
                      <div class="person-headshot" style="margin-right: 0;">
                        <img src="<?php echo get_field('person_headshot'); ?>" alt="<?php echo get_field('person_name'); ?>">
                      </div>
                      <p><strong><?php echo get_field('person_name'); ?></strong><br><?php echo get_field('person_title'); ?></p>
                      <a href="<?php echo get_the_permalink(); ?>" class="btn-white--outline">Read the Full Story</a>
                    </div>
              <?php      
                  endwhile;
                endif;
                wp_reset_query();
              ?>
          <?php endforeach;
          echo '</div>';
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
        <div class="one-fourth">
          <div class="resource-grid-filters-container">
            <input type="text" v-model="keyword" class="text-search-bar" placeholder="Filter <?php echo get_the_title(); ?>">
            <h4>Categories</h4>
            <hr style="margin: 0.25rem 0;">
            <ul class="resource-filter-list">
              <?php
                $all_cats = get_categories();
                foreach ($all_cats as $single_cat) :
              ?>
                <li><input type="checkbox" id="<?php echo $single_cat->slug; ?>" checked> <label for="<?php echo $single_cat->slug; ?>"><?php echo $single_cat->name; ?></label></li>
              <?php 
                endforeach;
              ?>
            </ul>
          </div>
          <div id="resource-items" class="half">
            <div v-for="post in filteredList" class="card">
              <?php if (!is_page(3631)) : ?>
                <a v-bind:href="post.link" class="card-image" v-bind:style="{ backgroundImage: 'url(' + post._embedded['wp:featuredmedia'][0].source_url + ')' }"></a>
              <?php endif; ?>
              <div class="card-content">
                <h4><a v-bind:href="post.link" v-html="post.title.rendered"></a></h4>
                <p class="card-description" v-html="post.excerpt.rendered"></p>
                <a v-bind:href="post.link" class="btn-arrow">Learn More <span class="arrow">&gt;</span></a>
              </div>
            </div>
          </div>
        </div>
        <div class="one-fourth">
          <div>&nbsp;</div>
          <div class="has-text-center">
            <button v-on:click="getMorePosts()" id="load-more-posts" class="btn-brand--outline mar-t-most">Load More Posts</button>
          </div>
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
    }
    if (get_field('post_count')) {
      echo "var postsPerPage = " . get_field('post_count') . ";";
    } else {
      echo "var postsPerPage = " . $postsPerPage . ";";
    }
    if (get_field('post_order')) {
      echo "var postOrder = '" . get_field('post_order') . "';";
    } else {
      // echo "var postsPerPage = '" . $postsPerPage . "';";
    }
  ?>
</script>

<?php get_footer(); ?>