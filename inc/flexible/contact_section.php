<?php
$section_title = get_sub_field('section_title') ?: 'Contact Us';
$form_recipient = get_sub_field('form_recipient_email');

if (!$form_recipient) {
  $form_recipient = get_field('contact_email');
}

$show_form = get_sub_field('show_form');
$show_form = ($show_form !== false);
?>

<section class="offering contact">
  <div class="container">

    <?php if ($section_title): ?>
      <h2><?php echo esc_html($section_title); ?></h2>
    <?php endif; ?>

    <div class="grid <?php echo $show_form ? 'grid-2' : 'grid-1'; ?>">

      <?php if (have_rows('contacts')): ?>
        <article class="card">
          <?php while (have_rows('contacts')): the_row(); ?>

            <?php
            $type = get_sub_field('contact_type');

            $name = '';
            $title = '';
            $email = '';
            $photo_url = '';

            if ($type === 'profile') {
              $profile = get_sub_field('contact_profile');

              if ($profile) {
                $profile_id = is_object($profile) ? $profile->ID : $profile;

                $name     = get_the_title($profile_id);
                $title    = get_field('job_title', $profile_id);
                $email    = get_field('email', $profile_id);
                $photo_id = get_post_thumbnail_id($profile_id);
                $photo_url = $photo_id ? wp_get_attachment_image_url($photo_id, 'full') : '';
              }

            } else {
              $name  = get_sub_field('contact_custom_name');
              $title = get_sub_field('contact_custom_title');
              $email = get_sub_field('contact_custom_email');
              $photo = get_sub_field('contact_custom_photo');

              if ($photo) {
                $photo_url = is_array($photo) ? $photo['url'] : wp_get_attachment_image_url($photo, 'full');
              }
            }
            ?>

            <?php if ($name || $title || $email || $photo_url): ?>
              <div class="person">

                <?php if ($photo_url): ?>
                  <img src="<?php echo esc_url($photo_url); ?>" class="photo" alt="<?php echo esc_attr($name); ?>">
                <?php endif; ?>

                <p>
                  <?php if ($name): ?>
                    <strong><?php echo esc_html($name); ?></strong><br>
                  <?php endif; ?>

                  <?php if ($title): ?>
                    <?php echo esc_html($title); ?><br>
                  <?php endif; ?>

                  <?php if ($email): ?>
                    <a href="mailto:<?php echo esc_attr($email); ?>">
                      <?php echo esc_html($email); ?>
                    </a>
                  <?php endif; ?>
                </p>

              </div>
            <?php endif; ?>

          <?php endwhile; ?>
        </article>
      <?php endif; ?>

      <?php if ($show_form): ?>
        <article class="card">
          <?php
          if ($form_recipient) {
            echo do_shortcode('[frm-set-get contact_email="' . esc_attr($form_recipient) . '"]');
          }

          echo do_shortcode('[formidable id="32"]');
          ?>
        </article>
      <?php endif; ?>

    </div>
  </div>
</section>