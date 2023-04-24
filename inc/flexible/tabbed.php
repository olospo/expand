<section class="tabbed_section">
  <div class="container">
    <div class="title twelve columns">
      <h3 class="split_title">Our Unique Approach</h3>
    </div>
    <div class="tab_menu twelve columns">
      <button class="w3-bar-item w3-button tablink active" onclick="openTab(event,'Data')">Data Collection</button>
      <button class="w3-bar-item w3-button tablink" onclick="openTab(event,'Normalisation')">Normalisation</button>
      <button class="w3-bar-item w3-button tablink" onclick="openTab(event,'Action')">Action</button>
    </div> 
    <article id="Data" class="tab ten columns offset-by-one">
      <div class="contain">
        <div class="icon">
          <img src="<?php bloginfo('template_directory'); ?>/img/data_collection.png" height="333px" width="600px" alt="Data Collection icon">
        </div>
        <div class="content">
          <p>Expand collects raw data from clients rather than relying on filling in complex templates. This not only reduces the effort needed to participate, but also allows us to ensure database integrity as well as alignment in scope and definitions.</p>
        </div>
      </div>
    </article>
    
    <article id="Normalisation" class="tab ten columns offset-by-one" style="display:none">
      <div class="contain">
        <div class="icon">
          <img src="<?php bloginfo('template_directory'); ?>/img/normalisation.png" height="308px" width="600px" alt="Normalisation icon">
        </div>
        <div class="content">
          <p>Expand leverages years of experience to ensure unparalleled relevancy of comparisons. Peer groups can be tailored, and other complexity and scaling measures are captured and verified to create truly bespoke indicators of performance.</p>
        </div>
      </div>
    </article>
    <article id="Action" class="tab ten columns offset-by-one" style="display:none">
      <div class="contain">
        <div class="icon">
          <img src="<?php bloginfo('template_directory'); ?>/img/action.png" height="297px" width="600px" alt="Action icon">
        </div>
        <div class="content">
          <p>Expand’s unique insights provide senior stakeholders and decision makers with clear and actionable intelligence about competitiveness, performance, and opportunities. Helping clients make strategic, well-thought-out decisions to drive positive business outcomes.</p>
        </div>
      </div>
    </article>
  </div>
</section>