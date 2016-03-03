jQuery(function($){

	var form = $('#ajaxform');
	$(form).submit(function(event) {
	    // Stop the browser from submitting the form.
	    event.preventDefault();

	    // TODO
	    var formData = $(form).serialize();
	    $('#loading').html('<img width="30" src="/wp-content/themes/snappy-child/clone2/loading.gif" />');
		$.ajax({
                    type: "POST",
		    url: '/wp-content/themes/snappy-child/clone2/get-gioithieu.php',
		    data: formData,
                    cache: false,
			success: function(html){
				$('#loading').empty();
				$('#list-url').html(html);
			}
		});
		return false;
	});

	$('#excute-list').click(function() {
		$('#list-url li a').each(function(i, elem) {
			var _url = $(elem).attr('href');
			setTimeout( function () {
				$.ajax({
					url: '/wp-content/themes/snappy-child/clone2/clone-gioithieu.php',
					type: 'POST',
					data: {
						url: _url,
					 },
					cache: false,
					success: function( html) {
						$(elem).append( html );
						$('.info').html(i);
					}
				});
			}, i * 2000);
		});
	});

	$('#clear-list').click(function(event) {
		$('#list-url').empty();
	});

});
