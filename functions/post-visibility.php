<?php // Exclude posts marked as hidden from listings.
function expand_hide_posts_from_listings( $query ) {

    // Leave admin screens and individual posts unaffected.
    if ( is_admin() || $query->is_singular() ) {
        return;
    }

    // Allow specific queries to include hidden posts if required.
    if ( $query->get( 'include_hidden_posts' ) ) {
        return;
    }

    $visibility_query = array(
        'relation' => 'OR',
        array(
            'key'     => 'hide_from_listings',
            'compare' => 'NOT EXISTS',
        ),
        array(
            'key'     => 'hide_from_listings',
            'value'   => '1',
            'compare' => '!=',
        ),
    );

    $meta_query = $query->get( 'meta_query' );

    if ( ! empty( $meta_query ) ) {
        $query->set( 'meta_query', array(
            'relation' => 'AND',
            $meta_query,
            $visibility_query,
        ) );
    } else {
        $query->set( 'meta_query', $visibility_query );
    }
}

add_action( 'pre_get_posts', 'expand_hide_posts_from_listings' );

/**
 * Add visibility column to the Posts admin screen.
 */
function expand_add_visibility_column( $columns ) {

    $new_columns = array();

    foreach ( $columns as $key => $label ) {
        $new_columns[ $key ] = $label;

        if ( 'title' === $key ) {
            $new_columns['post_visibility'] = 'Visibility';
        }
    }

    return $new_columns;
}

add_filter( 'manage_post_posts_columns', 'expand_add_visibility_column' );


// Display post visibility status.
function expand_display_visibility_column( $column, $post_id ) {

    if ( 'post_visibility' !== $column ) {
        return;
    }

    $hidden = get_post_meta(
        $post_id,
        'hide_from_listings',
        true
    );

    if ( '1' === $hidden ) {
        echo '<span class="expand-visibility hidden-post">Hidden</span>';
    } else {
        echo '<span class="expand-visibility visible-post">Visible</span>';
    }
}

add_action(
    'manage_post_posts_custom_column',
    'expand_display_visibility_column',
    10,
    2
);

/**
 * Style the post visibility admin column.
 */
function expand_visibility_admin_styles() {

    $screen = get_current_screen();

    if ( ! $screen || 'edit-post' !== $screen->id ) {
        return;
    }

    ?>
    <style>
        .column-post_visibility {
            width: 90px;
        }

        .expand-visibility {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 600;
            line-height: 1.5;
        }

        .expand-visibility.hidden-post {
            background: #fef0d5;
            color: #946200;
        }

        .expand-visibility.visible-post {
            background: #e7f5eb;
            color: #287d3c;
        }
    </style>
    <?php
}

add_action( 'admin_head', 'expand_visibility_admin_styles' );