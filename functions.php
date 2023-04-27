<?php

function theme_setup() {
  // Menus
  register_nav_menu( 'main', 'Main Menu' );
	register_nav_menu( 'footer', 'Footer Menu' );
  // RSS Feed
  add_theme_support( 'automatic-feed-links' );
  // Thumbnails
  add_theme_support( 'post-thumbnails' );
  add_image_size( 'thumb', 150, 150, true ); // Normal thumbnail size
  add_image_size( 'large-thumb', 300, 300, true ); // Large thumbnail size
  add_image_size( 'featured-img', 920, 500, true ); // Featured Image size 
  add_image_size( 'background-img', 1400, 740, true ); // Featured Image size
	add_image_size( '16-9', 1200, 675, true ); // 16/9 Image size 
	
}
add_action( 'after_setup_theme', 'theme_setup' );

// Enqueue styles
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
  wp_enqueue_style( 'main', get_stylesheet_directory_uri().'/css/main.css', false, filemtime( get_stylesheet_directory() . '/style.css' ) );
}

// Enqueue scripts
add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );
function theme_enqueue_scripts() {

  wp_deregister_script( 'jquery' ); // Deregister to put jQuery into footer
  wp_register_script( 'jquery', get_stylesheet_directory_uri().'/js/jquery.min.js', false, NULL, true );
  wp_enqueue_script( 'jquery' ); // Re-register jQuery
  
  wp_enqueue_script( 'applications', get_stylesheet_directory_uri().'/js/application.min.js', 'jquery', NULL, true, filemtime( get_stylesheet_directory() . '/style.css' ) );
  wp_enqueue_script( 'theme-functions', get_stylesheet_directory_uri().'/js/functions.js', 'jquery', NULL , true, filemtime( get_stylesheet_directory() . '/style.css' ) ); 

}

// Disable Emoji Loading
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// Disable WP Embed
function my_deregister_scripts() {
 wp_dequeue_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );

// Options Page

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> true,
		'menu_position'       => 20,
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Settings',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}

// Excerpt Length
function excerpt_length($length) {
  return 30;
}
add_filter('excerpt_length', 'excerpt_length');

// Read More after excerpt
function new_excerpt_more($more) {
  global $post;
	return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Get ID from Page Name
function ID_from_page_name($page_name)
{
	global $wpdb;
	$page_name_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".$page_name."'");
	return $page_name_id;
}

// Search
function include_custom_post_types_in_search_results( $query ) {
		if ( $query->is_main_query() && $query->is_search() && ! is_admin() ) {
				$query->set( 'post_type', array( 'post', 'page', 'career', 'work') );
		}
}
add_action( 'pre_get_posts', 'include_custom_post_types_in_search_results' );

// Pagination
function numeric_posts_nav() {
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
	echo '<div class="pagination"><ul>' . "\n";
	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li class="prev">%s</li>' . "\n", get_previous_posts_link('Previous Page') );
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
		printf( '<li class="next">%s</li>' . "\n", get_next_posts_link('Next Page') );
	echo '</ul></div>' . "\n";
}
// This stuff fixes the pagination issue with custom posts. 
function remove_page_from_query_string($query_string)
{ 
  if ($query_string['name'] == 'page' && isset($query_string['page'])) {
      unset($query_string['name']);
      // 'page' in the query_string looks like '/2', so i'm spliting it out
      list($delim, $page_index) = split('/', $query_string['page']);
      $query_string['paged'] = $page_index;
  }      
  return $query_string;
}

// Remove Menu Items 
function remove_menus(){
  remove_menu_page( 'edit-comments.php' );          //Comments
  remove_menu_page( 'tools.php' );                  //Tools
}
add_action( 'admin_menu', 'remove_menus' );

function custom_post_type() {
	
	// Careers Type
	$labels = array(
		'name'                => _x( 'Careers', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Career', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Careers', 'text_domain' ),
		'all_items'           => __( 'All Careers', 'text_domain' ),
		'view_item'           => __( 'View Career', 'text_domain' ),
		'add_new_item'        => __( 'Add New Career', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Career', 'text_domain' ),
		'update_item'         => __( 'Update Career', 'text_domain' ),
		'search_items'        => __( 'Search Careers', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'Career', 'text_domain' ),
		'description'         => __( 'Careers', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom fields' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 25,
		'menu_icon'           => 'dashicons-index-card',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'rewrite'   => array( 'slug' => 'career' ),
	);
	register_post_type( 'career', $args );
	
	// Careers Type
	$labels = array(
		'name'                => _x( 'Profiles', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Profile', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Profiles', 'text_domain' ),
		'all_items'           => __( 'All Profiles', 'text_domain' ),
		'view_item'           => __( 'View Profile', 'text_domain' ),
		'add_new_item'        => __( 'Add New Profile', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Profile', 'text_domain' ),
		'update_item'         => __( 'Update Profile', 'text_domain' ),
		'search_items'        => __( 'Search Profiles', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'Profile', 'text_domain' ),
		'description'         => __( 'Profiles', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom fields' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 30,
		'menu_icon'           => 'dashicons-businessperson',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'profile', $args );	

}
// Hook into the 'init' action
add_action( 'init', 'custom_post_type', 0 );

class childNav extends Walker_page {
  public function start_el(&$output, $page, $depth = 0, $args = array(), $current_page = 0) {
    if($depth)
        $indent = str_repeat("\t", $depth);
    else
        $indent = '';
    extract($args, EXTR_SKIP);
    $css_class = array('page_item');
    if(!empty($current_page)) {
        $_current_page = get_page( $current_page );
        $children = get_children('post_parent='.$page->ID);
        if(count($children) != 0) {
            $css_class[] = 'hasChildren';
        }
        if(isset($_current_page->ancestors) && in_array($page->ID, (array) $_current_page->ancestors))
            $css_class[] = 'current_page_ancestor';
        if($page->ID == $current_page)
            $css_class[] = 'current_page_item';
        elseif($_current_page && $page->ID == $_current_page->post_parent)
            $css_class[] = 'current_page_parent';
    } elseif($page->ID == get_option('page_for_posts')) {
        $css_class[] = 'current_page_parent';
    }
    $css_class = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );
    if($page->ID == $current_page) {
        $output .= $indent .'<li class="' . $css_class . '"><a href="' . get_permalink($page->ID) . '">' . $page->post_title .'</a>';
    } else {
        $output .= $indent .'<li class="' . $css_class . '"><a href="' . get_permalink($page->ID) . '">' . $page->post_title .'</a>';
    }
  }
}

// Custom login
function my_custom_login() {
echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/login/custom-login-style.css" />';
}
add_action('login_head', 'my_custom_login');

//Change login logo URL
function custom_login_logo_url() {
return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'custom_login_logo_url' );

function custom_login_logo_url_title() {
return 'Default Site Title';
}
add_filter( 'login_headertitle', 'custom_login_logo_url_title' );


function wpdev_nav_classes( $classes, $item ) {
		if( ( is_post_type_archive( 'work' ) || is_singular( 'work' ) || is_post_type_archive( 'career' ) || is_singular( 'career' ) )
				&& $item->title == 'News' ){
				$classes = array_diff( $classes, array( 'current_page_parent' ) );
		}
		return $classes;

}
add_filter( 'nav_menu_css_class', 'wpdev_nav_classes', 10, 2 );


function add_parent_url_menu_class( $classes = array(), $item = false ) {
	// Get current URL
	$current_url = current_url();

	// Get homepage URL
	$homepage_url = trailingslashit( get_bloginfo( 'url' ) );

	// Exclude 404 and homepage
	if( is_404() or $item->url == $homepage_url )
		return $classes;

	if ( get_post_type() == "work" )
	{
		unset($classes[array_search('current_page_parent',$classes)]);
		if ( isset($item->url) )
			if ( strstr( $current_url, $item->url) )
				$classes[] = 'current-menu-item';
	}
	
	if ( get_post_type() == "career" )
	{
		unset($classes[array_search('current_page_parent',$classes)]);
		if ( isset($item->url) )
			if ( strstr( $current_url, $item->url) )
				$classes[] = 'current-menu-item';
	}

	return $classes;
}

function current_url() {
	// Protocol
	$url = ( 'on' == $_SERVER['HTTPS'] ) ? 'https://' : 'http://';
	$url .= $_SERVER['SERVER_NAME'];

	// Port
	$url .= ( '80' == $_SERVER['SERVER_PORT'] ) ? '' : ':' . $_SERVER['SERVER_PORT'];
	$url .= $_SERVER['REQUEST_URI'];

	return trailingslashit( $url );
}
add_filter( 'nav_menu_css_class', 'add_parent_url_menu_class', 10, 3 );

add_filter( 'relevanssi_index_custom_fields', 'rlv_exclude_fields' );
function rlv_exclude_fields( $custom_fields ) {
		$filtered = array_filter(
		$custom_fields,
		function( $field ) {
			$exclude_suffixes = array(
				'alignment',
				'layout',
				'id',
				'featured_image',
				'flexible_content',
			);
			foreach ( $exclude_suffixes as $suffix ) {
				$suffix_length = strlen( $suffix );
				if ( $suffix === substr( $field, -$suffix_length ) ) {
					return false;
				}
			}
			return true;
		}
	);
	return $filtered;
}

// Convert number to their word equivalent 
function number_to_word($number) {
	$words = array(
		'zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten'
	);
		
	if ($number <= 10) {
		return $words[$number];
	}

	return $number;
}