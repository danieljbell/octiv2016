<?php
/*
==============================
Template Name: Archive
==============================
*/
$post_type = get_field('post_type');
$post_parent = get_field('post_parent');
if ($post_type === 'post' || $post_type === 'solutions') {
  $post_parent = '0';
}
?>

<?php get_header(); ?>

<main>

<?php get_template_part('partials/module/display', 'hero'); ?>

<?php get_template_part('partials/module/display', 'breadcrumbs'); ?>

<section class="resource-grid">
  <div class="site-width">
    <div id="searchable-resources" class="pad-t-more pad-b-most">
      <div class="one-fourth">
        <div>
          <input type="text" v-model="keyword" class="text-search-bar" placeholder="Search <?php echo get_the_title(); ?>">
          <h4><?php echo get_the_title(); ?> By Type</h4>
          <hr style="margin: 0.25rem 0;">
          <ul class="resource-filter-list">
            <?php
              $allTerms = get_terms('integration_type');
              foreach ($allTerms as $term) {
                echo '<li><input type="checkbox" id="' . $term->slug . '" checked> <label for="' . $term->slug . '">' . $term->name . '</label></li>';
              }
            ?>
          </ul>
        </div>
        <div id="resource-items" class="third">
          <div v-for="post in filteredList" class="card">
            <div class="card-content">
              <a v-bind:href="post.link"><img v-bind:src="post.acf.integration_logo" v-bind:alt="post.title.rendered"></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  
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
      echo "var postsPerPage = '" . get_field('post_count') . "';";
    } else {
      echo "var postsPerPage = '" . $postsPerPage . "';";
    }
  ?>
</script>

<?php get_footer(); ?>