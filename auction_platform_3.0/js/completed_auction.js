function return_completed_auctions(completed_auctions) {
	var total_string = '';
	for (var i=0;i<completed_auctions.length;i++) {
		var start = i * 3;
		var end = Math.min((i+1)*3,completed_auctions.length);
		total_string += '<div class="row">';
		for (var j = start; j < end; j++){		
			total_string += '<div class="col-md-4">'+
						      '<div class="card mb-4 box-shadow">'+
						        '<img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="images/'+completed_auctions[j]["img_url"]+'" data-holder-rendered="true">'+
						        '<strong class="d-inline-block mb-2 text-danger align-center">'+completed_auctions[j]["item_description"]+'</strong>'+
						        '<div class="card-body">'+
						          '<a class="d-inline-block mb-2 text-dark" href="#">'+
						         
						          '<b>Sold off at </b><h3 class="mb-0">$'+completed_auctions[j]["bid_price"]+'</div></a>'+
						          '<div class="d-flex justify-content-between align-items-center">'+
						          '</div>'+
						        '</div>'+
						      '</div>'+
						    '</div>';
		}
		total_string += '</div>';
	}
	return total_string;
}