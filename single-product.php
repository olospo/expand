<?php
get_header();

$parent = wp_get_post_parent_id( get_the_ID() );

if ( $parent == 0 ) {
    // Top-level page
    get_template_part( 'template-parts/page', 'landing' );
} else {
    // Sub-page
    get_template_part( 'template-parts/page', 'product' );
}
?>

<?php get_footer(); ?>