<?php include './phpadmin/admin_db_connect.php'; ?>

<!DOCTYPE html>

<html>

<title>Auction Platform|Admin Auction View</title> 
  
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
          <h2 class="jumbotron-heading">Current Auction</h2>
		  <p class="lead text-muted">Choose from below to view current auction.</p>
          
		  <p>
			<a class="btn btn-outline-success btn-lg" href="#listed_items_btn" >View Current Auction Listings</a> 
			<p class="lead text-muted"></p>
			<a class="btn btn-outline-success btn-lg" href="#bid_items_btn" >View Current Bids</a> 
			<p class="lead text-muted"></p>
		  </p>
        
		</div>
      </section>
 	 
	 

<div id="listed_items_btn"></div>
	
<div class="container">

<?php include './phpadmin/admin_listed_items_list.php'; ?>

</div>

	 
	 
<div id="bid_items_btn"></div>
	
<div class="container">

<?php include './phpadmin/admin_bids_list.php'; ?>

</div>







</body>
</html>