<?php
$image = get_sub_field('full_image');
  $url = $image['url'];
  $alt = $image['alt'];
  $size = '16-9';
  $thumb = $image['sizes'][ $size ];
$caption = get_sub_field('full_image_caption');
?>

<div class="full_image">
  <div class="twelve columns">
    <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" />
    <?php if ($caption) { ?><p class="caption"><?php echo $caption; ?></p><?php } ?>
  </div>
</div>