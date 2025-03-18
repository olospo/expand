<?php /* 404 Page */
get_header(); ?>

<section class="hero error">
  <div class="shapes one"></div><div class="shapes two"></div><div class="shapes three"></div><div class="shapes four"></div><div class="shapes five"></div><div class="overlay"></div>
  <div class="container">
    <h1>Page Not Found</h1>
    <p>It seems we can't find what you're looking for.<br /> Please try the navigation menu above or go to the <a href="<?php echo get_site_url(); ?>">homepage</a>.</p>
  </div>
</section>



<?php get_footer(); ?>