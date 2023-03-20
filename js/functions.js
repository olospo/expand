
$( document ).ready(function() {
  $(".mobile_menu").click(function() {
    $('nav.mobile').fadeToggle();
    $('header').toggleClass("open");
    $(this).toggleClass("open");
  });
  
  $(".search_icon").click(function() {
    $('.search_form').fadeToggle();
    $('#menu-main-menu').fadeToggle();
  });
  
  $(".filter").click(function() {
    $('ul.cat_filter').fadeToggle();
    $('ul.tec_filter').fadeToggle();
    $(this).toggleClass("open");
  });
  
  $(".filter_details").click(function() {
    $('.details').fadeToggle();
    $(this).toggleClass("open");
  });
  
  // Check if video is ready to play
  $("video").on('canplay', function () {
    $(".work_item").mouseenter(function () {
        $(this).find(".video").get(0).play();
    }).mouseleave(function () {
        $(this).find(".video").get(0).pause();
    })
  });
  
  // Back to Top Scroll 
  var amountScrolled = 300;
  
  $(window).scroll(function() {
	  if ( $(window).scrollTop() > amountScrolled ) {
		  $('a.back_to_top').fadeIn();
	  } else {
		  $('a.back_to_top').fadeOut('fast');
	  }
  });
  
  $('a.back_to_top').click(function() {
	  $('html, body').animate({
		  scrollTop: 0
	  }, 300);
	  return false;
  });
  
  // Stats Scrolling
  var triggerAtY = $('.stat_block').top - $(window).outerHeight();
  
  $(window).scroll(function(event) {
    // #target not yet in view
    if (triggerAtY > $(window).scrollTop()) {
        return;
    }
    
    $('.count').each(function () {
      $(this).prop('Counter',0).delay(0).animate({
          Counter: $(this).text()
      }, {
          duration: 3000,
          easing: 'swing',
          step: function() {
            $(this).text(Math.floor(this.Counter).toLocaleString());
          },
          complete: function() {
            $(this).text(Math.floor(this.Counter).toLocaleString());
          }
      });
    });
    
    // remove this event handler
    $(this).off(event);
  })
  var counter = 0;

});
  
// SVG as Images
$(function(){
  activate('img[src*=".svg"]');
  function activate(string){
    jQuery(string).each(function(){
      var $img = jQuery(this);
      var imgID = $img.attr('id');
      var imgClass = $img.attr('class');
      var imgURL = $img.attr('src');
        jQuery.get(imgURL, function(data) {
        // Get the SVG tag, ignore the rest
        var $svg = jQuery(data).find('svg');
        
        // Add replaced image's ID to the new SVG
        if(typeof imgID !== 'undefined') {
          $svg = $svg.attr('id', imgID);
        }
        // Add replaced image's classes to the new SVG
        if(typeof imgClass !== 'undefined') {
          $svg = $svg.attr('class', imgClass+' replaced-svg');
        }
        // Remove any invalid XML tags as per http://validator.w3.org
        $svg = $svg.removeAttr('xmlns:a');

        // Replace image with new SVG
        $img.replaceWith($svg);

      }, 'xml');
    });
  }
});

// ------------------------------------------------------------
// Animation Javascript
// ------------------------------------------------------------
var componentVisible = (function ($) {
  var $components = $('header, section, .step, article, .full_image, .content_block, .square_image, .full_video, .stat_block');

  var componentsWaypoints = $components.waypoint({
    handler: function() {
      $(this.element).addClass("visible");
    },
    offset: '90%'
  });

})(jQuery);