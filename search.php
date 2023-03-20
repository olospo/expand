<?php /* Search */
get_header(); ?>

<section class="hero news single search">
  <div class="shapes one"></div><div class="shapes two"></div><div class="shapes three"></div><div class="shapes four"></div><div class="shapes five"></div><div class="overlay"></div>
  <div class="container">
    <div class="eight columns offset-by-two">
      <h1><?php printf( __( 'Search Results for: %s'), '<span class="search_term">' . get_search_query() . '</span>' ); ?></h1>
    </div>
  </div>
</section>

<section class="work post search">
  <div class="container flex">
    <div class="content ten columns offset-by-one">  
    <div class="search_page_form"><?php get_search_form(); ?></div>
    <?php if ( have_posts() ) : // Show search results ?>
      <?php while ( have_posts() ) : the_post(); ?>
      <article class="search_item">
        <div class="item_content">
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <?php the_excerpt(); ?>
        </div>
      </article>
      <?php endwhile; ?>
      
      <?php numeric_posts_nav(); ?>
      
      <?php else : // No search results found ?>
      <article class="search_item">
        <h2>No Results Found</h1>
        <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords and/or search criteria.</p>
      </article>
    <?php endif; wp_reset_query(); ?>
    </div>
  </div>
</section>


<?php get_footer(); ?>