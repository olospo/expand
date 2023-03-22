<?php /* Single Post */
get_header();

while ( have_posts() ) : the_post(); ?>

<section class="hero careers">
  <div class="shapes one"></div><div class="shapes two"></div><div class="shapes three"></div><div class="shapes four"></div><div class="shapes five"></div><div class="overlay"></div>
  <div class="container">
    <h1><?php the_title(); ?></h1>
  </div>
</section>

<section class="post careers">
  <div class="container flex">
    <div class="content eight columns">
      <h2 class="details">Details</h2>
      <?php the_content(); ?>
    </div>
    <div class="four columns">
      <div class="apply">
        <h2>Apply</h2>
        <ul>
          <li>Call: <a href="tel:<?php the_field('phone_number','options'); ?>"><?php the_field('phone_number','options'); ?></a></li>
          <li>Email: <a href="mailto:<?php the_field('email','options'); ?>"><?php the_field('email','options'); ?></a></li>
        </ul>
        
      </div>
      <div class="careers_terms">
        <?php the_field('careers_sidebar','options'); ?>
      </div>
      <?php $args = array(
          'post_type' => 'career',
          'posts_per_page' => 5,
          'post_status' => 'publish',
          'post__not_in' => array (get_the_ID()),
        ); query_posts($args); ?>
          <?php if ( have_posts() ) : ?>
        <div class="other_jobs">
          <h3>View other jobs</h3>
          <ul>
          <?php while (have_posts()) : the_post(); ?>
          <li><a href=<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
          <?php endwhile; ?>
          </ul>
        </div>
          <?php else : ?>
        <!-- No posts found -->
        <?php endif; wp_reset_query(); ?>
    </div>
  </div>
</section>



<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>