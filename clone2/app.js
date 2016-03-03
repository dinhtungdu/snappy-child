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
		var _cat = $( "#cat_list option:selected" ).val();
		$('#list-url li a').each(function(i, elem) {
			var _url = $(elem).attr('href');	
			var _img = $(elem).attr('data-img');
			setTimeout( function () {
				$.ajax({
					url: '/wp-content/themes/snappy-child/clone2/clone.php',
					type: 'POST',
					data: {
						url: _url,
						img: _img,
						cat: _cat
					 },
					cache: false,
					success: function( html) {
						$(elem).append( html );
						$('.info').html(i);
					}
				});
			}, i * 6000);
		});
	});

	$('#clone-comment').click(function() {
		$('#list-url li').each(function(i, elem) {
			var _id = $(elem).attr('data-id');
			setTimeout( function () {
				$.ajax({
					url: '/wp-content/themes/snappy-child/clone2/clone-cmt.php',
					type: 'POST',
					data: {
						id: _id
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

	$('#clone-url').click(function() {
		$('#list-url li').each(function(i, elem) {
			var _id = $(elem).attr('data-id');	
			var _catid = $(elem).attr('data-catid');
			var _alias = $(elem).attr('data-alias');
			setTimeout( function () {
				$.ajax({
					url: '/wp-content/themes/snappy-child/clone2/clone-url.php',
					type: 'POST',
					data: {
						id: _id,
						catid: _catid,
						alias: _alias
					 },
					cache: false,
					success: function( html) {
						$(elem).append( html );
						$('.info').html(i);
					}
				});
			}, i * 1000);
		});
	});

	$('#clear-list').click(function(event) {
		$('#list-url').empty();
	});

});