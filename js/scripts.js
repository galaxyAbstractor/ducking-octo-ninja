window.addEventListener('popstate', function(event) {
	$("#content").load(location.pathname+" #content", function(){
		$(this).children(':first').unwrap();
	});

	bindLinks();
	CKEDITOR.replace( 'ckeditor' )
});

$(document).ready(function() {

	bindLinks();
});

function changePage(page){
	$("#content").load(page+" #content", function(){
		$(this).children(':first').unwrap();
		bindLinks();
		CKEDITOR.replace( 'ckeditor' )
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