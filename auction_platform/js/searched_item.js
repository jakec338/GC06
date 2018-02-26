function return_searched_items(searched_items) {
	var total_string = '<table class="table table-striped">'+
						  '<thead>'+
						    '<tr>'+
						      '<th scope="col"></th>'+
						      '<th scope="col">Item</th>'+
						      '<th scope="col">Category</th>'+
						      '<th scope="col">Starting Price</th>'+
						      '<th scope="col">Reserved Price</th>'+
						      '<th scope="col">Date Added</th>'+
						      '<th scope="col">End Date</th>'+
						      '<th scope="col">Bids</th>'+
						      '<th scope="col"></th>'+
						    '</tr>'+
						  '</thead>'+
						  '<tbody>';


	for (var i=0;i<searched_items.length;i++) {
			total_string += '<tr>'+
						      '<th scope="row">'+(i+1)+'</th>'+
						      '<td>'+searched_items[i][1]+'</td>'+
						      '<td class="text-danger">'+searched_items[i][2]+'</td>'+
						      '<td>$'+searched_items[i][3]+'</td>'+
						      '<td>$'+searched_items[i][4]+'</td>'+
						      '<td>'+searched_items[i][5]+'</td>'+
						      '<td>'+searched_items[i][5]+'</td>'+
						      '<td>'+searched_items[i][7]+'</td>'+
						      '<td><button class="btn btn-outline-success my-2 my-sm-0" type="submit">Bid</button></td>'+
						    '</tr>';
	}
	total_string += '</tbody>'+
  					'</table>';
	return total_string;
}

function searchItems(search_query) {
	//assuming everything is valid
	//TODO: have to check on client side if everything is valid
	if (!search_query) {
	  var searched_item = $("#searched_item_input").val();
	} else {
	  searched_item = search_query;
	}

	if (searched_item == "") {
	  $("#success-info").css("display","none");
	  $("#danger-info").css("display","block");
	  $("#danger-info").html("Please input search item");
	  return false;
	}

	$.ajax({ url: 'backend/search_backend.php',
	     data: {
	      'searched_item': searched_item
	    },
	     type: 'post',
	     success: function(output) {
	         output = JSON.parse(output);
	           if (output.error_code=="0") {
	              if (searched_item != "default") {
	                $("#success-info").css("display","block");
	                $("#danger-info").css("display","none");
	                $("#success-info").html(output.msg);
	              }
	              var searched_items = output.search_results;
	              var searched_items_html = return_searched_items(searched_items);
	              $("#searched_items").html(searched_items_html);
	           } else {
	              $("#success-info").css("display","none");
	              $("#danger-info").css("display","block");
	              $("#danger-info").html(output.msg);
	           }
	     }
	});

	return true;
}