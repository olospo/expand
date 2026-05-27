<?php /* Category */

$current_cat = get_queried_object();

get_header();

$news_page = get_page_by_path( 'news-events' );
$news_page_link = $news_page ? get_permalink( $news_page->ID ) : home_url( '/insights/' );

$category_labels = array(
  'news'          => 'News',
  'insight'       => 'Insights',
  'event'         => 'Events',
  'press-release' => 'Press Releases',
  'report'        => 'Reports',
  'whitepaper'    => 'Whitepapers',
);

$title = 'Latest News';

if ( $current_cat && ! is_wp_error( $current_cat ) ) {
  $title = isset( $category_labels[ $current_cat->slug ] )
    ? 'Latest ' . $category_labels[ $current_cat->slug ]
    : single_cat_title( '', false );
}

$categories = get_categories( array(
  'hide_empty' => true,
  'orderby'    => 'name',
  'order'      => 'ASC',
) );
?>

<section class="single-news-hero" style="background:url('<?php bloginfo('template_directory'); ?>/img/news-skyline.jpg') bottom center no-repeat; background-size: cover;">
  <div class="container">
    <div class="twelve columns">
      <h1 class="archive"><?php echo esc_html( $title ); ?></h1>
    </div>

    <div class="news-events-filters twelve columns">
      <label>Filter</label>

      <a href="<?php echo esc_url( $news_page_link ); ?>">
        All
      </a>

      <?php foreach ( $categories as $cat_obj ) : ?>
        <?php
          $label = $category_labels[ $cat_obj->slug ] ?? $cat_obj->name;

          $active_class = (
            $current_cat &&
            isset( $current_cat->term_id ) &&
            (int) $current_cat->term_id === (int) $cat_obj->term_id
          ) ? 'active' : '';
        ?>

        <a class="<?php echo esc_attr( $active_class ); ?>" href="<?php echo esc_url( get_category_link( $cat_obj->term_id ) ); ?>">
          <?php echo esc_html( $label ); ?>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="news-events-listing">
  <div class="container">
    <div class="news-grid twelve columns">
      <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
          <?php
            $cats        = get_the_category();
            $primary_cat = ! empty( $cats ) ? $cats[0] : null;

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
      <?php else : ?>
        <p>No posts found.</p>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>