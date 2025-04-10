<?php /* Single Post */
get_header();

$bgImg = get_field('background_image');

// Get the post author's ID
$author_id = get_the_author_meta('ID');

// Get the post thumbnail URL for the author
$featured_img_url = get_the_post_thumbnail_url($author_id, 'large-thumb');

while ( have_posts() ) : the_post(); ?>

<section class="hero profile">
  <div class="container">
    <div class="twelve columns">
      <div class="breadcrumbs"><a href="<?php echo get_site_url(); ?>/news-events">News & Events</a> <span>></span> <?php the_title(); ?></div>
    </div>
  </div>
</section>

<?php if( $bgImg ): // If Background Image is added ?>
<section class="news_image" style="background:url(<?php echo $bgImg; ?>) center center no-repeat; background-size: cover;"></section>
<?php else: // Else show Featured Image ?>
<section class="news_image" style="background:url(<?php the_post_thumbnail_url( 'full' ); ?>) center center no-repeat; background-size: cover;"></section>
<?php endif; ?>

<section class="post">
  <div class="container flex">
    <div class="content ten columns offset-by-one">
      <div class="info">
        <div class="title single">
          <h1 class="split_title"><?php the_title(); ?></h1>
        </div>
        <p class="date"><?php the_time('F j, Y'); ?></p>
        <?php $category = get_the_category(); $name = $category[0]->cat_name;
          $cat_id = get_cat_ID( $name );
          $link = get_category_link( $cat_id );
          echo '<a class="category_tag" href="'. esc_url( $link ) .'"">'. $name .'</a>'; ?>
          <!-- Tag Links -->
          <?php 
            $post_tags = get_the_tags();
            if ( $post_tags ) :
              foreach( $post_tags as $tag ) : 
                $tag_link = esc_url( get_tag_link( $tag->term_id ) );
          ?>
              <a class="tag" href="<?php echo $tag_link; ?>"><?php echo esc_html( $tag->name ); ?></a>
          <?php endforeach; endif; ?>
        
        <?php
          $authors = get_field('author');
          if ($authors) :
        ?>
        <p class="written">Written by <?php
          $author_links = array();
            foreach ($authors as $author) :
              $permalink = get_permalink($author->ID);
              $title = get_the_title($author->ID);
              $author_links[] = '<a href="' . esc_url($permalink) . '">' . esc_html($title) . '</a>';
            endforeach;
          echo implode(', ', $author_links);?>
        </p>
        <?php endif; ?>
      </div>
      <?php the_content(); ?>
    </div>
  </div>
</section>

<?php $authors = get_field('author');
if( $authors ): ?>
<section class="authors">
  <div class="container flex">
    <div class="content ten columns offset-by-one">
    <?php foreach( $authors as $author ): 
      $permalink = get_permalink( $author->ID );
      $title = get_the_title( $author->ID );
      $jobtitle = get_field( 'job_title', $author->ID );
      $location = get_field( 'location', $author->ID );
      $featured_img_url = get_the_post_thumbnail_url($author->ID, 'thumb'); 
    ?>
    <article class="author six columns">
      <div class="image">
        <a href="<?php echo $permalink; ?>"><img src="<?php echo $featured_img_url; ?>" alt="<?php echo esc_html( $author->post_title ); ?>"></a>
      </div>
      <div class="content">
        <h4><a href="<?php echo $permalink; ?>"><?php echo esc_html( $title ); ?></a></h4>
        <span class="jobtitle"><?php echo $jobtitle; ?></span>
        <span class="location"> <?php echo $location; ?></span>
      </div>
    </article>
    <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php get_template_part( 'inc/cta_careers' ); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>