<?php /* Template Name: About */
get_header();

while ( have_posts() ) : the_post(); ?>

<section class="hero home" style="background: linear-gradient(to right, rgba(41, 186, 115, 0.7), rgba(41, 186, 115, 0.0))"; >
  <div class="video-upload">
    <video data-object-fit="cover" playsinline muted autoplay loop id="homeVideo" poster="<?php bloginfo('template_directory'); ?>/video/about.jpg">
      <source src="<?php bloginfo('template_directory'); ?>/video/about.webm" type="video/webm" preload="auto">
      <source src="<?php bloginfo('template_directory'); ?>/video/about.mp4" type="video/mp4" preload="auto">
    </video>
    <div class="poster" style="background: url('<?php bloginfo('template_directory'); ?>/video/about.jpg') center center no-repeat; background-size: cover"></div>
    <div class="icon left"><img src="<?php bloginfo('template_directory'); ?>/img/about.svg" alt="Who is expand?"/></div>
  </div>
</section>

<?php get_template_part( 'inc/text' ); ?>

<section class="square_section green">
  <div class="container">
    <div class="square_content">
      <div class="content">
        <div class="title">
          <h3 class="split_title">Our Experience</h3>
        </div>
        <p>Each delivery team provides unrivalled levels of industry experience in financial markets, operations and technology services. We offer a unique perspective on solving problems associated with researching, sourcing and implementing new and innovative solutions for financial markets, leveraging years of experience to ensure unparalleled accuracy while maintaining a low burden on participants.</p>
      </div>
    </div>
    <div class="square_background" style="background: url('<?php bloginfo('template_directory'); ?>/img/about_solutions.jpg') center center no-repeat; background-size:cover;"></div>
  </div>
</section>

<section class="stat_section">
  <div class="container">
    <div class="stats three">
      <div class="stat grey">
        <span class="unit" data-count="350" data-prefix="~">350</span>
        <span class="description">Participants attended each year</span>
      </div>
      <div class="stat white">
        <span class="unit" data-count="30" data-prefix="~">30</span>
        <span class="description">Roundtables held annually</span>
      </div>
      <div class="stat grey">
        <span class="unit" data-count="200" data-prefix="~">200</span>
        <span class="description">Firms represented each year</span>
      </div> 
    </div>
  </div>
</section>

<section class="our_products">
  <div class="container">
    <div class="title six columns">
      <h3 class="split_title">Our Values</h3>
      <p>Expand embraces diversity, innovation and creativity and recognizes values and core competencies that apply to everyone. These values underpin the very work that we do.</p>
    </div>
    <div class="row">
      <article class="one-third column">
        <div class="content">
          <h4>Integrity</h4>
          <p>Distinguishing right from wrong, thereby upholding relationships of trust with our clients. We only make promises we can keep, ensure strict client data confidentiality and perform to the highest standards of quality with honesty, courage and accountability.</p>
        </div>
      </article>
      <article class="one-third column">
        <div class="content">
          <h4>Respect for the individual</h4>
          <p>Respecting colleagues, clients and everyone we encounter with honesty and empathy.  So that we can foster our visualisation and ensure talent growth, we value internal and external ideas and decisions based on an individual's merit and not their source.</p>
        </div>
      </article>
      <article class="one-third column">
        <div class="content">
          <h4>Ambassador of the firm</h4>
          <p>To represent the company in a professional manner by understanding, embracing and reinforcing the vision, mission and goals of the company and protecting our interests.</p>
        </div>
      </article>
    </div>
  </div>
</section>

<?php get_template_part( 'inc/careers_cta' ); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>