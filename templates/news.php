<?php /* Template Name: News & Events */
get_header();

while ( have_posts() ) : the_post(); ?>

<section class="hero home">
  <div class="video-upload" style="background: linear-gradient(rgba(0, 0, 0, 0.20), rgba(0, 0, 0, 0.20)), url('<?php bloginfo('template_directory'); ?>/img/expand_news.jpg') center center no-repeat; background-size:cover;">
  </div>
  <div class="icon left"><img src="<?php bloginfo('template_directory'); ?>/img/news_events.svg" alt="News and Events"></div>
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
          <div class="item_image">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'featured-img' ); ?></a>
          </div>
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


<section class="stat_section">
  <div class="container">
    <div class="stats three">
      <div class="stat grey">
        <span class="unit" data-count="350" data-prefix="~">350</span>
        <span class="description">Participants attended each year</span>
      </div>
      <div class="stat white">
        <span class="unit" data-count="30" data-prefix="~">30</span>
        <span class="description">Roundtables held annually</span>
      </div>
      <div class="stat grey">
        <span class="unit" data-count="200" data-prefix="~">200</span>
        <span class="description">Firms represented each year</span>
      </div> 
    </div>
  </div>
</section>

<?php get_template_part( 'inc/careers_cta' ); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>