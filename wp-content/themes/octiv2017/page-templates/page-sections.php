<?php
/*
===================================
TEMPLATE NAME: Page Sections
===================================
*/

$user = 'octiv';
$pass = 'D@n13lR0cks!';
$context = stream_context_create(array(
  'http' => array(
    'header'  => "Authorization: Basic " . base64_encode("$user:$pass")
  )
));

$number_formatter = new NumberFormatter("en", NumberFormatter::SPELLOUT);

?>

<?php get_header(); ?>

<main>

<?php get_template_part('partials/module/display', 'hero'); ?>

<?php get_template_part('partials/module/display', 'breadcrumbs'); ?>

<?php
  $count = 0;
  if (have_rows('page_section')) :
    echo '<section class="page-sections mar-y-most">';
    echo '<ul class="page-section-list">';
    while (have_rows('page_section')) : $count++; the_row();
      $section_title = get_sub_field('section_title');
      $section_content = get_sub_field('section_content');
      $section_class = 'reverse';
      if ($count % 2 == 0) {
        $section_class = 'swap-order';
      }
      if ($count > 4) {
        $count = 1;
      }
      $current_iteration = $number_formatter->format($count + 1);
?>

<li class="page-section-item">
  <div class="site-width">
    <div class="half vertical-align <?php echo $section_class; ?>">
      <div>
        <div class="color-boxes">
          <h2 class="color-box-headline--brand-<?php echo $current_iteration; ?> mar-b"><?php echo $section_title; ?></h2>
        </div>
        <p><?php echo $section_content; ?></p>
        <a href="#0" class="btn-brand-<?php echo $current_iteration; ?>--outline"><?php echo get_sub_field('section_call_to_action_title'); ?></a>
      </div>
      <div class="browser-window">
        <div>
          <img src="<?php echo get_sub_field('section_browser_window'); ?>" alt="">
        </div>
      </div>
    </div>
  </div>
</li>

<?php
    endwhile;
    echo '</ul>';
    echo '</section>';
  endif;
?>
  
</main>

<?php get_template_part('partials/module/display', 'powers-documents'); ?>

<?php get_footer(); ?>