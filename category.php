<?php /* Category */

$cat= get_queried_object();

get_header(); ?>

<section class="hero news">
  <div class="shapes one"></div><div class="shapes two"></div><div class="shapes three"></div><div class="shapes four"></div><div class="shapes five"></div><div class="overlay"></div>
  <div class="container">
    <h1><?php single_cat_title(); ?></h1>
  </div>
</section>

<section class="news_filter">
  <div class="container">
    <div class="twelve columns">
    <div class="filter">
      Filter News
      <span></span>
      <span></span>
    </div>
    <?php $categories = get_categories(); ?>
    <ul class="cat_filter">
    <span>Filter</span>
      <li><a href="<?php echo get_site_url(); ?>/news">All</a></li>
    <?php foreach ( $categories as $category ) { ?>
      <li class="cat-<?php echo $category->term_id; ?> <?php if ( $category->term_id == $cat->term_id ) { echo "current"; }  ?>"><a href="<?php echo get_category_link( $category->term_id ); ?> "><?php echo $category->name; ?></a></li>
    <?php } ?>
    </ul>
    </div>
  </div>
</section>

<section class="news_archive">
  <div class="container">
    <div class="twelve columns">
      <?php if ( have_posts() ) : while (have_posts()) : the_post();  ?>
        <?php get_template_part('inc/article'); ?>
      <?php endwhile; ?>
      <div class="twelve columns">
      <?php numeric_posts_nav(); ?>
      </div>
      <?php else : ?>
      <!-- No posts found -->
      <?php endif; wp_reset_query(); ?>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>