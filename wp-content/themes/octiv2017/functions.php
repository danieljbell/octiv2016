<?php
/*
==============================
ADD GLOBAL CSS TO PAGE
==============================
*/
function enqueue_global_css() {
  wp_enqueue_style('global', get_stylesheet_directory_URI() . '/dist/css/global.css', array(), '1.0.0');
}
add_action('wp_enqueue_scripts', 'enqueue_global_css');

/*
==============================
ADD GLOBAL JS TO PAGE
==============================
*/
function enqueue_global_js() {
  wp_enqueue_script('global', get_stylesheet_directory_URI() . '/dist/js/global.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_global_js');



/*
==========================================
HIDE ADMIN BAR
==========================================
*/
add_filter('show_admin_bar', '__return_false');


/*
==========================================
ADDS POST THUMBNAILS
==========================================
*/
add_theme_support( 'post-thumbnails' );


/*
==========================================
REMOVE EXTRA <p> TAGS FROM CONTENT
==========================================
*/
// remove_filter ('the_content', 'wpautop');
add_filter('the_content', 'remove_empty_p', 20, 1);
function remove_empty_p($content){
    $content = force_balance_tags($content);
    return preg_replace('#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content);
}


/*
==========================================
REMOVE WP EMOJICONS
==========================================
*/
function disable_wp_emojicons() {
  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );


/*
==========================================
ADD SOCIAL PROFILES + JOB TITLE TO USERS
==========================================
*/
add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', 'extra_user_profile_fields' );
function extra_user_profile_fields( $user ) { ?>
<h3><?php _e("Other Meta Data", "blank"); ?></h3>

<table class="form-table">
  <tr>
    <th>
      <label for="twitter"><?php _e("@Twitter Handle"); ?></label>
    </th>
    <td>
      <input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
      <span class="description"><?php _e("Please enter your twitter handle."); ?></span>
    </td>
  </tr>
  <tr>
    <th>
      <label for="linkedin"><?php _e("LinkedIn Profile"); ?></label>
    </th>
    <td>
      <input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr( get_the_author_meta( 'linkedin', $user->ID ) ); ?>" class="regular-text" /><br />
      <span class="description"><?php _e("Please enter your linkedin profile."); ?></span>
    </td>
  </tr>
  <tr>
    <th><label for="Job Title"><?php _e("Job Title"); ?></label></th>
    <td>
      <input type="text" name="job_title" id="job_title" value="<?php echo esc_attr( get_the_author_meta( 'job_title', $user->ID ) ); ?>" class="regular-text" /><br />
      <span class="description"><?php _e("Please enter your job title."); ?></span>
    </td>
  </tr>
</table>
<?php }
add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );
function save_extra_user_profile_fields( $user_id ) {
if ( !current_user_can( 'edit_user', $user_id ) ) { return false; }
update_user_meta( $user_id, 'address', $_POST['address'] );
update_user_meta( $user_id, 'city', $_POST['city'] );
update_user_meta( $user_id, 'province', $_POST['province'] );
update_user_meta( $user_id, 'postalcode', $_POST['postalcode'] );
update_user_meta( $user_id, 'twitter', $_POST['twitter'] );
update_user_meta( $user_id, 'linkedin', $_POST['linkedin'] );
update_user_meta( $user_id, 'job_title', $_POST['job_title'] );
}



/*
==========================================
REMOVE INLINE WIDTH + HEIGHT FROM IMAGES
==========================================
*/
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );
function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}


/*
========================================
ADD PAGE ORDER FOR RELEASE PAGE TYPE
========================================
*/
function add_release_page_order( $post_types ) {
    $post_types[] = 'releases';
    return $post_types;
}
add_filter( 'cmspo_post_types', 'add_release_page_order' );


/*
========================================
ADD PAGE ORDER FOR SUPPORT PAGE TYPE
========================================
*/
function add_support_page_order( $post_types ) {
    $post_types[] = 'support';
    return $post_types;
}
add_filter( 'cmspo_post_types', 'add_support_page_order' );



/*
========================================
CHECK TO SEE IF POST SLUG EXISTS FOR
LEGACY TB REQUESTS - Author: DK New Media
========================================
*/
// Check to see if the slug exists
function get_ID_by_slug($slug) {
    $post = get_page_by_path($slug, OBJECT, 'post');
    if ($post) {
        return $post->ID;
    } else {
        return null;
    }
}
// Get the slug from the requested URL
function get_requested_slug() {
  $requesturl = parse_url($_SERVER["REQUEST_URI"]);
  $requestslug = $requesturl['path'];
  $requestslug = str_replace( "/", "", $requestslug);
  return $requestslug;
}


/*
==============================

==============================
*/
add_filter( 'wpseo_breadcrumb_links', 'wpse_100012_override_yoast_breadcrumb_trail' );
function wpse_100012_override_yoast_breadcrumb_trail( $links ) {
  global $post;
  if ( is_singular( array('features', 'use-cases') ) || is_post_type_archive( array('integration', 'features', 'use-cases') ) || is_tax('integration_type') ) {
    $breadcrumb[] = array(
      'url' => '/platform',
      'text' => 'Platform',
    );
    array_splice( $links, 1, 0, $breadcrumb );
  }
  if ( is_singular( 'integration' ) ) {
    $breadcrumb[] = array(
      'url' => '/platform',
      'text' => 'Platform',
    );
    array_splice( $links, 1, 0, $breadcrumb );
    $integration_term_array = wp_get_post_terms($post->ID, 'integration_type');
    $category[] = array(
      'url' => '/platform/integrations/#' . $integration_term_array[0]->slug,
      'text' => $integration_term_array[0]->name,
    );
    array_splice( $links, 3, 0, $category );
  }
  if ( is_singular( 'post' ) ) {
    $breadcrumb[] = array(
      'url' => '/resources',
      'text' => 'Resources',
    );
    array_splice( $links, 1, 0, $breadcrumb );
  }
  if ( is_singular( 'solutions' ) ) {
    $breadcrumb[] = array(
      'url' => '/solutions',
      'text' => 'Solutions',
    );
    array_splice( $links, 1, 0, $breadcrumb );
  }
  if ( is_tax( 'event_type' ) ) {
    $breadcrumb[] = array(
      'url' => '/events',
      'text' => 'Events',
    );
    array_splice( $links, 1, 0, $breadcrumb );
  }
  return $links;
}