/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
/* Nav Toggle */
function navToggle() {
        var x = document.getElementById("menu");
        var y = document.getElementById("menu-content");
        if (x.style.width === "100vw") {
            x.style.width = "0px";
            x.style.opacity = "0";
            y.style.opacity = "0";
            y. style.transitionDelay = "0s"
        } else {
            x.style.width = "100vw";
            x.style.opacity = "1";
            y.style.opacity = "1";
            y. style.transitionDelay = ".3s"
        }
    }

//Show/Hide Description ->homepage services
function showOverlay(x) {
    x.style.opacity = "1";
    x.style.transition = ".5s ease";
}

function hideOverlay(x) {
    x.style.opacity = "0";
    x.style.transition = "1s ease";
}

function showDes(x) {
    x.style.opacity = "1";
    x.style.transition = "1s ease";
}

function hideDes(x) {
    x.style.opacity = "0";
    x.style.transition = ".5s ease";
}

function showModes(x) {
    if (x.style.maxHeight === "600px") {
        x.style.maxHeight = "0px";
        x.style.borderWidth = "0px";
        x.style.transition = "0s ease";

    } else {
        x.style.maxHeight = "600px";
        x.style.borderWidth = "1px";
        x.style.transition = "1s ease";
    }
}

//Owl Slider ->homepage testimonials
jQuery(document).ready(function () {
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        //autoplay: true,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })
});

$(function(){
      // bind change event to select
      $('#dynamic_select').on('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    });

jQuery(document).ready(function () {
  
    $(window).scroll(function() {    
    if ($(this).scrollTop() > 50) {
        $(".abtsection").addClass("abtcolor");
    } else {
        $(".abtsection").removeClass("abtcolor");
    }
});
    
 $("#westSpringfield").hover(function(){
    $(".westspring").addClass('open').siblings().removeClass('open');
 })
    
 $(".westspring").hover(
  function (){
    $("#westSpringfield").addClass('pinhover').siblings().removeClass('pinhover');
 },
  function () {
    $("#westSpringfield").removeClass("pinhover");
  }
);
    
$("#amherst").hover(function(){
    $(".amherst").addClass('open').siblings().removeClass('open');
 })
    
 $(".amherst").hover(
  function (){
    $("#amherst").addClass('pinhover').siblings().removeClass('pinhover');
 },
  function () {
    $("#amherst").removeClass("pinhover");
  }
);
    
$("#wilbraham").hover(function(){
    $(".wilbraham").addClass('open').siblings().removeClass('open');
 })
    
 $(".wilbraham").hover(
  function (){
    $("#wilbraham").addClass('pinhover').siblings().removeClass('pinhover');
 },
  function () {
    $("#wilbraham").removeClass("pinhover");
  }
);
    
$("#franklin").hover(function(){
    $(".franklin").addClass('open').siblings().removeClass('open');
 })
    
 $(".franklin").hover(
  function (){
    $("#franklin").addClass('pinhover').siblings().removeClass('pinhover');
 },
  function () {
    $("#franklin").removeClass("pinhover");
  }
);
    
$(".location-card").hover(
  function () {
    $(this).addClass("open").siblings().removeClass('open');
  },
  function () {
    $(this).removeClass("open");
  }
);
    
});