<?php
//------------------Buyer Accounts Database List----------------------------
	
	echo '<div style="width:100%; float:left;"id="buyer_accounts"><h2>Buyer Accounts</h2></div>';
		  
	$sql = "SELECT * FROM user INNER JOIN buyer_accounts ON user.user_id = buyer_id ORDER BY buyer_id";
	$result = $connection -> query($sql);

	if ($result -> num_rows > 0) {
	echo '
	<table class="table">
	<thead class="thead-dark">
	<th>Buyer ID</th>
	<th>Full Name</th>
	<th>Email</th>
	</tr>';

	while ($row = $result -> fetch_assoc()) {
	echo "
	<tr>
		<td>" . $row["user_id"] . "</td>
		<td>" . $row["Fullname"] . "</td>
		<td>" . $row["Email"] . "</td>
	</tr>";
	}

	echo "</table></div>";
	} else {
	echo "0 Buyer Accounts";
	}		
?>