<?php /* Template Name: News & Events */
get_header();

while ( have_posts() ) : the_post(); ?>

<?php 
  // Hero fields
  $type          = get_field('video_or_image');
  $opacity       = get_field('opacity_overlay');
  $image         = get_field('video_poster');
  $videomp4      = get_field('upload_video_mp4');
  $videowebm     = get_field('upload_video_webm');
  $bgImage       = get_field('background_image');
  $icon          = get_field('icon');
  $positionIcon  = get_field('icon_position');
?>

<section class="hero home">
  <div class="video-upload"
       <?php if ( $type == "image" ) : ?>
          style="background: linear-gradient(rgba(0,0,0,0.<?php echo esc_attr($opacity); ?>), rgba(0,0,0,0.<?php echo esc_attr($opacity); ?>)), url('<?php bloginfo('template_directory'); ?>/img/expand_news.jpg') center center no-repeat; background-size: cover;"
       <?php elseif ( $type == "video" ) : ?>
          style="background: linear-gradient(rgba(0,0,0,0.<?php echo esc_attr($opacity); ?>), rgba(0,0,0,0.<?php echo esc_attr($opacity); ?>))"
       <?php endif; ?>>
       
    <?php if ( $type == "video" ) : ?>
      <video data-object-fit="cover" playsinline muted autoplay loop id="homeVideo" poster="<?php echo esc_url($image['url']); ?>">
        <source src="<?php echo esc_url($videowebm); ?>" type="video/webm">
        <source src="<?php echo esc_url($videomp4); ?>" type="video/mp4">
      </video>
      <div class="poster" style="background: url('<?php echo esc_url($image['url']); ?>') center center no-repeat; background-size: cover"></div>
    <?php endif; ?>
    
    <?php if ( $icon ) : ?>
      <div class="icon <?php echo esc_attr($positionIcon); ?>">
        <h1><img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>"></h1>
        <div class="hero-buttons">
          <p>Keep up with the latest news, insights and events from Expand</p>
          <a href="#news" class="jump-link">News</a>
          <a href="#insight" class="jump-link">Insights</a>
          <a href="#event" class="jump-link">Events</a>
        </div>
      </div>
    <?php endif; ?>
    <!-- Hero buttons -->
  </div>
</section>

<?php
  // Mapping of category slugs to displayed labels.
  // Note: Although the category slugs for the latter two are singular,
  // we display them as "Events" and "Insights".
  $categories = array(
    'news'   => 'News',
    'insight'=> 'Insights',
    'event'  => 'Events'
  );

  foreach( $categories as $slug => $display_title ):
    // Get the category object by its slug. If it does not exist, skip this section.
    $cat_obj = get_category_by_slug( $slug );
    if ( ! $cat_obj ) continue;
    $cat_id   = $cat_obj->term_id;
    $cat_link = esc_url( get_category_link( $cat_id ) );
  
    // Setup query for four posts in this category.
    $args = array(
      'post_type'      => 'post',
      'cat'            => $cat_id,
      'posts_per_page' => 4,
      'post_status'    => 'publish'
    );
    $custom_query = new WP_Query( $args );
?>
<section class="<?php echo esc_attr($slug); ?>" id="<?php echo esc_attr($slug); ?>">
  <div class="container">
    <div class="twelve columns">
    <h2><?php echo esc_html( $display_title ); ?></h2>
    </div>
  </div>
  <div class="container"> 
      <?php if( $custom_query->have_posts() ): ?>
        <?php while( $custom_query->have_posts() ): $custom_query->the_post(); ?>
          <?php if ( $custom_query->current_post == 0 ) : // Display first post as featured ?>
            <article class="item featured twelve columns">
              <?php if ( has_post_thumbnail() ) : ?>
                <div class="item_image featured six columns no_right_margin">
                  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'featured-img' ); ?></a>
                </div>
                <div class="item_content featured six columns no_left_margin">
              <?php else : ?>
                <div class="item_content twelve columns">
              <?php endif; ?>
                  <div class="content">
                    <a class="category_tag" href="<?php echo $cat_link; ?>"><?php echo esc_html( $display_title ); ?></a>
                    <!-- Tag Links -->
                    <?php 
                      $post_tags = get_the_tags();
                      if ( $post_tags ) :
                        foreach( $post_tags as $tag ) : 
                          $tag_link = esc_url( get_tag_link( $tag->term_id ) );
                    ?>
                        <a class="tag" href="<?php echo $tag_link; ?>"><?php echo esc_html( $tag->name ); ?></a>
                    <?php endforeach; endif; ?>
                    <p class="date"><?php the_time('F j, Y'); ?></p>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <?php the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>" class="button">Read more</a>
                  </div>
                </div>
            </article>
          <?php else : // Standard layout for subsequent posts ?>
            <article class="item one-third column">
              <?php if ( has_post_thumbnail() ) : ?>
                <a href="<?php the_permalink(); ?>">
                  <div class="item_image">
                    <?php the_post_thumbnail( 'featured-img' ); ?>
                  </div>
                </a>
              <?php endif; ?>
              <div class="item_content">
                <a class="category_tag" href="<?php echo $cat_link; ?>"><?php echo esc_html( $display_title ); ?></a>
                <!-- Tag Links -->
                <?php 
                  $post_tags = get_the_tags();
                  if ( $post_tags ) :
                    foreach( $post_tags as $tag ) : 
                      $tag_link = esc_url( get_tag_link( $tag->term_id ) );
                ?>
                    <a class="tag" href="<?php echo $tag_link; ?>"><?php echo esc_html( $tag->name ); ?></a>
                <?php endforeach; endif; ?>
                <p class="date"><?php the_time('F j, Y'); ?></p>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <?php the_excerpt(); ?>
                <a href="<?php the_permalink(); ?>" class="button">Read more</a>
              </div>
            </article>
          <?php endif; ?>
        <?php endwhile; ?>
      <?php else : ?>
      <?php endif; ?>
      <div class="more-link twelve columns">
        <a href="<?php echo $cat_link; ?>" class="more-button">See All <?php echo esc_html( $display_title ); ?></a>
      </div>
      <?php wp_reset_postdata(); ?>
  </div><!-- .container -->
</section>
<?php endforeach; ?>

<?php if ( have_rows('project_content') ) : // Flexible Content ?>
  <div class="flexible_content">
    <?php while ( have_rows('project_content') ) : the_row(); ?>
      <?php if ( get_row_layout() == 'hero' ) : ?>
        <?php get_template_part( 'inc/flexible/hero' ); ?>
      <?php elseif ( get_row_layout() == 'stats' ) : ?>
        <?php get_template_part( 'inc/flexible/stats' ); ?>
      <?php elseif ( get_row_layout() == 'square_section' ) : ?>
        <?php get_template_part( 'inc/flexible/square_section' ); ?>
      <?php elseif ( get_row_layout() == 'text_gradient' ) : ?>
        <?php get_template_part( 'inc/flexible/text' ); ?>
      <?php elseif ( get_row_layout() == 'tabbed_content' ) : ?>
        <?php get_template_part( 'inc/flexible/tabbed' ); ?>
      <?php elseif ( get_row_layout() == 'content_block' ) : ?>
        <?php get_template_part( 'inc/flexible/content_block' ); ?>
      <?php elseif ( get_row_layout() == 'product_details_section' ) : ?>
        <?php get_template_part( 'inc/flexible/product_details' ); ?>
      <?php elseif ( get_row_layout() == 'explore_section' ) : ?>
        <?php get_template_part( 'inc/flexible/explore_section' ); ?>
      <?php elseif ( get_row_layout() == 'details_section' ) : ?>
        <?php get_template_part( 'inc/flexible/benefits_section' ); ?>
      <?php elseif ( get_row_layout() == 'animated_icons_section' ) : ?>
        <?php get_template_part( 'inc/flexible/application_section' ); ?>
      <?php endif; ?>
    <?php endwhile; ?>
  </div>
<?php endif; ?>

<?php get_template_part( 'inc/careers_cta' ); ?>

<?php endwhile; // End of the main loop. ?>

<?php get_footer(); ?>
