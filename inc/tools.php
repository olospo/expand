<?php
$pdf = get_field('article_pdf');
$url = get_permalink();
$title = get_the_title();

$email = 'mailto:?subject=' . rawurlencode($title) . '&body=' . rawurlencode($title . "\n\n" . $url);
$linkedin = 'https://www.linkedin.com/sharing/share-offsite/?url=' . rawurlencode($url);
$x = 'https://x.com/intent/post?url=' . rawurlencode($url) . '&text=' . rawurlencode($title);
?>

<div class="article-tools">
  <?php if ($pdf) : ?>
    <a class="button alt blank" href="<?php echo esc_url($pdf); ?>" target="_blank" rel="noopener">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
        <path d="M12 3v12m-5-5 5 5 5-5M4 20h16"/>
      </svg>
      Download PDF
    </a>
  <?php endif; ?>
  <div class="article-tools__share">
    <button type="button" class="button alt blank article-tools__share-toggle" aria-expanded="false" aria-controls="article-share">
      <span class="dashicons dashicons-share" aria-hidden="true"></span> Share
    </button>
    <div class="article-tools__share-menu" id="article-share" hidden>
      <a href="<?php echo esc_url($email); ?>">
        <span class="dashicons dashicons-email-alt" aria-hidden="true"></span> Email
      </a>
      <button type="button" class="article-tools__copy" data-url="<?php echo esc_attr($url); ?>">
        <span class="dashicons dashicons-admin-links" aria-hidden="true"></span> Copy link
      </button>
      
      <a href="<?php echo esc_url($linkedin); ?>" target="_blank" rel="noopener">
        <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
          <path d="M20.5 2h-17A1.5 1.5 0 0 0 2 3.5v17A1.5 1.5 0 0 0 3.5 22h17a1.5 1.5 0 0 0 1.5-1.5v-17A1.5 1.5 0 0 0 20.5 2ZM8 19H5V9h3ZM6.5 7.7a1.7 1.7 0 1 1 0-3.4 1.7 1.7 0 0 1 0 3.4ZM19 19h-3v-5.2c0-2.5-3-2.3-3 0V19h-3V9h3v1.4c1.4-2.6 6-2.8 6 2.5Z"/>
        </svg>
        LinkedIn
      </a>
      <a href="<?php echo esc_url($x); ?>" target="_blank" rel="noopener">
        <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
          <path d="M18.9 2H22l-6.8 7.8L23.2 22H17l-4.9-7.4L5.6 22H2.4l7.3-8.4L2 2h6.4l4.4 6.7L18.9 2ZM17.8 20h1.7L7.4 4H5.6Z"/>
        </svg>
        X
      </a>
    </div>
  </div>
</div>