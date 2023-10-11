<section class="careers_cta">
  <div class="container">
    <?php $image = get_field('background_image','options'); ?>
    <div class="cta_background" style="background: linear-gradient(rgba(0, 0, 0, 0.30), rgba(0, 0, 0, 0.30)), url('<?php echo $image; ?>') center center no-repeat; background-size: cover;">
      <div class="cta_title">
        <div class="title single">
          <h1 class="split_title">Our careers</h1>
        </div>
        <?php $icon = get_field('icon','options'); ?>
        <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>">
      </div>
    </div>
    <div class="cta_content">
      <div class="content">
      <h4><?php the_field('title','options'); ?></h4>
      <?php the_field('description','options'); ?>
      <?php if( have_rows('links','options') ): ?>
        <ul class="links">
        <?php while( have_rows('links','options') ): the_row(); 
          $link = get_sub_field('link','options');
          $link_url = $link['url'];
          $link_title = $link['title'];
          $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
        <li><a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a></li>
        <?php endwhile; ?>
        </ul>
      <?php endif; ?>
      </div>
    </div>
  </div>
</section>