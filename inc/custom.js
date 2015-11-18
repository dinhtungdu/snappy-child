jQuery( function($) {
  $(document).ready(function() {
    $(".owl-1").owlCarousel({
      loop: true,
      items: 1,
      nav: true,
      dots: false,
      autoplay: true,
      autoplayHoverPause: true,
      dotsEach: true,
      navText: [ '<i class="snappycon icon-chevron-left"></i>', '<i class="snappycon icon-chevron-right"></i>'],
      smartSpeed: 750
    });
    $(".owl-2").owlCarousel({
      loop: true,
      nav: true,
      dots: false,
      autoplay: true,
      autoplayHoverPause: true,
      dotsEach: true,
      smartSpeed: 750,
      margin: 30,
      navText: [ '<i class="snappycon icon-chevron-left"></i>', '<i class="snappycon icon-chevron-right"></i>'],
      responsive : {
        0 : {
          items: 1,
        },
        500 : {
          items: 2,
        },
        700 : {
          items: 3,
        },
        800 : {
          items: 4,
        }
      },
    });
  });

  $(window).load(function() {
    
  });

  jQuery(document).on( 'click', '.ajaxpagination a.page-numbers', function() {
    var $link = jQuery(this);
    var $page = $link.attr('data-page');
    var $content = jQuery('.tthi-wrap')
    
    jQuery.ajax({
        type : 'post',
        url : ajaxurl,
        data : {
            action : 'load_post',
            page2 : $page
        },
        beforeSend: function() {
            $content.addClass('loading');
        },
        success : function( response ) {
            $content.removeClass('loading');
            $content.html( response );
        }
    });
    
    return false;
  })
});