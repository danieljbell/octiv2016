<?php
/*
==============================
Template Name: Archive
==============================
*/
?>

<?php get_header(); ?>

<main>

<?php get_template_part('partials/module/display', 'hero'); ?>

<?php get_template_part('partials/module/display', 'breadcrumbs'); ?>

  <section class="resource-grid">
    <div class="site-width">
      <div id="searchable-resources" class="pad-t-more pad-b-most searchable-resources">
        <div class="one-fourth vertical-align">
          <div class="resource-grid-filters-container">
            <input type="text" v-model="keyword" id="keyword-filter" class="text-search-bar" placeholder="Filter <?php echo get_the_title(); ?> by Term">
          </div>
          <div>
            <h4>Categories</h4>
            <select v-model="selectedCats">
              <option value="">All <?php echo get_the_title(); ?> Posts</option>
              <?php
                $all_cats = get_terms('integration_type');
                foreach ($all_cats as $single_cat) :
              ?>
                <option value="<?php echo $single_cat->slug; ?>"><?php echo $single_cat->name . ' - ' . $single_cat->count; ?></option>
              <?php
                endforeach;
              ?>
            </select>
          </div>
        </div>
        <div id="resource-items" class="third">
          <div v-for="post in filteredList" class="card">
            <?php if (is_page('integrations')) : ?>
              <div class="card-content">
                <a v-bind:href="post.link">
                  <img v-bind:src="post.acf.integration_logo" v-bind:alt="post.title.rendered">
                  <h4>{{post.title.rendered}}</h4>
                </a>
              </div>
            <?php else : ?>
              <div class="card-content">
                <h4><a v-bind:href="post.link" v-html="post.title.rendered"></a></h4>
                <p class="card-description" v-html="post.excerpt.rendered"></p>
                <a v-bind:href="post.link" class="btn-arrow">Learn More <span class="arrow">&gt;</span></a>
              </div>
            <?php endif; ?>
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
      echo "var postTypeCats = [";
        foreach ($all_cats as $single_cat) :
          echo "'" . $single_cat->slug . "',";
        endforeach;
      echo "];";
    }
    if (get_field('post_count')) {
      echo "var postsPerPage = " . get_field('post_count') . ";";
    } else {
      echo "var postsPerPage = " . $postsPerPage . ";";
    }
  ?>
</script>

<?php get_footer(); ?>