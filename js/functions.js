
$( document ).ready(function() {
  $(".mobile_menu").click(function() {
    $('nav.mobile').fadeToggle();
    $('header').toggleClass("open");
    $(this).toggleClass("open");
  });
  
  $(".search_icon").click(function() {
    $('.search_form').fadeToggle();
    $('#menu-main').fadeToggle();
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

$(document).ready(function() {
  $(".split_title").lettering('words');
});

// Tabs
function openTab(evt, tabName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("tab");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}
  
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
  var $components = $('header, section, .step, article, .full_image, .content_block, .square_image, .full_video, .stat_block, .stat');

  var componentsWaypoints = $components.waypoint({
    handler: function() {
      $(this.element).addClass("visible");
    },
    offset: '90%'
  });

})(jQuery);

// Map Markers
$(document).ready(function() {
  // Create a function to handle the common logic
  function setActiveMarker(target, targetType) {
    // Get the target ID based on the targetType
    const targetID = targetType === 'office' ? target.attr('id') : target.data('target');

    // Remove the 'active' class from all .office elements and .map-marker elements
    $('.office').removeClass('active');
    $('.map-marker').removeClass('active');

    // Get the office and map-marker elements with the matching ID
    const targetOffice = $(`.office[id="${targetID}"]`);
    const targetMapMarker = $(`.map-marker[id="${targetID}"]`);

    // Add the 'active' class to the target elements
    targetOffice.addClass('active');
    targetMapMarker.addClass('active');
  }

  // Bind the click and hover events for .map-marker
  $('.map-marker').on('click mouseenter', function(e) {
    if (e.type === 'click') {
      e.preventDefault();
    }
    setActiveMarker($(this), 'map-marker');
  });

  // Bind the click and hover events for .office
  $('.office').on('click mouseenter', function() {
    setActiveMarker($(this), 'office');
  });
});


// Stats Scrolling
function formatNumber(number) {
  const fixed = number.toFixed(2);
  return parseFloat(fixed) === parseInt(fixed) ? parseInt(fixed) : fixed;
}

var triggerAtY = $('.stat_section').offset().top - $(window).outerHeight();

$(window).scroll(function(event) {
  // #target not yet in view
  if (triggerAtY > $(window).scrollTop()) {
    return;
  }

  $('.unit').each(function () {
    const prefix = $(this).data('prefix') || ''; // Get the prefix from the data attribute
    const postfix = $(this).data('postfix') || ''; // Get the postfix from the data attribute
    $(this).prop('Counter', 0).delay(0).animate({
        Counter: $(this).text()
    }, {
        duration: 3000,
        easing: 'swing',
        step: function() {
          // Add the prefix and postfix during the count
          $(this).text(prefix + Math.round(this.Counter).toLocaleString() + postfix);
        },
        complete: function() {
          // Add the prefix and postfix after the count
          $(this).text(prefix + formatNumber(parseFloat(this.Counter)).toLocaleString() + postfix);
        }
    });
    $('.fade_in').fadeIn(500).delay(100);
  });

  // remove this event handler
  $(this).off(event);
})
var counter = 0;