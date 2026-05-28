<?php /* Single Post */
get_header();

$bgImg = get_field('background_image');

// Get the post author's ID
$author_id = get_the_author_meta('ID');

// Get the post thumbnail URL for the author
$featured_img_url = get_the_post_thumbnail_url($author_id, 'large-thumb');

while ( have_posts() ) : the_post(); ?>
  
<section class="hero profile">
  <div class="container">
    <div class="twelve columns">
      <div class="breadcrumbs"><a href="<?php echo get_site_url(); ?>/insights">Insights</a> <span>></span> <?php the_title(); ?></div>
    </div>
  </div>
</section>

<?php $hero_image = get_the_post_thumbnail_url( get_the_ID(), 'background-img' ); ?>

<section class="single-news-hero" style="background:url('<?php echo esc_url( $hero_image ); ?>') center center no-repeat; background-size:cover;">
  <div class="single-news-hero__overlay"></div>

  <div class="container">
    <div class="single-news-hero__content ten columns offset-by-one">    
      <?php $category = get_the_category(); if ( ! empty( $category ) ) : $cat = $category[0]; ?>  
        <a class="category_tag <?php echo esc_attr( $cat->slug ); ?>" href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>"><span><?php echo esc_html( $cat->name ); ?></span></a>
      <?php endif; ?>
      
      <h1><?php the_title(); ?></h1>
      
      <?php
      $event_date       = get_field( 'event_date' );
      $event_start_time = get_field( 'event_start_time' );
      $event_end_time   = get_field( 'event_end_time' );
      $location         = get_field( 'location' );
      ?>
      
      <?php if ( $event_date ) : ?>
        <p class="date">
          <span class="dashicons dashicons-calendar"></span>
          <?php echo esc_html( $event_date ); ?>
      
          <?php if ( $event_start_time ) : ?>
            · <?php echo esc_html( $event_start_time ); ?>
      
            <?php if ( $event_end_time ) : ?>
              - <?php echo esc_html( $event_end_time ); ?>
            <?php endif; ?>
          <?php endif; ?>
        </p>
      
        <?php if ( $location ) : ?>
          <p class="location">
            <span class="dashicons dashicons-location"></span>
            <?php echo esc_html( $location ); ?>
          </p>
        <?php endif; ?>
      
      <?php else : ?>
      
        <p class="date"><?php echo esc_html( get_the_date( 'F j, Y' ) ); ?></p>
      
      <?php endif; ?>
      <?php $authors = get_field('author'); if ($authors) : ?>
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
  </div>
</section>

<section class="post">
  <div class="container flex">
    <div class="content ten columns offset-by-one">
    
      <?php the_content(); ?>
    </div>
  </div>
</section>

<?php
$current_post_id = get_the_ID();
$categories      = wp_get_post_categories( $current_post_id );

$related_posts = new WP_Query( array(
  'post_type'           => 'post',
  'post_status'         => 'publish',
  'posts_per_page'      => 3,
  'post__not_in'        => array( $current_post_id ),
  'category__in'        => $categories,
  'ignore_sticky_posts' => true,
  'orderby'             => 'date',
  'order'               => 'DESC',
) );

if ( $related_posts->have_posts() ) :
?>

<section class="news-events-listing related-reading">
  <div class="container">
    <div class="news-grid related-grid twelve columns">
      <?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
        <?php
          $post_categories = get_the_category();
          $primary_cat     = ! empty( $post_categories ) ? $post_categories[0] : null;

          $cat_label = '';
          $cat_link  = '';
          $cat_slug  = '';

          if ( $primary_cat ) {
            $cat_slug  = $primary_cat->slug;
            $cat_label = $category_labels[ $cat_slug ] ?? $primary_cat->name;
            $cat_link  = get_category_link( $primary_cat->term_id );
          }
        ?>

        <article class="item clickable-card" data-link="<?php the_permalink(); ?>">
          <?php if ( has_post_thumbnail() ) : ?>
            <div class="item_image">
              <?php if ( $primary_cat ) : ?>
                <a class="category_tag <?php echo esc_attr( $cat_slug ); ?>" href="<?php echo esc_url( $cat_link ); ?>">
                  <span><?php echo esc_html( $cat_label ); ?></span>
                </a>
              <?php endif; ?>

              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'featured-img' ); ?>
              </a>
            </div>
          <?php endif; ?>

          <div class="item_content">
            <div class="item_body">
              <p class="date"><?php echo esc_html( get_the_date( 'F j, Y' ) ); ?></p>
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            </div>

            <div class="item_footer">
              <a href="<?php the_permalink(); ?>" class="read-more">
                Read more<span aria-hidden="true">→</span>
              </a>
            </div>
          </div>
        </article>

      <?php endwhile; ?>
    </div>
  </div>
</section>

<?php
wp_reset_postdata();
endif;
?>

<!-- <?php $authors = get_field('author');
if( $authors ): ?>
<section class="authors">
  <div class="container flex">
    <div class="content ten columns offset-by-one">
    <?php foreach( $authors as $author ): 
      $permalink = get_permalink( $author->ID );
      $title = get_the_title( $author->ID );
      $jobtitle = get_field( 'job_title', $author->ID );
      $location = get_field( 'location', $author->ID );
      $featured_img_url = get_the_post_thumbnail_url($author->ID, 'thumb'); 
    ?>
    <article class="author six columns">
      <div class="image">
        <a href="<?php echo $permalink; ?>"><img src="<?php echo $featured_img_url; ?>" alt="<?php echo esc_html( $author->post_title ); ?>"></a>
      </div>
      <div class="content">
        <h4><a href="<?php echo $permalink; ?>"><?php echo esc_html( $title ); ?></a></h4>
        <span class="jobtitle"><?php echo $jobtitle; ?></span>
        <span class="location"> <?php echo $location; ?></span>
      </div>
    </article>
    <?php endforeach; ?>
    </div>
  </div>
</section> 
<?php endif; ?> -->

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>