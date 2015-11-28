jQuery( function($) {
  $(document).ready(function() {
    // $(".owl-1").owlCarousel({
    //   loop: true,
    //   items: 1,
    //   // nav: true,
    //   autoplay: true,
    //   autoplayHoverPause: true,
    //   dotsEach: true,
    //   smartSpeed: 500
    // });
  });


  $(window).load(function() {
    var c_offset = $('#comments').offset();
    window.c_offset = c_offset;
  });

  var main_post = $('.single .site-main > .post');
  if( main_post ) {
    var _id = main_post.attr('id');
    if( _id ) {
      var post_id = _id.match(/\d+/);
    }
  }

  $(document).on( 'click', '.ajax-comment .comment-pagination a.page-numbers', function(event) {
    event.preventDefault();
    var link = jQuery(this);
    var page = link.attr('href');
    var patt = /comment-page-(\d+)/;
    var _regex = page.match(patt);
    var _realpage = _regex[1];
    if (_realpage !== parseInt(_realpage, 10) && _realpage < 1 ) return;

    var _content = jQuery('.ajax-comment');
    $.ajax({
        type : 'post',
        url : ajaxurl,
        data : {
            action : 'load_comments',
            c_page : _realpage,
            p_id : post_id[0]
        },
        beforeSend: function() {
            _content.addClass('loading fadeOut animated');
        },
        success : function( response ) {
            _content.removeClass('loading fadeOut');
            _content.addClass('fadeIn');
            _content.html( response );
            $('html, body').animate({
                scrollTop: window.c_offset.top - 30
            }, 500);
            return false;
        }
    });
  });
});