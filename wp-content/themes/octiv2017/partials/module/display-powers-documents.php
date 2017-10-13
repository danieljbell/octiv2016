<?php
  $doc_type = 'Documents';
  $typed_strings = array('Presentations', 'Proposals', 'Contracts', 'Invoices', 'Quotes');
  $document_container_body = 'Create, share, sign and store documents, increase efficiency, accuracy and take back your time.';
  if (is_singular('solutions')) {
    $doc_type = str_replace('For ', '', get_the_title());
  }
  if (get_field('rad_subheadline')) {
    $typed_strings = null;
    $document_container_subheadline = get_field('rad_subheadline');
  }
  if (get_field('rad_body_copy')) {
    $document_container_body = get_field('rad_body_copy');
  }
?>

<section class="pattern-callout pad-t-most has-text-center">
  <div class="site-width">
    <div class="color-boxes pad-t">
      <h2 class="color-box-headline--brand">Octiv Powers <?php echo $doc_type; ?></h2>
      <div class="document-container pad-x-most pad-y-more">
        <?php
          if ($typed_strings) : 
            echo '<p class="typed-paragraph">for <span id="typed"></span></p>';
          else :
            echo '<p class="typed-paragraph">' . $document_container_subheadline . '</p>';
          endif;
        ?>
        <p class="font-bump"><?php echo $document_container_body; ?></p>
        <?php
          if ($typed_strings) : 
            echo '<ul id="typed-strings">';
              foreach ($typed_strings as $string) {
                echo '<li>' . $string . '</li>';
              }
            echo '</ul>';
          endif;
        ?>
        <button class="btn-primary rad-modal">Request A Demo</button>
      </div>
    </div>
  </div>
</section>