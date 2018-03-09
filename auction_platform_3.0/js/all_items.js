function return_your_items(your_items) {
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

	for (var i=0;i<your_items.length;i++) {
			total_string += '<tr>'+
						      '<td scope="row">'+(i+1)+'</td>'+
						      '<td>'+your_items[i]["item_description"]+'</td>'+
						      '<td class="text-danger">'+your_items[i]["item_category"]+'</td>'+
						      '<td>$'+your_items[i]["item_start_price"]+'</td>'+
						      '<td>$'+your_items[i]["item_reserve_price"]+'</td>'+
						      '<td>'+your_items[i]["item_added_date"]+'</td>'+
						      '<td>'+your_items[i]["item_end_date"]+'</td>'+
						    '</tr>';
	}
	total_string += '</tbody>'+
  					'</table>';
	return total_string;
}

function return_other_items(other_items) {
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

	for (var i=0;i<other_items.length;i++) {
			total_string += '<tr>'+
						      '<td scope="row">'+(i+1)+'</td>'+
						      '<td>'+other_items[i]["item_description"]+'</td>'+
						      '<td class="text-danger">'+other_items[i]["item_category"]+'</td>'+
						      '<td>$'+other_items[i]["item_start_price"]+'</td>'+
						      '<td>$'+other_items[i]["item_reserve_price"]+'</td>'+
						      '<td>'+other_items[i]["item_added_date"]+'</td>'+
						      '<td>'+other_items[i]["item_end_date"]+'</td>'+
						    '</tr>';
	}
	total_string += '</tbody>'+
  					'</table>';
	return total_string;
}