<?php
	require('../connection.php');
	require_once '../phpmail.php';

	function dog_watcher($connection) {
		$cur_date = date('Y-m-d');
		$query = "SELECT * FROM `listed_items`";
		$result = mysqli_query($connection, $query);
		$expired_items = array();
		while ($row = $result->fetch_array()) {
			$end_date = str_replace('/', '-', $row["item_end_date"]);
	        $time = strtotime($end_date);
	        $end_date = date('Y-m-d',$time);
	        if($cur_date>$end_date) {
	            if (!in_array($row, $expired_items)) {
	                array_push($expired_items, $row["item_id"]);
	            }
	        }
		}
		$max_price_bidders = array();
		foreach ($expired_items as $expired_item) {
		    $query = "SELECT * from `bids` INNER JOIN `user` ON `bids`.Buyer_Accounts_buyer_id=`user`.user_id where Listed_Items_item_id='$expired_item'";
		    $result = mysqli_query($connection, $query);
		    if (mysqli_num_rows($result)>0) {
		        $max = -1000;
		        $max_user_email = "";
		        $max_user_name = "";
		        $item = -1;
		        $max_bid_id = -1;
		        $max_bidder_id = -1;
		        while ($row = $result->fetch_array()) {
		            if ($row["bid_price"] > $max) {
		                $max = $row["bid_price"];
		                $max_user_email = $row["Email"];
		                $max_user_name = $row["Fullname"];
		                $max_bid_id = $row["bid_id"];
		                $max_bidder_id = $row["user_id"];
		            }
		        }
		        $max_price_bidders[$expired_item] = array("max_bidder_id"=>$max_bidder_id, "max_bid_id"=>$max_bid_id, "max_bid_price"=>$max, "max_bidder" => $max_user_name, 
		        	"max_bidder_email" => $max_user_email);
		    }
		}

		$sellers = array();
		foreach ($expired_items as $expired_item) {
		    $query = "SELECT * from `listed_items` INNER JOIN `user` ON `listed_items`.Seller_Accounts_seller_id=`user`.user_id where item_id='$expired_item'";
		    $result = mysqli_query($connection, $query);
		    while ($row = $result->fetch_array()) {
		    	if (array_key_exists($row["item_id"], $max_price_bidders)) {
		    		$msg = "Your item ".$row["item_description"]." has been sold off to ". $max_price_bidders[$row["item_id"]]["max_bidder"]." at price ".
		    		$max_price_bidders[$row["item_id"]]["max_bid_price"];
		    		send_email($row["Email"],$msg,"Congratulations on selling off your bid");

		    		$msg = "You have won the auction on item ".$row["item_description"]. " at price ".$max_price_bidders[$row["item_id"]]["max_bid_price"];
		        	send_email($max_price_bidders[$row["item_id"]]["max_bidder_email"],$msg,"Congratulations on winning the bid");

		    	} else {
		    		$msg = "Your auction has expired!!! Nobody bid on it";
		    		send_email($row["Email"],$msg,"Your item could not be sold off");
		    	}
		    	$item_description = $row["item_description"];
		    	$img_url = $row["img_url"];
		    }
		    $query = "DELETE FROM `listed_items` where item_id = '$expired_item'";
		    $result = mysqli_query($connection, $query);
		    $max_bid_id = $max_price_bidders[$expired_item]["max_bid_id"];
		    $max_bid_price = $max_price_bidders[$expired_item]["max_bid_price"];
		    $max_bidder_id = $max_price_bidders[$expired_item]["max_bidder_id"];
		    

		    $query = "INSERT INTO `completed_items` (bid_id,listed_item_id,bid_price,user_id,item_description,img_url) 
		    			VALUES('$max_bid_id',
		    					'$expired_item',
		    					'$max_bid_price',
		    					'$max_bidder_id',
		    					'$item_description',
								'$img_url')";

			$result = mysqli_query($connection, $query);
		}
	}

	dog_watcher($connection);

?>