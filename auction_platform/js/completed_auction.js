function return_completed_auctions(completed_auctions) {
	var total_string = '';
	for (var i=0;i<completed_auctions.length;i++) {
		var start = i * 3;
		var end = Math.min((i+1)*3,completed_auctions.length);
		total_string += '<div class="row">';
		for (var j = start; j < end; j++){		
			total_string += '<div class="col-md-4">'+
						      '<div class="card mb-4 box-shadow">'+
						        '<img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22288%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20288%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_161b5a3c5f4%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_161b5a3c5f4%22%3E%3Crect%20width%3D%22288%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2296.828125%22%20y%3D%22118.8%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">'+
						        '<strong class="d-inline-block mb-2 text-danger align-center">'+completed_auctions[j][2]+'</strong>'+
						        '<div class="card-body">'+
						          '<a class="d-inline-block mb-2 text-dark" href="#">'+
						         
						          '<b>'+
						        	completed_auctions[j][1]+'</b><h3 class="mb-0">$'+completed_auctions[j][3]+'</h3><div class="mb-1 text-muted strike">$'+completed_auctions[j][4]+'</div></a>'+
						          '<p class="card-text">Beautiful long mirror can stand elegantly in any dressing room.</p>'+
						          '<div class="d-flex justify-content-between align-items-center">'+
						            '<small class="text-muted">Ending on '+completed_auctions[j][5]+'</small>'+
						          '</div>'+
						        '</div>'+
						      '</div>'+
						    '</div>';
		}
	}
	return total_string;
}