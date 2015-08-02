jQuery( function($) {
  $(document).ready(function() {
    $(".owl-carousel").owlCarousel({
      loop: false,
      items: 1,
      // nav: true,
      autoplay: true,
      autoplayHoverPause: true,
      dotsEach: true,
      smartSpeed: 750
    });
  });
});