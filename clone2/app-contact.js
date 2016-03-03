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
		for (var i = 127; i < 257; i++) {
			$.ajax({
				url: '/wp-content/themes/snappy-child/clone2/getcontact.php',
				type: 'POST',
				data: {
					cat: i
				 },
				cache: false,
				success: function( html) {
					$('#list-url').append(html);
				}
			});
			console.log(i);
		}
	});

	$('#clear-list').click(function(event) {
		$('#list-url').empty();
	});

});