<!DOCTYPE html>
<html>
<head>
  <?php include ('template/include_files.php');?>
  <?php include ('connection.php');
   $ongoing_auctions = array();
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
    <nav class="navbar navbar-light bg-light">
      <form class="form-inline">
        <input id="searched_item_input" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button type="button" onclick="searchItems('','')" class="btn btn-outline-success my-2 my-sm-0">Search</button>
      </form>
    </nav>
    <br>
   <div class="container">
  <h2>User Info</h2>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Fullname</th>
        <th>Type</th>
        <th>Email</th>
        <th>Privilege</th>
      </tr>
    </thead>
    <tbody>
      <tr>

         <?php  
           $query="SELECT Fullname, user_type,Email, privilege FROM `user`";
           $result=mysqli_query($connection,$query);
           if(mysqli_num_rows($result)>0)
           {

            while($row= mysqli_fetch_assoc($result)){
              if($row["user_type"]=="1")
              

              echo "<td>" . $row["Fullname"]. "</td><td>"."buyer". "</td><td> ". $row["Email"]. "</td><td>".$row["privilege"]."</td></tr>";
            
              else if($row["user_type"]=="2")
              

                 echo "<td>" . $row["Fullname"]. "</td><td>"."Seller". "</td><td> ". $row["Email"]. "</td><td>".$row["privilege"]."</td></tr>";
                else if($row["user_type"]=="3")
              

                 echo "<td>" . $row["Fullname"]. "</td><td>"."Both". "</td><td> ". $row["Email"]. "</td><td>".$row["privilege"]."</td></tr>";

           }
        }

           ?>
      </tr>
    </tbody>
  </table>
</div>
<br>

<h2>Info about Ongoing Auction and Completed Auction</h2>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Category</th>
        <th>ItemName</th>
        <th>Bidding Price</th>
        <th>BidderUser</th>
      </tr>
    </thead>
    <tbody>
      <tr>

         <?php  
      
             $query1="SELECT  `Listed_Items_item_id`, `Buyer_Accounts_buyer_id`, `bid_price`,`item_description`,`item_category`,`Fullname` FROM `bids` INNER JOIN listed_items on listed_items.item_id=Listed_Items_item_id INNER JOIN user on user.user_id=Buyer_Accounts_buyer_id";
             $result=mysqli_query($connection,$query1);
             if(mysqli_num_rows($result)>0)
           {

            while($row= mysqli_fetch_assoc($result)){

                   echo "<td>" . $row["item_category"]. "</td><td>".$row["item_description"]. "</td><td> ". $row["bid_price"]. "</td><td>".$row["Fullname"]."</td></tr>";


            }


          }
                  


           ?>
      </tr>
    </tbody>
  </table>
  <br>





</div>















 

 
</div>

</body>
</html>
