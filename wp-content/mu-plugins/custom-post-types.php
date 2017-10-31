<?php

/*
==============================
REGISTER LIBRARY POST TYPE
==============================
*/
add_action( 'init', 'register_library_post_type' );

function register_library_post_type() {

  $labels = array(
    'name'                => 'Library',
    'singular_name'       => 'Library',
    'add_new'             => 'Add New Library Content',
    'add_new_item'        => 'Add New Library Content',
    'edit_item'           => 'Edit Library Content',
    'new_item'            => 'New Library Content',
    'all_items'           => 'All Library Content',
    'view_item'           => 'View Page',
    'search_items'        => 'Search Library',
    'not_found'           => 'No Library found',
    'not_found_in_trash'  => 'No Library found in Trash',
    'parent_item_colon'   => '',
    'menu_name'           => 'Library'
  );

  $args = array(
    'labels'      => $labels,
    'public'      => true,
    'has_archive' => false,
    'with_front' => true,
    'hierarchical'  => true,
    'menu_icon'   => 'dashicons-admin-appearance',
    'supports'    => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'page-attributes' ),
    'rewrite'            => array( 'slug' => 'resources/library' ),
    'capability_type' => 'library',
    'map_meta_cap' => true,
    'show_in_rest'       => true,
    'rest_controller_class' => 'WP_REST_Posts_Controller',
    'capabilities' => array(

    // meta caps (don't assign these to roles)
    'edit_post'              => 'edit_library',
    'read_post'              => 'read_library',
    'delete_post'            => 'delete_library',

    // primitive/meta caps
    'create_posts'           => 'create_librarys',

    // primitive caps used outside of map_meta_cap()
    'edit_posts'             => 'edit_librarys',
    'edit_others_posts'      => 'manage_librarys',
    'publish_posts'          => 'manage_librarys',
    'read_private_posts'     => 'read',

    // primitive caps used inside of map_meta_cap()
    'read'                   => 'read',
    'delete_posts'           => 'manage_librarys',
    'delete_private_posts'   => 'manage_librarys',
    'delete_published_posts' => 'manage_librarys',
    'delete_others_posts'    => 'manage_librarys',
    'edit_private_posts'     => 'edit_librarys',
    'edit_published_posts'   => 'edit_librarys'
    ),
  );

  register_post_type( 'library', $args );
}

/*
==============================
LIBRARY TAXONOMY
==============================
*/
function library_init() {
    // create a new taxonomy
    register_taxonomy(
        'library_type',
        'library',
        array(
            'label' => __( 'Library Type' ),
            // 'rewrite' => array( 'slug' => 'resources/events' ),
            'with_front' => false,
            'hierarchical' => true,
            'show_in_rest'       => true,
            'rest_controller_class' => 'WP_REST_Terms_Controller',
            // 'hasArchive' => true,
            'show_ui' => true,
            'capabilities' => array(
                'assign_terms' => 'edit_library_type',
                'edit_terms' => 'publish_library_type'
            )
        )
    );
}
add_action( 'init', 'library_init' );

/*
==============================
FORCE LIBRARY TO HAVE TAXONOMY
==============================
*/
// function force_post_categ_init() {
//   wp_enqueue_script('jquery');
// }
// function force_post_categ() {
//   echo "<script type='text/javascript'>\n";
//   echo "
//   jQuery('#publish').click(function() 
//   {
//     var cats = jQuery('[id^=\"taxonomy\"]')
//       .find('.selectit')
//       .find('input');
//     category_selected=false;
//     for (counter=0; counter<cats.length; counter++) 
//     {
//         if (cats.get(counter).checked==true) 
//         {
//             category_selected=true;
//             break;
//         }
//     }
//     if(category_selected==false) 
//     {
//       alert('You have not selected any category for the post. Please select post category.');
//       setTimeout(\"jQuery('#ajax-loading').css('visibility', 'hidden');\", 100);
//       jQuery('[id^=\"taxonomy\"]').find('.tabs-panel').css('background', '#F96');
//       setTimeout(\"jQuery('#publish').removeClass('button-primary-disabled');\", 100);
//       return false;
//     }
//   });
//   ";
//    echo "</script>\n";
// }
// add_action('admin_init', 'force_post_categ_init');
// add_action('edit_form_advanced', 'force_post_categ');



/*
==============================
REGISTER SUPPORT POST TYPE
==============================
*/
add_action( 'init', 'register_support_post_type' );

function register_support_post_type() {

  $labels = array(
    'name'                => 'Support',
    'singular_name'       => 'Support Doc',
    'add_new'             => 'Add New Support Doc',
    'add_new_item'        => 'Add New Support Doc',
    'edit_item'           => 'Edit Support Doc',
    'new_item'            => 'New Support Doc',
    'all_items'           => 'All Support Docs',
    'view_item'           => 'View Support Doc',
    'search_items'        => 'Search Support Doc',
    'not_found'           => 'No support doc found',
    'not_found_in_trash'  => 'No support doc found in Trash',
    'parent_item_colon'   => '',
    'menu_name'           => 'Support Doc'
  );

  $args = array(
    'labels'      => $labels,
    'public'      => true,
    'has_archive' => true,
    'with_front' => true,
    'hierarchical'  => true,
    'menu_icon'   => 'dashicons-welcome-learn-more',
    'supports'    => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'revisions' ),
    'capability_type' => 'support',
    'map_meta_cap' => true,
    'show_in_rest'       => true,
	'rest_base'          => 'support',
	'rest_controller_class' => 'WP_REST_Posts_Controller',
    'capabilities' => array(

    // meta caps (don't assign these to roles)
    'edit_post'              => 'edit_support',
    'read_post'              => 'read_support',
    'delete_post'            => 'delete_support',

    // primitive/meta caps
    'create_posts'           => 'create_supports',

    // primitive caps used outside of map_meta_cap()
    'edit_posts'             => 'edit_supports',
    'edit_others_posts'      => 'manage_supports',
    'publish_posts'          => 'manage_supports',
    'read_private_posts'     => 'read',

    // primitive caps used inside of map_meta_cap()
    'read'                   => 'read',
    'delete_posts'           => 'manage_supports',
    'delete_private_posts'   => 'manage_supports',
    'delete_published_posts' => 'manage_supports',
    'delete_others_posts'    => 'manage_supports',
    'edit_private_posts'     => 'edit_supports',
    'edit_published_posts'   => 'edit_supports'
    ),
  );

  register_post_type( 'support', $args );
}


/*
==============================
REGISTER SOLUTIONS POST TYPE
==============================
*/
add_action( 'init', 'register_solutions_post_type' );

function register_solutions_post_type() {

  $labels = array(
    'name'                => 'Solutions',
    'singular_name'       => 'Solution',
    'add_new'             => 'Add New Solution',
    'add_new_item'        => 'Add New Solution',
    'edit_item'           => 'Edit Solution',
    'new_item'            => 'New Solution',
    'all_items'           => 'All Solutions',
    'view_item'           => 'View Solutions',
    'search_items'        => 'Search Solutions',
    'not_found'           => 'No solutions found',
    'not_found_in_trash'  => 'No solutions found in Trash',
    'parent_item_colon'   => '',
    'menu_name'           => 'Solutions'
  );

  $args = array(
    'labels'      => $labels,
    'public'      => true,
    // 'has_archive' => true,
    // 'with_front' => true,
    // 'publicly_queryable' => false,
    'hierarchical'  => true,
    'menu_icon'   => 'dashicons-welcome-learn-more',
    'supports'    => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions' ),
    'capability_type' => 'support',
    'map_meta_cap' => true,
    'show_in_rest'       => true,
	'rest_base'          => 'solutions',
	'rest_controller_class' => 'WP_REST_Posts_Controller',
    'capabilities' => array(

    // meta caps (don't assign these to roles)
    'edit_post'              => 'edit_solution',
    'read_post'              => 'read_solution',
    'delete_post'            => 'delete_solution',

    // primitive/meta caps
    'create_posts'           => 'create_solutions',

    // primitive caps used outside of map_meta_cap()
    'edit_posts'             => 'edit_solutions',
    'edit_others_posts'      => 'manage_solutions',
    'publish_posts'          => 'manage_solutions',
    'read_private_posts'     => 'read',

    // primitive caps used inside of map_meta_cap()
    'read'                   => 'read',
    'delete_posts'           => 'manage_solutions',
    'delete_private_posts'   => 'manage_solutions',
    'delete_published_posts' => 'manage_solutions',
    'delete_others_posts'    => 'manage_solutions',
    'edit_private_posts'     => 'edit_solutions',
    'edit_published_posts'   => 'edit_solutions'
    ),
  );

  register_post_type( 'solutions', $args );
}

/*
==============================
SOLUTIONS TAXONOMY
==============================
*/
function solutions_init() {
    // create a new taxonomy
    register_taxonomy(
        'solution_type',
        'solutions',
        array(
            'label' => __( 'Solution Type' ),
            // 'rewrite' => array( 'slug' => 'resources/events' ),
            'with_front' => false,
            'hierarchical' => true,
            'hasArchive' => false,
            'show_ui' => true,
            'capabilities' => array(
                'assign_terms' => 'edit_solution_type',
                'edit_terms' => 'publish_solution_type'
            )
        )
    );
}
add_action( 'init', 'solutions_init' );


/*
===================================
REMOVE YOAST FROM SUPPORT PAGES
===================================
*/
// Returns true if user has specific role
function check_user_role( $role, $user_id = null ) {
    if ( is_numeric( $user_id ) )
        $user = get_userdata( $user_id );
    else
        $user = wp_get_current_user();
    if ( empty( $user ) )
        return false;
    return in_array( $role, (array) $user->roles );
}

// Disable WordPress SEO meta box for all roles other than administrator and seo
function wpse_init(){
    if( !check_user_role('administrator') ){
        // Remove page analysis columns from post lists, also SEO status on post editor
        add_filter('wpseo_use_page_analysis', '__return_false');
        // Remove Yoast meta boxes
        add_action('add_meta_boxes', 'disable_seo_metabox', 100000);
    }
}
add_action('init', 'wpse_init');

function disable_seo_metabox(){
    remove_meta_box('wpseo_meta', 'support', 'normal');
}


/*
==============================
REGISTER EVENT POST TYPE
==============================
*/
add_action( 'init', 'register_event_post_type' );

function register_event_post_type() {

  $labels = array(
    'name'                => 'Events',
    'singular_name'       => 'Event',
    'add_new'             => 'Add New Event',
    'add_new_item'        => 'Add New Event',
    'edit_item'           => 'Edit Event',
    'new_item'            => 'New Event',
    'all_items'           => 'All Events',
    'view_item'           => 'View Event',
    'search_items'        => 'Search Event',
    'not_found'           => 'No event found',
    'not_found_in_trash'  => 'No event found in Trash',
    'parent_item_colon'   => '',
    'menu_name'           => 'Events'
  );

  $args = array(
    'labels'      => $labels,
    'description' => '',
    'public'      => true,
    'has_archive' => false,
    'rewrite'            => array( 'slug' => 'resources/events' ),
    'menu_icon'   => 'dashicons-tickets-alt',
    'supports'    => array( 'title', 'thumbnail', 'excerpt', 'revisions', 'page-attributes' ),
    'show_in_rest'       => true,
    'rest_base'          => 'events',
    'rest_controller_class' => 'WP_REST_Posts_Controller',
    'capabilities' => array(

    // meta caps (don't assign these to roles)
    'edit_post'              => 'edit_event',
    'read_post'              => 'read_event',
    'delete_post'            => 'delete_event',

    // primitive/meta caps
    'create_posts'           => 'create_events',

    // primitive caps used outside of map_meta_cap()
    'edit_posts'             => 'edit_events',
    'edit_others_posts'      => 'edit_others_events',
    'publish_posts'          => 'publish_events',
    'read_private_posts'     => 'read',

    // primitive caps used inside of map_meta_cap()
    'read'                   => 'read',
    'delete_posts'           => 'delete_events',
    'delete_private_posts'   => 'delete_private_events',
    'delete_published_posts' => 'delete_published_events',
    'delete_others_posts'    => 'delete_others_events',
    'edit_private_posts'     => 'edit_private_events',
    'edit_published_posts'   => 'edit_published_events'
    ),
  );

  register_post_type( 'events', $args );
}

/*
==============================
EVENT TAXONOMY
==============================
*/
function events_init() {
    // create a new taxonomy
    register_taxonomy(
        'event_type',
        'events',
        array(
            'label' => __( 'Event Type' ),
            'rewrite' => array( 'slug' => 'resources/events' ),
            'with_front' => false,
            'hierarchical' => true,
            'hasArchive' => true,
            'show_ui' => true,
            'show_in_rest'       => true,
            'rest_base'          => 'event_type',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
            'capabilities' => array(
                'assign_terms' => 'edit_event_type',
                'edit_terms' => 'publish_event_type'
            )
        )
    );
}
add_action( 'init', 'events_init' );

/*
===================================
REGISTER PRESS RELEASE POST TYPE
===================================
*/
add_action( 'init', 'register_press_release_post_type' );

function register_press_release_post_type() {

  $labels = array(
    'name'                => 'Press Releases',
    'singular_name'       => 'Press Release',
    'add_new'             => 'Add New Press Release',
    'add_new_item'        => 'Add New Press Release',
    'edit_item'           => 'Edit Press Release',
    'new_item'            => 'New Press Release',
    'all_items'           => 'All Press Releases',
    'view_item'           => 'View Press Release',
    'search_items'        => 'Search Press Release',
    'not_found'           => 'No press release found',
    'not_found_in_trash'  => 'No press release found in Trash',
    'parent_item_colon'   => '',
    'menu_name'           => 'Press Releases'
  );

  $args = array(
    'labels'      => $labels,
    'public'      => true,
    'exclude_from_search' => false,
    'has_archive' => true,
    'menu_icon'   => 'dashicons-megaphone',
    'supports'    => array( 'title', 'editor', 'excerpt', 'revisions' ),
    'show_in_rest'       => true,
    'rest_base'          => 'press-releases',
    'rest_controller_class' => 'WP_REST_Posts_Controller',
    'capabilities' => array(

    // meta caps (don't assign these to roles)
    'edit_post'              => 'edit_press_releases',
    'read_post'              => 'read_press_releases',
    'delete_post'            => 'delete_press_releases',

    // primitive/meta caps
    'create_posts'           => 'create_press_releases',

    // primitive caps used outside of map_meta_cap()
    'edit_posts'             => 'edit_press_releases',
    'edit_others_posts'      => 'manage_press_releases',
    'publish_posts'          => 'manage_press_releases',
    'read_private_posts'     => 'read',

    // primitive caps used inside of map_meta_cap()
    'read'                   => 'read',
    'delete_posts'           => 'manage_press_releases',
    'delete_private_posts'   => 'manage_press_releases',
    'delete_published_posts' => 'manage_press_releases',
    'delete_others_posts'    => 'manage_press_releases',
    'edit_private_posts'     => 'edit_press_releases',
    'edit_published_posts'   => 'edit_press_releases'
    ),
  );

  register_post_type( 'press-releases', $args );
}


/*
========================================
REGISTER PRODUCT RELEASE POST TYPE
========================================
*/
add_action( 'init', 'register_release_post_type' );

function register_release_post_type() {

  $labels = array(
    'name'                => 'Releases',
    'singular_name'       => 'Product Release',
    'add_new'             => 'Add New Product Release',
    'add_new_item'        => 'Add New Product Release',
    'edit_item'           => 'Edit Product Release',
    'new_item'            => 'New Product Release',
    'all_items'           => 'All Product Releases',
    'view_item'           => 'View Product Release',
    'search_items'        => 'Search Product Release',
    'not_found'           => 'No product release found',
    'not_found_in_trash'  => 'No product release found in Trash',
    'parent_item_colon'   => '',
    'menu_name'           => 'Product Releases'
  );

  $args = array(
    'labels'      => $labels,
    'public'      => true,
    'has_archive' => true,
    'hierarchical' => true,
    'menu_icon'   => 'dashicons-megaphone',
    'supports'    => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'revisions' ),
    'capability_type' => 'support',
    'map_meta_cap' => true,
    'show_in_rest'       => true,
    'rest_base'          => 'releases',
    'rest_controller_class' => 'WP_REST_Posts_Controller',
    'capabilities' => array(

    // meta caps (don't assign these to roles)
    'edit_post'              => 'edit_release',
    'read_post'              => 'read_release',
    'delete_post'            => 'delete_release',

    // primitive/meta caps
    'create_posts'           => 'create_releases',

    // primitive caps used outside of map_meta_cap()
    'edit_posts'             => 'edit_releases',
    'edit_others_posts'      => 'manage_releases',
    'publish_posts'          => 'manage_releases',
    'read_private_posts'     => 'read',

    // primitive caps used inside of map_meta_cap()
    'read'                   => 'read',
    'delete_posts'           => 'manage_releases',
    'delete_private_posts'   => 'manage_releases',
    'delete_published_posts' => 'manage_releases',
    'delete_others_posts'    => 'manage_releases',
    'edit_private_posts'     => 'edit_releases',
    'edit_published_posts'   => 'edit_releases'
    ),
  );

  register_post_type( 'releases', $args );


}


/*
===================================
REGISTER LANDING PAGE POST TYPE
===================================
*/
add_action( 'init', 'register_landing_page_post_type' );

function register_landing_page_post_type() {

  $labels = array(
    'name'                => 'Landing Pages',
    'singular_name'       => 'Landing Page',
    'add_new'             => 'Add New Landing Page',
    'add_new_item'        => 'Add New Landing Page',
    'edit_item'           => 'Edit Landing Page',
    'new_item'            => 'New Landing Page',
    'all_items'           => 'All Landing Pages',
    'view_item'           => 'View Landing Page',
    'search_items'        => 'Search Landing Page',
    'not_found'           => 'No landing page found',
    'not_found_in_trash'  => 'No landing page found in Trash',
    'parent_item_colon'   => '',
    'menu_name'           => 'Landing Page'
  );

  $args = array(
    'labels'      => $labels,
    'public'      => true,
    'exclude_from_search' => true,
    'has_archive' => false,
    'menu_icon'   => 'dashicons-welcome-add-page',
    'supports'    => array( 'title', 'editor', 'excerpt', 'revisions' ),
    'capabilities' => array(

    // meta caps (don't assign these to roles)
    'edit_post'              => 'edit_landing_pages',
    'read_post'              => 'read_landing_pages',
    'delete_post'            => 'delete_landing_pages',

    // primitive/meta caps
    'create_posts'           => 'create_landing_pages',

    // primitive caps used outside of map_meta_cap()
    'edit_posts'             => 'edit_landing_pages',
    'edit_others_posts'      => 'manage_landing_pages',
    'publish_posts'          => 'manage_landing_pages',
    'read_private_posts'     => 'read',

    // primitive caps used inside of map_meta_cap()
    'read'                   => 'read',
    'delete_posts'           => 'manage_landing_pages',
    'delete_private_posts'   => 'manage_landing_pages',
    'delete_published_posts' => 'manage_landing_pages',
    'delete_others_posts'    => 'manage_landing_pages',
    'edit_private_posts'     => 'edit_landing_pages',
    'edit_published_posts'   => 'edit_landing_pages'
    ),
  );

  register_post_type( 'lp', $args );
}



/*
==============================
REGISTER FEATURES POST TYPE
==============================
*/
add_action( 'init', 'register_features_post_type' );

function register_features_post_type() {

  $labels = array(
    'name'                => 'Features',
    'singular_name'       => 'Feature',
    'add_new'             => 'Add New Feature',
    'add_new_item'        => 'Add New Feature',
    'edit_item'           => 'Edit Feature',
    'new_item'            => 'New Feature',
    'all_items'           => 'All Features',
    'view_item'           => 'View Features',
    'search_items'        => 'Search Features',
    'not_found'           => 'No features found',
    'not_found_in_trash'  => 'No features found in Trash',
    'parent_item_colon'   => '',
    'menu_name'           => 'Features'
  );

  $args = array(
    'labels'      => $labels,
    'public'      => true,
    // 'publicly_queryable' => false,
    'has_archive' => true,
    // 'hierarchical'  => true,
    'rewrite'            => array( 'slug' => 'platform/features' ),
    'menu_icon'   => 'dashicons-media-text',
    'supports'    => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes', 'revisions' ),
    'capability_type' => 'features',
    'map_meta_cap' => true,
    'show_in_rest'       => true,
    'rest_base'          => 'features',
    'rest_controller_class' => 'WP_REST_Posts_Controller',
    'capabilities' => array(

    // meta caps (don't assign these to roles)
    'edit_post'              => 'edit_feature',
    'read_post'              => 'read_feature',
    'delete_post'            => 'delete_feature',

    // primitive/meta caps
    'create_posts'           => 'create_features',

    // primitive caps used outside of map_meta_cap()
    'edit_posts'             => 'edit_features',
    'edit_others_posts'      => 'manage_features',
    'publish_posts'          => 'manage_features',
    'read_private_posts'     => 'read',

    // primitive caps used inside of map_meta_cap()
    'read'                   => 'read',
    'delete_posts'           => 'manage_features',
    'delete_private_posts'   => 'manage_features',
    'delete_published_posts' => 'manage_features',
    'delete_others_posts'    => 'manage_features',
    'edit_private_posts'     => 'edit_features',
    'edit_published_posts'   => 'edit_features'
    ),
  );

  register_post_type( 'features', $args );
}

/*
==============================
FEATURE TAXONOMY
==============================
*/
function feature_init() {
    // create a new taxonomy
    register_taxonomy(
        'feature_type',
        'features',
        array(
            'label' => __( 'Feature Type' ),
            // 'rewrite' => array( 'slug' => 'events' ),
            'hierarchical' => true,
            // 'hasArchive' => true,
            'show_ui' => true,
            'capabilities' => array(
                'assign_terms' => 'edit_features',
                'edit_terms' => 'publish_features'
            )
        )
    );
}
add_action( 'init', 'feature_init' );


/*
==============================
REGISTER INTEGRATIONS POST TYPE
==============================
*/
add_action( 'init', 'register_integration_post_type' );

function register_integration_post_type() {

  $labels = array(
    'name'                => 'Integrations',
    'singular_name'       => 'Integration',
    'add_new'             => 'Add New Integration',
    'add_new_item'        => 'Add New Integration',
    'edit_item'           => 'Edit Integration',
    'new_item'            => 'New Integration',
    'all_items'           => 'All Integrations',
    'view_item'           => 'View Integration',
    'search_items'        => 'Search Integration',
    'not_found'           => 'No integration found',
    'not_found_in_trash'  => 'No integration found in Trash',
    'parent_item_colon'   => '',
    'menu_name'           => 'Integrations'
  );

  $args = array(
    'labels'      => $labels,
    'public'      => true,
    // 'publicly_queryable' => false,
    'has_archive' => false,
    // 'hierarchical'  => true,
    'rewrite'            => array( 'slug' => 'integrations' ),
    'menu_icon'   => 'dashicons-admin-plugins',
    'supports'    => array( 'title', 'editor', 'excerpt', 'page-attributes', 'revisions' ),
    'capability_type' => 'integrations',
    'map_meta_cap' => true,
    'show_in_rest'       => true,
    'rest_base'          => 'integrations',
    'rest_controller_class' => 'WP_REST_Posts_Controller',
    'capabilities' => array(

    // meta caps (don't assign these to roles)
    'edit_post'              => 'edit_integration',
    'read_post'              => 'read_integration',
    'delete_post'            => 'delete_integration',

    // primitive/meta caps
    'create_posts'           => 'create_integrations',

    // primitive caps used outside of map_meta_cap()
    'edit_posts'             => 'edit_integrations',
    'edit_others_posts'      => 'manage_integrations',
    'publish_posts'          => 'manage_integrations',
    'read_private_posts'     => 'read',

    // primitive caps used inside of map_meta_cap()
    'read'                   => 'read',
    'delete_posts'           => 'manage_integrations',
    'delete_private_posts'   => 'manage_integrations',
    'delete_published_posts' => 'manage_integrations',
    'delete_others_posts'    => 'manage_integrations',
    'edit_private_posts'     => 'edit_integrations',
    'edit_published_posts'   => 'edit_integrations'
    ),
  );

  register_post_type( 'integration', $args );
}

/*
==============================
INTEGRATION TAXONOMY
==============================
*/
function integration_init() {
    // create a new taxonomy
    register_taxonomy(
        'integration_type',
        'integration',
        array(
            'label' => __( 'Integration Type' ),
            'rewrite' => array( 'slug' => 'platform/integrations' ),
            'hierarchical' => true,
            // 'hasArchive' => true,
            'show_ui' => true,
            'show_in_rest'       => true,
            'rest_base'          => 'integration_type',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
            'capabilities' => array(
                'assign_terms' => 'edit_integration',
                'edit_terms' => 'publish_integration'
            )
        )
    );
}
add_action( 'init', 'integration_init' );



/*
==============================
REGISTER USE CASE POST TYPE
==============================
*/
add_action( 'init', 'register_use_case_post_type' );

function register_use_case_post_type() {

  $labels = array(
    'name'                => 'Use Cases',
    'singular_name'       => 'Use Case',
    'add_new'             => 'Add New Use Case',
    'add_new_item'        => 'Add New Use Case',
    'edit_item'           => 'Edit Use Case',
    'new_item'            => 'New Use Case',
    'all_items'           => 'All Use Case',
    'view_item'           => 'View Use Case',
    'search_items'        => 'Search Use Case',
    'not_found'           => 'No use case found',
    'not_found_in_trash'  => 'No use case found in Trash',
    'parent_item_colon'   => '',
    'menu_name'           => 'Use Cases'
  );

  $args = array(
    'labels'      => $labels,
    'public'      => true,
    'publicly_queryable' => false,
    'has_archive' => true,
    // 'hierarchical'  => true,
    'rewrite'            => array( 'slug' => 'platform/use-cases' ),
    'menu_icon'   => 'dashicons-art',
    'supports'    => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions' ),
    'capability_type' => 'use-cases',
    'map_meta_cap' => true,
    // 'show_in_rest'       => true,
        // 'rest_base'          => 'support-api',
        // 'rest_controller_class' => 'WP_REST_Posts_Controller',
    'capabilities' => array(

    // meta caps (don't assign these to roles)
    'edit_post'              => 'edit_use_case',
    'read_post'              => 'read_use_case',
    'delete_post'            => 'delete_use_case',

    // primitive/meta caps
    'create_posts'           => 'create_use_cases',

    // primitive caps used outside of map_meta_cap()
    'edit_posts'             => 'edit_use_cases',
    'edit_others_posts'      => 'manage_use_cases',
    'publish_posts'          => 'manage_use_cases',
    'read_private_posts'     => 'read',

    // primitive caps used inside of map_meta_cap()
    'read'                   => 'read',
    'delete_posts'           => 'manage_use_cases',
    'delete_private_posts'   => 'manage_use_cases',
    'delete_published_posts' => 'manage_use_cases',
    'delete_others_posts'    => 'manage_use_cases',
    'edit_private_posts'     => 'edit_use_cases',
    'edit_published_posts'   => 'edit_use_cases'
    ),
  );

  register_post_type( 'use-cases', $args );
}


/*
==============================
REGISTER ALERT POST TYPE
==============================
*/
add_action( 'init', 'register_alert_post_type' );

function register_alert_post_type() {

  $labels = array(
    'name'                => 'Alerts',
    'singular_name'       => 'Alert',
    'add_new'             => 'Add New Alert',
    'add_new_item'        => 'Add New Alert',
    'edit_item'           => 'Edit Alert',
    'new_item'            => 'New Alert',
    'all_items'           => 'All Alert',
    'view_item'           => 'View Alert',
    'search_items'        => 'Search Alert',
    'not_found'           => 'No alerts found',
    'not_found_in_trash'  => 'No alerts found in Trash',
    'parent_item_colon'   => '',
    'menu_name'           => 'Alerts'
  );

  $args = array(
    'labels'      => $labels,
    'public'      => false,
    'has_archive' => false,
    'show_ui' => true,
    'show_in_nav_menus' => true,
    'show_in_menu' => true,
    'show_in_admin_bar' => true,
    'menu_icon'   => 'dashicons-warning',
    'supports'    => array( 'title', 'editor'),
    'capability_type' => 'alerts',
    'map_meta_cap' => true,
    'capabilities' => array(

    // meta caps (don't assign these to roles)
    'edit_post'              => 'edit_alert',
    'read_post'              => 'read_alert',
    'delete_post'            => 'delete_alert',

    // primitive/meta caps
    'create_posts'           => 'create_alerts',

    // primitive caps used outside of map_meta_cap()
    'edit_posts'             => 'edit_alerts',
    'edit_others_posts'      => 'manage_alerts',
    'publish_posts'          => 'manage_alerts',
    'read_private_posts'     => 'read',

    // primitive caps used inside of map_meta_cap()
    'read'                   => 'read',
    'delete_posts'           => 'manage_alerts',
    'delete_private_posts'   => 'manage_alerts',
    'delete_published_posts' => 'manage_alerts',
    'delete_others_posts'    => 'manage_alerts',
    'edit_private_posts'     => 'edit_alerts',
    'edit_published_posts'   => 'edit_alerts'
    ),
  );

  register_post_type( 'alerts', $args );
}



/*
==============================
REGISTER CLIENT STORY POST TYPE
==============================
*/
add_action( 'init', 'register_client_story_post_type' );

function register_client_story_post_type() {

  $labels = array(
    'name'                => 'Client Stories',
    'singular_name'       => 'Client Story',
    'add_new'             => 'Add New Client Story',
    'add_new_item'        => 'Add New Client Story',
    'edit_item'           => 'Edit Client Story',
    'new_item'            => 'New Client Story',
    'all_items'           => 'All Client Stories',
    'view_item'           => 'View Client Story',
    'search_items'        => 'Search Client Stories',
    'not_found'           => 'No client stories found',
    'not_found_in_trash'  => 'No client stories found in Trash',
    'parent_item_colon'   => '',
    'menu_name'           => 'Client Stories'
  );

  $args = array(
    'labels'      => $labels,
    'description' => '',
    'public'      => true,
    'publicly_queryable' => true,
    'has_archive' => false,
    'rewrite'            => array( 'slug' => 'resources/client-stories' ),
    'menu_icon'   => 'dashicons-format-status',
    'supports'    => array( 'title', 'thumbnail', 'excerpt', 'page-attributes', 'revisions' ),
    'show_in_rest'       => true,
    'rest_base'          => 'client-story',
    'rest_controller_class' => 'WP_REST_Posts_Controller',
    'capabilities' => array(

    // meta caps (don't assign these to roles)
    'edit_post'              => 'edit_client_story',
    'read_post'              => 'read_client_story',
    'delete_post'            => 'delete_client_story',

    // primitive/meta caps
    'create_posts'           => 'create_client_story',

    // primitive caps used outside of map_meta_cap()
    'edit_posts'             => 'edit_client_story',
    'edit_others_posts'      => 'edit_others_client_story',
    'publish_posts'          => 'publish_client_story',
    'read_private_posts'     => 'read',

    // primitive caps used inside of map_meta_cap()
    'read'                   => 'read',
    'delete_posts'           => 'delete_client_story',
    'delete_private_posts'   => 'delete_private_client_story',
    'delete_published_posts' => 'delete_published_client_story',
    'delete_others_posts'    => 'delete_others_client_story',
    'edit_private_posts'     => 'edit_private_client_story',
    'edit_published_posts'   => 'edit_published_client_story'
    ),
  );

  register_post_type( 'client-story', $args );
}


/*
=======================================
REGISTER EMPLOYEE TESTIMONIAL POST TYPE
=======================================
*/
add_action( 'init', 'register_employee_testimonial_post_type' );

function register_employee_testimonial_post_type() {

  $labels = array(
    'name'                => 'Employee Testimonials',
    'singular_name'       => 'Employee Testimonial',
    'add_new'             => 'Add New Employee Testimonial',
    'add_new_item'        => 'Add New Employee Testimonial',
    'edit_item'           => 'Edit Employee Testimonial',
    'new_item'            => 'New Employee Testimonial',
    'all_items'           => 'All Employee Testimonials',
    'view_item'           => 'View Employee Testimonial',
    'search_items'        => 'Search Employee Testimonials',
    'not_found'           => 'No employee testimonials found',
    'not_found_in_trash'  => 'No employee testimonials found in Trash',
    'parent_item_colon'   => '',
    'menu_name'           => 'Employee Testimonials'
  );

  $args = array(
    'labels'      => $labels,
    'description' => '',
    'public'      => true,
    'menu_icon'   => 'dashicons-format-quote',
    'supports'    => array( 'title' ),
    'capabilities' => array(

    // meta caps (don't assign these to roles)
    'edit_post'              => 'edit_employee_testimonial',
    'read_post'              => 'read_employee_testimonial',
    'delete_post'            => 'delete_employee_testimonial',

    // primitive/meta caps
    'create_posts'           => 'create_employee_testimonial',

    // primitive caps used outside of map_meta_cap()
    'edit_posts'             => 'edit_employee_testimonial',
    'edit_others_posts'      => 'edit_others_employee_testimonial',
    'publish_posts'          => 'publish_employee_testimonial',
    'read_private_posts'     => 'read',

    // primitive caps used inside of map_meta_cap()
    'read'                   => 'read',
    'delete_posts'           => 'delete_employee_testimonial',
    'delete_private_posts'   => 'delete_private_employee_testimonial',
    'delete_published_posts' => 'delete_published_employee_testimonial',
    'delete_others_posts'    => 'delete_others_employee_testimonial',
    'edit_private_posts'     => 'edit_private_employee_testimonial',
    'edit_published_posts'   => 'edit_published_employee_testimonial'
    ),
  );

  register_post_type( 'employee-testimonial', $args );
}

?>
