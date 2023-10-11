<?php 
$sectionTitle = get_sub_field('title'); 
$description = get_sub_field('description');
?>
  
<section class="application_section">
  <div class="container">
    <div class="title twelve columns">
      <h3 class="split_title"><?php echo $sectionTitle; ?></h3>
      <?php echo $description; ?>
    </div>
    <div class="row">
      
    <?php if( have_rows('column_one') ): ?>
      <?php while( have_rows('column_one') ): the_row(); 
        // Get sub field values.
        $image = get_sub_field('static_image_one');
          $alt = $image['alt'];
          $size = 'animation';
          $thumb = $image['sizes'][ $size ];
        $gif = get_sub_field('animated_image_one');
          $gifsize = 'animation';
          $gifthumb = $gif['sizes'][ $gifsize ];
        $title = get_sub_field('title');
        $content = get_sub_field('content'); 
      ?>
      <article class="tab one-third column">
        <div class="contain">
          <div class="icon">
            <img id="iconImage" src="<?php echo esc_url($thumb); ?>" data-staticsrc="<?php echo esc_url($thumb); ?>" data-gifsrc="<?php echo esc_url($gifthumb); ?>" alt="<?php echo $alt; ?>">
          </div>
          <div class="content">
            <h4><?php echo $title; ?></h4>
            <?php echo $content; ?>
          </div>
        </div>
      </article>
      <?php endwhile; ?>
    <?php endif; ?>
    
    <?php if( have_rows('column_two') ): ?>
      <?php while( have_rows('column_two') ): the_row(); 
        // Get sub field values.
        $image = get_sub_field('static_image_two');
          $alt = $image['alt'];
          $size = 'animation';
          $thumb = $image['sizes'][ $size ];
        $gif = get_sub_field('animated_image_two');
          $gifsize = 'animation';
          $gifthumb = $gif['sizes'][ $gifsize ];
        $title = get_sub_field('title');
        $content = get_sub_field('content'); 
      ?>
      <article class="tab one-third column">
        <div class="contain">
          <div class="icon">
            <img id="iconImage" src="<?php echo esc_url($thumb); ?>" data-staticsrc="<?php echo esc_url($thumb); ?>" data-gifsrc="<?php echo esc_url($gifthumb); ?>" alt="<?php echo $alt; ?>">
          </div>
          <div class="content">
            <h4><?php echo $title; ?></h4>
            <?php echo $content; ?>
          </div>
        </div>
      </article>
      <?php endwhile; ?>
    <?php endif; ?>
    
    <?php if( have_rows('column_three') ): ?>
      <?php while( have_rows('column_three') ): the_row(); 
        // Get sub field values.
        $image = get_sub_field('static_image_three');
          $alt = $image['alt'];
          $size = 'animation';
          $thumb = $image['sizes'][ $size ];
        $gif = get_sub_field('animated_image_three');
          $gifsize = 'animation';
          $gifthumb = $gif['sizes'][ $gifsize ];
        $title = get_sub_field('title');
        $content = get_sub_field('content'); 
      ?>
      <article class="tab one-third column">
        <div class="contain">
          <div class="icon">
            <img id="iconImage" src="<?php echo esc_url($thumb); ?>" data-staticsrc="<?php echo esc_url($thumb); ?>" data-gifsrc="<?php echo esc_url($gifthumb); ?>" alt="<?php echo $alt; ?>">
          </div>
          <div class="content">
            <h4><?php echo $title; ?></h4>
            <?php echo $content; ?>
          </div>
        </div>
      </article>
      <?php endwhile; ?>
    <?php endif; ?>

    </div>
  </div>
</section>