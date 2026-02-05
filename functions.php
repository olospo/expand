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
	
	// Products Post Type
	$labels = array(
		'name'                => _x( 'Products', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Product', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Products', 'text_domain' ),
		'all_items'           => __( 'All Products', 'text_domain' ),
		'view_item'           => __( 'View Product', 'text_domain' ),
		'add_new_item'        => __( 'Add New Product', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Product', 'text_domain' ),
		'update_item'         => __( 'Update Product', 'text_domain' ),
		'search_items'        => __( 'Search Products', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'Product', 'text_domain' ),
		'description'         => __( 'Products', 'text_domain' ),
		'labels'              => $labels,
		'supports' => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes' ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 28,
		'menu_icon'           => 'dashicons-chart-line',
		'can_export'          => true,
		'has_archive'         => true,
		'template'     => [],
		'template_lock' => false,
		'map_meta_cap'        => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'rewrite' => [
			'slug' => 'product',
			'with_front' => false
		],
	);
	register_post_type( 'product', $args );	
	
	// Products Post Type
	$labels = array(
		'name'                => _x( 'Solutions', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Solution', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Solutions', 'text_domain' ),
		'all_items'           => __( 'All Solutions', 'text_domain' ),
		'view_item'           => __( 'View Solution', 'text_domain' ),
		'add_new_item'        => __( 'Add New Solution', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Solution', 'text_domain' ),
		'update_item'         => __( 'Update Solution', 'text_domain' ),
		'search_items'        => __( 'Search Solutions', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'Solution', 'text_domain' ),
		'description'         => __( 'Solutions', 'text_domain' ),
		'labels'              => $labels,
		'supports' => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes' ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 28,
		'menu_icon'           => 'dashicons-analytics',
		'can_export'          => true,
		'has_archive'         => true,
		'template'     => [],
		'template_lock' => false,
		'map_meta_cap'        => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'rewrite' => [
			'slug' => 'solution',
			'with_front' => false
		],
	);
	register_post_type( 'solution', $args );	
	
}
// Hook into the 'init' action
add_action( 'init', 'custom_post_type', 0 );

/**
 * Pass field data to the Quick Edit JS.
 */
add_action('admin_footer-edit.php', function() {
	global $current_screen;
	if ($current_screen->post_type !== 'product') {
		return;
	}
	?>
	<script>
	jQuery(function($){
		const $wp_inline_edit = inlineEditPost.edit;
		inlineEditPost.edit = function( id ) {
			$wp_inline_edit.apply( this, arguments );
			let postId = 0;
			if ( typeof(id) === 'object' ) postId = parseInt(this.getId(id));
			if (postId > 0) {
				const $editRow = $('#edit-' + postId),
						$type = $('#product_type_' + postId).data('value');
				if ($type) {
					$editRow.find('select[name="product_type"]').val($type);
				}
			}
		};
	});
	</script>
	<?php
});

/**
 * Output hidden field data for Quick Edit JS to read.
 */
add_action('manage_product_posts_custom_column', function($column, $post_id) {
	if ($column === 'product_type') {
		$type = get_field('product_type', $post_id);
		echo '<div id="product_type_' . $post_id . '" data-value="' . esc_attr($type) . '" style="display:none;"></div>';
	}
}, 20, 2);



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

// Enqueue SlimSelect + localise AJAX settings
add_action('wp_enqueue_scripts', function () {
	// SlimSelect (you can keep CDN in template if you want, but this is cleaner)
	wp_enqueue_script(
		'slimselect',
		'https://cdnjs.cloudflare.com/ajax/libs/slim-select/2.13.1/slimselect.min.js',
		[],
		'2.13.1',
		true
	);

	// If you have your own JS file, enqueue it here instead of inline.
	// wp_enqueue_script('product-filter', get_template_directory_uri() . '/js/product-filter.js', ['slimselect'], null, true);

	// Localise AJAX url + nonce for use in JS (inline or file)
	wp_register_script('product-filter-inline', '', ['slimselect'], null, true);
	wp_enqueue_script('product-filter-inline');

	wp_localize_script('product-filter-inline', 'ProductFilterAjax', [
		'ajaxUrl' => admin_url('admin-ajax.php'),
		'nonce'   => wp_create_nonce('product_filter_nonce'),
	]);
});

add_action('wp_ajax_get_industry_children', 'get_industry_children');
add_action('wp_ajax_nopriv_get_industry_children', 'get_industry_children');

function get_industry_children() {
	check_ajax_referer('product_filter_nonce', 'nonce');

	$industry_id = isset($_POST['industry_id']) ? absint($_POST['industry_id']) : 0;
	if (!$industry_id) {
		wp_send_json_error(['message' => 'Missing industry_id'], 400);
	}

	// Child pages of the selected Industry (product children)
	$kids = new WP_Query([
		'post_type'      => 'product',
		'posts_per_page' => -1,
		'post_parent'    => $industry_id,
		'orderby'        => 'title',
		'order'          => 'ASC',
	]);

	$options = [];
	$items   = [];

	while ($kids->have_posts()) {
		$kids->the_post();
		$id = get_the_ID();

		$options[] = [
			'value' => (string) $id,
			'text'  => html_entity_decode(get_the_title()),
		];

		$featured = get_the_post_thumbnail_url($id, 'full');

		$items[$id] = [
			'title'     => html_entity_decode(get_the_title()),
			'intro'     => get_field('description', $id) ?: '',
			'image'     => $featured ?: '',
			'link'      => get_permalink($id),
			'parent_id' => (string) $industry_id, // 👈 add this
		];
	}
	wp_reset_postdata();

	wp_send_json_success([
		'options' => $options,
		'items'   => $items,
	]);
}


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

/**
 * Add a "Post Depth" location rule for hierarchical post types.
*/

// 1. Register rule type
add_filter('acf/location/rule_types', function ($choices) {
		$choices['Post']['post_depth'] = 'Post Depth';
		return $choices;
});

// 2. Register rule values
add_filter('acf/location/rule_values/post_depth', function ($choices) {
		$choices['0'] = 'Level 0 (Landing)';
		$choices['1'] = 'Level 1';
		return $choices;
});

// 3. Match rule — ***IMPORTANT: specify accepted args***
add_filter(
		'acf/location/rule_match/post_depth',
		function ($match, $rule, $options) {

				if (empty($options['post_id'])) {
						return false;
				}

				$post = get_post($options['post_id']);
				if (!$post) {
						return false;
				}

				// Must be hierarchical
				if (!is_post_type_hierarchical($post->post_type)) {
						return false;
				}

				// Calculate depth
				$depth = 0;
				$parent = $post->post_parent;

				while ($parent) {
						$depth++;
						$parent_post = get_post($parent);
						$parent = $parent_post ? $parent_post->post_parent : 0;
				}

				return ($rule['operator'] === '==')
						? intval($rule['value']) === $depth
						: intval($rule['value']) !== $depth;
		},
		10, // priority
		3   // <-- THIS is the fix
);

function allow_solution_query_var($vars) {
		$vars[] = 'solution';
		return $vars;
}
add_filter('query_vars', 'allow_solution_query_var');


add_action('acf/input/admin_footer', function () { ?>
<script>
(function($){
		// Listen for changes in the title field
		$(document).on('input', '[data-name="pathway_title"] input', function() {
				const title = $(this).val();
				const slug = title
						.toLowerCase()
						.replace(/[^a-z0-9]+/g, '-')
						.replace(/^-+|-+$/g, '');

				// Find sibling slug field inside the same layout
				$(this)
						.closest('.acf-fields')
						.find('[data-name="pathway_slug"] input')
						.val(slug);
		});
})(jQuery);
</script>
<?php });