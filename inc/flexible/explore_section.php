<?php 
$sectionTitle = get_sub_field('section_title'); 
$description = get_sub_field('description');
?>
  
<section class="our_products">
  <div class="container">
    <div class="title twelve columns">
      <h3 class="split_title"><?php echo $sectionTitle; ?></h3>
      <?php if ( $description ): echo $description; endif; ?>
    </div>
    <div class="row">
      <?php if( have_rows('explore') ): // Image ?>
      <?php while( have_rows('explore') ): the_row(); 
      $type = get_sub_field('type');  
      $title = get_sub_field('title'); 
      $content = get_sub_field('content');
      $link = get_sub_field('link'); 
      $bg = get_sub_field('background_image'); 
      ?>
      <article class="one-third column" style="background: url('<?php echo $bg; ?>') center center no-repeat; background-size: cover;">
        <?php if( $link ): $link_url = $link['url']; ?><a href="<?php echo esc_url( $link_url ); ?>"><?php endif; ?>
        <div class="content">
          <?php if( $type ): ?>
          <span class="type"><?php echo $type; ?></span>
          <?php endif; ?>
          <h4><?php echo $title; ?></h4>
          <?php echo $content; ?>
        </div>
        <?php if( $link ): ?></a><?php endif; ?>
      </article>
      <?php endwhile; ?>
      <?php endif; ?>
      
    </div>
  </div>
</section>