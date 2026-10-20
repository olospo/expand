
<?php /* Single Profile */
get_header();

$profile_id       = get_queried_object_id();
$title            = get_the_title( $profile_id );
$jobtitle         = get_field( 'job_title', $profile_id );
$location         = get_field( 'location', $profile_id );
$email            = get_field( 'email', $profile_id );
$phone            = get_field( 'phone_number', $profile_id );
$featured_img_url = get_the_post_thumbnail_url( $profile_id, 'large-thumb' );
$desc             = get_field( 'description', $profile_id );

// Find posts linked to this profile via the ACF Relationship field.
$profile_posts = new WP_Query( array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => 10,
    'paged'          => 1,
    'orderby'        => 'date',
    'order'          => 'DESC',
    'meta_query'     => array(
        array(
            'key'     => 'author',
            'value'   => '"' . $profile_id . '"',
            'compare' => 'LIKE',
        ),
    ),
) );

while ( have_posts() ) : the_post();
?>

<section class="hero profile">
  <div class="container">
    <div class="twelve columns">
      <div class="breadcrumbs">
        <a href="<?php echo esc_url( home_url( '/about' ) ); ?>">About</a>
        <span>&gt;</span>
        <a href="<?php echo esc_url( home_url( '/about/meet-the-team' ) ); ?>">Meet the team</a>
        <span>&gt;</span>
        <?php the_title(); ?>
      </div>
    </div>
  </div>
</section>

<section class="team about" id="team">
  <div class="container flex">
    <div class="content ten columns">
      <div class="image three columns">
        <?php if ( $featured_img_url ) : ?>
          <img
            src="<?php echo esc_url( $featured_img_url ); ?>"
            alt="<?php echo esc_attr( $title ); ?>"
          >
        <?php endif; ?>
      </div>

      <div class="content nine columns">
        <p>
          <strong class="name"><?php echo esc_html( $title ); ?></strong><br>
          <strong><?php echo esc_html( $jobtitle ); ?></strong><br>
          <em><?php echo esc_html( $location ); ?></em>
        </p>

        <?php echo $desc; ?>

        <?php if ( $email || $phone ) : ?>
          <div class="contact">
            <?php if ( $email ) : ?>
              <p class="email">
                <img
                  src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/email-icon.svg"
                  alt="Email Icon"
                  loading="lazy"
                >
                <a href="mailto:<?php echo esc_attr( $email ); ?>" class="email">
                  <?php echo esc_html( $email ); ?>
                </a>
              </p>
            <?php endif; ?>

            <?php if ( $phone ) : ?>
              <p class="phone">
                <img
                  src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/phone-icon.svg"
                  alt="Phone Icon"
                  loading="lazy"
                >
                <a href="tel:<?php echo esc_attr( $phone ); ?>" class="phone">
                  <?php echo esc_html( $phone ); ?>
                </a>
              </p>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<?php if ( $profile_posts->have_posts() ) : ?>

<section class="news-events-listing profile-posts">
  <div class="container">

    <div class="twelve columns">
      <h3 style="margin-bottom: 40px;">
        Insights from <?php echo esc_html( $title ); ?>
      </h3>
    </div>

    <div class="news-grid twelve columns">
      <?php while ( $profile_posts->have_posts() ) : $profile_posts->the_post(); ?>
        <?php get_template_part( 'inc/news-card' ); ?>
      <?php endwhile; ?>
    </div>

    <?php if ( $profile_posts->max_num_pages > 1 ) : ?>
      <div class="load-more-wrap twelve columns">
        <button
          class="load-more-news"
          data-page="1"
          data-max="<?php echo esc_attr( $profile_posts->max_num_pages ); ?>"
          data-category=""
          data-author="<?php echo esc_attr( $profile_id ); ?>"
        >Load more</button>
      </div>
    <?php endif; ?>

  </div>
</section>

<?php endif; ?>

<?php
wp_reset_postdata();

get_template_part( 'inc/careers_cta' );

endwhile;

get_footer();
?>