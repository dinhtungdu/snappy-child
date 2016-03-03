/**
 * jQuery.marquee - scrolling text like old marquee element
 * @author Aamir Afridi - aamirafridi(at)gmail(dot)com / http://aamirafridi.com/jquery/jquery-marquee-plugin
 */
;(function(d){d.fn.marquee=function(w){return this.each(function(){var a=d.extend({},d.fn.marquee.defaults,w),b=d(this),c,k,p,q,h,l=3,x="animation-play-state",e=!1,B=function(a,b,c){for(var d=["webkit","moz","MS","o",""],e=0;e<d.length;e++)d[e]||(b=b.toLowerCase()),a.addEventListener(d[e]+b,c,!1)},E=function(a){var b=[],c;for(c in a)a.hasOwnProperty(c)&&b.push(c+":"+a[c]);b.push();return"{"+b.join(",")+"}"},g={pause:function(){e&&a.allowCss3Support?c.css(x,"paused"):d.fn.pause&&c.pause();b.data("runningStatus",
"paused");b.trigger("paused")},resume:function(){e&&a.allowCss3Support?c.css(x,"running"):d.fn.resume&&c.resume();b.data("runningStatus","resumed");b.trigger("resumed")},toggle:function(){g["resumed"==b.data("runningStatus")?"pause":"resume"]()},destroy:function(){clearTimeout(b.timer);b.css("visibility","hidden").html(b.find(".js-marquee:first"));setTimeout(function(){b.css("visibility","visible")},0)}};if("string"===typeof w)d.isFunction(g[w])&&(c||(c=b.find(".js-marquee-wrapper")),!0===b.data("css3AnimationIsSupported")&&
(e=!0),g[w]());else{var r;d.each(a,function(c,d){r=b.attr("data-"+c);if("undefined"!==typeof r){switch(r){case "true":r=!0;break;case "false":r=!1}a[c]=r}});a.duration=a.speed||a.duration;q="up"==a.direction||"down"==a.direction;a.gap=a.duplicated?a.gap:0;b.wrapInner('<div class="js-marquee"></div>');var f=b.find(".js-marquee").css({"margin-right":a.gap,"float":"left"});a.duplicated&&f.clone(!0).appendTo(b);b.wrapInner('<div style="width:100000px" class="js-marquee-wrapper"></div>');c=b.find(".js-marquee-wrapper");
if(q){var m=b.height();c.removeAttr("style");b.height(m);b.find(".js-marquee").css({"float":"none","margin-bottom":a.gap,"margin-right":0});a.duplicated&&b.find(".js-marquee:last").css({"margin-bottom":0});var s=b.find(".js-marquee:first").height()+a.gap;a.duration*=(parseInt(s,10)+parseInt(m,10))/parseInt(m,10)}else h=b.find(".js-marquee:first").width()+a.gap,k=b.width(),a.duration*=(parseInt(h,10)+parseInt(k,10))/parseInt(k,10);a.duplicated&&(a.duration/=2);if(a.allowCss3Support){var f=document.body||
document.createElement("div"),n="marqueeAnimation-"+Math.floor(1E7*Math.random()),z=["Webkit","Moz","O","ms","Khtml"],A="animation",t="",u="";f.style.animation&&(u="@keyframes "+n+" ",e=!0);if(!1===e)for(var y=0;y<z.length;y++)if(void 0!==f.style[z[y]+"AnimationName"]){f="-"+z[y].toLowerCase()+"-";A=f+A;x=f+x;u="@"+f+"keyframes "+n+" ";e=!0;break}e&&(t=n+" "+a.duration/1E3+"s "+a.delayBeforeStart/1E3+"s infinite "+a.css3easing,b.data("css3AnimationIsSupported",!0))}var C=function(){c.css("margin-top",
"up"==a.direction?m+"px":"-"+s+"px")},D=function(){c.css("margin-left","left"==a.direction?k+"px":"-"+h+"px")};a.duplicated?(q?c.css("margin-top","up"==a.direction?m:"-"+(2*s-a.gap)+"px"):c.css("margin-left","left"==a.direction?k+"px":"-"+(2*h-a.gap)+"px"),l=1):q?C():D();var v=function(){a.duplicated&&(1===l?(a._originalDuration=a.duration,a.duration=q?"up"==a.direction?a.duration+m/(s/a.duration):2*a.duration:"left"==a.direction?a.duration+k/(h/a.duration):2*a.duration,t&&(t=n+" "+a.duration/1E3+
"s "+a.delayBeforeStart/1E3+"s "+a.css3easing),l++):2===l&&(a.duration=a._originalDuration,t&&(n+="0",u=d.trim(u)+"0 ",t=n+" "+a.duration/1E3+"s 0s infinite "+a.css3easing),l++));q?a.duplicated?(2<l&&c.css("margin-top","up"==a.direction?0:"-"+s+"px"),p={"margin-top":"up"==a.direction?"-"+s+"px":0}):(C(),p={"margin-top":"up"==a.direction?"-"+c.height()+"px":m+"px"}):a.duplicated?(2<l&&c.css("margin-left","left"==a.direction?0:"-"+h+"px"),p={"margin-left":"left"==a.direction?"-"+h+"px":0}):(D(),p={"margin-left":"left"==
a.direction?"-"+h+"px":k+"px"});b.trigger("beforeStarting");if(e){c.css(A,t);var f=u+" { 100%  "+E(p)+"}",g=d("style");0!==g.length?g.filter(":last").append(f):d("head").append("<style>"+f+"</style>");B(c[0],"AnimationIteration",function(){b.trigger("finished")});B(c[0],"AnimationEnd",function(){v();b.trigger("finished")})}else c.animate(p,a.duration,a.easing,function(){b.trigger("finished");a.pauseOnCycle?b.timer=setTimeout(v,a.delayBeforeStart):v()});b.data("runningStatus","resumed")};b.bind("pause",
g.pause);b.bind("resume",g.resume);a.pauseOnHover&&b.bind("mouseenter mouseleave",g.toggle);e&&a.allowCss3Support?v():b.timer=setTimeout(v,a.delayBeforeStart)}})};d.fn.marquee.defaults={allowCss3Support:!0,css3easing:"linear",easing:"linear",delayBeforeStart:1E3,direction:"left",duplicated:!1,duration:5E3,gap:20,pauseOnCycle:!1,pauseOnHover:!1}})(jQuery);
jQuery( function($) {
  var brw = $(window).width();
  $(document).ready(function() {
  	var video_offset = $('.big-video').offset();
    $('.main-slide').slick({
    	arrows: false,
    	autoplay: true,
    	autoplaySpeed: 3000,
		asNavFor: '.slide-thumb',
		// dots: true
    });
    $('.slide-thumb').slick({
    	autoplaySpeed: 3000,
    	slidesToShow: 7,
		slidesToScroll: 1,
		asNavFor: '.main-slide',
		centerMode: true,
  		focusOnSelect: true,
  		arrows: false,
    });
  });

  $('.small-videos .item').click(function(event) {
  	var _video_id = $(this).attr('data-id');
    $('.big-video').html('<iframe width="600" height="320" src="https://www.youtube.com/embed/'+ _video_id +'?autoplay=1" frameborder="0" allowfullscreen></iframe>');
    $('html, body').animate({
    	scrollTop: ( video_offset.top - 50 )
    	}, 700 );
  });

  $(window).load(function() {
  	video_offset = $('.big-video').offset();
    var video_id = $('.small-videos .item:first-child').attr('data-id');
    $('.big-video').html('<iframe width="600" height="320" src="https://www.youtube.com/embed/'+ video_id +'" frameborder="0" allowfullscreen></iframe>');
  });

  //Ajax get Van ban
  var form = $('.form-vanban');
  var $content = $('.table-content')
  $(form).submit(function(event) {
    // Stop the browser from submitting the form.
    event.preventDefault();
    var formData = $(form).serialize();
    formData = formData + '&action=get_vanban';
    jQuery.ajax({
        type : 'post',
        url : ajaxurl,
        data : formData,
        beforeSend: function() {
            $content.addClass('loading');
        },
        success : function( response ) {
            $content.removeClass('loading');
            $content.html( response );
        }
    });
    
    return false;
  });

  // Ajax get Danh ba 
  var db_form = $('.form-danhba');
  var $dbcontent = $('.table-content');
  $(db_form).submit( function(event) {
    event.preventDefault();
    var db_formData = $(db_form).serialize();
    db_formData = db_formData + '&action=get_danhba';
    $.ajax({
        type: 'post',
        url: ajaxurl,
        data: db_formData,
        beforeSend: function() {
            $dbcontent.addClass('loading');
        },
        success: function( response ) {
            $dbcontent.removeClass('loading');
            $dbcontent.html(response);
        }
    });
    return false;
  });
  // Add jquery marquee to widget
  $('.widget_recent_post_marquee ul').marquee({
    duration: 10000,
    gap: 10,
    direction: 'up',
    duplicated: true,
    pauseOnHover: true
  });

  $('.chat-button').click(function(event) {
    $('#sbzoff_frame').contents().find('#button_compress').click();
    $('#sbzon_frame').contents().find('.button_chat_online').click();
  });

  var logobak = $('.logo img').attr('src');
  if( brw < 860 ) {
    $('.logo img').attr('src', 'http://sovhtt.vietmoz.info/wp-content/themes/snappy-child/img/logo-mobile.png');
  }
  $(window).resize(function(event) {
    if( brw < 860 ) {
      $('.logo img').attr('src', 'http://sovhtt.vietmoz.info/wp-content/themes/snappy-child/img/logo-mobile.png');
    } else {
      $('.logo img').attr('src', logobak );
    }
  });
  
});
