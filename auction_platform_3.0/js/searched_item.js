function customizeBidModal(item,category,startingprice,reservedprice,item_id){
	$("#bidModalLabel").text(category);
	$("#biditem").text(item);
	$("#biditem").attr("value",item_id);
	$("#bidstartingprice").text(startingprice);
	$("#bidreservedprice").text(reservedprice);
}

function return_searched_items(searched_items,searched_category) {
	var total_string = '<table id="searched_table" class="table table-striped sorted_table">'+
						  '<thead>'+
						    '<tr>'+
						      '<th scope="col"></th>'+
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
							  '<td scope="row"><a href="#" style="color:red" class="move fas fa-arrows-alt"></a></td>'+
						      '<td scope="row">'+(i+1)+'</td>'+
						      '<td>'+searched_items[i]["item_description"]+'</td>'+
						      '<td class="text-danger">'+searched_items[i]["item_category"]+'</td>'+
						      '<td>$'+searched_items[i]["item_start_price"]+'</td>'+
						      '<td>$'+searched_items[i]["item_reserve_price"]+'</td>'+
						      '<td>'+searched_items[i]["item_added_date"]+'</td>'+
						      '<td>'+searched_items[i]["item_end_date"]+'</td>'+
						      '<td>'+searched_items[i]["num_bids"]+'</td>'+
						      '<td><button data-toggle="modal" onclick=\'customizeBidModal("'+searched_items[i]["item_description"]+'","'+searched_items[i]["item_category"]+'","'+searched_items[i]["item_start_price"]+'","'+searched_items[i]["item_reserve_price"]+'","'+searched_items[i]["item_id"]+'")\' data-target="#bidModal" class="btn btn-outline-success my-2 my-sm-0" type="button">Bid</button></td>'+
						    '</tr>';
	}
	total_string += '</tbody>'+
  					'</table>';
	return total_string;
}

function searchItems(search_query,category_query) {
	if (search_query=="") {
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

	var num_items_to_return = $("#num_items").val();
	if (num_items_to_return == "Number of items") {
		num_items_to_return = "3";
	}

	$.ajax({ url: 'backend/search_backend.php',
	     data: {
	      'searched_item': searched_item,
	      'category_query': category_query,
	      'num_items_to_return': num_items_to_return
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

	              $('#searched_table').sortable({
			        containerSelector: 'table',
			        handle: 'svg',
			        itemPath: '> tbody',
			        itemSelector: 'tr',
			        placeholder: '<tr class="placeholder"/>',
			        onDragStart: function ($item, container, _super) {
				    // Duplicate items of the no drop area
				    if(!container.options.drop)
					    $item.clone().insertAfter($item);
					    _super($item, container);
					}
			      });
	           } else {
	              $("#success-info").css("display","none");
	              $("#danger-info").css("display","block");
	              $("#danger-info").html(output.msg);
	           }
	     }
	});

	return true;
}

function bidOnIt() {
	var bid_item_id = $("#biditem").attr("value");
	var bidstartingprice = $("#bidstartingprice").text();
	var bidreservedprice = $("#bidreservedprice").text();
	var bid_price = $("#bid_price").val();
	var bid_feedback = $("#bid_feedback").val();
	var bid_rating = $("#bid_rating").val();

	$.ajax({ url: 'backend/bid_on_it.php',
	     data: {
	      'bid_item_id': bid_item_id,
	      'bidstartingprice': bidstartingprice,
	      'bidreservedprice': bidreservedprice,
	      'bid_price': bid_price,
	      'bid_feedback': bid_feedback,
	      'bid_rating': bid_rating
	    },
	     type: 'post',
	     success: function(output) {
	         output = JSON.parse(output);
	           if (output.error_code=="0") {
	           	  window.location.href = "buy.php";
	              $("#success-info").css("display","block");
	              $("#danger-info").css("display","none");
	              $("#success-info").html(output.msg);
	              // window.location.href = 
	           } else {
	              $("#success-info").css("display","none");
	              $("#danger-info").css("display","block");
	              $("#danger-info").html(output.msg);
	           }
	     }
	});
	return true;
}