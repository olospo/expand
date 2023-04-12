<?php /* Single Post */
get_header();


$bgImg = get_field('background_image');

$featured_img_url = get_the_post_thumbnail_url($author->ID, 'large-thumb'); 

while ( have_posts() ) : the_post(); ?>

<?php if( $bgImg ): // If Background Image is added ?>
<section class="news_image" style="background:url(<?php echo $bgImg; ?>) center center no-repeat; background-size: cover;"></section>
<?php else: // Else show Featured Image ?>
<section class="news_image" style="background:url(<?php the_post_thumbnail_url( 'full' ); ?>) center center no-repeat; background-size: cover;"></section>
<?php endif; ?>

<section class="post">
  <div class="container flex">
    <div class="content ten columns offset-by-one">
      <div class="info">
        <h1><?php the_title(); ?></h1>
        <p class="date"><?php the_time('F j, Y'); ?></p>
        <?php $category = get_the_category(); $name = $category[0]->cat_name;
          $cat_id = get_cat_ID( $name );
          $link = get_category_link( $cat_id );
          echo '<a class="category_tag" href="'. esc_url( $link ) .'"">'. $name .'</a>'; ?>
        
        <?php
          $authors = get_field('author');
          if ($authors) :
        ?>
        <p class="written">Written by <?php
          $author_links = array();
            foreach ($authors as $author) :
              $permalink = get_permalink($author->ID);
              $title = get_the_title($author->ID);
              $author_links[] = '<a href="' . esc_url($permalink) . '">' . esc_html($title) . '</a>';
            endforeach;
          echo implode(', ', $author_links);?>
        </p>
        <?php endif; ?>
      </div>
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

<section class="authors">
  <div class="container flex">
    <div class="content ten columns offset-by-one">
    <?php
    $authors = get_field('author');
    if( $authors ): ?>
    <?php foreach( $authors as $author ): 
      $permalink = get_permalink( $author->ID );
      $title = get_the_title( $author->ID );
      $jobtitle = get_field( 'job_title', $author->ID );
      $location = get_field( 'location', $author->ID );
      $featured_img_url = get_the_post_thumbnail_url($author->ID, 'thumb'); 
    ?>
    <article class="author six columns">
      <div class="image">
        <img src="<?php echo $featured_img_url; ?>" alt="<?php echo esc_html( $author->post_title ); ?>">
      </div>
      <div class="content">
        <h4><a href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $title ); ?></a></h4>
        <span class="jobtitle"><?php echo $jobtitle; ?></span>
        <span class="location"> <?php echo $location; ?></span>
      </div>
    </article>
    <?php endforeach; ?>
    <?php endif; ?>
    </div>
  </div>
</section>

<?php get_template_part( 'inc/cta_careers' ); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>