<?php

//------------------Administrator Accounts Database List----------------------------
	
	echo '<div style="width:100%; float:left;"id="admin_accounts"><h2>Administrator Accounts</h2></div>';
		  
	$sql = "SELECT * FROM user INNER JOIN administrator_accounts ON user.user_id = administrator_id";
	$result = $connection -> query($sql);

	if ($result -> num_rows > 0) {
	echo '
	<table class="table">
	<thead class="thead-dark">
	<th>Administrator ID</th>
	<th>Full name</th>
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
	echo "0 Administrator Accounts";
	}

?>