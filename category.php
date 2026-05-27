<?php /* Category */

$current_cat = get_queried_object();

get_header();

global $wp_query;

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

    <?php if ( have_posts() ) : ?>

      <div class="news-grid twelve columns">
        <?php while ( have_posts() ) : the_post(); ?>
          <?php get_template_part( 'inc/news-card' ); ?>
        <?php endwhile; ?>
      </div>

      <?php if ( $wp_query->max_num_pages > 1 ) : ?>
        <div class="load-more-wrap twelve columns">
          <button
            class="load-more-news"
            data-page="1"
            data-max="<?php echo esc_attr( $wp_query->max_num_pages ); ?>"
            data-category="<?php echo esc_attr( get_queried_object_id() ); ?>">
            Load more
          </button>
        </div>
      <?php endif; ?>

    <?php else : ?>

      <div class="twelve columns">
        <p>No posts found.</p>
      </div>

    <?php endif; ?>

  </div>
</section>

<?php get_footer(); ?>