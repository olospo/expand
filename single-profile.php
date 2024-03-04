<?php /* Single Post */
get_header();
$authors = get_field('author');

$title = get_the_title( $author->ID );
$jobtitle = get_field( 'job_title', $author->ID );
$location = get_field( 'location', $author->ID );
$email = get_field( 'email', $author->ID );
$phone = get_field( 'phone_number', $author->ID );
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
      <strong><?php echo get_field('job_title'); ?></strong><br />
      <em><?php echo get_field('location'); ?></em></p>
      <?php echo $desc; ?>
      
      <?php if( $email ) { ?><div class="contact"><?php } ?>
      <?php if( $email ) { ?>
        <p class="email"><img src="<?php bloginfo('template_directory'); ?>/img/email-icon.svg" alt="Email Icon" loading="lazy" /><a href="mailto:<?php echo $email;?>" class="email"><?php echo $email; ?></a>
      <?php } ?>
      <?php if( $phone ) { ?>
        <p class="phone"><img src="<?php bloginfo('template_directory'); ?>/img/phone-icon.svg" alt="Phone Icon" loading="lazy" /><a href="tel:<?php echo $phone;?>" class="phone"><?php echo $phone; ?></a>
      <?php } ?> 
      <?php if( $email ) { ?></div><?php } ?>
      
    </div>
    </div>
  </div>
</section>

<?php $profile_id = get_the_ID(); // Get the current profile's ID
    
  $args = array(
    'post_type' => 'post', // Your news post type
    'meta_query' => array(
      array(
        'key' => 'author', // Your custom field name for profiles
        'value' => $profile_id,
        'compare' => 'LIKE', // Use 'LIKE' for relationship fields
      ),
    ),
  );
  
  $query = new WP_Query($args);
    
if ($query->have_posts()) { ?>  
<section class="profile_written">
  <div class="container">
  <?php $title = get_the_title(); // Get the full post title
  $words = explode(' ', $title); // Split the title into an array of words
  $name = $words[0]; // Get the first word ?>
  <h2>Contributions from <span><?php echo $name; ?></span></h2>
  </div>
</section>
<section class="news profile">
    <div class="container">
    <?php while ($query->have_posts()) { $query->the_post(); ?>
      <?php if( $query->current_post == 0 ) : // If First Post ?>
        <article class="item featured twelve columns">
          <?php if ( has_post_thumbnail() ) { ?>
          <div class="item_image featured six columns no_right_margin">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'featured-img' ); ?></a>
          </div>
          <div class="item_content featured six columns no_left_margin">
          <?php } else { ?>
          <div class="item_content twelve columns">
          <?php } ?>
            <div class="content">
              <?php $category = get_the_category(); $name = $category[0]->cat_name;
              $cat_id = get_cat_ID( $name );
              $link = get_category_link( $cat_id );
              echo '<a class="category_tag" href="'. esc_url( $link ) .'"">'. $name .'</a>'; ?>
              <p class="date"><?php the_time('F j, Y'); ?></p>
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <?php the_excerpt(); ?>
              <a href="<?php the_permalink(); ?>" class="button">Read more</a>
            </div>
          </div>
        </article>
      <?php else : ?>
        <article class="item one-third column">
          <?php if ( has_post_thumbnail() ) { ?>
          <a href="<?php the_permalink(); ?>">
          <div class="item_image">
            <?php the_post_thumbnail( 'featured-img' ); ?>
          </div>
          </a>
          <?php } ?>
          <div class="item_content">
            <?php $category = get_the_category(); $name = $category[0]->cat_name;
              $cat_id = get_cat_ID( $name );
              $link = get_category_link( $cat_id );
              echo '<a class="category_tag" href="'. esc_url( $link ) .'"">'. $name .'</a>'; ?>
            <p class="date"><?php the_time('F j, Y'); ?></p>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <?php the_excerpt(); ?>
            <a href="<?php the_permalink(); ?>" class="button">Read more</a>
          </div>
        </article>
      <?php endif; }
      wp_reset_postdata(); ?>
  </div>
  </section>
<?php } ?>
  

<?php get_template_part( 'inc/careers_cta' ); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>