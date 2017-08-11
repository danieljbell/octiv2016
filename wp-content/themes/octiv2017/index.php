<?php get_header();  ?>

<main>

  <?php echo do_shortcode('[get_hero title="cool man" img="https://fillmurray.com/1920/500"]'); ?>

  <div class="site-width">
    <h3>grid</h3>
    <div class="half">
      <div>col1</div>
      <div>col2</div>
    </div>
    <br>
    <br>
    <div class="third">
      <div>col1</div>
      <div>col2</div>
      <div>col3</div>
    </div>
    <br>
    <br>
    <div class="fourth">
      <div>col1</div>
      <div>col2</div>
      <div>col3</div>
      <div>col4</div>
    </div>
    <br>
    <br>
    <div class="two-third">
      <div>col1</div>
      <div>col2</div>
    </div>
    <br>
    <br>
    <div class="two-third grid-reverse">
      <div>col1</div>
      <div>col2</div>
    </div>
    <br>
    <br>
    <div class="one-fourth">
      <div>col1</div>
      <div>col2</div>
    </div>
    <br>
    <br>
    <div class="one-fourth grid-reverse">
      <div>col1</div>
      <div>col2</div>
    </div>
  </div>

</main>

<div class="modal-container">
  <button id="close-modal" class="close-modal">Close</button>
  <div class="modal-content">
    stuff
  </div>
</div>

<?php get_footer();  ?>