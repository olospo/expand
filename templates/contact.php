<?php /* Template Name: Contact */
get_header();

while ( have_posts() ) : the_post(); ?>

<section class="square_section green">
  <div class="container">
    <div class="square_content">
      <div class="content">
        <div class="title">
          <h3 class="split_title"><?php the_field('square_title'); ?></h3>
        </div>
        <?php the_field('square_content'); ?>
      </div>
    </div>
    <div class="square_background" style="background: url('<?php the_field('square_image'); ?>') center center no-repeat; background-size: cover;"></div>
  </div>
</section>

<section class="map">
  <div class="container">
    <div class="title six columns offset-by-three">
      <h3 class="split_title"><?php the_field('map_title'); ?></h3>
    </div>
    <div class="map_container">
    <img src="<?php bloginfo('template_directory'); ?>/img/expand_map.png" alt="map" />
    <a href="#London" id="London" class="map-marker active" data-target="London">
      <span aria-hidden="true"></span>
    </a>
    <a href="#New-York" id="New-York" class="map-marker" data-target="New-York">
      <span aria-hidden="true"></span>
    </a>
    <a href="#Singapore" id="Singapore" class="map-marker" data-target="Singapore">
      <span aria-hidden="true"></span>
    </a>
    </div>
  </div>
</section>

<section class="map_offices">
  <div class="container">
    <div class="offices">
    <div class="office active" id="London">
      
      <?php if( have_rows('london') ): ?>
        <?php while( have_rows('london') ): the_row(); 
      
        // Get sub field values.
        $title = get_sub_field('address_title');
        $address = get_sub_field('address');
        $phone = get_sub_field('phone_number');
        ?>
        <div class="content">
          <h3><?php echo $title; ?></h3>
          <address>
            <?php echo $address; ?>
          </address>
          <a href="tel:<?php echo $phone; ?>" class="phone"><?php echo $phone; ?></a>
        </div>
        <?php endwhile; ?>
      <?php endif; ?>

    </div>
    <div class="office" id="New-York">
      <?php if( have_rows('usa') ): ?>
        <?php while( have_rows('usa') ): the_row(); 
      
        // Get sub field values.
        $title = get_sub_field('address_title');
        $address = get_sub_field('address');
        $phone = get_sub_field('phone_number');
        ?>
        <div class="content">
          <h3><?php echo $title; ?></h3>
          <address>
            <?php echo $address; ?>
          </address>
          <a href="tel:<?php echo $phone; ?>" class="phone"><?php echo $phone; ?></a>
        </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
    <div class="office" id="Singapore">
      <?php if( have_rows('singapore') ): ?>
        <?php while( have_rows('singapore') ): the_row(); 
      
        // Get sub field values.
        $title = get_sub_field('address_title');
        $address = get_sub_field('address');
        $phone = get_sub_field('phone_number');
        ?>
        <div class="content">
          <h3><?php echo $title; ?></h3>
          <address>
            <?php echo $address; ?>
          </address>
          <a href="tel:<?php echo $phone; ?>" class="phone"><?php echo $phone; ?></a>
        </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
    </div>
  </div>
</section>

<section class="image_offices">
  <?php if( have_rows('usa') ): while( have_rows('usa') ): the_row(); $img = get_sub_field('office_image'); ?>
  <div class="office_image newyork" id="New-York" style="background: url('<?php echo $img; ?>') center center no-repeat; background-size: cover;"></div>
  <?php endwhile; endif; ?>
  <?php if( have_rows('london') ): while( have_rows('london') ): the_row(); $img = get_sub_field('office_image'); ?>
  <div class="office_image london active" id="London" style="background: url('<?php echo $img; ?>') center center no-repeat; background-size: cover;"></div>
  <?php endwhile; endif; ?>
  <?php if( have_rows('singapore') ): while( have_rows('singapore') ): the_row(); $img = get_sub_field('office_image'); ?>  
  <div class="office_image singapore" id="Singapore" style="background: url('<?php echo $img; ?>') center center no-repeat; background-size: cover;"></div>
  <?php endwhile; endif; ?>
</section>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>