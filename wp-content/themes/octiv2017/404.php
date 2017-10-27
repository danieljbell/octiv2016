<?php
  $actual_link = $_SERVER[REQUEST_URI];
?>

<?php get_header();  ?>

<main>

  <section class="pad-y-most">
    <div class="site-width">
      <div class="error-grid">
        <div class="error-image-container">
          <img src="/wp-content/themes/octiv2017/dist/img/404.svg" alt="404">
        </div>
        <div class="error-content-container">
          <h1>This isn't the page you're looking for.</h1>
          <h2>We can’t find <?php echo $actual_link; ?>. Please use the navigation above or search here.</h2>
          <form role="search" method="get" action="<?php echo site_url(); ?>">
            <input type="text" name="s" placeholder="Search Octiv" class="text-search-bar">
          </form>
        </div>
      </div>
    </div>
  </section>

</main>

<?php get_footer();  ?>