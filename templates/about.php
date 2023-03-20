<?php /* Template Name: About */
get_header();

$heroBG = get_field('hero_background_image');

while ( have_posts() ) : the_post(); ?>

<section class="hero about" style="background: url('<?php echo esc_url($heroBG['url']); ?>') center center no-repeat; background-size: cover;">
  <div class="overlay"></div>
  <div class="logo">
    <img src="<?php bloginfo('template_directory'); ?>/img/logo_large.svg" alt="AP Logo" />
  </div>
</section>

<section class="intro about">
  <div class="container">
    <div class="content ten columns offset-by-one">
      <?php the_field('intro_content'); ?>
    </div>
  </div>
</section>

<section class="studio about" id="studio">
  <div class="container">
    <div class="content ten columns offset-by-one">
    <h2><?php the_field('studio_title'); ?></h2>
    <?php the_field('studio_content'); ?>
    </div>
  </div>
</section>

<section class="clients about">
  <div class="container">
    <div class="content ten columns offset-by-one">
    <h2>Clients</h2>
    <?php if( have_rows('client') ): ?>
        <div class="row">
        <?php while( have_rows('client') ): the_row(); 
            $image = get_sub_field('logo');
            ?>
            <article class="logo three columns">
              <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" loading="lazy" />
            </article>
        <?php endwhile; ?>
        </div>
    <?php endif; ?>

    </div>
    </div>
  </div>
</section>

<?php get_template_part( 'inc/cta_contact' ); ?>

<section class="process about">
  <div class="container">
    <div class="eight columns offset-by-two">
      <h2><?php the_field('process_title'); ?></h2>
      <?php if( have_rows('process') ): ?>
        <?php while( have_rows('process') ): the_row(); 
            $title = get_sub_field('process_title');
            $desc = get_sub_field('process_description');
          ?>
          <article class="step">
            <div class="shapes">
              <img src="<?php bloginfo('template_directory'); ?>/img/<?php echo $title; ?>_shapes.svg" class="<?php echo $title; ?>"/>
            </div>
            <div class="content">
              <h3><?php echo $title; ?></h3>
              <p><?php echo $desc; ?></p>
            </div>
          </article>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
</section>

<section class="team about" id="team">
  <div class="container">
    <div class="content ten columns offset-by-one">
      <h2>Meet the team</h2>
      
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

<?php get_template_part( 'inc/cta_careers' ); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>