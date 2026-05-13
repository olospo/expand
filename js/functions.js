$(document).ready(function() {
  initSlickSlider();
  initMobileMenu();
  initSearchToggle();
  initSplitTitles();
  initAnimatedIcons();
  initSpeculativeFormReveal();
  initBackToTop();
  initCountStats();
  initMapMarkers();
  initMobileSubMenus();
  initSvgReplacement();
  initScrollAnimations();
  initUnitStats();
});

function initSlickSlider() {
  if ($.fn.slick && $('.slider').length) {
    $('.slider').slick({
      dots: true,
      arrows: false,
      infinite: true,
      speed: 2000,
      fade: true,
      autoplay: true,
      cssEase: 'linear'
    });
  }
}

function initMobileMenu() {
  $(".mobile_menu").click(function() {
    $('nav.mobile').fadeToggle();
    $('header').toggleClass("open");
    $(this).toggleClass("open");
  });
}

function initSearchToggle() {
  $(".search_icon").click(function() {
    $('.search_form').fadeToggle();
    $('#menu-main').fadeToggle();
  });
}

function initSplitTitles() {
  if ($.fn.lettering && $('.split_title').length) {
    $(".split_title").lettering('words');
  }
}

function initAnimatedIcons() {
  $('article.tab').hover(
    function() {
      var iconImage = $(this).find('#iconImage');
      var gifSrc = iconImage.data('gifsrc');

      if (gifSrc) {
        iconImage.attr('src', gifSrc);
      }
    },
    function() {
      var iconImage = $(this).find('#iconImage');
      var staticSrc = iconImage.data('staticsrc');

      if (staticSrc) {
        iconImage.attr('src', staticSrc);
      }
    }
  );
}

function initSpeculativeFormReveal() {
  var isOpen = false;

  $('.button.extra').click(function(event) {
    event.preventDefault();

    var targetID = $(this).data('target');

    if (targetID) {
      $('#' + targetID).fadeToggle(500);
    }
  });

  $('.trigger').click(function(event) {
    event.preventDefault();

    var $speculative = $('#speculative');

    if (!$speculative.length) {
      return;
    }

    if (!isOpen) {
      $speculative.css({
        height: 'auto',
        display: 'block'
      });

      var sectionHeight = $speculative.outerHeight(true);

      $speculative.css('height', '0');

      $('html, body').animate({
        scrollTop: $speculative.offset().top
      }, 700, 'swing');

      $speculative.animate({
        height: sectionHeight + 'px'
      }, 700, 'swing', function() {
        isOpen = true;
      });

      $('.button').addClass('open');
    } else {
      setTimeout(function() {
        $speculative.animate({
          height: '0px'
        }, 700, 'swing', function() {
          $speculative.css('display', 'none');
          isOpen = false;
        });
      }, 150);

      $('.button').removeClass('open');
    }
  });
}

function initBackToTop() {
  var amountScrolled = 300;
  var $backToTop = $('a.back_to_top');

  if (!$backToTop.length) {
    return;
  }

  $(window).scroll(function() {
    if ($(window).scrollTop() > amountScrolled) {
      $backToTop.fadeIn();
    } else {
      $backToTop.fadeOut('fast');
    }
  });

  $backToTop.click(function() {
    $('html, body').animate({
      scrollTop: 0
    }, 300);

    return false;
  });
}

function initCountStats() {
  var $statBlock = $('.stat_block');

  if (!$statBlock.length) {
    return;
  }

  var statBlockTriggerAtY = $statBlock.offset().top - $(window).outerHeight();

  $(window).scroll(function(event) {
    if (statBlockTriggerAtY > $(window).scrollTop()) {
      return;
    }

    $('.count').each(function() {
      $(this).prop('Counter', 0).delay(0).animate({
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

    $(this).off(event);
  });
}

function initMapMarkers() {
  function setActiveMarker(target, targetType) {
    var targetID = targetType === 'office' ? target.attr('id') : target.data('target');

    if (!targetID) {
      return;
    }

    $('.office, .map-marker, .office_image').removeClass('active');

    $('.office[id="' + targetID + '"]').addClass('active');
    $('.map-marker[id="' + targetID + '"]').addClass('active');
    $('.office_image[id="' + targetID + '"]').addClass('active');
  }

  $('.map-marker').on('click mouseenter', function(event) {
    if (event.type === 'click') {
      event.preventDefault();
    }

    setActiveMarker($(this), 'map-marker');
  });

  $('.office').on('click', function() {
    setActiveMarker($(this), 'office');
  });

  $('.office_image').on('click', function() {
    setActiveMarker($(this), 'office');
  });
}

function initMobileSubMenus() {
  var $parentLinks = $("li.menu-item-has-children > a");

  if (!$parentLinks.length) {
    return;
  }

  $parentLinks.after("<div class='sub-toggle'></div>");

  $(".sub-toggle").click(function() {
    $(this).siblings('ul').toggle();
    $(this).toggleClass("open");
  });
}

function initSvgReplacement() {
  $('img[src*=".svg"]').each(function() {
    var $img = jQuery(this);
    var imgID = $img.attr('id');
    var imgClass = $img.attr('class');
    var imgURL = $img.attr('src');

    jQuery.get(imgURL, function(data) {
      var $svg = jQuery(data).find('svg');

      if (!$svg.length) {
        return;
      }

      if (typeof imgID !== 'undefined') {
        $svg = $svg.attr('id', imgID);
      }

      if (typeof imgClass !== 'undefined') {
        $svg = $svg.attr('class', imgClass + ' replaced-svg');
      }

      $svg = $svg.removeAttr('xmlns:a');
      $img.replaceWith($svg);
    }, 'xml');
  });
}


function initScrollAnimations() {
  if (!$.fn.waypoint) {
    return;
  }

  var $components = $('header, footer, section, .step, article, .full_image, .content_block, .square_image, .full_video, .stat_block, .stat, section.product_section .product');

  $components.waypoint({
    handler: function() {
      $(this.element).addClass("visible");
    },
    offset: '90%'
  });
}

function initUnitStats() {
  var $statSection = $('.stat_section');

  if (!$statSection.length) {
    return;
  }

  var triggerAtY = $statSection.offset().top - $(window).outerHeight();

  function formatNumber(number) {
    var fixed = number.toFixed(2);
    return parseFloat(fixed) === parseInt(fixed) ? parseInt(fixed) : fixed;
  }

  function startCounter() {
    $('.unit').each(function() {
      var $unit = $(this);
      var prefix = $unit.data('prefix') || '';
      var postfix = $unit.data('postfix') || '';

      $unit.prop('Counter', 0).delay(0).animate({
        Counter: $unit.text()
      }, {
        duration: 3000,
        easing: 'swing',
        step: function() {
          $unit.text(prefix + Math.round(this.Counter).toLocaleString() + postfix);
        },
        complete: function() {
          $unit.text(prefix + formatNumber(parseFloat(this.Counter)).toLocaleString() + postfix);
        }
      });

      $('.fade_in').fadeIn(500).delay(100);
    });
  }

  function checkInView() {
    if (triggerAtY <= $(window).scrollTop()) {
      startCounter();
      $(window).off('scroll', checkInView);
    }
  }

  $(window).on('scroll', checkInView);
  checkInView();
}

// Tabs
function openTab(evt, tabName) {
  var i;
  var tabs = document.getElementsByClassName("tab");
  var tablinks = document.getElementsByClassName("tablink");
  var targetTab = document.getElementById(tabName);

  for (i = 0; i < tabs.length; i++) {
    tabs[i].style.display = "none";
  }

  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  if (targetTab) {
    targetTab.style.display = "block";
  }

  if (evt && evt.currentTarget) {
    evt.currentTarget.className += " active";
  }
}