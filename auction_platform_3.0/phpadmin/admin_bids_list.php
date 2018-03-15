<?php
//------------------Current Listed Auction Items Database List----------------------------
<<<<<<< Updated upstream
	
	echo '<div style="width:100%; float:left;"id="bids"><h2>Current Bids</h2></div>';
		  
=======

	echo '<div style="width:100%; float:left;"id="bids"><h2>Current Bids</h2></div>';

>>>>>>> Stashed changes
	$sql = "select bid_id,Buyer_Accounts_buyer_id,item_id,item_description,item_category,item_start_price,item_reserve_price,item_end_date,Seller_Accounts_seller_id
	from listed_items l
	inner join bids b
	on l.item_id = b.Listed_Items_item_id
	ORDER BY item_id";
<<<<<<< Updated upstream
	
	$result = $conn -> query($sql);
=======

	$result = $connection -> query($sql);
>>>>>>> Stashed changes

	if ($result -> num_rows > 0) {
	echo '
	<table class="table">
	<thead class="thead-dark">
	<th>Bid ID</th>
	<th>Buyer ID</th>
	<th>Item ID</th>
	<th>Item Description</th>
	<th>Item Category</th>
	<th>Start Price</th>
	<th>Reserve Price</th>
	<th>End Date</th>
	<th>Seller ID</th>
	</tr>';

	while ($row = $result -> fetch_assoc()) {
	echo "
	<tr>
		<td>" . $row["bid_id"] . "</td>
		<td>" . $row["Buyer_Accounts_buyer_id"] . "</td>
		<td>" . $row["item_id"] . "</td>
		<td>" . $row["item_description"] . "</td>
		<td>" . $row["item_category"] . "</td>
		<td>" . $row["item_start_price"] . "</td>
		<td>" . $row["item_reserve_price"] . "</td>
		<td>" . $row["item_end_date"] . "</td>
		<td>" . $row["Seller_Accounts_seller_id"] . "</td>
	</tr>";
	}

	echo "</table></div>";
	} else {
	echo "0 Items have bids placed on them";
	}
<<<<<<< Updated upstream
?>
=======
?>
>>>>>>> Stashed changes
