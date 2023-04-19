<?php // Hero
  $image = get_field('video_poster');
  $videomp4 = get_field('upload_video_mp4');
  $videowebm = get_field('upload_video_webm');
?>

<section class="hero home">
  <div class="video-upload">
    <video data-object-fit="cover" playsinline muted autoplay loop  id="homeVideo" poster="<?php echo $image['url']; ?>">
      <source src="<?php echo $videowebm; ?>" type="video/webm">
      <source src="<?php echo $videomp4; ?>" type="video/mp4">
    </video>
    <div class="poster" style="background: url('<?php echo $image['url']; ?>') center center no-repeat; background-size: cover"></div>
  </div>
</section>
