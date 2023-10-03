<?php /* Single Post */
get_header();
$authors = get_field('author');

$title = get_the_title( $author->ID );
$jobtitle = get_field( 'job_title', $author->ID );
$location = get_field( 'location', $author->ID );
$featured_img_url = get_the_post_thumbnail_url($author->ID, 'large-thumb'); 
$desc = get_field('description', $author->ID);

while ( have_posts() ) : the_post(); ?>
  
<section class="hero profile">
  <div class="container">
    <div class="twelve columns">
      <div class="breadcrumbs"><a href="<?php echo get_site_url(); ?>/about">About</a> <span>></span> <a href="<?php echo get_site_url(); ?>/about/meet-the-team">Meet the team</a> <span>></span> <?php the_title(); ?></div>
    </div>
  </div>
</section>

<section class="team about" id="team">
  <div class="container flex">
    <div class="content ten columns">
    <div class="image three columns">
      <img src="<?php echo $featured_img_url; ?>" alt="<?php echo esc_html( $author->post_title ); ?>">
    </div>
    <div class="content nine columns">
      <p><strong class="name"><?php the_title(); ?></strong><br />
      <strong><?php the_field('job_title'); ?></strong><br />
      <em><?php the_field('location'); ?></em></p>
      <?php echo $desc; ?>
    </div>
    </div>
  </div>
</section>

<?php get_template_part( 'inc/careers_cta' ); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>