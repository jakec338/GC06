<?php
//------------------Buyer Accounts Database List----------------------------
	
	echo '<div style="width:100%; float:left;"id="buyer_accounts"><h2>Buyer Accounts</h2></div>';
		  
	$sql = "SELECT buyer_id,fullname,email,password FROM buyer_accounts ORDER BY buyer_id";
	$result = $conn -> query($sql);

	if ($result -> num_rows > 0) {
	echo '
	<table class="table">
	<thead class="thead-dark">
	<th>Buyer ID</th>
	<th>Full Name</th>
	<th>email</th>
	<th>Password</th>
	</tr>';

	while ($row = $result -> fetch_assoc()) {
	echo "
	<tr>
		<td>" . $row["buyer_id"] . "</td>
		<td>" . $row["fullname"] . "</td>
		<td>" . $row["email"] . "</td>
		<td>" . $row["password"] ."</td>
	</tr>";
	}

	echo "</table></div>";
	} else {
	echo "0 Buyer Accounts";
	}		
?>