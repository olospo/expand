<?php function custom_post_type() {
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
    
}
// Hook into the 'init' action
add_action( 'init', 'custom_post_type', 0 );

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