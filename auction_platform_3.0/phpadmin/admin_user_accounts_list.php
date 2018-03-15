<<<<<<< Updated upstream
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
=======
<strong class="d-inline-block mb-2 text-primary">Administrator Accounts</strong>
<table class="table table-striped">
	<thead>
		<tr>
			<th><strong class="d-inline-block mb-2 text-danger">Admin ID</strong></th>
			<th><strong class="d-inline-block mb-2 text-danger">Fullname</strong></th>
			<th><strong class="d-inline-block mb-2 text-danger">Type</strong></th>
			<th><strong class="d-inline-block mb-2 text-danger">Email</strong></th>
			<th><strong class="d-inline-block mb-2 text-danger">Privilege</strong></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			 <?php
				 $query="SELECT Fullname,user_type,Email, privilege,user_id  FROM `user` where `privilege` = '0'";
				 $result=mysqli_query($connection,$query);
				 if(mysqli_num_rows($result)>0) {
						while($row= mysqli_fetch_assoc($result)){
							if ($row["privilege"] == 0) {
								$user_privilege = "Admin";
								$checked = "checked";
							} else {
								$user_privilege = "Non-amdin";
								$checked = "";
							}
							if($row["user_type"]=="1")
								echo "<td>" . $row["user_id"]. "</td><td>" . $row["Fullname"]. "</td><td>"."Seller". "</td><td> ". $row["Email"]. "</td><td>".$user_privilege."</td></tr>";
							else if($row["user_type"]=="2")
								 echo "<td>" . $row["user_id"]. "</td><td>" . $row["Fullname"]. "</td><td>"."Buyer". "</td><td> ". $row["Email"]. "</td><td>".$user_privilege."</td></tr>";
							else if($row["user_type"]=="3")
								 echo "<td>" . $row["user_id"]. "</td><td>" . $row["Fullname"]. "</td><td>"."Both". "</td><td> ". $row["Email"]. "</td><td>".$user_privilege."</td></tr>";
					 }
				}
				 ?>
		</tr>
	</tbody>
</table>
>>>>>>> Stashed changes
