<?php /* Single Post */
get_header();
$authors = get_field('author');

$title = get_the_title( $author->ID );
$jobtitle = get_field( 'job_title', $author->ID );
$location = get_field( 'location', $author->ID );
$featured_img_url = get_the_post_thumbnail_url($author->ID, 'thumb'); 

while ( have_posts() ) : the_post(); ?>

<article class="author six columns">
  <div class="image">
    <img src="<?php echo $featured_img_url; ?>" alt="<?php echo esc_html( $author->post_title ); ?>">
  </div>
  <div class="content">
    <h4><a href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $title ); ?></a></h4>
    <span class="jobtitle"><?php echo $jobtitle; ?></span>
    <span class="location"> <?php echo $location; ?></span>
  </div>
</article>


<section class="authors">
  <div class="container flex">
    <div class="content ten columns offset-by-one">
    <?php
    $authors = get_field('author');
    if( $authors ): ?>
    <?php foreach( $authors as $author ): 
      $permalink = get_permalink( $author->ID );
      $title = get_the_title( $author->ID );
      $jobtitle = get_field( 'job_title', $author->ID );
      $location = get_field( 'location', $author->ID );
      $featured_img_url = get_the_post_thumbnail_url($author->ID, 'thumb'); 
    ?>
    <article class="author six columns">
      <div class="image">
        <img src="<?php echo $featured_img_url; ?>" alt="<?php echo esc_html( $author->post_title ); ?>">
      </div>
      <div class="content">
        <h4><a href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $title ); ?></a></h4>
        <span class="jobtitle"><?php echo $jobtitle; ?></span>
        <span class="location"> <?php echo $location; ?></span>
      </div>
    </article>
    <?php endforeach; ?>
    <?php endif; ?>
    </div>
  </div>
</section>

<?php get_template_part( 'inc/cta_careers' ); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>