jQuery( function($) {
  $(document).ready(function() {
    $(".owl-1").owlCarousel({
      loop: true,
      items: 1,
      // nav: true,
      autoplay: true,
      autoplayHoverPause: true,
      dotsEach: true,
      smartSpeed: 500
    });
  });

  $(window).load(function() {
      
    $('#secondary').masonry({
      itemSelector: '.widget',
      columnWidth: '.grid-sizer',
      gutter: '.gutter-sizer',
      percentPosition: true
    });
  });
});