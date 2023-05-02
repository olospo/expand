<?php /* Template Name: Meet the Team */
get_header();

while ( have_posts() ) : the_post(); ?>

<section class="hero team_img" style="background:url(<?php the_post_thumbnail_url( 'full' ); ?>) center center no-repeat; background-size: cover;"></section>

<section class="team about" id="team">
  <div class="container">
    <div class="content ten columns offset-by-one">
      <div class="title">
        <h1 class="split_title"><?php the_title(); ?></h1>
      </div>
      <?php if (have_rows('team_profile')) { // Flexible Content ?>
      <div class="flexible_content flex">        
        <?php while (have_rows('team_profile')) { the_row(); ?>
          <?php if( get_row_layout() == 'profile_layout' ): ?>
            <?php get_template_part( 'inc/profile' ); ?>
          <?php elseif( get_row_layout() == 'heading' ): ?>
            <h3 class="team_heading"><?php the_sub_field('heading'); ?></h3>
          <?php endif; ?>
        <?php } ?>
      </div>
      <?php } ?>

    </div>
  </div>
</section>

<?php get_template_part( 'inc/careers_cta' ); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>