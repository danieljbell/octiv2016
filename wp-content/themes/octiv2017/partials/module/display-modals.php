<?php
$user = 'octiv';
$pass = 'D@n13lR0cks!';
$context = stream_context_create(array(
  'http' => array(
    'header'  => "Authorization: Basic " . base64_encode("$user:$pass")
  )
));
?>

<?php
/*
==============================
REQUEST A DEMO
==============================
*/
?>
<div class="rad-modal-container modal fade-scale" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Close <span class="font-bump">&times;</span></span></button>
    <div class="modal-content half">
      <div class="modal-header light-callout">
        <div class="modal-header--brand">
          <div class="color-boxes">
            <h4 class="color-box-headline--gray">Request a Demo</h4>
          </div>
          <p>Please complete the form to speak with an Octiv representative about our products and services.</p>
        </div>
        <div class="modal-header--content">
          <p>Once the form is submitted, we'll contact you within one to two business days to find out more about your needs.</p>
          <p>Want to speak with us right now? Call <a href="tel:844-936-2848" title="Call Us Today: 844-936-2848">844-936-2848</a>, we're happy to help.</p>
        </div>
      </div>
      <div class="modal-body">
        <script src="//app-sj20.marketo.com/js/forms2/js/forms2.min.js"></script>
        <form id="mktoForm_1141"></form>
        <script>
          MktoForms2.loadForm("//app-sj20.marketo.com", "625-MXY-689", 1141, function(form) {
            form.onSuccess(function(values, followUpUrl) {
              // Get the form field values
              var vals = form.vals();
              // Update the redirect url with form fields
              followUpUrl = window.location.origin + '/thank-you/?first_name=' + vals.FirstName;
              // Redirect the page with form field
              location.href = followUpUrl;
              // Return false to prevent the submission handler continuing with its own processing
              return false;
            });
          });
        </script>
      </div>
    </div>
  </div>
</div>

<?php
/*
==============================
GET OUR LOGO
==============================
*/
?>
<div class="logo-modal-container modal fade-scale" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Close <span class="font-bump">&times;</span></span></button>
    <div class="modal-content vertical-align">
      <div class="modal-header light-callout">
        <div class="modal-header--brand">
          <div class="color-boxes">
            <h4 class="color-box-headline--gray">Looking for Our Logo?</h4>
          </div>
          <p>Below you'll find all of our brand assets and logos.</p>
        </div>
        <div class="modal-header--content has-text-center">
          <a href="/wp-content/uploads/2016/07/Octiv-Brand-Assets.zip" class="btn-primary mar-b">Download .zip of brand assets</a>
          <p>If you have a special request or need help with anything, please reach out to us at <a href="mailto:marketing@octiv.com">marketing@octiv.com</a>.</p>
        </div>
      </div>
    </div>
  </div>
</div>


<?php
/*
==============================
GLOBAL SEARCH
==============================
*/
?>
<div class="search-modal-container modal fade-scale" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Close <span class="font-bump">&times;</span></span></button>
    <div class="modal-content half" id="global-search-app">
      <div class="modal-header light-callout">
        <div class="modal-header--brand">
          <div class="color-boxes">
            <h4 class="color-box-headline--gray">What Can We Help You Find?</h4>
          </div>
          <p>Use the search bar below to find what you are looking for.</p>
        </div>
        <div class="modal-header--content">
          <form id="global-search-form" method="POST" action="<?php echo site_url(); ?>">
            <input id="global-search-input" type="text" class="text-search-bar" placeholder="Search">
            <label for="global-search-post-type">Page Type:</label>
            <select name="global-search-post-type" id="global-search-post-type" class="mar-b">
              <option value="any" selected>All Pages</option>
              <?php
                $args = array(
                  'publicly_queryable' => true
                );
                $excludes = array('Media', 'Landing Pages', 'Features', 'Employee Testimonial');
                $all_post_types = get_post_types($args, 'objects');
                foreach ($all_post_types as $post_type) {
                  if (!in_array($post_type->label, $excludes)) {
                    $value = $post_type->name;
                    $text = $post_type->label;
                    if ($post_type->label === 'Posts') {
                      $text = 'Blog';
                    }
                    if ($post_type->label === 'Library') {
                      $text = 'Resources';
                    }
                    if ($post_type->label === 'Releases') {
                      $text = 'Product Releases';
                    }
                    echo '<option value="' . $value . '">' . $text . '</option>';
                  }
                }
              ?>
            </select>
            <div class="has-text-center">
              <input id="global-search-submit" type="submit" class="btn-primary" value="Search">
            </div>
          </form>
        </div>
      </div>
      <div class="modal-body">
        <div class="searching-animation" style="display: none;">
          <div class="loading-container abs-center">
            <div class="loading-text">Loading</div>
            <div class="loading-cog">
              <img src="/wp-content/themes/octiv2017/dist/img/loading-cog--white.svg" alt="Loading Icon">
            </div>
          </div>
        </div>
        <div class="search-results">
          
        </div>
      </div>
    </div>
  </div>
</div>


<?php
/*
==============================
SUPPORT TICKET
==============================
*/
?>
<?php if ( is_singular( 'support' ) || is_post_type_archive( 'support' ) ) : ?>
  <div class="submit-modal modal fade-scale" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Close <span class="font-bump">&times;</span></span></button>
      <div class="modal-content vertical-align">
        <div class="modal-header light-callout">
          <div class="modal-header--brand">
            <div class="color-boxes">
              <h4 class="color-box-headline--gray">Submit a "Help Me" ticket</h4>
            </div>
            <p>Please fill out the form below to submit a ticket to our support team.</p>
          </div>
          <div class="modal-header--content">
            <?php get_template_part('partials/module/display', 'support-form'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>


<?php
/*
==============================
EMPTY MODAL
==============================
*/
?>
<?php if (is_singular('releases') || is_post_type_archive('support') || is_singular('support')) : ?>
  <div class="empty-modal modal fade-scale" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Close <span class="font-bump">&times;</span></span></button>
      <div class="modal-content vertical-align">
      </div>
    </div>
  </div>
  <style>
    .empty-modal .modal-content img {
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: initial;
      max-width: 100%;
      margin-bottom: 1rem;
      padding-left: 1rem;
      padding-right: 1rem;
    }
  </style>
<?php endif; ?>



<?php
/*
==============================
PAGE SECTION VIDEO MODAL
==============================
*/
?>
<?php if (is_page_template('page-templates/page-sections.php') || is_singular('solutions') || is_page_template('page-templates/page-sections-with-promo.php') || is_singular('integration')) : ?>
  <div class="video-modal modal fade-scale" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Close <span class="font-bump">&times;</span></span></button>
      <div class="modal-content">
        <div class="modal-header light-callout">
          <div class="modal-header--brand">
            <div class="color-boxes">
              <h2 class="color-box-headline--gray">Submit a "Help Me" ticket</h2>
            </div>
            <p>Please fill out the form below to submit a ticket to our support team.</p>
          </div>
          <div class="modal-body">
            <div class="form-container">
              <script src="//app-sj20.marketo.com/js/forms2/js/forms2.min.js"></script>
              <form id="mktoForm_"></form>
            </div>
            <div class="video-outer">
              <div class="video-inner">
                <iframe src="" name="wistia_embed" width="100%" height="100%" frameborder="0" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>



<?php
/*
==============================
TINDERBOX REFERAL MODAL
==============================
*/
?>
<?php if ($_GET['ref'] === 'tinderbox') : ?>
  <div class="rebrand-modal modal fade-scale" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Close <span class="font-bump">&times;</span></span></button>
      <div class="modal-content vertical-align">
        <div class="modal-header--content">
          <?php echo get_post(590)->post_content; ?>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>


<?php
/*
==============================
LEADERSHIP BIO MODAL
==============================
*/
?>
<?php if (is_page_template('page-templates/company-page.php')) : ?>
<div class="leadership-modal-container modal fade-scale" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Close <span class="font-bump">&times;</span></span></button>
    <div class="modal-content half">
      <div class="modal-header light-callout">
        <div class="modal-header--brand">
          <div class="color-boxes">
            <div class="person-headshot mar-b">
              <img src="//fillmurray.com/185/185" alt="" class="">
            </div>
            <h4 class="color-box-headline--gray">Person Name</h4>
          </div>
          <p class="person-title mar-b-more">Person Title</p>
          <ul class="social-links">
            <li class="twitter-icon"><a href="http://twitter.com/" target="_blank" rel="noopener noreferrer"><?php echo file_get_contents(get_stylesheet_directory_URI() . '/dist/img/twitter-icon.svg', false, $context); ?></a></li>
            <li class="linkedin-icon"><a href="http://www.linkedin.com/" target="_blank" rel="noopener noreferrer"><?php echo file_get_contents(get_stylesheet_directory_URI() . '/dist/img/linkedin-icon.svg', false, $context); ?></a></li>
          </ul>
        </div>
      </div>
      <div class="modal-body">
        <div class="bio-content">person bio</div>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>


<?php
/*
==============================
PARTNER MODAL
==============================
*/
?>
<?php if (is_page_template('page-templates/partner-page.php')) : ?>
<div class="partner-modal-container modal fade-scale" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Close <span class="font-bump">&times;</span></span></button>
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-header--brand">
          <div class="color-boxes">
            <h4 class="color-box-headline--gray">Become a Partner</h4>
          </div>
          <p>Please complete the form to speak with an Octiv representative about becoming a partner.</p>
        </div>
        <div class="modal-header--content">
          <script src="//app-sj20.marketo.com/js/forms2/js/forms2.min.js"></script>
        <form id="mktoForm_1437"></form>
        <script>
          MktoForms2.loadForm("//app-sj20.marketo.com", "625-MXY-689", 1437, function(form) {
            form.onSuccess(function(values, followUpUrl) {
              // Get the form field values
              var vals = form.vals();
              $('.partner-modal-container .modal-header--content').html('<div class="has-text-center"><h2>Thanks, ' + vals.FirstName + '</h2><p>We\'ll be in touch soon.</p></div>');
              // Hide the form
              form.getFormElem().hide();
              // Return false to prevent the submission handler continuing with its own processing
              return false;
            });
          });
        </script>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>