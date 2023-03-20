<?php /* Page */
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

<section class="hero news">
  <div class="shapes one"></div><div class="shapes two"></div><div class="shapes three"></div><div class="overlay"></div>
  <div class="container">
    <h1><?php the_title(); ?></h1>
  </div>
</section>
<section class="page">
  <div class="container flex">
    <div class="content ten columns offset-by-one">
      <?php the_content(); ?>
    </div>
  </div>
</section>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>