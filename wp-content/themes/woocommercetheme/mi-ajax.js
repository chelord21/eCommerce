

function showResult(str) {
	$ = jQuery;

	 var data = {
	 	action: "my_search",
	 	q: str,
	 };


	 $.ajax ({
	 	url: ajaxurl,
	 	data: data,
	 	dataType: 'json',
	 	success : function(response) {
	 		$("#livesearch").empty("");
	 		for (var i = 0; i < response.length; i++) {
	 			var html = "<li class='product'><a href='" + response[i].permalink + "'>" + "<img width='300' height='300' src='"+ response[i].img_url[0] +"' class=''> <h3>" + response[i].title + "</h3></li>";
	 			$("#livesearch").append(html);
	 		};
	 	}

	 });
}