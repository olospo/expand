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
  'posts_per_page' => -1,
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
    <?php endif; ?>

    <?php wp_reset_postdata(); ?>
  </div>
</section>

<script>
  document.querySelectorAll('.clickable-card').forEach(card => {
    card.addEventListener('click', e => {
      if (e.target.closest('a')) {
        return;
      }

      window.location = card.dataset.link;
    });
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