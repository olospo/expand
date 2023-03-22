<?php /* Template Name: Home */
get_header();

while ( have_posts() ) : the_post(); ?>

<?php get_template_part( 'inc/hero' ); ?>

<?php get_template_part( 'inc/text' ); ?>

<?php get_template_part( 'inc/stats' ); ?>

<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>