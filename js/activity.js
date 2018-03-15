function return_activities(bidding_activities,bided_items,
						watching_auctions_info,watching_auctions_activities,
						sold_items,sold_items_activities) {
	var total_string = '';
	if(bided_items.length>0)
		total_string += '<strong class="d-inline-block mb-1 text-danger">Bidding Activities</strong>';
	for (var i=0;i<bided_items.length;i++) {
		total_string += '<div class="media text-muted pt-3">'+
  							'<img data-src="holder.js/32x32?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="32x32" class="mr-2 rounded" style="width: 32px; height: 32px;" src="images/'+bided_items[i]["img_url"]+'" data-holder-rendered="true">'+
  							'<p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">'+
    							'<strong class="d-block text-gray-dark">'+bided_items[i]["item_description"]+'</strong>'+   
  							'</p>'+
  							'<a class="btn btn-outline-primary btn-sm" href="#" data-toggle="collapse" data-target="#bidding_demo'+i+'">View More...</a>'+
						'</div>';
		//all the bidding activities related to this item
		total_string += '<div id="bidding_demo'+i+'" class="collapse">';
		for (var j=0;j<bidding_activities.length;j++) {
			if (bidding_activities[j]["bid_item"] == bided_items[i]["bid_item"]) {
				// total_string += '<div id="bidding_demo'+i+'" class="collapse">'+
				total_string += '<div class="media text-muted pt-3 border-bottom border-gray">'+
						    '<p class="media-body pb-3 mb-0 small lh-125">'+ 
						      '<table class="table table-striped">'+
						        '<tr style="color:red">'+
						          '<th>'+
						            '<small>Bidded By</small>'+
						          '</th>'+
						          '<th>'+
						            '<small>Feeback</small>'+
						          '</th>'+
						          '<th>'+
						            '<small>Rating</small>'+
						          '</th>'+
						        '</tr>'+
						        '<tbody>'+
						          '<tr>'+
						            '<td scope="col">'+
						              '<small>'+
						                bidding_activities[j]["Fullname"]+
						                ' bidded on '+ bidding_activities[j]["bid_price"] +
						              '</small>'+
						            '</td>'+
						            '<td scope="col">'+
						              '<small>'+
						                bidding_activities[j]["feedback"]+
						              '</small>'+
						            '</td>'+
						            '<td scope="col">'+
						              '<small>'+
						                bidding_activities[j]["rating"]+
						              '</small>'+
						            '</td>'+
						          '<tr>'+
						        '</tbody>'+
						      '</table>'+
						    '</p>'+
						  '</div>';
			}
		}
		total_string += '</div>';
	}
	if (watching_auctions_info.length>0)
		total_string += '<hr/><strong class="d-inline-block mb-1 text-danger">Watching Activities</strong>';
	for (var i=0;i<watching_auctions_info.length;i++) {
		total_string += '<div class="media text-muted pt-3">'+
  							'<img data-src="holder.js/32x32?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="32x32" class="mr-2 rounded" style="width: 32px; height: 32px;" src="images/'+watching_auctions_info[i]["img_url"]+'" data-holder-rendered="true">'+
  							'<p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">'+
    							'<strong class="d-block text-gray-dark">'+watching_auctions_info[i]["item_description"]+'</strong>'+   
  							'</p>'+
  							'<a class="btn btn-outline-primary btn-sm" href="#" data-toggle="collapse" data-target="#watching_demo'+i+'">View More...</a>'+
						'</div>';
		//all the bidding activities related to this item
		total_string += '<div id="watching_demo'+i+'" class="collapse">';
		for (var j=0;j<watching_auctions_activities.length;j++) {
			if (watching_auctions_activities[j]["bid_item"] == watching_auctions_info[i]["item_id"]) {
				// total_string += '<div id="watching_demo'+i+'" class="collapse">'+
				total_string +=	'<div class="media text-muted pt-3 border-bottom border-gray">'+
						    '<p class="media-body pb-3 mb-0 small lh-125">'+ 
						      '<table class="table table-striped">'+
						        '<tr style="color:red">'+
						          '<th>'+
						            '<small>Bidded By</small>'+
						          '</th>'+
						          '<th>'+
						            '<small>Feeback</small>'+
						          '</th>'+
						          '<th>'+
						            '<small>Rating</small>'+
						          '</th>'+
						        '</tr>'+
						        '<tbody>'+
						          '<tr>'+
						            '<td scope="col">'+
						              '<small>'+
						                watching_auctions_activities[j]["Fullname"]+
						                ' bidded on '+ watching_auctions_activities[j]["bid_price"] +
						              '</small>'+
						            '</td>'+
						            '<td scope="col">'+
						              '<small>'+
						                watching_auctions_activities[j]["feedback"]+
						              '</small>'+
						            '</td>'+
						            '<td scope="col">'+
						              '<small>'+
						                watching_auctions_activities[j]["rating"]+
						              '</small>'+
						            '</td>'+
						          '<tr>'+
						        '</tbody>'+
						      '</table>'+
						    '</p>'+
						  '</div>';
			}
		}
		total_string += '</div>';
	}

	if (sold_items.length>0)
		total_string += '<hr/><strong class="d-inline-block mb-1 text-danger">Selling Activities</strong>';

	for (var i=0;i<sold_items.length;i++) {
		total_string += '<div class="media text-muted pt-3">'+
  							'<img data-src="holder.js/32x32?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="32x32" class="mr-2 rounded" style="width: 32px; height: 32px;" src="images/'+sold_items[i][7]+'" data-holder-rendered="true">'+
  							'<p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">'+
    							'<strong class="d-block text-gray-dark">'+sold_items[i]["item_description"]+'</strong>'+   
  							'</p>'+
  							'<a class="btn btn-outline-primary btn-sm" href="#" data-toggle="collapse" data-target="#selling_demo'+i+'">View More...</a>'+
						'</div>';
		//all the bidding activities related to this item
		total_string += '<div id="selling_demo'+i+'" class="collapse">';
		for (var j=0;j<sold_items_activities.length;j++) {
			if (sold_items_activities[j]["item_id"] == sold_items[i]["item_id"]) {
				// total_string += '<div id="selling_demo'+i+'" class="collapse">'+
				total_string +=	'<div class="media text-muted pt-3 border-bottom border-gray">'+
						    '<p class="media-body pb-3 mb-0 small lh-125">'+ 
						      '<table class="table table-striped">'+
						        '<tr style="color:red">'+
						          '<th>'+
						            '<small>Bidded By</small>'+
						          '</th>'+
						          '<th>'+
						            '<small>Feeback</small>'+
						          '</th>'+
						          '<th>'+
						            '<small>Rating</small>'+
						          '</th>'+
						        '</tr>'+
						        '<tbody>'+
						          '<tr>'+
						            '<td scope="col">'+
						              '<small>'+
						                sold_items_activities[j]["Fullname"]+
						                ' bidded on '+ sold_items_activities[j]["bid_price"] +
						              '</small>'+
						            '</td>'+
						            '<td scope="col">'+
						              '<small>'+
						                sold_items_activities[j]["feedback"]+
						              '</small>'+
						            '</td>'+
						            '<td scope="col">'+
						              '<small>'+
						                sold_items_activities[j]["rating"]+
						              '</small>'+
						            '</td>'+
						          '<tr>'+
						        '</tbody>'+
						      '</table>'+
						    '</p>'+
						  '</div>';
			}
		}
		total_string += '</div>';
	}

	return total_string;
}