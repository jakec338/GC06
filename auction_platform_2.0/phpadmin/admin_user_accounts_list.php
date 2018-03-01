<?php

//------------------Administrator Accounts Database List----------------------------
	
	echo '<div style="width:100%; float:left;"id="admin_accounts"><h2>Administrator Accounts</h2></div>';
		  
	$sql = "SELECT administrator_id,admin_name,admin_surname FROM administrator_accounts ORDER BY administrator_id";
	$result = $conn -> query($sql);

	if ($result -> num_rows > 0) {
	echo '
	<table class="table">
	<thead class="thead-dark">
	<th>Administrator ID</th>
	<th>First Name</th>
	<th>Surname</th>
	</tr>';

	while ($row = $result -> fetch_assoc()) {
	echo "
	<tr>
		<td>" . $row["administrator_id"] . "</td>
		<td>" . $row["admin_name"] . "</td>
		<td>" . $row["admin_surname"] . "</td>
	</tr>";
	}

	echo "</table></div>";
	} else {
	echo "0 Administrator Accounts";
	}

?>