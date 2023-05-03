<?php /* Single Post */
get_header();

while ( have_posts() ) : the_post(); ?>

<section class="hero single" style="background:url(<?php the_post_thumbnail_url( 'full' ); ?>) center center no-repeat; background-size: cover;">
</section>

<section class="post careers">
  <div class="container flex">
    <div class="content eight columns">
      <div class="title single">
        <h1 class="split_title"><?php the_title(); ?></h1>
      </div>
      <h2 class="details">Job description</h2>
      <?php the_content(); ?>
    </div>
    <div class="four columns">
      <div class="apply">
        <h2>How to apply</h2>
        <p>Apply by sending your CV and cover letter, including why you are interested in this role and consider yourself to be a good fit for it, to <a href="mailto:careers@expandresearch.com?subject=<?php the_title(); ?>">careers@expandresearch.com</a>.</p>
        <p>Please also include your desired salary along with your notice period/available start date. Please note that applications without a cover letter will not be considered.</p>
      </div>
      <div class="careers_equal">
        <p>Expand are an equal opportunities employer. We ensure that applicants are treated equally and that no applicant or employee receives less favorable treatment during the interview selection process or during their employment with Expand.</p>
        <p><a href="#">Read our Equality, Diversity & Inclusion policy</a></p>
      </div>
      <?php $args = array(
          'post_type' => 'career',
          'posts_per_page' => 5,
          'post_status' => 'publish',
          'post__not_in' => array (get_the_ID()),
        ); query_posts($args); ?>
          <?php if ( have_posts() ) : ?>
        <div class="other_jobs">
          <h3>Other open positions</h3>
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