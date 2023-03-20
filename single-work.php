<?php /* Single Post */
get_header();

$image = get_field('banner_upload_image');
$url = $image['url'];

// Thumbnail size attributes.
$size = 'background-img';
$thumb = $image['sizes'][ $size ];

$bannervideo = get_field('banner_upload_video');
$comment = get_field('client_comment');

while ( have_posts() ) : the_post(); ?>
<?php if ($image) { ?>
<section class="work_image" style="background:url(<?php echo esc_url($thumb); ?>) center center no-repeat; background-size: cover; ">
</section>
<?php } ?>

<section class="hero work single">
  <div class="shapes one"></div><div class="shapes two"></div><div class="shapes three"></div><div class="shapes four"></div><div class="shapes five"></div><div class="overlay"></div>
  <div class="container">
    <div class="eight columns offset-by-two">
      <h1><?php the_title(); ?></h1>
      <?php if ($comment) { ?><p class="comment"><?php echo $comment; ?></p><?php } ?>
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
        <!-- <div class="row">
          <div class="filter_details">
            Project Details
            <span></span>
            <span></span>
          </div>
          <?php // get_template_part( 'inc/details' ); ?>
        </div> -->
      </div>
      <?php } else { ?>
        
        <div class="old_content twelve columns">
          <?php the_field('left_desription'); ?>
        </div>
        <!--  <div class="twelve columns">
          <div class="filter_details">
            Project Details
            <span></span>
            <span></span>
          </div>
          <?php // get_template_part( 'inc/details' ); ?>
        </div> -->
      <?php } ?>
    </div>
  </div>
</section>

<section class="related_work home_featured">
  <div class="container">
    <h2>Similar projects</h2>
    <div class="twelve columns">
      <?php 
      
      $custom_taxterms = wp_get_object_terms( $post->ID, 'work_category', array('fields' => 'ids') );

      $args = array(
        'post_type' => 'work',
        'posts_per_page' => 2,
        'post_status' => 'publish',
        'orderby' => 'rand',
        'post__not_in' => array(get_the_ID()),
        'tax_query' => array(
          array (
            'taxonomy' => 'work_category',
            'field' => 'id',
            'terms' => $custom_taxterms
          )
        ),
      ); query_posts($args); ?>
        <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
        <?php get_template_part('inc/work'); ?>
        <?php endwhile; else : ?>
      <!-- No posts found -->
      <?php endif; wp_reset_query(); ?>
    </div>
  </div>
</section>

<?php get_template_part( 'inc/cta_contact' ); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>