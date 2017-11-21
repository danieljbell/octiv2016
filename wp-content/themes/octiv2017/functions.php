<?php
/*
==============================
ADD GLOBAL CSS TO PAGE
==============================
*/
function enqueue_global_css() {
  if (!get_field('remove_header')) {
    wp_enqueue_style('global', get_stylesheet_directory_URI() . '/dist/css/global.css', array(), '1.0.9');
  }
}
add_action('wp_enqueue_scripts', 'enqueue_global_css');

/*
==============================
ADD GLOBAL JS TO PAGE
==============================
*/
function enqueue_global_js() {
  if (!get_field('remove_footer')) {
    wp_enqueue_script('library--vue', get_stylesheet_directory_URI() . '/dist/js/lib/vue.min.js', array(), null, true);
    wp_enqueue_script('global', get_stylesheet_directory_URI() . '/dist/js/global.js', array(), '1.0.8', true);
  }
  
  if (is_singular('integration')) {
    wp_enqueue_script('integration', get_stylesheet_directory_URI() . '/dist/js/integration.js', array(), '1.0.0', true);
  }
  if (is_singular('library')) {
    wp_enqueue_script('library', get_stylesheet_directory_URI() . '/dist/js/library.js', array(), '1.0.1', true);
  }
  if (is_page_template('page-templates/resources.php')) {
    wp_enqueue_script('resources', get_stylesheet_directory_URI() . '/dist/js/resources.js', array(), '1.0.4', true);
  }
  if (is_page_template('page-templates/archive.php')) {
    wp_enqueue_script('page-template--archive', get_stylesheet_directory_URI() . '/dist/js/page-template--archive.js', array(), '1.0.1', true);
  }
  if (is_category()) {
    wp_enqueue_script('category', get_stylesheet_directory_URI() . '/dist/js/category.js', array(), '1.0.0', true);
  }
  if (is_post_type_archive('client-story')) {
    wp_enqueue_script('category', get_stylesheet_directory_URI() . '/dist/js/client-story.js', array(), '1.0.0', true);
  }
  if (is_singular('support') || is_post_type_archive('support') ) {
    wp_enqueue_script('support', get_stylesheet_directory_URI() . '/dist/js/support-portal.js', array(), '1.0.0', true);
  }
  if (is_post_type_archive('press-releases')) {
    wp_enqueue_script('press-releases', get_stylesheet_directory_URI() . '/dist/js/press-releases.js', array(), '1.0.1', true);
  }
  if (is_singular('events')) {
    wp_enqueue_script('events', get_stylesheet_directory_URI() . '/dist/js/events.js', array(), '1.0.0', true);
  }
  if (is_singular('releases')) {
    wp_enqueue_script('releases', get_stylesheet_directory_URI() . '/dist/js/releases.js', array(), '1.0.0', true);
  }

  if (is_page_template('page-templates/page-sections.php')) {
    wp_enqueue_script('page-template--page-sections', get_stylesheet_directory_URI() . '/dist/js/page-template--page-sections.js', array(), '1.0.2', true);
  }

  if (is_page_template('page-templates/landing-page.php')) {
    wp_enqueue_script('page-template--landing-page', get_stylesheet_directory_URI() . '/dist/js/page-template--landing-page.js', array(), '1.0.2', true);
  }

}
add_action('wp_enqueue_scripts', 'enqueue_global_js');

// function acf_custom_js() {
//   wp_enqueue_script('page-template--page-sections', get_stylesheet_directory_URI() . '/dist/js/page-template--page-sections.js', array(), '1.0.0', true);
// }

// if (get_field('is_animation')) {
//   add_action('wp_enqueue_scripts', 'acf_custom_js');   
// }


/*
==========================================
CREATING ADMIN NAV MENUS
==========================================
*/
register_nav_menus( array(
  'eyebrow_quick_links' => __( 'Eyebrow Quick Links' ),  
  'site-header' => __( 'Site Header' ),
  'mega-menu-promo' => __( 'Mega Menu Promo' ),
  'site_footer' => __( 'Site Footer' ),
  'sub_footer_links' => __( 'Sub Footer Links' ),
  'resource_links' => __( 'Resource Links' ),
) );


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
ADDS EXCERPT TO PAGES
==========================================
*/
add_post_type_support( 'page', 'excerpt' );


/*
==========================================
REMOVE EXTRA <p> TAGS FROM CONTENT
==========================================
*/
remove_filter( 'the_excerpt', 'wpautop' );
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
YOAST BREADCRUMB OVERIDES
==============================
*/
add_filter( 'wpseo_breadcrumb_links', 'wpse_100012_override_yoast_breadcrumb_trail' );
function wpse_100012_override_yoast_breadcrumb_trail( $links ) {
  global $post;
  if (is_singular('solutions')) {
      $breadcrumb[] = array(
      'url' => '/solutions',
      'text' => 'Solutions',
    );
    array_splice( $links, 1, 0, $breadcrumb );
  }
  if (is_singular('integration')) {
      $breadcrumb[] = array(
      'url' => '/integrations',
      'text' => 'Integrations',
    );
    array_splice( $links, 1, 0, $breadcrumb );
  }
  if (is_singular('client-story')) {
    $breadcrumb[] = array(
      'url' => '/resources',
      'text' => 'Resources',
    );
    $breadcrumb[] = array(
      'url' => '/resources/client-stories',
      'text' => 'Client Stories',
    );
    array_splice($links, 1, 0, $breadcrumb);
  }
  if (is_singular('events')) {
    $breadcrumb[] = array(
      'url' => '/resources',
      'text' => 'Resources',
    );
    $breadcrumb[] = array(
      'url' => '/resources/events',
      'text' => 'Events',
    );
    array_splice($links, 1, 1, $breadcrumb);
  }
  // if ( is_singular( array('features', 'use-cases') ) || is_post_type_archive( array('integration', 'features', 'use-cases') ) || is_tax('integration_type') ) {
  //   $breadcrumb[] = array(
  //     'url' => '/platform',
  //     'text' => 'Platform',
  //   );
  //   array_splice( $links, 1, 0, $breadcrumb );
  // }
  // if ( is_singular( 'integration' ) ) {
  //   $breadcrumb[] = array(
  //     'url' => '/platform',
  //     'text' => 'Platform',
  //   );
  //   array_splice( $links, 1, 0, $breadcrumb );
  //   $integration_term_array = wp_get_post_terms($post->ID, 'integration_type');
  //   $category[] = array(
  //     'url' => '/platform/integrations/#' . $integration_term_array[0]->slug,
  //     'text' => $integration_term_array[0]->name,
  //   );
  //   array_splice( $links, 3, 0, $category );
  // }
  // if ( is_singular( 'post' ) ) {
  //   $breadcrumb[] = array(
  //     'url' => '/resources',
  //     'text' => 'Resources',
  //   );
  //   array_splice( $links, 1, 0, $breadcrumb );
  // }
  // if ( is_singular( 'solutions' ) ) {
  //   $breadcrumb[] = array(
  //     'url' => '/solutions',
  //     'text' => 'Solutions',
  //   );
  //   array_splice( $links, 1, 0, $breadcrumb );
  // }
  // if ( is_tax( 'event_type' ) ) {
  //   $breadcrumb[] = array(
  //     'url' => '/events',
  //     'text' => 'Events',
  //   );
  //   array_splice( $links, 1, 0, $breadcrumb );
  // }
  // if ( is_singular( 'client-stories' )) {
  //   $breadcrumb[] = array(
  //     'url' => '/resources',
  //     'text' => 'Resources',
  //   );
  //   array_splice( $links, 1, 0, $breadcrumb );
  // }
  return $links;
}



/*
==============================
ADDING MENU ORDER TO WP-API
==============================
*/
add_filter( 'rest_post_collection_params', 'add_menu_order_api', 10, 1 );

function add_menu_order_api( $params ) {
    $params['orderby']['enum'][] = 'menu_order';

    return $params;
}

/*
==============================
ADDING ACF OPTIONS PAGES
==============================
*/
if( function_exists('acf_add_options_page') ) {
  
  $args = array(
    'page_title'    => 'Press Release Settings',
    'menu_title'    => 'Press Release Settings',
    'menu_slug'     => 'press-release-settings',
    'parent_slug'   => 'edit.php?post_type=press-releases',
    'position'      => false,
    'icon_url'      => false
  );

  acf_add_options_sub_page($args);

  $args = array(
    'page_title'    => 'Blog Settings',
    'menu_title'    => 'Blog Settings',
    'menu_slug'     => 'blog-settings',
    'parent_slug'   => 'edit.php',
    'position'      => false,
    'icon_url'      => false
  );

  acf_add_options_sub_page($args);
  
}

// Alter search posts per page
function myprefix_search_posts_per_page($query) {
    if ( $query->is_search ) {
      $post_count = $_GET['posts_per_page'];
        $query->set( 'posts_per_page', $post_count );
    }
    return $query;
}
add_filter( 'pre_get_posts','myprefix_search_posts_per_page' );