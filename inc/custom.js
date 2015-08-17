jQuery( function($) {
  $(document).ready(function() {
    var screen_w = $(window).width();
    // $(".owl-1").owlCarousel({
    //   loop: true,
    //   items: 1,
    //   // nav: true,
    //   autoplay: true,
    //   autoplayHoverPause: true,
    //   dotsEach: true,
    //   smartSpeed: 500
    // });
  
    $('.item .products').find('li.last').each(function(index, el) {
      if( index % 2 == 0 ) {
        $(this).after('<div class="border"></div>');
      }
    });
    
    if( screen_w < 600 ) {
      $('.archive.woocommerce .products').find('li:nth-child(3n)').after('<div class="border"></div>');
    }
    else {
      $('.archive.woocommerce .products').find('li:nth-child(4n)').after('<div class="border"></div>');
    }
  });

  $(window).resize(function(event) {
    $('.archive .border').remove();
    if( screen_w < 600 ) {
      $('.archive.woocommerce .products').find('li:nth-child(3n)').after('<div class="border"></div>');
    }
    else {
      $('.archive.woocommerce .products').find('li:nth-child(4n)').after('<div class="border"></div>');
    }
  });

  $(window).load(function() {
    
  });
});