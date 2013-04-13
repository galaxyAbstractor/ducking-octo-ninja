$(document).ready(function() {

	$('a#registerbutton').click(function(e) {

		// prevent the default action when a nav button link is clicked
		e.preventDefault();
		$href = $(this).attr('href');
		// ajax query to retrieve the HTML view without refreshing the page.
		$.ajax({
			type: 'get',
			url: $href,
			dataType: 'html',
			success: function (html) {
				// success callback -- replace the div's innerHTML with
				// the response from the server.
				$('#innercontent').html(html);
			}
		});

	});
	
});