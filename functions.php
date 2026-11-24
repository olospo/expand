<?php
function theme_setup() {
  // Menus
  register_nav_menu( 'main', 'Main Menu' );
  register_nav_menu( 'product-footer', 'Products Footer Menu' );
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
	wp_enqueue_style('main', get_stylesheet_directory_uri() . '/css/main.css', array(), filemtime(get_stylesheet_directory() . '/css/main.css'));

	// jQuery
	wp_deregister_script('jquery');
	wp_register_script('jquery', get_stylesheet_directory_uri() . '/js/jquery.min.js', array(), null, true);
	wp_enqueue_script('jquery');

	// Load more news
	wp_enqueue_script('load-more-news', get_stylesheet_directory_uri() . '/js/load-more-news.js', array('jquery'), filemtime(get_stylesheet_directory() . '/js/load-more-news.js'), true);

	wp_localize_script( 'load-more-news', 'loadMoreNews', array( 'ajaxUrl' => admin_url('admin-ajax.php'), 'nonce'   => wp_create_nonce('load_more_news_nonce'), ));

	// Theme scripts
	wp_enqueue_script('applications',get_stylesheet_directory_uri() . '/js/application.min.js',array('jquery'),filemtime(get_stylesheet_directory() . '/js/application.min.js'),true);

	wp_enqueue_script('theme-functions',get_stylesheet_directory_uri() . '/js/functions.js',array('jquery'),filemtime(get_stylesheet_directory() . '/js/functions.js'),true
	);

	// Font Awesome
	wp_enqueue_script('font-awesome','https://kit.fontawesome.com/0498b6ceeb.js',array(),null,true);
}

// Disable Emoji Loading
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// Disable WP Embed
function my_deregister_scripts() {
 wp_dequeue_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );

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
				$query->set( 'post_type', array( 'post', 'page', 'career', 'profile', 'product') );
		}
}
add_action( 'pre_get_posts', 'include_custom_post_types_in_search_results' );

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

// Custom Post Types
require_once 'functions/custom-post.php';

// Pass field data to the Quick Edit JS.
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

add_action( 'wp_ajax_load_more_news', 'bcg_load_more_news' );
add_action( 'wp_ajax_nopriv_load_more_news', 'bcg_load_more_news' );

function bcg_load_more_news() {
	check_ajax_referer( 'load_more_news_nonce', 'nonce' );

	$page     = isset($_POST['page']) ? absint($_POST['page']) : 1;
	$category = isset($_POST['category']) ? absint($_POST['category']) : 0;

	$args = array(
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'posts_per_page' => 10,
		'paged'          => $page,
		'orderby'        => 'date',
		'order'          => 'DESC',
	);

	if ( $category ) {
		$args['cat'] = $category;
	}

	$query = new WP_Query( $args );

	if ( $query->have_posts() ) {
		ob_start();

		while ( $query->have_posts() ) {
			$query->the_post();
			get_template_part( 'inc/news-card' );
		}

		wp_reset_postdata();

		wp_send_json_success( array(
			'html'      => ob_get_clean(),
			'max_pages' => $query->max_num_pages,
		) );
	}

	wp_send_json_error();
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

// Add a "Post Depth" location rule for hierarchical post types.

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
		3  
);

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

// Post Visibility
require_once 'functions/pagination.php'; 

// Post Visibility
require_once 'functions/post-visibility.php'; 

// Disable XML-RPC
add_filter( 'xmlrpc_enabled', '__return_false' );