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
      $section_class = '';
      if ($count % 2 == 0) {
        $section_class = 'swap-order';
      } 
?>

<li>
  <div class="site-width">
    <div class="half vertical-align <?php echo $section_class; ?>">
      <div>
        <div class="color-boxes">
          <h2 class="color-box-headline--brand-two"><?php echo $section_title; ?></h2>
        </div>
        <p><?php echo $section_content; ?></p>
        <a href="#0" class="btn-brand-four--outline"><?php echo get_sub_field('section_call_to_action_title'); ?></a>
      </div>
      <div class="browser-window">
        <div>
          <img src="<?php echo get_sub_field('section_browser_window'); ?>" alt="">
        </div>
      </div>
    </div>
  </div>
</li>

<?
    endwhile;
    echo '</ul>';
    echo '</section>';
  endif;
?>


<?php
// if ($post->post_title != "Why Octiv") :
//   $count = 0;
//     if (have_rows('page_section')) :
//       $total = count(get_field('page_section'));
//       while (have_rows('page_section')) :
//         $count++;
//         the_row();
//         $section_title = get_sub_field('section_title');
//         $section_title = preg_replace('/&| |,/', '-', $section_title);
//         $section_title = preg_replace('/---|--/', '-', $section_title);
//         $section_title = strtolower($section_title);
//         $visual_type = get_sub_field('visual_type');
//         $overlay = get_sub_field('section_background_overlay');
//         if ($visual_type[0] === 'Background') {
//           if ($overlay != 1) {
//             echo '<section class="fat-section white-text" id="' . $section_title . '" style="background-image: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)), url(' . get_sub_field('section_background') . ');">';
//           } else {
//             echo '<section class="fat-section white-text" id="' . $section_title . '" style="background-image: url(' . get_sub_field('section_background') . ');">';
//           }
//         } else {
//           echo '<section class="fat-section" id="' . $section_title . '">';
//         }
//           echo '<div class="site-width">';
//             if ($count % 2 == 0) {
//               echo '<div class="half">';
//             } else {
//               echo '<div class="half-stack">';
//             }
//               if ($visual_type[0] != 'Background') {
//                 echo '<div class="section-visual browser-window">';
//                   echo '<div style="padding: 0;"><img src="' . get_sub_field('section_browser_window') . '" alt="' . get_sub_field('section_title') . '"></div>';
//                 echo '</div>';
//               } else {
//                 echo '<div class="section-visual"></div>';
//               }
//               echo '<div class="section-content">';
//                 echo '<div class="section-icon">';
//                   if (get_sub_field('section_icon')) {
//                     $icon_file = get_sub_field('section_icon', true);
//                     echo file_get_contents($icon_file[url], false, $context);
//                   }
//                 echo '</div>';
//                 echo '<div>';
//                   echo '<h2>' . get_sub_field('section_title') . '</h2>';
//                   echo '<p>' . get_sub_field('section_content') . '</p>';
//                   if (get_sub_field('section_call_to_action_title')) {
//                     if ($visual_type[0] != 'Background') {
//                       echo '<a href="' . get_sub_field('section_call_to_action_link') . '" class="btn-arrow">' . get_sub_field('section_call_to_action_title') . '</a>';
//                     } else {
//                       echo '<a href="' . get_sub_field('section_call_to_action_link') . '" class="btn-arrow" style="color: #fff; text-shadow: none;">' . get_sub_field('section_call_to_action_title') . '</a>';
//                     }
//                   }
//                 echo '</div>';
//               echo '</div>';
//             echo '</div>';
//           echo '</div>';
//         echo '</section>';
//         if ($count < $total) :
//           if ($visual_type[0] != 'Background') {
//             echo '<div class="site-width"><hr></div>';
//           }
//         endif;
//       endwhile;
//     endif;
// endif;
?>
  
</main>

<?php get_template_part('partials/module/display', 'powers-documents'); ?>

<?php get_footer(); ?>