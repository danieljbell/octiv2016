<?php
/*
=========================
TEMPLATE NAME: Thank You
=========================
*/
?>

<?php

get_header();
$first_name = $_GET['first_name'];

?>

<div class="fixed-hero-section">
  <div class="site-width centered white-text">
    <h1>Thanks<?php if (isset($first_name)) { echo ' ' . $first_name; } ?>! We'll be in touch.</h1>
    <p style="margin-bottom: 0;" class="font-bump">In the meantime, check out these resources below.</p>
  </div>
</div>

<section>
  <div class="site-width">
    <script>
      console.log(location.href);
    </script>
  </div>
</section>

<?php get_footer(); ?>
