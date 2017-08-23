<?php
/*
==============================
DEFAULT VARIABLES
==============================
*/
$cta_heading_text = 'Ready to Streamline Your Companies Workflows?';
$cta_sub_heading_text = 'Contact us today at <a href="tel:844-936-2848" class="no-style-text-link">844-936-2848</a> to learn more about how Octiv can help you.';
$cta_markup = '<button class="btn-primary rad-modal">Request A Demo</button>';


/*
==============================
INTEGRATION DEFAULTS
==============================
*/
if (is_singular('integration')) {
  $section_class = 'brand-callout pad-y-most has-text-left';
  $cta_heading_text = 'The Best Apps. Better Together.';
  $cta_sub_heading_text = strip_tags( get_the_excerpt() ) . '<p>Fill out the form to speak with a member of our sales team about unifying your document workflow with ' . get_the_title() . ' .</p>';
  $cta_markup = '';
  $cta_mktoForm = '1341';
  if (get_field('has_custom_mktoForm')) {
    $cta_mktoForm = get_field('custom_mktoForm');
  }
}

/*
==============================
CUSTOM META OVERIDES
==============================
*/
if (get_field('has_custom_cta_content')) {
  if (get_field('cta_heading_text')) {
    $cta_heading_text = get_field('cta_heading_text');
  }

  if (get_field('cta_sub_heading_text')) {
    $cta_sub_heading_text = get_field('cta_sub_heading_text');
  }
}

if (get_field('has_custom_cta_link')) {
  if (get_field('custom_cta_link_location')) {
    $cta_link_location = get_field('custom_cta_link_location');
    $cta_link_text = get_field('custom_cta_link_text');
    $cta_markup = '<a href="' . $cta_link_location . '" class="btn-primary">' . $cta_link_text . '</a>';
  }
}

?>

<?php
  if (!$section_class) {
    echo '<section id="call-to-action">';
      echo '<div class="site-width has-text-center">';
  } else {
    echo '<section id="call-to-action" class="' . $section_class . '">';
      echo '<div class="site-width">';
  }
?>
<?php
  if (!$section_class) {
    echo '<hr>';
  }
?>
    <div class="pad-y-more">
      <?php if (is_singular('integration')) : echo '<div class="one-fourth"><div>'; endif; ?>
      <h2><?php echo $cta_heading_text; ?></h2>
      <p><?php echo $cta_sub_heading_text; ?></p>
      <?php echo $cta_markup; ?>
      <?php
        if (is_singular('integration')) :
          echo '</div><div><script src="//app-sj20.marketo.com/js/forms2/js/forms2.min.js"></script><form id="mktoForm_' . $cta_mktoForm . '"></form><script>MktoForms2.loadForm("//app-sj20.marketo.com", "625-MXY-689", ' . $cta_mktoForm . ');</script></div>';
        endif;
      ?>
      <?php if (is_singular('integration')) : echo '</div>'; endif; ?>
    </div>
  </div>  
</section>