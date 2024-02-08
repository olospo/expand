<?php /* Single Post */
get_header();

while ( have_posts() ) : the_post(); ?>

<section class="post">
  <div class="container flex">
    <div class="content ten columns offset-by-one">
      <?php the_content(); ?>
    </div>
  </div>
</section>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>