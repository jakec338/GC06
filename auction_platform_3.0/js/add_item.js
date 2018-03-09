function addItem() {
	// var item_description = $("#item_name").val();
	// var item_category = $("#item_category").val();
	// var item_starting_price = $("#item_starting_price").val();
	// var item_reserved_price = $("#item_reserved_price").val();
	// var item_ending_date = $("#item_ending_date").val();
	// var item_url = $("#item_url").val();
	// item_url = item_url.split(/(\\|\/)/g).pop();

	// if (item_description == "" || 
	// 	item_category == "Category" ||
	// 	item_starting_price == "" ||
	// 	item_reserved_price == "" ||
	// 	item_ending_date == "" ||
	// 	item_url == "") {
	//   $("#add_item_success-info").css("display","none");
	//   $("#add_item_danger-info").css("display","block");
	//   $("#add_item_danger-info").html("All fields are necessary");
	//   return false;
	// }

	// $.ajax({ url: 'backend/add_item_backend.php',
	//      data: {
	//       'item_description': item_description,
	//       'item_category': item_category,
	//       'item_starting_price': item_starting_price,
	//       'item_reserved_price': item_reserved_price,
	//       'item_ending_date': item_ending_date,
	//       'item_url': item_url
	//     },
	//     type: 'post',
	//     success: function(output) {
	//      	alert(output);
	//         output = JSON.parse(output);
 //            if (output.error_code=="0") {
	//             $("#success-info").css("display","block");
	//             $("#danger-info").css("display","none");
	//             $("#success-info").html(output.msg);
 //           	} else {
 //              $("#add_item_success-info").css("display","none");
 //              $("#add_item_danger-info").css("display","block");
 //              $("#add_item_danger-info").html(output.msg);
 //            }
	//     }
	// });

	// return true;
}

