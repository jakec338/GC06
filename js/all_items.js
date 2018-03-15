function return_selling(selling) {

	var total_string = '<table id="searched_table" class="table table-striped sorted_table">'+
 						  '<thead>'+
 						    '<tr>'+
						      '<th scope="col"></th>'+
									'<th scope="col">Item</th>'+
									'<th scope="col">Current Bid</th>'+
						      '<th scope="col">Category</th>'+
						      '<th scope="col">Starting Price</th>'+
						      '<th scope="col">Reserved Price</th>'+
						      '<th scope="col">Date Added</th>'+
						      '<th scope="col">End Date</th>'+
						    '</tr>'+
						  '</thead>'+
						  '<tbody>';

	for (var i=0;i<selling.length;i++) {
		if (selling[i]["MAX(bid_price)"]==null){
			selling[i]["MAX(bid_price)"] = 0;
		}
			total_string += '<tr>'+
						      '<td scope="row">'+(i+1)+'</td>'+
									'<td>'+selling[i]["item_description"]+'</td>'+
									'<td>$'+selling[i]["bid_price"]+'</td>'+
						      '<td class="text-danger">'+selling[i]["item_category"]+'</td>'+
						      '<td>$'+selling[i]["item_start_price"]+'</td>'+
						      '<td>$'+selling[i]["item_reserve_price"]+'</td>'+
						      '<td>'+selling[i]["item_added_date"]+'</td>'+
						      '<td>'+selling[i]["item_end_date"]+'</td>'+
						    '</tr>';
	}
	total_string += '</tbody>'+
  					'</table>';
	return total_string;
}

function return_sold(sold) {
	var total_string = '<table id="searched_table" class="table table-striped sorted_table">'+
						  '<thead>'+
						    '<tr>'+
						      '<th scope="col"></th>'+
						      '<th scope="col">Item</th>'+
						      '<th scope="col">Category</th>'+
						      '<th scope="col">Starting Price</th>'+
						      '<th scope="col">Reserved Price</th>'+
						      '<th scope="col">Date Added</th>'+
						      '<th scope="col">End Date</th>'+
						    '</tr>'+
						  '</thead>'+
						  '<tbody>';

	for (var i=0;i<sold.length;i++) {
			total_string += '<tr>'+
						      '<td scope="row">'+(i+1)+'</td>'+
						      '<td>'+sold[i]["item_description"]+'</td>'+
						      '<td class="text-danger">'+sold[i]["item_category"]+'</td>'+
						      '<td>$'+sold[i]["item_start_price"]+'</td>'+
						      '<td>$'+sold[i]["item_reserve_price"]+'</td>'+
						      '<td>'+sold[i]["item_added_date"]+'</td>'+
						      '<td>'+sold[i]["item_end_date"]+'</td>'+
						    '</tr>';
	}
	total_string += '</tbody>'+
  					'</table>';
	return total_string;
}