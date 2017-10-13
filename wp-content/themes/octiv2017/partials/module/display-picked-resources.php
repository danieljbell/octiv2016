<?php
  $number_formatter = new NumberFormatter("en", NumberFormatter::SPELLOUT);

  if (have_rows('picked_resources')) :
    $count++;
    if ($count > 4) {
      $count = 1;
    }
    $current_iteration = $number_formatter->format($count + 2);
?>
<section class="mar-b-most pad-b-most">
  <div class="site-width">
    <div class="color-boxes">
      <h2 class="color-box-headline--brand-<?php echo $current_iteration; ?>">Resources</h2>
      <p class="mar-t no-mar-b">Keep exploring!</p>
    </div>
    <div class="third">
<?php
    while (have_rows('picked_resources')) : the_row();
      $picked_resource = get_sub_field('pick_your_page');
      foreach ($picked_resource as $post) {
        setup_postdata($post);
        echo do_shortcode('[get_card_v3 excerpt="true"]');
      }
      wp_reset_postdata();
    endwhile; ?>

    </div>
  </div>
</section>
<?php
  endif;
?>