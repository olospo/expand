<?php /* Template Name: Products */
get_header();
while ( have_posts() ) : the_post(); ?>
<?php if (have_rows('project_content')) { // Flexible Content ?>
<div class="flexible_content">        
  <?php while (have_rows('project_content')) { the_row(); ?>
    <?php if( get_row_layout() == 'hero' ): ?>
      <?php get_template_part( 'inc/flexible/hero'); // Hero ?>
    <?php elseif( get_row_layout() == 'stats' ): ?>
      <?php get_template_part( 'inc/flexible/stats'); // Stats ?>
    <?php elseif( get_row_layout() == 'square_section' ): ?>
      <?php get_template_part( 'inc/flexible/square_section'); // Square Section ?>
    <?php elseif( get_row_layout() == 'text_gradient' ): ?>
      <?php get_template_part( 'inc/flexible/text'); // Text Gradient ?>
    <?php elseif( get_row_layout() == 'tabbed_content' ): ?>
      <?php get_template_part( 'inc/flexible/tabbed'); // Tabbed Content ?>
    <?php elseif( get_row_layout() == 'content_block' ): ?>
      <?php get_template_part( 'inc/flexible/content_block'); // Content Block ?>
    <?php elseif( get_row_layout() == 'product_details_section' ): ?>
      <?php get_template_part( 'inc/flexible/product_details'); // Product Details Section ?>
    <?php endif; ?>
  <?php } ?>
</div>
<?php } ?>
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>