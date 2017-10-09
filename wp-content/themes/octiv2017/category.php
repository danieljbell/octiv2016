<?php get_header(); ?>

<main>
  
<?php get_template_part('partials/module/display', 'hero'); ?>

<?php get_template_part('partials/module/display', 'breadcrumbs'); ?>

<section class="resource-grid">
  <div class="site-width">
    <div id="searchable-resources" class="pad-t-more pad-b-most">
      <div class="third-only">
        <input type="text" v-model="keyword" class="text-search-bar" placeholder="Search Blog Posts">
      </div>
      <div id="resource-items" class="third">
        <div v-for="post in filteredList" class="card">
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
  </div>
</section>

<?php get_template_part('partials/module/display', 'powers-documents'); ?>

</main>

<script>
  <?php
    echo 'var page_cat = ' . get_queried_object()->term_id . ';';
  ?>
</script>

<?php get_footer(); ?>