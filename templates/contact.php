<?php /* Template Name: Contact */
get_header();

while ( have_posts() ) : the_post(); ?>

<?php // Hero
  $type = get_field('video_or_image');
  $opacity = get_field('opacity_overlay');
  $image = get_field('video_poster');
  $videomp4 = get_field('upload_video_mp4');
  $videowebm = get_field('upload_video_webm');
  $bgImage = get_field('background_image');
  $icon = get_field('icon');
  $positionIcon = get_field('icon_position');
?>

<section class="hero home">
  <div class="video-upload" <?php if ($type == "image") { ?> style="background: linear-gradient(rgba(0, 0, 0, 0.<?php echo $opacity; ?>), rgba(0, 0, 0, 0.<?php echo $opacity; ?>)), url('<?php echo $bgImage; ?>') center center no-repeat; background-size:cover;" <?php } elseif ($type == "video") { ?> style="background: linear-gradient(rgba(0, 0, 0, 0.<?php echo $opacity; ?>), rgba(0, 0, 0, 0.<?php echo $opacity; ?>))" <?php } ?>>
    <?php if ($type == "video") { ?>
    <video data-object-fit="cover" playsinline muted autoplay loop  id="homeVideo" poster="<?php echo $image['url']; ?>">
      <source src="<?php echo $videowebm; ?>" type="video/webm">
      <source src="<?php echo $videomp4; ?>" type="video/mp4">
    </video>
    <div class="poster" style="background: url('<?php echo $image['url']; ?>') center center no-repeat; background-size: cover"></div>
    <?php } ?>
    
    <?php if ($icon) { ?>  
    <div class="icon <?php echo $positionIcon; ?>"><h1><img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>"></h1></div>
    <?php } ?>
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