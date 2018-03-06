<?php include 'phpadmin\admin_db_connect.php'; ?>


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
		    <a class="p-2 text-dark" href="index.php">Home</a>
			<a class="p-2 text-dark" href="buy.php">Buy</a>
			<a class="p-2 text-dark" href="sell.php">Sell</a>
			<a class="btn btn-outline-primary" href="logout.php">Log out</a>
		</nav>
	
</div>

 <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Administrator Dashboard</h1>
          
		  <p class="lead text-muted">Choose from below to exercise administrator editing privileges.</p>
          
		  <p>
			<a class="btn btn-outline-info btn-lg" href="#admin_accounts_btn" >View Administrator Accounts</a>
			<a class="btn btn-outline-info btn-lg" href="#seller_accounts_btn">View Seller Accounts</a>
			<a class="btn btn-outline-info btn-lg" href="#buyer_accounts_btn">View Buyer Accounts</a>
 
			<p class="lead text-muted"></p>
			<p class="lead text-muted"></p>
			<a class="btn btn-outline-success btn-lg" href="admin_view_auction.php" >View Bids & Listed Items</a>
            <a class="btn btn-outline-danger btn-lg" href="admin_delete_user.php" >Delete User Account</a>
		  </p>
        
		</div>
      </section>

<div id="admin_accounts_btn"></div>		  
<div class="container">

<?php include '.\phpadmin\admin_user_accounts_list.php'; ?>

</div>

<div id="seller_accounts_btn"></div>	
<div class="container">

<?php include '.\phpadmin\seller_user_accounts_list.php'; ?>

</div>

<div id="buyer_accounts_btn"></div>
<div class="container">

<?php include '.\phpadmin\buyer_user_accounts_list.php'; ?>

</div>
		 
</body>
</html>