<?php
  session_start();
  if(!isset($_SESSION['is_admin'])) {
    header("Location: index.php");
    exit();
  }
?>
<!DOCTYPE html>
<html>
<head>
  <?php include ('template/include_files.php');?>
  <script type="text/javascript" src="js/dog_watcher.js"></script>
  <script type="text/javascript">
      $( document ).ready(function() {
        dogwatcher();
      });
  </script>
  <?php include ('connection.php');
  ?>
</head>

<body>

 <div class="container">
   <?php include ('template/navbar.php');?>
   <?php if(isset($_SESSION['is_bid_success'])) {?>
     <div style="display:block" id="success-info" class="alert alert-success" role="alert"><?php echo $_SESSION['is_bid_success'];?></div>
   <?php unset($_SESSION['is_bid_success']); } else if(isset($_SESSION['is_bid_error'])) {?>
     <div style="display:block" id="danger-info" class="alert alert-danger" role="alert"><?php echo $_SESSION['is_bid_error'];?></div>
   <?php unset($_SESSION['is_bid_error']);}?>
   <div style="display:none" id="success-info" class="alert alert-success" role="alert"></div>
   <div style="display:none" id="danger-info" class="alert alert-danger" role="alert"></div>
   <br>
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

$conn = new mysqli("localhost", "root", "", "auction_platform3");
if ($conn -> connect_error) {
die("Connection failed:" . $conn -> connect_error);
}

//------------------delete administrator account ----------------------

if (isset($_POST['delete_administrator_acc'])) {
	echo '<div style="width:100%; float:left;"id="administrator_accounts"><h2>Administrator Accounts</h2></div>';
	$id=$_REQUEST['administrator_id'];
	$sql_administrator = "DELETE FROM user WHERE user_id=$id";
	$conn -> query($sql_administrator);


	$sql_administrator = "SELECT user_id,Fullname,Email FROM `user` where privilege = '0' ORDER BY user_id";
	$result = $conn -> query($sql_administrator);


//------------------show all admin accounts following deletion----------------------

	if ($result -> num_rows > 0) {
	echo '
	<table class="table">
	<thead class="thead-dark">
	<tr class="info">
	<th>Admin ID</th>
  <th>Full Name</th>
	<th>Email</th>
	</tr>';

	while ($row = $result -> fetch_assoc()) {
	echo "
	<tr>
		<td>" . $row["user_id"] . "</td><td>" . $row["Fullname"] . "</td><td>" . $row["Email"] . "</td>
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
$conn = new mysqli("localhost", "root", "", "auction_platform3");
if ($conn -> connect_error) {
  die("Connection failed:" . $conn -> connect_error);
}
//------------------delete seller account----------------------

if (isset($_POST['delete_seller_acc'])) {
	echo '<div style="width:100%; float:left;"id="seller_accounts"><h2>Seller Accounts</h2></div>';
	$id=$_REQUEST['seller_id'];
	$sql_sellers = "DELETE FROM user WHERE user_id=$id";
	$conn->query($sql_sellers);


	$sql_sellers = "SELECT user_id,Fullname,Email FROM `user` where user_type = '1' ORDER BY user_id";
	$result = $conn->query($sql_sellers);


//------------------show all seller accounts following deletion----------------------

	if ($result->num_rows > 0) {
	echo '
	<table class="table">
	<thead class="thead-dark">
	<tr class="info">
	<th>Seller ID</th>
	<th>Full Name</th>
	<th>Email</th>
	</tr>';

	while ($row = $result -> fetch_assoc()) {
	echo "
	<tr>
		<td>" . $row["user_id"] . "</td><td>" . $row["Fullname"] . "</td><td>" . $row["Email"] . "</td>
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

$conn = new mysqli("localhost", "root", "", "auction_platform3");
if ($conn -> connect_error) {
die("Connection failed:" . $conn -> connect_error);
}

//------------------delete buyer account----------------------

if (isset($_POST['delete_buyer_acc'])) {
	echo '<div style="width:100%; float:left;"id="buyer_accounts"><h2>Buyer Accounts</h2></div>';
	$id=$_REQUEST['buyer_id'];
	$sql_buyers = "DELETE FROM user WHERE user_id=$id";
	$conn -> query($sql_buyers);


	$sql_buyers = "SELECT user_id,Fullname,Email FROM `user` where user_type = '2' ORDER BY user_id";
	$result = $conn -> query($sql_buyers);


//------------------show all buyer accounts following deletion----------------------

	if ($result -> num_rows > 0) {
	echo '
	<table class="table">
	<thead class="thead-dark">
	<tr class="info">
	<th>Buyer ID</th>
	<th>Full Name</th>
	<th>Email</th>
	</tr>';

	while ($row = $result -> fetch_assoc()) {
	echo "
	<tr>
		<td>" . $row["user_id"] . "</td><td>" . $row["Fullname"] . "</td><td>" . $row["Email"] . "</td>
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
