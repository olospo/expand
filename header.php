<?php /* Header */  ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<title><?php wp_title( '|', true, 'left' ); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php $post_id = get_the_ID(); if (has_post_thumbnail( $post_id ) ): 
$image = get_the_post_thumbnail_url( $post_id, 'full' ); ?>
<meta name="twitter:image" content="<?php echo $image; ?>" />
<meta name="twitter:image:alt" content="<?php the_title(); ?>" />
<?php else : ?>
<meta name="twitter:image" content="<?php bloginfo('template_directory'); ?>/img/twitter_meta.png' ; ?>" />
<meta name="twitter:image:alt" content="Expand Research" />
<?php endif; ?>
<meta name="twitter:title" content="<?php the_title(); ?>" />
<?php wp_head(); ?>
<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_directory'); ?>/img/apple-touch-icon.png"/>
<link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_directory'); ?>/img/favicon-32x32.png"/>
<link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_directory'); ?>/img/favicon-16x16.png"/>
<?php if( get_field('social_metadata', 'options') ): echo get_field('social_metadata', 'options'); endif; // Social Metadata ?>
<?php if( get_field('google_analytics', 'options') ): echo get_field('google_analytics', 'options'); endif; // Google Analytics Code ?>
<meta name="google-site-verification" content="add-content-here" />
</head>
<body <?php body_class(); ?>>
<header>
  <div class="container">
    <div class="logo two columns">  
      <p class="site-title">
      <a href="<?php echo get_site_url(); ?>" aria-label="logo">
        <img src="<?php bloginfo('template_directory'); ?>/img/expand-logo-colour.svg" alt="Expand Research">
      </a>
      </p>
    </div>
    <nav class="primary ten columns">
      <?php wp_nav_menu( array( 'theme_location' => 'main', 'container'=> false, 'menu_class'=> false ) ); ?>
      <!-- Search -->
      <div class="search" role="search">
        <label for="search"><div class="search_icon"></div></label>
        <div class="search_form"><?php get_search_form(); ?></div>
      </div>
    </nav>
    <button class="menu-toggle mobile_menu">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </button>
  </div>
</header>
<nav class="mobile">
  <?php wp_nav_menu( array( 'theme_location' => 'main' ) ); ?>
</nav>