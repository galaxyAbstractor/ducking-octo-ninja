window.addEventListener('popstate', function(event) {
	$("#innercontent").load(location.pathname+" #innercontent");
	bindLinks();

});

$(document).ready(function() {

	bindLinks();
});

function changePage(page){
	$("#innercontent").load(page+" #innercontent", function(){
		bindLinks();
	});
	history.pushState(null, null, page);
}

function bindLinks(){
	$('a').unbind("click");
	$('a').click(function(e) {

		// prevent the default action when a nav button link is clicked
		e.preventDefault();
		$href = $(this).attr('href');

		changePage($href);
		

	});
}