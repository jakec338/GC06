<!DOCTYPE html>
<html>
<head>
  <?php include ('template/include_files.php');?>
  <?php include ('query_functions/functions.php');?>
  <?php include ('connection.php');?>
  <script type="text/javascript" src="js/searched_item.js"></script>
  <script type="text/javascript" src="js/sell.js"></script>
</head>
<body>
  <div class="container">
    <?php include ('template/navbar.php');?>
    <div style="display:none" id="success-info" class="alert alert-success" role="alert"></div>
    <div style="display:none" id="danger-info" class="alert alert-danger" role="alert"></div>
    <nav class="navbar navbar-light bg-light">
      <form class="form-inline">
        <input id="searched_item_input" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button type="button" onclick="searchItems()" class="btn btn-outline-success my-2 my-sm-0">Search</button>
      </form>
    </nav>
    <br>
  <!-- <?php include ('template/searched_items.php');?> -->
<!-- <a class="align-right" href="#">More</a> -->
<!-- <br> -->
  <div>
  <!-- <button type="button" class="btn btn-outline-success my-2 my-sm-0">Add Listing</button> -->
  <a class="btn btn-outline-primary" href="add_item.php">Add Listing</a>
  <a class="btn btn-outline-primary" onclick="showSelling()">Current Auctions</a>
  <a class="btn btn-outline-primary" onclick="showSold()">Past Auctions</a>
  </div>



<div id="selling" >
  <h1>Your Items Auctioning Now</h1>
  <?php $get_selling_items = get_selling_items($connection, $_SESSION['logged_in_user_id']); ?>
  <?php
        // 3. Use returned data (if any)
        while($selling_items = mysqli_fetch_assoc($get_selling_items)) {
          // output data from each row
          $highest_bid = get_highest_bid($connection, $selling_items["item_id"]);
          while ($row = $highest_bid->fetch_assoc()) {
            ?><script>
            console.log(<?php echo $row['MAX(bid_price)'] ?>);
        </script><?php 

          if ($row['MAX(bid_price)'] == null){
            $row['MAX(bid_price)'] = 0; 
          }
          ?>
    
            <div class="col-md-4">
          <div class="card mb-4 box-shadow">

                <strong class="d-inline-block mb-2 text-danger align-center"></strong>
                      <div class="card-body">
                          <a class="d-inline-block mb-2 text-dark" href="#">
                              <b><?php echo $selling_items["item_description"]?></b>
                                <h3 class="mb-0">Bid: £ <?php echo $row['MAX(bid_price)'] ?> </h3>
                                <div class="mb-1">Reserve</div>
                                <div class="mb-1 text-muted strike"><?php echo $selling_items["item_reserve_price"]?></div></a>
                                  <p class="card-text">Beautiful long mirror can stand elegantly in any dressing room.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                  <small class="text-muted">Ending on <?php echo $selling_items["item_end_date"]?></small>
                                </div>
                          </div>
          </div>
        </div>

      <?php }
        } ?>
  </div>


  <div id="sold" style="display:none">
    <h1>Your Past Auctions</h1>
    <?php $get_sold_items = get_sold_items($connection, $_SESSION['logged_in_user_id']); ?>
    <?php
        // 3. Use returned data (if any)
        while($sold_items = mysqli_fetch_assoc($get_sold_items)) {

          ?><script>
            console.log(<?php echo $sold_items ?>);
        </script><?php 
          
          // output data from each row
          $highest_bid = get_highest_bid($connection, $sold_items["item_id"]);
          while ($row = $highest_bid->fetch_assoc()) {
            ?><script>
            console.log(<?php echo $row['MAX(bid_price)'] ?>);
        </script><?php 

          if ($row['MAX(bid_price)'] == null){
            $row['MAX(bid_price)'] = "No Sale"; 
          } else {
            $row['MAX(bid_price)'] = "SOLD: £" + $row['MAX(bid_price)'];
          }
          ?>
    
            <div class="col-md-4">
          <div class="card mb-4 box-shadow">

                <strong class="d-inline-block mb-2 text-danger align-center"></strong>
                      <div class="card-body">
                          <a class="d-inline-block mb-2 text-dark" href="#">
                              <b><?php echo $sold_items["item_description"]?></b>
                                <h3 class="mb-0"><?php echo $row['MAX(bid_price)'] ?> </h3>
                                <div class="mb-1">Reserve</div>
                                <div class="mb-1 text-muted strike"><?php echo $sold_items["item_reserve_price"]?></div></a>
                                  <p class="card-text">Beautiful long mirror can stand elegantly in any dressing room.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                  <small class="text-muted">Ending on <?php echo $sold_items["item_end_date"]?></small>
                                </div>
                          </div>
          </div>
        </div>

      <?php }
        } ?>
  
  </div>



</body>
</html>
