<?php
/*
==============================
ADD GLOBAL CSS TO PAGE
==============================
*/
function enqueue_global_css() {
	wp_enqueue_style('style', get_stylesheet_directory_URI() . '/dist/style.css', array(), '2.0');
}

add_action('wp_enqueue_scripts', 'enqueue_global_css');


/*
==============================
ADD GLOBAL JS TO PAGE
==============================
*/
function enqueue_global_js() {
	wp_enqueue_script('app', get_stylesheet_directory_URI() . '/dist/js/app.js', array(), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'enqueue_global_js');



/*
==========================================
ADDS POST THUMBNAILS
==========================================
*/
add_theme_support( 'post-thumbnails' );



/*
==========================================
CREATING ADMIN NAV MENUS
==========================================
*/
register_nav_menus( array(
		'products' => __( 'Products' ),
		'partners' => __( 'Partners' ),
		'resources' => __( 'Resources' ),
		'company' => __( 'Company' )
) );


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
MINIFIES HTML
==========================================
*/

class WP_HTML_Compression
{
	// Settings
	protected $compress_css = true;
	protected $compress_js = true;
	protected $info_comment = true;
	protected $remove_comments = true;

	// Variables
	protected $html;
	public function __construct($html)
	{
		if (!empty($html))
		{
			$this->parseHTML($html);
		}
	}
	public function __toString()
	{
		return $this->html;
	}
	protected function bottomComment($raw, $compressed)
	{
		$raw = strlen($raw);
		$compressed = strlen($compressed);

		$savings = ($raw-$compressed) / $raw * 100;

		$savings = round($savings, 2);

		return '<!--HTML compressed, size saved '.$savings.'%. From '.$raw.' bytes, now '.$compressed.' bytes-->';
	}
	protected function minifyHTML($html)
	{
		$pattern = '/<(?<script>script).*?<\/script\s*>|<(?<style>style).*?<\/style\s*>|<!(?<comment>--).*?-->|<(?<tag>[\/\w.:-]*)(?:".*?"|\'.*?\'|[^\'">]+)*>|(?<text>((<[^!\/\w.:-])?[^<]*)+)|/si';
		preg_match_all($pattern, $html, $matches, PREG_SET_ORDER);
		$overriding = false;
		$raw_tag = false;
		// Variable reused for output
		$html = '';
		foreach ($matches as $token)
		{
			$tag = (isset($token['tag'])) ? strtolower($token['tag']) : null;

			$content = $token[0];

			if (is_null($tag))
			{
				if ( !empty($token['script']) )
				{
					$strip = $this->compress_js;
				}
				else if ( !empty($token['style']) )
				{
					$strip = $this->compress_css;
				}
				else if ($content == '<!--wp-html-compression no compression-->')
				{
					$overriding = !$overriding;

					// Don't print the comment
					continue;
				}
				else if ($this->remove_comments)
				{
					if (!$overriding && $raw_tag != 'textarea')
					{
						// Remove any HTML comments, except MSIE conditional comments
						$content = preg_replace('/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->).)*-->/s', '', $content);
					}
				}
			}
			else
			{
				if ($tag == 'pre' || $tag == 'textarea')
				{
					$raw_tag = $tag;
				}
				else if ($tag == '/pre' || $tag == '/textarea')
				{
					$raw_tag = false;
				}
				else
				{
					if ($raw_tag || $overriding)
					{
						$strip = false;
					}
					else
					{
						$strip = true;

						// Remove any empty attributes, except:
						// action, alt, content, src
						$content = preg_replace('/(\s+)(\w++(?<!\baction|\balt|\bcontent|\bsrc)="")/', '$1', $content);

						// Remove any space before the end of self-closing XHTML tags
						// JavaScript excluded
						$content = str_replace(' />', '/>', $content);
					}
				}
			}

			if ($strip)
			{
				$content = $this->removeWhiteSpace($content);
			}

			$html .= $content;
		}

		return $html;
	}

	public function parseHTML($html)
	{
		$this->html = $this->minifyHTML($html);

		if ($this->info_comment)
		{
			$this->html .= "\n" . $this->bottomComment($html, $this->html);
		}
	}

	protected function removeWhiteSpace($str)
	{
		$str = str_replace("\t", ' ', $str);
		$str = str_replace("\n",  '', $str);
		$str = str_replace("\r",  '', $str);

		while (stristr($str, '  '))
		{
			$str = str_replace('  ', ' ', $str);
		}

		return $str;
	}
}

function wp_html_compression_finish($html)
{
	return new WP_HTML_Compression($html);
}

function wp_html_compression_start()
{
	ob_start('wp_html_compression_finish');
}
// add_action('get_header', 'wp_html_compression_start');


/*
==========================================
HIDE ADMIN BAR
==========================================
*/
add_filter('show_admin_bar', '__return_false');


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
ADD FANCY PAGINATION TO PAGED PAGES
==========================================
*/
function wpbeginner_numeric_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="navigation"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></div>' . "\n";

}


/**
 * workaround_broken_wp_rewrite_rule.php
 *
 * Plugin Name: Workaround Broken WP Rewrite Rule
 * Description: Fixes pagination for /cat-slug/page/2 style URLs
 * Author: _timk
 */
function workaround_broken_wp_rewrite_rule($query_vars)
{
  if (@$query_vars["name"] == "page") {
    $qv = array();
    $qv["paged"] = str_replace("/", "", $query_vars["page"]);
    $qv["category_name"] = $query_vars["category_name"];

    return $qv;
  }

  return $query_vars;
}

add_filter('request', 'workaround_broken_wp_rewrite_rule');


/*
==============================
DEFAULT THUMBNAIL IMAGE
==============================
*/
function wpse55748_filter_post_thumbnail_html( $html ) {
    // If there is no post thumbnail,
    // Return a default image
    if ( '' == $html ) {
        return '<img src="' . get_template_directory_uri() . '/img/placeholder-thumbnail.png" id="post-thumbnail" />';
    }
    // Else, return the post thumbnail
    return $html;
}
add_filter( 'post_thumbnail_html', 'wpse55748_filter_post_thumbnail_html' );



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
GLOBAL SEARCH
==============================
*/
function global_search_scripts() {
	wp_localize_script('app', 'ajax_url', admin_url('admin-ajax.php'));
}

function global_search() {
	global_search_scripts();
	ob_start(); ?>
<form id="global-search-form" role="search" method="get" action="">
  <div class="third">
    <div>
      <input id="search_term" type="text" name="s" placeholder="Search Octiv">
    </div>
    <div>
      <select name="search_type" id="search_type" class="fancy">
        <option value="any">All</option>
        <option value="post">Blog</option>
        <option value="page" data-parent="65">Whitepapers</option>
        <option value="page" data-parent="74">Client Stories</option>
        <option value="page" data-parent="207">Webinars</option>
        <option value="press-releases">Press Releases</option>
        <option value="catalog">Product Features</option>
        <option value="releases">Product Releases</option>
        <option value="support">Support Documentation</option>
        <option value="events">Events</option>
      </select>
    </div>
    <div>
    	<input type="submit">
    </div>
  </div>
</form>
<ul id="global_search_results"></ul>
	<?php
	return ob_get_clean();
}

add_shortcode('global_search', 'global_search');

add_action('wp_ajax_global_search', 'global_search_callback');
add_action('wp_ajax_nopriv_global_search', 'global_search_callback');

function global_search_callback() {

	header('Content-Type: application/json');

	$term = 0;
	if ( isset($_GET['term']) ) {
		$term = sanitize_text_field($_GET['term']);
	}

	$type = 0;
	if ( isset($_GET['type']) ) {
		$type = sanitize_text_field($_GET['type']);
	}

	// Default search arguments
	$args = array(
		'post_type' => $type,
		's' => $term,
		'posts_per_page' => -1
	);

	// Customize search args for releases
	if ($type === 'releases') {
		// custom filter to replace '=' with 'LIKE'
		function my_posts_where( $where )
		{
			$where = str_replace("meta_key = 'launched_%_launched_feature'", "meta_key LIKE 'launched_%_launched_feature'", $where);

			return $where;
		}

		add_filter('posts_where', 'my_posts_where');

		$args = array(
			'post_type'	=> 'releases',
			// 's' => $term,
			'meta_query' => array(
				'relation' => 'OR',
				array(
					'key' => 'launched_%_launched_feature',
					'value' => $term,
					'compare' => 'LIKE'
				)
			)
		);
	}

	if ($type === 'catalog') {
		// custom filter to replace '=' with 'LIKE'
		function my_posts_where( $where )
		{
			$where = str_replace("meta_key = 'catalog_features_%_feature_description'", "meta_key LIKE 'catalog_features_%_feature_description'", $where);

			return $where;
		}

		add_filter('posts_where', 'my_posts_where');

		$args = array(
			'post_type'	=> 'catalog',
			// 's' => $term,
			'meta_query' => array(
				'relation' => 'OR',
				array(
					'key' => 'catalog_features_%_feature_description',
					'value' => $term,
					'compare' => 'LIKE'
				)
			)
		);
	}




	$parent = 0;
	if ( isset($_GET['parent']) ) {
		$parent = intval( sanitize_text_field($_GET['parent']) );
		$args = array(
			'post_type' => $type,
			'post_parent' => $parent,
			's' => $term,
			'posts_per_page' => -1
		);
	}



	$result = array();


	if ($type === 'releases') {
		$search_query = new WP_Query($args);
	} else {
		$search_query = new WP_Query($args);
	}


	if ($search_query->have_posts()) :
		while ($search_query->have_posts()) :
			$search_query->the_post();

			$result[] = array(
				'id' => get_the_ID(),
				'title' => get_the_title(),
				'permalink' => get_permalink()
			);

		endwhile;

		echo json_encode($result);

	endif;


	wp_die();
}

/**
 * Conditionally Override Yoast SEO Breadcrumb Trail
 * http://plugins.svn.wordpress.org/wordpress-seo/trunk/frontend/class-breadcrumbs.php
 * -----------------------------------------------------------------------------------
 */

add_filter( 'wpseo_breadcrumb_links', 'wpse_100012_override_yoast_breadcrumb_trail' );

function wpse_100012_override_yoast_breadcrumb_trail( $links ) {
    global $post;

    if ( is_singular( array('integration', 'features', 'use-cases') ) || is_post_type_archive( array('integration', 'features', 'use-cases') ) || is_tax('integration_type') ) {
			// if ( is_singular( 'catalog' ) ) {
	    //     $breadcrumb[] = array(
			// 			'url' => site_url() . '/platform',
	    //       'text' => 'Platform',
	    //     );
			// 		$breadcrumb[] = array(
			// 			'url' => site_url() . '/catalog',
	    //       'text' => 'Catalog',
	    //     );
			// 		$breadcrumb[] = array(
			// 			'url' => site_url() . '/tax',
	    //       'text' => 'Tax',
	    //     );
	    //     array_splice( $links, 1, 1, $breadcrumb );

	    // } else {
				$breadcrumb[] = array(
						'url' => site_url() . '/platform',
						'text' => 'Platform',
				);
				array_splice( $links, 1, 0, $breadcrumb );
			// }
    }

		if ( is_singular( 'post' ) ) {
        $breadcrumb[] = array(
					'url' => site_url() . '/resources',
          'text' => 'Resources',
        );
        array_splice( $links, 1, 0, $breadcrumb );
    }

		if ( is_singular( 'solutions' ) ) {
        $breadcrumb[] = array(
					'url' => site_url() . '/solutions',
          'text' => 'Solutions',
        );
        array_splice( $links, 1, 0, $breadcrumb );
    }

		if ( is_tax( 'event_type' ) ) {
        $breadcrumb[] = array(
					'url' => site_url() . '/events',
          'text' => 'Events',
        );
        array_splice( $links, 1, 0, $breadcrumb );
    }



    return $links;
}
