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

  <section style="margin-top: -3rem; margin-bottom: -3rem; position: relative; z-index: 2;">
    <div class="site-width">
      <div class="box--light" style="height: 400px;">
        Promoted Items
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
          )
        );
      ?>
    </div>
  </section>

  <section class="resource-grid">
    <div class="site-width">
      <div id="searchable-resources" class="pad-t-more pad-b-most">
        <div class="one-fourth">
          <div>
            <input type="text" v-model="keyword" class="text-search-bar" placeholder="Search Blog Posts">
          </div>
          <div id="resource-items" class="half">
            <div v-for="post in filteredList" class="card">
              <a v-bind:href="post.link" class="card-image" v-bind:style="{ backgroundImage: 'url(' + post._embedded['wp:featuredmedia'][0].source_url + ')' }"></a>
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

<?php get_footer(); ?>