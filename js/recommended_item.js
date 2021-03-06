function return_recommended_items(recommended_items) {
	var total_string = '';
	for (var i=0;i<recommended_items.length;i++) {
		var start = i * 3;
		var end = Math.min((i+1)*3,recommended_items.length);
		total_string += '<div class="row">';
		for (var j = start; j < end; j++){		
			total_string += '<div class="col-md-4">' +
						        '<div class="card mb-4 box-shadow">' +
						          '<img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="images/'+recommended_items[j][7]+'" data-holder-rendered="true">'+
						          '<strong class="d-inline-block mb-2 text-danger align-center">'+recommended_items[j][2]+'</strong>'+
						          '<div class="card-body">'+
						            '<a class="d-inline-block mb-2 text-dark" href="#">'+
						           
						            '<b>'+
						          	recommended_items[j][1]+'</b><h3 class="mb-0">$'+recommended_items[j][3]+'</h3><div class="mb-1 text-muted strike">$'+recommended_items[j][4]+'</div></a>'+
						            '<p class="card-text">Beautiful long mirror can stand elegantly in any dressing room.</p>'+
						            '<div class="d-flex justify-content-between align-items-center">'+
						              '<small class="text-muted">Ending on '+recommended_items[j][5]+'</small>'+
						            '</div>'+
						          '</div>'+
						        '</div>'+
					      	'</div>';
		}
		total_string += "</div>";
	}
	return total_string;
}