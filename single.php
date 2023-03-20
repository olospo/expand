<?php /* Single Post */
get_header();

$author = get_field('author');
$bgImg = get_field('background_image');

$featured_img_url = get_the_post_thumbnail_url($author->ID, 'large-thumb'); 

while ( have_posts() ) : the_post(); ?>

<?php if( $bgImg ): // If Background Image is added ?>
<section class="news_image" style="background:url(<?php echo $bgImg; ?>) center center no-repeat; background-size: cover;"></section>
<?php else: // Else show Featured Image ?>
<section class="news_image" style="background:url(<?php the_post_thumbnail_url( 'full' ); ?>) center center no-repeat; background-size: cover;"></section>
<?php endif; ?>

<?php if( $author ): ?>
<section class="author_image"><img src="<?php echo $featured_img_url; ?>" alt="<?php echo esc_html( $author->post_title ); ?>"></section>
<?php endif; ?>
<section class="hero news single <?php if( $author ): ?>author<?php endif; ?>">
  <div class="shapes one"></div><div class="shapes two"></div><div class="shapes three"></div><div class="shapes four"></div><div class="shapes five"></div><div class="overlay"></div>
  <div class="container">
    <div class="eight columns offset-by-two">
      <p class="date"><?php the_time('jS M Y'); ?></p>
      <?php if( $author ): ?>
      <p class="author">Written by <?php echo esc_html( $author->post_title ); ?></p>
      <?php endif; ?>
      <h1><?php the_title(); ?></h1>
    </div>
  </div>
</section>

<section class="post">
  <div class="container flex">
    <div class="content ten columns offset-by-one">
      <?php // get_template_part( 'inc/details' ); ?>
      <?php if (have_rows('project_content')) { // Flexible Content ?>
      <div class="flexible_content twelve columns">        
        <?php while (have_rows('project_content')) { the_row(); ?>
          <?php if( get_row_layout() == '2x_square_image' ): ?>
            <?php get_template_part( 'inc/flexible/square_image'); // 2x Square Images ?>
          <?php elseif( get_row_layout() == '4x_square_image' ): ?>
            <?php get_template_part( 'inc/flexible/four_images'); // 4x Square Images ?>
          <?php elseif( get_row_layout() == '16:9_video' ): ?>
            <?php get_template_part( 'inc/flexible/16-9_video'); // Video (embed) ?>
          <?php elseif( get_row_layout() == 'video_upload' ): ?>
            <?php get_template_part( 'inc/flexible/video_upload'); // Video (upload ?>
          <?php elseif( get_row_layout() == '16:9_image' ): ?>
            <?php get_template_part( 'inc/flexible/16-9_image'); // 16:9 Image ?>
          <?php elseif( get_row_layout() == 'testimonial' ): ?>
            <?php get_template_part( 'inc/flexible/testimonial'); // Testimonial ?>
          <?php elseif( get_row_layout() == 'content_block' ): ?>
            <?php get_template_part( 'inc/flexible/content_block'); // Content Block ?>
          <?php elseif( get_row_layout() == 'stat_block' ): ?>
            <?php get_template_part( 'inc/flexible/stat_block'); // Stat Block ?>
          <?php endif; ?>
        <?php } ?>
      </div>
      <?php } else { ?>
        <?php the_content(); ?>
      <?php } ?>
    </div>
  </div>
</section>

<?php get_template_part( 'inc/cta_careers' ); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>