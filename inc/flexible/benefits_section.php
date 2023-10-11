<?php 
$sectionTitle = get_sub_field('title'); 
$description = get_sub_field('description');
?>
  
<section class="careers_benefits">
  <div class="container">
    <div class="eight columns offset-by-two">
      <div class="title">
        <h3 class="split_title"><?php echo $sectionTitle; ?></h3>
        <?php echo $description; ?>
      </div>
    </div>
    <div class="benefits twelve columns">
      <?php if( have_rows('detail') ): // Image ?>
        <?php while( have_rows('detail') ): the_row(); 
          $title = get_sub_field('title');  
          $content = get_sub_field('content'); 
          $link = get_sub_field('link'); 
        ?>
        <div class="benefit three columns">
          <h4><?php echo $title; ?></h4>
          <?php echo $content; ?>
          
          <?php if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
          ?>
          <a href="<?php echo esc_url( $link_url ); ?>" class="button" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
          <?php endif; ?>
          
        </div>
        <?php endwhile; ?>
      <?php endif; ?>
      
    </div>
  </div>
</section>