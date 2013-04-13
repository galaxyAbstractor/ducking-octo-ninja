window.addEventListener('popstate', function(event) {
	$("#innercontent").load(location.pathname+" #innercontent");

});

$(document).ready(function() {

	$('a').click(function(e) {

		// prevent the default action when a nav button link is clicked
		e.preventDefault();
		$href = $(this).attr('href');

		$("#innercontent").load($href+" #innercontent");
		history.pushState(null, null, $href);

	});

});
