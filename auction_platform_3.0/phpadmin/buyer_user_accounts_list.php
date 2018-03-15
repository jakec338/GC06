<<<<<<< Updated upstream
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
=======
<strong class="d-inline-block mb-2 text-primary">Buyer Accounts</strong>
<table class="table table-striped">
	<thead>
		<tr>
			<th><strong class="d-inline-block mb-2 text-info">Buyer ID</strong></th>
			<th><strong class="d-inline-block mb-2 text-info">Fullname</strong></th>
			<th><strong class="d-inline-block mb-2 text-info">Type</strong></th>
			<th><strong class="d-inline-block mb-2 text-info">Email</strong></th>
			<th><strong class="d-inline-block mb-2 text-info">Privilege</strong></th>
			<th><strong class="d-inline-block mb-2 text-info">Set Privilege</strong></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			 <?php
				 $query="SELECT Fullname,user_type,Email, privilege,user_id  FROM `user` where `user_type` = '2' || `user_type`='3'";
				 $result=mysqli_query($connection,$query);
				 if(mysqli_num_rows($result)>0) {
						while($row= mysqli_fetch_assoc($result)){
							if ($row["privilege"] == 0) {
								$user_privilege = "Admin";
								$checked = "checked";
							} else {
								$user_privilege = "Buyer";
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
