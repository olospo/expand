<?php // Hero
  $type = get_sub_field('video_or_image');
  $opacity = get_sub_field('opacity_overlay');
  $image = get_sub_field('video_poster');
  $videomp4 = get_sub_field('upload_video_mp4');
  $videowebm = get_sub_field('upload_video_webm');
  $bgImage = get_sub_field('background_image');
  $icon = get_sub_field('icon');
  $positionIcon = get_sub_field('icon_position');
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