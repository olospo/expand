
$( document ).ready(function() {
  // Mobile Menu Toggle
  $(".mobile_menu").click(function() {
    $('nav.mobile').fadeToggle();
    $('header').toggleClass("open");
    $(this).toggleClass("open");
  });

  // Search Form Toggle
  $(".search_icon").click(function() {
    $('.search_form').fadeToggle();
    $('#menu-main').fadeToggle();
  });

  // Split Title
  $(".split_title").lettering('words');
  
  // Animate Icon
  $('article.tab').hover(
    function() {
      var iconImage = $(this).find('#iconImage');
      var gifSrc = iconImage.data('gifsrc');
      iconImage.attr('src', gifSrc);
    },
    function() {
      var iconImage = $(this).find('#iconImage');
      var staticSrc = iconImage.data('staticsrc');
      iconImage.attr('src', staticSrc);
    }
  );
  
  $('.button.extra').click(function() {
      var targetID = $(this).data('target');
      $('#' + targetID).fadeToggle(500); // Toggle the visibility
  });
  
  $(document).ready(function() {
      var isOpen = false;
  
      $('.trigger').click(function(event) {
          event.preventDefault();
  
          if (!isOpen) {
              // Opening the section
              $('#speculative').css({
                  'height': 'auto',
                  'display': 'block'
              });
  
              var sectionHeight = $('#speculative').outerHeight(true);
              $('#speculative').css('height', '0');
  
              // Start the smooth scroll to the speculative section
              $('html, body').animate({
                  scrollTop: $("#speculative").offset().top
              }, 700, 'swing');
  
              // Animate the opening of the section
              $('#speculative').animate({
                  height: sectionHeight + "px"
              }, 700, 'swing', function() {
                  isOpen = true;
              });
              
              $('.button').addClass('open'); 
              
          } else {
              // Closing the section

              // After a slight delay, animate to close the section
              setTimeout(function() {
                  $('#speculative').animate({
                      height: "0px"
                  }, 700, 'swing', function() {
                      $('#speculative').css('display', 'none');
                      isOpen = false;
                  });
              }, 150);
              
              $('.button').removeClass('open'); 
          }
      });
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
  
  // Map Markers
  
  // Create a function to handle the common logic
  function setActiveMarker(target, targetType) {
    // Get the target ID based on the targetType
    const targetID = targetType === 'office' ? target.attr('id') : target.data('target');
  
    // Remove the 'active' class from all .office, .map-marker, and .office_image elements
    $('.office').removeClass('active');
    $('.map-marker').removeClass('active');
    $('.office_image').removeClass('active');
  
    // Get the office, map-marker, and office_image elements with the matching ID
    const targetOffice = $(`.office[id="${targetID}"]`);
    const targetMapMarker = $(`.map-marker[id="${targetID}"]`);
    const targetOfficeImage = $(`.office_image[id="${targetID}"]`);
  
    // Add the 'active' class to the target elements
    targetOffice.addClass('active');
    targetMapMarker.addClass('active');
    targetOfficeImage.addClass('active');
  }
  
  // Bind the click and hover events for .map-marker
  $('.map-marker').on('click mouseenter', function(e) {
    if (e.type === 'click') {
      e.preventDefault();
    }
    setActiveMarker($(this), 'map-marker');
  });
  
  // Bind the click and hover events for .office
  $('.office').on('click', function() {
    setActiveMarker($(this), 'office');
  });
  
  // Bind the click and hover events for .office_image
  $('.office_image').on('click', function() {
    setActiveMarker($(this), 'office');
  });
  
  
  // Mobile Menu 
  $("li.menu-item-has-children > a").after("<div class='sub-toggle'></div>");
  
  $(".sub-toggle").click(function() {
    $(this).siblings('ul').toggle();
    $(this).toggleClass("open");
  });
  

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
  var $components = $('header, footer, section, .step, article, .full_image, .content_block, .square_image, .full_video, .stat_block, .stat, section.product_section .product');

  var componentsWaypoints = $components.waypoint({
    handler: function() {
      $(this.element).addClass("visible");
    },
    offset: '90%'
  });

})(jQuery);

// Stats Scrolling
function formatNumber(number) {
  const fixed = number.toFixed(2);
  return parseFloat(fixed) === parseInt(fixed) ? parseInt(fixed) : fixed;
}

function checkInView() {
  if (triggerAtY <= $(window).scrollTop()) {
    startCounter();
    $(window).off('scroll', checkInView); // Remove the scroll event handler
  }
}

function startCounter() {
  $('.unit').each(function () {
    const prefix = $(this).data('prefix') || '';
    const postfix = $(this).data('postfix') || '';
    $(this).prop('Counter', 0).delay(0).animate({
      Counter: $(this).text()
    }, {
      duration: 3000,
      easing: 'swing',
      step: function() {
        $(this).text(prefix + Math.round(this.Counter).toLocaleString() + postfix);
      },
      complete: function() {
        $(this).text(prefix + formatNumber(parseFloat(this.Counter)).toLocaleString() + postfix);
      }
    });
    $('.fade_in').fadeIn(500).delay(100);
  });
}

var triggerAtY = $('.stat_section').offset().top - $(window).outerHeight();

$(window).on('scroll', checkInView); // Add the scroll event handler
checkInView(); // Check if the section is in view on page load

var counter = 0;