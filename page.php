<?php /* Page */
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

<section class="hero single" style="background:url(<?php the_post_thumbnail_url( 'full' ); ?>) center center no-repeat; background-size: cover;">
</section>

<section class="page">
  <div class="container flex">
    <div class="content ten columns offset-by-one">
      <div class="title single">
        <h1 class="split_title"><?php the_title(); ?></h1>
      </div>
      <?php the_content(); ?>
    </div>
  </div>
</section>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>