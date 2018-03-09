function return_reports_html(reports) {
	var total_string = '';
	for (var i=0;i<reports.length;i++) {
		var start = i * 2;
		var end = Math.min((i+1)*2,reports.length);
		total_string += '<div class="row mb-2">';
		for (var j = start; j < end; j++){		
			total_string += '<div class="col-md-6">'+
						        '<div class="card flex-md-row mb-4 box-shadow h-md-250">'+
						          '<div class="card-body d-flex flex-column align-items-start">'+
						            '<strong class="d-inline-block mb-2 text-primary">Auction Item #'+reports[j]["item_id"]+'</strong>'+
						            '<h3 class="mb-0">'+
						              '<a class="text-dark" href="#">'+reports[j]["item_description"]+'</a>'+
						            '</h3>'+
						            '<div class="mb-1 text-muted">'+reports[j]["item_end_date"]+'</div>'+
						            '<p class="card-text mb-auto">Num of bids: '+reports[j]["num_bids"]+'</p>'+
						            '<p class="card-text mb-auto">Num of people watching: '+reports[j]["num_watches"]+'</p>'+
						            
						          '</div>'+
						          
						        '</div>'+
						      '</div>';
		}
		total_string += "</div>";
	}
	return total_string;
}