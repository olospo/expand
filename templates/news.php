<?php /* Template Name: News & Events */
get_header();

while ( have_posts() ) : the_post(); ?>

<?php // Hero
  $type = get_field('video_or_image');
  $opacity = get_field('opacity_overlay');
  $image = get_field('video_poster');
  $videomp4 = get_field('upload_video_mp4');
  $videowebm = get_field('upload_video_webm');
  $bgImage = get_field('background_image');
  $icon = get_field('icon');
  $positionIcon = get_field('icon_position');
?>
<section class="hero home">
  <div class="video-upload" <?php if ($type == "image") { ?> style="background: linear-gradient(rgba(0, 0, 0, 0.<?php echo $opacity; ?>), rgba(0, 0, 0, 0.<?php echo $opacity; ?>)), url('<?php bloginfo('template_directory'); ?>/img/expand_news.jpg') center center no-repeat; background-size:cover;" <?php } elseif ($type == "video") { ?> style="background: linear-gradient(rgba(0, 0, 0, 0.<?php echo $opacity; ?>), rgba(0, 0, 0, 0.<?php echo $opacity; ?>))" <?php } ?>>
    <?php if ($type == "video") { ?>
    <video data-object-fit="cover" playsinline muted autoplay loop  id="homeVideo" poster="<?php echo $image['url']; ?>">
      <source src="<?php echo $videowebm; ?>" type="video/webm">
      <source src="<?php echo $videomp4; ?>" type="video/mp4">
    </video>
    <div class="poster" style="background: url('<?php echo $image['url']; ?>') center center no-repeat; background-size: cover"></div>
    <?php } ?>
    
    <?php if ($icon) { ?>  
    <div class="icon <?php echo $positionIcon; ?>"><h1><img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>"></h1></div>
    <?php } ?>
  </div>
</section>

<section class="news">
  <div class="container">
  <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'post_type'      => 'post',
            'order'          => 'DESC',
            'post_status'    => 'publish',
            'paged'          => $paged
        ); 
        query_posts($args); ?>
  <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
      <?php if( $wp_query->current_post == 0 ) : // If First Post ?>
        <article class="item featured twelve columns">
          <?php if ( has_post_thumbnail() ) { ?>
          <div class="item_image featured six columns no_right_margin">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'featured-img' ); ?></a>
          </div>
          <div class="item_content featured six columns no_left_margin">
          <?php } else { ?>
          <div class="item_content twelve columns">
          <?php } ?>
            <div class="content">
              <?php $category = get_the_category(); $name = $category[0]->cat_name;
              $cat_id = get_cat_ID( $name );
              $link = get_category_link( $cat_id );
              echo '<a class="category_tag" href="'. esc_url( $link ) .'"">'. $name .'</a>'; ?>
              <p class="date"><?php the_time('F j, Y'); ?></p>
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <?php the_excerpt(); ?>
              <a href="<?php the_permalink(); ?>" class="button">Read more</a>
            </div>
          </div>
        </article>
      <?php else : ?>
        <article class="item one-third column">
          <?php if ( has_post_thumbnail() ) { ?>
          <a href="<?php the_permalink(); ?>">
          <div class="item_image">
            <?php the_post_thumbnail( 'featured-img' ); ?>
          </div>
          </a>
          <?php } ?>
          <div class="item_content">
            <?php $category = get_the_category(); $name = $category[0]->cat_name;
              $cat_id = get_cat_ID( $name );
              $link = get_category_link( $cat_id );
              echo '<a class="category_tag" href="'. esc_url( $link ) .'"">'. $name .'</a>'; ?>
            <p class="date"><?php the_time('F j, Y'); ?></p>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <?php the_excerpt(); ?>
            <a href="<?php the_permalink(); ?>" class="button">Read more</a>
          </div>
        </article>
      <?php endif; ?>
    <?php endwhile; ?>
    <div class="row">
      <div class="sixteen columns">
        <?php numeric_posts_nav(); ?>
      </div>
    </div>
    
  <?php else : ?>
  <!-- No posts found -->
  <?php endif; wp_reset_query(); ?>
  </div>
</section>

<?php if (have_rows('project_content')) { // Flexible Content ?>
<div class="flexible_content">        
  <?php while (have_rows('project_content')) { the_row(); ?>
    <?php if( get_row_layout() == 'hero' ): ?>
      <?php get_template_part( 'inc/flexible/hero'); // Hero ?>
    <?php elseif( get_row_layout() == 'stats' ): ?>
      <?php get_template_part( 'inc/flexible/stats'); // Stats ?>
    <?php elseif( get_row_layout() == 'text_gradient' ): ?>
      <?php get_template_part( 'inc/flexible/text'); // Text Gradient ?>
    <?php elseif( get_row_layout() == 'tabbed_content' ): ?>
      <?php get_template_part( 'inc/flexible/tabbed'); // Tabbed Content ?>
    <?php elseif( get_row_layout() == 'content_block' ): ?>
      <?php get_template_part( 'inc/flexible/content_block'); // Content Block ?>
    <?php endif; ?>
  <?php } ?>
</div>
<?php } ?>

<?php get_template_part( 'inc/careers_cta' ); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>