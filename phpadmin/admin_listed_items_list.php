<?php
//------------------Current Listed Auction Items Database List----------------------------

	echo '<div style="width:100%; float:left;"id="bids"><h2>Current Auction Listings</h2></div>';

	$sql = "SELECT item_id,item_description,item_category,item_start_price,item_reserve_price,item_end_date,Seller_Accounts_seller_id FROM listed_items ORDER BY item_id";
	$result = $connection -> query($sql);

	if ($result -> num_rows > 0) {
	echo '
	<table class="table">
	<thead class="thead-dark">
	<th>Item ID</th>
	<th>Item Description</th>
	<th>Item Category</th>
	<th>Item Start Price</th>
	<th>Item Reserve Price</th>
	<th>Item End Date</th>
	<th>Seller ID</th>
	</tr>';

	while ($row = $result -> fetch_assoc()) {
	echo "
	<tr>
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
	echo "0 Auction Items Listed!";
	}
?>
