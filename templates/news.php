<?php /* Template Name: News & Events */
get_header();

while ( have_posts() ) : the_post();

$category_labels = array(
  'news'          => 'News',
  'insight'       => 'Insights',
  'event'         => 'Events',
  'press-release' => 'Press Releases',
  'report'        => 'Reports',
  'whitepaper'    => 'Whitepapers',
);

$categories = get_categories( array(
  'hide_empty' => true,
  'orderby'    => 'name',
  'order'      => 'ASC',
) );

$news_events = new WP_Query( array(
  'post_type'      => 'post',
  'post_status'    => 'publish',
  'posts_per_page' => 10,
  'paged'          => 1,
  'orderby'        => 'date',
  'order'          => 'DESC',
) );
?>

<section class="single-news-hero" style="background:url('<?php bloginfo('template_directory'); ?>/img/news-skyline.jpg') bottom center no-repeat; background-size: cover;">
  <div class="container">
    <div class="twelve columns">
      <h1 class="archive">BCG Expand News</h1>
    </div>

    <div class="news-events-filters twelve columns">
      <label>Filter</label>

      <a href="<?php echo esc_url( get_permalink() ); ?>" class="active">
        All
      </a>

      <?php foreach ( $categories as $cat_obj ) : ?>
        <?php $label = $category_labels[ $cat_obj->slug ] ?? $cat_obj->name; ?>

        <a href="<?php echo esc_url( get_category_link( $cat_obj->term_id ) ); ?>">
          <?php echo esc_html( $label ); ?>
        </a>
      <?php endforeach; ?>
      
    </div>
  </div>
</section>

<section class="news-events-listing">
  <div class="container">
    <?php if ( $news_events->have_posts() ) : ?>

      <div class="news-grid twelve columns">
        <?php while ( $news_events->have_posts() ) : $news_events->the_post(); ?>
          <?php get_template_part( 'inc/news-card' ); ?>
        <?php endwhile; ?>
      </div>

      <?php if ( $news_events->max_num_pages > 1 ) : ?>
        <div class="load-more-wrap twelve columns">
          <button class="load-more-news" data-page="1" data-max="<?php echo esc_attr( $news_events->max_num_pages ); ?>" data-category="">Load more</button>
        </div>
      <?php endif; ?>

    <?php endif; ?>

    <?php wp_reset_postdata(); ?>
  </div>
</section>

<script>
  document.addEventListener('click', e => {
    const card = e.target.closest('.clickable-card');

    if (!card) return;

    if (e.target.closest('a')) {
      return;
    }

    window.location = card.dataset.link;
  });
</script>

<?php if ( have_rows('project_content') ) : ?>
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

<?php endwhile; ?>

<?php get_footer(); ?>