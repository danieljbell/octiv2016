<?php
  $doc_type = 'Documents';
  $typed_strings = array('Presentations', 'Proposals', 'Contracts', 'Invoices', 'Quotes');
  $document_container_body = 'Create, share, sign and store documents, increase efficiency, accuracy and take back your time.';
  if (is_singular('solutions')) {
    $doc_type = str_replace('For ', '', get_the_title());
  }
  if (get_field('rad_list_items')) {
    $typed_strings = array();
    while (have_rows('rad_list_items')) : the_row();
      array_push($typed_strings, get_sub_field('rad_list_item'));
    endwhile;
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
        <p class="typed-paragraph">for <span id="typed"></span></p>
        <p class="font-bump"><?php echo $document_container_body; ?></p>
        <ul id="typed-strings">
          <?php
            foreach ($typed_strings as $string) {
              echo '<li>' . $string . '</li>';
            }
          ?>
        </ul>
        <button class="btn-primary rad-modal">Request A Demo</button>
      </div>
    </div>
  </div>
</section>