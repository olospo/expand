<?php /* Archive */
get_header(); ?>

<section class="hero work">
  <div class="shapes one"></div><div class="shapes two"></div><div class="shapes three"></div><div class="shapes four"></div><div class="shapes five"></div><div class="overlay"></div>
  <div class="container">
    <h1>Work</h1>
    <?php if (is_tax()) { ?>
    <div class="taxonomy">
      <span><?php single_cat_title(''); ?></span>
    </div>
    <?php } ?>
  </div>
</section>

<section class="work_filter">
  <div class="container">
    <div class="twelve columns">
    <div class="filter">
      Filter Work
      <span></span>
      <span></span>
    </div>
    <?php wp_nav_menu( array( 'theme_location' => 'category', 'items_wrap' => '<ul class="cat_filter"><span>Category</span>%3$s</ul>' ) ); ?>
    <?php wp_nav_menu( array(  'theme_location' => 'technique' , 'items_wrap' => '<ul class="tec_filter"><span>Technique</span>%3$s</ul>' ) ); ?>
    </div>
  </div>
</section>

<section class="work_archive">
  <div class="container">
    <div class="twelve columns">
      <?php 
        $projects = new WP_Query([
          'post_type' => 'post',
          'post_status' => 'publish',
          'posts_per_page' => 10,
          'order_by' => 'date',
          'order' => 'desc',
        ]);
      ?>

      <?php if ( have_posts() ) : while (have_posts()) : the_post();  ?>
        <?php get_template_part('inc/work'); ?>
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

<?php get_template_part( 'inc/cta_careers' ); ?>

<?php get_footer(); ?>