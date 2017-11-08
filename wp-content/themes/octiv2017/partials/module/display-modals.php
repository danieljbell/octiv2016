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
          MktoForms2.whenReady( function(form) {
              //set the first result as local variable
              var mktoLeadFields = mktoLead.result[0];
              
              //map your results from REST call to the corresponding field name on the form
              var prefillFields = { 
                "Email" : mktoLeadFields.email,
                "FirstName" : mktoLeadFields.firstName,
                "LastName" : mktoLeadFields.lastName,
                "Company" : mktoLeadFields.company,
                "Phone" : mktoLeadFields.phone,
                "State" : mktoLeadFields.state,
                "LinkedIn_Company_Size__c" : mktoLeadFields.LinkedIn_Company_Size__c
              };
              
              //pass our prefillFields objects into the form.vals method to fill our fields
              form.vals(prefillFields);
            }
          );
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

/*
==============================
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
          <div id="global-search">
            <select class="mar-b" v-model="selectedCats">
              <?php
                $args = array(
                  'public' => true,
                  'publicly_queryable' => true
                );
                $all_post_types = get_post_types($args);
                foreach ($all_post_types as $post_type) {
                  echo '<option>' . $post_type . '</option>';
                }
              ?>
            </select>
            <input type="text" class="text-search-bar" v-model="keyword">
          </div>
        </div>
      </div>
      <div class="modal-body">
        <strong>Searching <span v-if="selectedCats != ''">{{selectedCats}}</span> for: {{keyword}}</strong>
        <!-- <ul class="modal-search-list">
          <li v-for="post in filteredList"><a v-bind:href="post.link" v-html="post.title.rendered"></a></li>
        </ul> -->
        <div class="has-text-center">
          <button v-on:click="getMorePosts()" class="btn-brand--outline">Load More Posts</button>
        </div>
      </div>
    </div>
  </div>
</div>
==============================
*/

?>


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
<?php if (is_singular('releases')) : ?>
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
      <div class="modal-header light-callout" style="margin-right: 0;">
        <div class="modal-header--brand">
          <div class="color-boxes">
            <div class="person-headshot mar-b" style="margin-right: 0;">
              <img src="//fillmurray.com/185/185" alt="" class="">
            </div>
            <h4 class="color-box-headline--gray">Person Name</h4>
          </div>
          <p class="person-title">Person Title</p>
        </div>
        <div class="modal-header--content">
          <p>Follow Person on:</p>
          <ul>
            <li>Linkedin</li>
          </ul>
        </div>
      </div>
      <div class="modal-body" style="overflow: scroll;">
        <div class="bio-content" style="height: 0;">person bio</div>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>