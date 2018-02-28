function setWatch(item_id) {
	$.ajax({ url: 'backend/setwatch_backend.php',
       data: {
        'item_id': item_id
      },
      type: 'post',
      success: function(output) {
        output = JSON.parse(output);
        if (output.error_code=="0") {
	        $("#success-info").css("display","block");
			$("#danger-info").css("display","none");
			$("#success-info").html(output.msg);
			return true;
        } else {	
        	$("#success-info").css("display","none");
		    $("#danger-info").css("display","block");
		    $("#danger-info").html(output.msg);
		    return false;
        }
      }
    });
}

function isInArray(value, array) {
  return array.indexOf(value) > -1;
}

function return_ongoing_auctions(ongoing_auctions,ongoing_auctions_of_user,watching_auctions,user_type) {
	var total_string = '';
	for (var i=0;i<ongoing_auctions.length;i++) {
		var start = i * 3;
		var end = Math.min((i+1)*3,ongoing_auctions.length);
		total_string += '<div class="row">';
		for (var j = start; j < end; j++){
			var button_text = "Watch";
			var button_disabled = "";
			var button_class = "btn btn-success btn-sm";
			if (isInArray(ongoing_auctions[j][0],ongoing_auctions_of_user) || isInArray(ongoing_auctions[j][0],watching_auctions)){
				button_text =" Watching..";
				button_disabled = "disabled";
				button_class = "btn btn-danger btn-sm";
			}	
			total_string += '<div class="col-md-4">'+
						      '<div class="card mb-4 box-shadow">'+
						        '<img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="images/'+ongoing_auctions[j][7]+'" data-holder-rendered="true">'+
						        '<strong class="d-inline-block mb-2 text-danger align-center">'+ongoing_auctions[j][2]+'</strong>'+
						        '<div class="card-body">'+
						          '<div class="row">'+
						          	'<div class="col-md-6 col-sm-6">'+
							          '<a class="d-inline-block mb-2 text-dark" href="#">'+
							          '<b>'+
							        	ongoing_auctions[j][1]+'</b><h3 class="mb-0">$'+ongoing_auctions[j][3]+'</h3><div class="mb-1 text-muted strike">$'+ongoing_auctions[j][4]+'</div></a>'+
							          '<p class="card-text">Beautiful long mirror can stand elegantly in any dressing room.</p>'+
						          	'</div>';
			if (user_type != "seller") {
				total_string +=	'<div class="col-md-6 col-sm-6">'+
						        '<button onclick="setWatch('+ongoing_auctions[j][0]+')" class="'+button_class+'" '+button_disabled+ ' type="button">'+button_text+'</button>'+
						    '</div>';
			}
			total_string +=	'</div>'+
						          '<div class="d-flex justify-content-between align-items-center">'+
						            '<small class="text-muted">Ending on '+ongoing_auctions[j][5]+'</small>'+
						          '</div>'+
						        '</div>'+
						      '</div>'+
						    '</div>';
		}
		total_string += "</div>";
	}
	return total_string;
}