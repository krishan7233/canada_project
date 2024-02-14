
// <!-- owl-carousel java script for Testimonial-->
    
$('.client-feedback-left').owlCarousel({
  loop: true,
  margin: 15,
  autoplay: true,
  nav: false,
  dots: true,
  responsive: {
      0: {
          items: 1
      },
      767: {
          items: 1
      },
      992: {
          items: 1
      },
      1200: {
          items: 1
      }
  }
})

var owl = $('.client-feedback-left');
owl.owlCarousel();
// Go to the next item
$('.customnextbtn').on(function() {
      owl.trigger('next.owl.carousel');
  })
  // Go to the previous item
$('.customprevbtn').on(function() {
  // With optional speed parameter
  // Parameters has to be in square bracket '[]'
  owl.trigger('prev.owl.carousel', [300]);
})
    
$('.client-feedback-full').owlCarousel({
  loop: true,
  margin: 15,
  autoplay: true,
  nav: false,
  dots: true,
  responsive: {
    0: {
    items: 1
    },
    767: {
        items: 1
    },
    992: {
        items: 2
    },
    1200: {
      items: 3
    }
  }
})

var owl = $('.client-feedback-full');
owl.owlCarousel();
// Go to the next item
$('.customnextbtn').on(function() {
      owl.trigger('next.owl.carousel');
  })
  // Go to the previous item
$('.customprevbtn').on(function() {
  // With optional speed parameter
  // Parameters has to be in square bracket '[]'
  owl.trigger('prev.owl.carousel', [300]);
})


    
$('.videos').owlCarousel({
  loop: true,
  margin: 0,
  autoplay: true,
  nav: false,
  dots: true,
  responsive: {
    0: {
    items: 1
    },
    767: {
        items: 1
    },
    992: {
        items: 1
    },
    1200: {
      items: 1
    }
  }
})

var owl = $('.videos');
owl.owlCarousel();
// Go to the next item
$('.customnextbtn').on(function() {
      owl.trigger('next.owl.carousel');
  })
  // Go to the previous item
$('.customprevbtn').on(function() {
  // With optional speed parameter
  // Parameters has to be in square bracket '[]'
  owl.trigger('prev.owl.carousel', [300]);
})



// <!-- owl-carousel java script for Case - Final Product-->
    
$('.final-product').owlCarousel({
  loop: true,
  margin: 15,
  autoplay: true,
  nav: false,
  dots: true,
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

var owl = $('.final-product');
owl.owlCarousel();
// Go to the next item
$('.customnextbtn').on(function() {
      owl.trigger('next.owl.carousel');
  })
  // Go to the previous item
$('.customprevbtn').on(function() {
  // With optional speed parameter
  // Parameters has to be in square bracket '[]'
  owl.trigger('prev.owl.carousel', [300]);
})


/* Script for Navbar color change */

$(window) .scroll(function(){
  $('nav').toggleClass('scrolled', $(this).scrollTop() > 100);
  $('div.dropdown-menu').toggleClass('dropdownscrolled', $(this).scrollTop() > 100);
  
 });




/* Script for dropdown menu on hover*/
const $dropdown = $(".dropdown");
const $dropdownToggle = $(".dropdown-toggle");
const $dropdownMenu = $(".dropdown-menu");
const showClass = "show";

$(window).on("load resize", function() {
  if (this.matchMedia("(min-width: 768px)").matches) {
    $dropdown.hover(
      function() {
        const $this = $(this);
        $this.addClass(showClass);
        $this.find($dropdownToggle).attr("aria-expanded", "true");
        $this.find($dropdownMenu).addClass(showClass);
      },
      function() {
        const $this = $(this);
        $this.removeClass(showClass);
        $this.find($dropdownToggle).attr("aria-expanded", "false");
        $this.find($dropdownMenu).removeClass(showClass);
      }
    );
  } else {
    $dropdown.off("mouseenter mouseleave");
  }
});


/* Script for Hero image Swiper slider  */

var swiper = new Swiper('.swiper-container', {
  speed: 2000,
  loop: true,
  parallax: true,
  effect: 'fade',
  pagination: {
    
    clickable: true,
    type: 'fraction',
  },
  
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
 
});

/* AOS  */
AOS.init({
  duration:1000,
});

