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
	add_image_size( 'animation', 240, 240, false ); // Animation size
  add_image_size( 'large-thumb', 300, 300, true ); // Large thumbnail size
  add_image_size( 'featured-img', 920, 500, true ); // Featured Image size 
  add_image_size( 'background-img', 1400, 740, true ); // Featured Image size
	add_image_size( '16-9', 1200, 675, true ); // 16/9 Image size 
}
add_action( 'after_setup_theme', 'theme_setup' );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles_and_scripts' );

function theme_enqueue_styles_and_scripts() {
		// Enqueue styles
		wp_enqueue_style( 'main', get_stylesheet_directory_uri().'/css/main.css', false, filemtime( get_stylesheet_directory() . '/style.css' ) );

		// Deregister jQuery and enqueue it in the footer
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', get_stylesheet_directory_uri().'/js/jquery.min.js', false, NULL, true );
		wp_enqueue_script( 'jquery' );

		// Enqueue scripts
		wp_enqueue_script( 'applications', get_stylesheet_directory_uri().'/js/application.min.js', 'jquery', NULL, true, filemtime( get_stylesheet_directory() . '/style.css' ) );
		wp_enqueue_script( 'theme-functions', get_stylesheet_directory_uri().'/js/functions.js', 'jquery', NULL, true, filemtime( get_stylesheet_directory() . '/style.css' ) );
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
				$query->set( 'post_type', array( 'post', 'page', 'career', 'profile') );
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

// Theme Colour Scheme
function wpacg_expand_admin_color_scheme() {
	//Get the theme directory
	$theme_dir = get_stylesheet_directory_uri();

	//Expand
	wp_admin_css_color( 'expand', __( 'Expand' ),
		$theme_dir . '/css/expand.css',
		array( '#197a56', '#fff', '#d36513' , '#3e8e60')
	);
}
add_action('admin_init', 'wpacg_expand_admin_color_scheme');


// Remove Menu Items 
function remove_menus(){
  remove_menu_page( 'edit-comments.php' );          //Comments
  remove_menu_page( 'tools.php' );                  //Tools
}
add_action( 'admin_menu', 'remove_menus' );

function custom_post_type() {
	
	// Forms Post Type
	$labels = array(
		'name'                => _x( 'Forms', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Form', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Forms', 'text_domain' ),
		'all_items'           => __( 'All Forms', 'text_domain' ),
		'view_item'           => __( 'View Form', 'text_domain' ),
		'add_new_item'        => __( 'Add New Form', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Form', 'text_domain' ),
		'update_item'         => __( 'Update Form', 'text_domain' ),
		'search_items'        => __( 'Search Forms', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'Form', 'text_domain' ),
		'description'         => __( 'Forms', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom fields' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 20,
		'menu_icon'           => 'dashicons-list-view',
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'rewrite'   => array( 'slug' => 'form' ),
	);
	register_post_type( 'form', $args );
	
	// Careers Post Type
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
	
	// Profiles Post Type
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
		'menu_position'       => 27,
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

function redirect_cpt_archive_to_homepage() {
		if (is_post_type_archive('form')) { // Replace 'your_custom_post_type' with the name of your CPT
				wp_redirect(home_url());
				exit;
		}
}
add_action('template_redirect', 'redirect_cpt_archive_to_homepage');


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