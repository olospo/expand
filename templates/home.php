<?php /* Template Name: Home */
get_header();

while ( have_posts() ) : the_post(); ?>

<?php get_template_part( 'inc/hero' ); ?>

<section class="home_intro" id="intro">
  <div class="container">
    <div class="ten columns offset-by-one">
      <?php the_field('introduction'); ?>
    </div>
  </div>
</section>

<section class="home_featured">
  <div class="container">
    <h2>Featured Work</h2>
    <div class="twelve columns">
      <?php if( have_rows('featured_work') ): ?>
        <?php while( have_rows('featured_work') ): the_row(); ?>
        <?php $post_object = get_sub_field('work'); ?>
          <?php if( $post_object ): ?>
            <?php $post = $post_object; setup_postdata( $post ); ?>
              <?php get_template_part('inc/work'); ?>
            <?php wp_reset_postdata(); ?>
          <?php endif; ?>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
</section>

<section class="home_latest">
  <div class="container">
    <h2>Latest News</h2>
    <div class="twelve columns">
      <?php $args = array(
        'post_type' => 'post',
        'posts_per_page' => 1,
        'post_status' => 'publish',
      ); query_posts($args); ?>
        <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
        <?php get_template_part('inc/article'); ?>
        <?php endwhile; else : ?>
      <!-- No posts found -->
      <?php endif; wp_reset_query(); ?>
    </div>
  </div>
</section>

<?php get_template_part( 'inc/cta_contact' ); ?>

<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>