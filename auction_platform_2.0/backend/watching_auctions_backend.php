<?php
	function watching_auctions($connection,$user_id){
		$query = "SELECT * from `watching_auctions` INNER JOIN `listed_items` on watching_auctions.listed_item_id=listed_items.item_id where user_id='$user_id'";
	    $result = mysqli_query($connection, $query);
	    return $result;
	}
?>
