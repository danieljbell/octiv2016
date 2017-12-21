<?php
  $number_formatter = new NumberFormatter("en", NumberFormatter::SPELLOUT);
  $term = get_queried_object();
?>

<section class="page-sections pad-y-most">
  <ul class="page-section-list">
    <?php
      if (have_rows('page_section', $term)) :
        while (have_rows('page_section', $term)) : the_row();
          echo '<li>' . get_sub_field('section_title') . '</li>';
        endwhile;
      endif;
    ?>
  </ul>
</section>