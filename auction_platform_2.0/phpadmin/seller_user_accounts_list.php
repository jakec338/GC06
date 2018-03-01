<?php
//------------------Seller Accounts Database List----------------------------
	
	echo '<div style="width:100%; float:left;"id="seller_accounts"><h2>Seller Accounts</h2></div>';
		  
	$sql = "SELECT seller_id,fullname,email,password FROM seller_accounts ORDER BY seller_id";
	$result = $conn -> query($sql);

	if ($result -> num_rows > 0) {
	echo '
	<table class="table">
	<thead class="thead-dark">
	<th>Seller ID</th>
	<th>Full Name</th>
	<th>email</th>
	<th>Password</th>
	</tr>';

	while ($row = $result -> fetch_assoc()) {
	echo "
	<tr>
		<td>" . $row["seller_id"] . "</td>
		<td>" . $row["fullname"] . "</td>
		<td>" . $row["email"] . "</td>
		<td>" . $row["password"] ."</td>
	</tr>";
	}

	echo "</table></div>";
	} else {
	echo "0 Seller Accounts";
	}
?>