<<<<<<< Updated upstream
<?php
//------------------Seller Accounts Database List----------------------------
	
	echo '<div style="width:100%; float:left;"id="seller_accounts"><h2>Seller Accounts</h2></div>';
		  
	$sql = "SELECT * FROM user INNER JOIN seller_accounts ON user.user_id = seller_id ORDER BY seller_id";

	$result = $connection -> query($sql);

	if ($result -> num_rows > 0) {
	echo '
	<table class="table">
	<thead class="thead-dark">
	<th>Seller ID</th>
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
	echo "0 Seller Accounts";
	}
?>
=======
<strong class="d-inline-block mb-2 text-primary">Seller Accounts</strong>
<table class="table table-striped">
	<thead>
		<tr>
			<th><strong class="d-inline-block mb-2 text-success">Seller ID</strong></th>
			<th><strong class="d-inline-block mb-2 text-success">Fullname</strong></th>
			<th><strong class="d-inline-block mb-2 text-success">Type</strong></th>
			<th><strong class="d-inline-block mb-2 text-success">Email</strong></th>
			<th><strong class="d-inline-block mb-2 text-success">Privilege</strong></th>
			<th><strong class="d-inline-block mb-2 text-success">Set Privilege</strong></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			 <?php
				 $query="SELECT Fullname,user_type,Email, privilege,user_id  FROM `user` where `user_type` = '1' || `user_type`='3'";
				 $result=mysqli_query($connection,$query);
				 if(mysqli_num_rows($result)>0) {
						while($row= mysqli_fetch_assoc($result)){
							if ($row["privilege"] == 0) {
								$user_privilege = "Admin";
								$checked = "checked";
							} else {
								$user_privilege = "Seller";
								$checked = "";
							}
							if($row["user_type"]=="1")
								echo "<td>" . $row["user_id"]. "</td><td>" . $row["Fullname"]. "</td><td>"."Seller". "</td><td> ". $row["Email"]. "</td><td>".$user_privilege."</td><td><input onchange=\"setPrivilege('".$row["user_id"]."')\" type=\"checkbox\" ".$checked." value=\"\"></td></tr>";
							else if($row["user_type"]=="2")
								 echo "<td>" . $row["user_id"]. "</td><td>" . $row["Fullname"]. "</td><td>"."Buyer". "</td><td> ". $row["Email"]. "</td><td>".$user_privilege."</td><td><input onchange=\"setPrivilege('".$row["user_id"]."')\" type=\"checkbox\" ".$checked." value=\"\"></td></tr>";
							else if($row["user_type"]=="3")
								 echo "<td>" . $row["user_id"]. "</td><td>" . $row["Fullname"]. "</td><td>"."Both". "</td><td> ". $row["Email"]. "</td><td>".$user_privilege."</td><td><input onchange=\"setPrivilege('".$row["user_id"]."')\" type=\"checkbox\" ".$checked." value=\"\"></td></tr>";
					 }
				}
				 ?>
		</tr>
	</tbody>
</table>
>>>>>>> Stashed changes
