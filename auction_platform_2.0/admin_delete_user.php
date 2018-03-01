<!DOCTYPE html>

<html>

<title>Auction Platform|Admin Delete User</title> 
  
  <head>
	 <!-- Meta tags -->
    
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
     <!-- Custom styles for admin dashboard -->
  
     <link href="css/admin_dashboard.css" rel="stylesheet">
  
     <!-- Bootstrap core CSS -->
   
     <link href="css/bootstrap.min.css" rel="stylesheet">

   </head>

<body>

 <div class="container">
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
	<h5 class="my-0 mr-md-auto text-dark">Auction</h5>
	
<!-- Navigation links -->

		<nav class="my-2 my-md-0 mr-md-3">
		    <a class="p-2 text-dark" href="admin_dashboard.php">Admin Home</a>
			<a class="p-2 text-dark" href="buy.php">Buy</a>
			<a class="p-2 text-dark" href="sell.php">Sell</a>
			<a class="btn btn-outline-primary" href="logout.php">Log out</a>
		</nav> 	
 </div>

<main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Administrator Account Dashboard</h1>
          <h2 class="jumbotron-heading">Delete User Account</h2>
		  <p class="lead text-muted">Choose from below to exercise administrator deletion privileges.</p>
          
		  <p>
			<a class="btn btn-outline-danger btn-lg" href="#admin_btn">Delete Admin Account</a> 
			<p class="lead text-muted"></p>
			<a class="btn btn-outline-danger btn-lg" href="#seller_btn" >Delete Seller Account</a>
			<p class="lead text-muted"></p>
			<a class="btn btn-outline-danger btn-lg" href="#buyer_btn"  >Delete Buyer Account</a>
			<p class="lead text-muted"></p>
		  </p>
        
		</div>
      </section>
 	 
	 
 <!-- ADMIN ACCOUNT DELETION PROCESS-->	  

<div id="admin_btn"></div>	  
	  
<div align="center">

<form id="form1" name="form1" method="post" action="">
  	
    <table class="table " style="width: 50%">
	
        <tr>
        <th>
          <input type="text" class="form-control" name="administrator_id" placeholder="Enter Admin ID" />
        </th>
        <td><input class="btn btn-outline-danger" name="delete_administrator_acc" type="submit" id="delete_administrator_acc" value="Confirm Delete of Admin Account" /></td>
      </tr>
      
    </table>
  </form>
   
  <hr>
</div>

<div style="width: 100%">
<?php

$conn = new mysqli("localhost", "root", "", "auction_platform");
if ($conn -> connect_error) {
die("Connection failed:" . $conn -> connect_error);
}

//------------------delete administrator account ----------------------

if (isset($_POST['delete_administrator_acc'])) {
	echo '<div style="width:100%; float:left;"id="administrator_accounts"><h2>Administrator Accounts</h2></div>';
	$id=$_REQUEST['administrator_id'];
	$sql_administrator = "DELETE FROM administrator_accounts WHERE administrator_id=$id";
	$conn -> query($sql_administrator);
	
	
	$sql_administrator = "SELECT administrator_id,admin_name,admin_surname FROM administrator_accounts ORDER BY administrator_id";
	$result = $conn -> query($sql_administrator);
	

//------------------show all admin accounts following deletion----------------------
	
	if ($result -> num_rows > 0) {
	echo '
	<table class="table">
	<thead class="thead-dark">
	<tr class="info">
	<th>Administrator ID</th>
	<th>First Name</th>
	<th>Surname</th>
	</tr>';

	while ($row = $result -> fetch_assoc()) {
	echo "
	<tr>
		<td>" . $row["administrator_id"] . "</td><td>" . $row["admin_name"] . "</td><td>" . $row["admin_surname"] . "</td>
	</tr>";
	}

	echo "</table></div>";
	} else {
	echo "0 Administrator Accounts";
	}
}
?>	   	  		  

 <!-- SELLER ACCOUNT DELETION PROCESS-->	  
	  
<div id="seller_btn"></div>	  
	  
<div align="center">

<form id="form1" name="form1" method="post" action="">
  	
    <table class="table " style="width: 50%">
	
        <tr>
        <th>
          <input type="text" class="form-control" name="seller_id" placeholder="Enter Seller ID" />
        </th>
        <td><input class="btn btn-outline-danger" name="delete_seller_acc" type="submit" id="delete_seller_acc" value="Confirm Delete of Seller Account" /></td>
      </tr>
      
    </table>
  </form>
   
  <hr>
</div>


<div style="width: 100%">
<?php
$conn = new mysqli("localhost", "root", "", "auction_platform");
if ($conn -> connect_error) {
die("Connection failed:" . $conn -> connect_error);
}
//------------------delete seller account----------------------

if (isset($_POST['delete_seller_acc'])) {
	echo '<div style="width:100%; float:left;"id="seller_accounts"><h2>Seller Accounts</h2></div>';
	$id=$_REQUEST['seller_id'];
	$sql_sellers = "DELETE FROM seller_accounts WHERE seller_id=$id";
	$conn -> query($sql_sellers);
	
	
	$sql_sellers = "SELECT seller_id,fullname,email,password FROM seller_accounts ORDER BY seller_id";
	$result = $conn -> query($sql_sellers);
	

//------------------show all seller accounts following deletion----------------------
	
	if ($result -> num_rows > 0) {
	echo '
	<table class="table">
	<thead class="thead-dark">
	<tr class="info">
	<th>Seller ID</th>
	<th>Full Name</th>
	<th>email</th>
	<th>Password</th>
	</tr>';

	while ($row = $result -> fetch_assoc()) {
	echo "
	<tr>
		<td>" . $row["seller_id"] . "</td><td>" . $row["fullname"] . "</td><td>" . $row["email"] . "</td><td>" . $row["password"] . "</td>
	</tr>";
	}

	echo "</table></div>";
	} else {
	echo "0 Seller Accounts";
	}
}
?>	  	  	    
 <!-- BUYER ACCOUNT DELETION PROCESS-->	  
	  	  
	  
<div id="buyer_btn"></div>	  
	  
<div align="center">

<form id="form1" name="form1" method="post" action="">
  	
    <table class="table " style="width: 50%">
	
        <tr>
        <th>
          <input type="text" class="form-control" name="buyer_id" placeholder="Enter Buyer ID" />
        </th>
        <td><input class="btn btn-outline-danger" name="delete_buyer_acc" type="submit" id="delete_buyer_acc" value="Confirm Delete of Buyer Account" /></td>
      </tr>
      
    </table>
  </form> 
  
  <hr>
</div>
<div style="width: 100%">
<?php

$conn = new mysqli("localhost", "root", "", "auction_platform");
if ($conn -> connect_error) {
die("Connection failed:" . $conn -> connect_error);
}

//------------------delete buyer account----------------------

if (isset($_POST['delete_buyer_acc'])) {
	echo '<div style="width:100%; float:left;"id="buyer_accounts"><h2>Buyer Accounts</h2></div>';
	$id=$_REQUEST['buyer_id'];
	$sql_buyers = "DELETE FROM buyer_accounts WHERE buyer_id=$id";
	$conn -> query($sql_buyers);
	
	
	$sql_buyers = "SELECT buyer_id,fullname,email,password FROM buyer_accounts ORDER BY buyer_id";
	$result = $conn -> query($sql_buyers);
	

//------------------show all buyer accounts following deletion----------------------
	
	if ($result -> num_rows > 0) {
	echo '
	<table class="table">
	<thead class="thead-dark">
	<tr class="info">
	<th>Buyer ID</th>
	<th>Full Name</th>
	<th>email</th>
	<th>Password</th>
	</tr>';

	while ($row = $result -> fetch_assoc()) {
	echo "
	<tr>
		<td>" . $row["buyer_id"] . "</td><td>" . $row["fullname"] . "</td><td>" . $row["email"] . "</td><td>" . $row["password"] . "</td>
	</tr>";
	}

	echo "</table></div>";
	} else {
	echo "0 Buyer Accounts";
	}
}

?>
</div>

</body>
</html>