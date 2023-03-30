<?php /* Template Name: About */
get_header();

while ( have_posts() ) : the_post(); ?>

<?php get_template_part( 'inc/hero' ); ?>

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
    <div class="square_background">
    
    </div>
  </div>
</section>

<section class="stat_section">
  <div class="container">
    <div class="stats three">
      <div class="stat grey">
        <span class="unit">~350</span>
        <span class="description">Participants attended each year</span>
      </div>
      <div class="stat white">
        <span class="unit">~30</span>
        <span class="description">Roundtables held annually</span>
      </div>
      <div class="stat grey">
        <span class="unit">~200</span>
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
          <p>Int et quia nullab id even im fugiae mi, sit fugit que nonem ipsu nti busam, sum facium ullest, to cus pore com molor rem volup</p>
        </div>
      </article>
      <article class="one-third column">
        <div class="content">
          <h4>Respect for the individual</h4>
          <p>Int et quia nullab id even im fugiae mi, sit fugit que nonem ipsu nti busam, sum facium ullest, to cus pore com molor rem volup</p>
        </div>
      </article>
      <article class="one-third column">
        <div class="content">
          <h4>Ambassador of the firm</h4>
          <p>Int et quia nullab id even im fugiae mi, sit fugit que nonem ipsu nti busam, sum facium ullest, to cus pore com molor rem volup</p>
        </div>
      </article>
    </div>
  </div>
</section>

<section class="careers_cta">
  <div class="container">
    <div class="cta_background">
      
    </div>
    <div class="cta_content">
      <div class="content">
      <h4>We're building tomorrow</h4>
      <p>Flourish in an environment where creative thinking is encouraged. Become a part of our unique, diverse and entrepreneurial environment</p>
      <p><a href="#" class="button">Apply now</a><br />
      <a href="#" class="button">Explore our culture</a></p>
      </div>
    </div>
  </div>
</section>


<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>