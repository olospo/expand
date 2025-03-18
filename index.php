<?php /*  Main Template File */
get_header(); ?>

<section class="hero news">
  <div class="shapes one"></div><div class="shapes two"></div><div class="shapes three"></div><div class="shapes four"></div><div class="shapes five"></div><div class="overlay"></div>
  <div class="container">
    <h1>News</h1>
  </div>
</section>

<section class="news_archive">
  <div class="container">
    <div class="twelve columns">
      <?php if ( have_posts() ) : while (have_posts()) : the_post();  ?>
        <?php get_template_part('inc/article'); ?>
      <?php endwhile; ?>
      <?php numeric_posts_nav(); ?>
      <?php else : ?>
      <!-- No posts found -->
      <?php endif; wp_reset_query(); ?>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>