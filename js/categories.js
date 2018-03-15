
function return_total_categories(categories) {
	var total_string = '';
	for (var i=0;i<categories.length;i++) {
		var start = i * 3;
		var end = Math.min((i+1)*3,categories.length);
		total_string += '<div class="row">';
		for (var j = start; j < end; j++){		
			total_string += '<div class="col">'+
						        '<div class="card mb-4 box-shadow">'+
						          '<a onclick="searchItems(\'default\',\''+categories[j][0]+'\')" href="#"><img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="images/'+categories[j][1]+'" data-holder-rendered="true"></a>'+
						          '<strong class="d-inline-block mb-2 text-danger align-center">'+categories[j][0]+'</strong>'+
						          '<div class="card-body">'+
						           '<p class="card-text">'+categories[j][2]+'</p>'+
						           '<div class="d-flex justify-content-between align-items-center">'+
						            '</div>'+
						          '</div>'+
						        '</div>'+
						      '</div>';
		}
		total_string += "</div>";
	}
	return total_string;
}