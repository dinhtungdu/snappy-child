jQuery(function($){

	var form = $('#ajaxform');
	$(form).submit(function(event) {
	    // Stop the browser from submitting the form.
	    event.preventDefault();

	    // TODO
	    var formData = $(form).serialize();
	    $.ajax({
		    type: 'POST',
		    url: $(form).attr('action'),
		})
	    $('#loading').html('<img width="30" src="/wp-content/themes/snappy-child/clone2/loading.gif" />');
		$.ajax({
			type: "POST",
		    url: $(form).attr('action'),
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
		var _year = $( "#cat_list option:selected" ).val();
		$('#list-url li a').each(function(i, elem) {
			var _url = $(elem).attr('href');	
			setTimeout( function () {
				$.ajax({
					url: '/wp-content/themes/snappy-child/clone2/clone-vanban.php',
					type: 'POST',
					data: {
						url: _url,
						year: _year
					 },
					cache: false,
					success: function( html) {
						$(elem).append( html );
						$('.info').html(i);
					}
				});
			}, i * 5000);
		});
	});

	$('#clear-list').click(function(event) {
		$('#list-url').empty();
	});

});