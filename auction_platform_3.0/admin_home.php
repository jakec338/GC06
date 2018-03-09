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
   $ongoing_auctions = array();
  ?> 
  <script type="text/javascript">
    function setPrivilege (user_id) {
      $.ajax({ url: 'backend/set_privilege_backend.php',
        data: {
          'user_id': user_id
        },
        type: 'post',
        success: function(output) {
          output = JSON.parse(output);
          if (output.error_code=="0") {
            $("#success-info").css("display","block");
            $("#danger-info").css("display","none");
            $("#success-info").html(output.msg);
          } else {
            $("#success-info").css("display","none");
            $("#danger-info").css("display","block");
            $("#danger-info").html(output.msg);
          }
        }
      });
    }
  </script>
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
    <strong class="d-inline-block mb-2 text-primary">User Info</strong>         
    <table class="table table-striped">
      <thead>
        <tr>
          <th><strong class="d-inline-block mb-2 text-danger">Fullname</strong></th>
          <th><strong class="d-inline-block mb-2 text-danger">Type</strong></th>
          <th><strong class="d-inline-block mb-2 text-danger">Email</strong></th>
          <th><strong class="d-inline-block mb-2 text-danger">Privilege</strong></th>
          <th><strong class="d-inline-block mb-2 text-danger">Set Privilege</strong></th>
        </tr>
      </thead>
      <tbody>
        <tr>
           <?php  
             $query="SELECT Fullname,user_type,Email, privilege,user_id  FROM `user`";
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
                    echo "<td>" . $row["Fullname"]. "</td><td>"."buyer". "</td><td> ". $row["Email"]. "</td><td>".$user_privilege."</td><td><input onchange=\"setPrivilege('".$row["user_id"]."')\" type=\"checkbox\" ".$checked." value=\"\"></td></tr>";
                  else if($row["user_type"]=="2")
                     echo "<td>" . $row["Fullname"]. "</td><td>"."Seller". "</td><td> ". $row["Email"]. "</td><td>".$user_privilege."</td><td><input onchange=\"setPrivilege('".$row["user_id"]."')\" type=\"checkbox\" ".$checked." value=\"\"></td></tr>";
                  else if($row["user_type"]=="3")
                     echo "<td>" . $row["Fullname"]. "</td><td>"."Both". "</td><td> ". $row["Email"]. "</td><td>".$user_privilege."</td><td><input onchange=\"setPrivilege('".$row["user_id"]."')\" type=\"checkbox\" ".$checked." value=\"\"></td></tr>";
               }
            }
             ?>
        </tr>
      </tbody>
    </table>

    <strong class="d-inline-block mb-2 text-primary">Ongoing Auctions</strong>            
    <table class="table table-striped">
      <thead>
        <tr>
          <th><strong class="d-inline-block mb-2 text-success">Category</strong></th>
          <th><strong class="d-inline-block mb-2 text-success">Item Name</strong></th>
          <th><strong class="d-inline-block mb-2 text-success">Bidding Price</strong></th>
          <th><strong class="d-inline-block mb-2 text-success">Bidding User</strong></th>
        </tr>
      </thead>
      <tbody>
        <tr>
           <?php  
               $query1="SELECT  `Listed_Items_item_id`, `Buyer_Accounts_buyer_id`, `bid_price`,`item_description`,`item_category`,`Fullname`, `item_end_date` FROM `bids` INNER JOIN listed_items on listed_items.item_id=Listed_Items_item_id INNER JOIN user on user.user_id=Buyer_Accounts_buyer_id";
               $result=mysqli_query($connection,$query1);
                if(mysqli_num_rows($result)>0) {
                  while($row= mysqli_fetch_assoc($result)){
                    $cur_date = date('Y-m-d');
                    $end_date = str_replace('/', '-', $row["item_end_date"]);
                    $time = strtotime($end_date);
                    $end_date = date('Y-m-d',$time);
                    if ($cur_date<$end_date)
                      echo "<td>" . $row["item_category"]. "</td><td>".$row["item_description"]. "</td><td> ". $row["bid_price"]. "</td><td>".$row["Fullname"]."</td></tr>";
                  }
                } 
             ?>
        </tr>
      </tbody>
    </table>


    <strong class="d-inline-block mb-2 text-primary">Completed Auctions</strong>            
    <table class="table table-striped">
      <thead>
        <tr>
          <th><strong class="d-inline-block mb-2 text-info">Category</strong></th>
          <th><strong class="d-inline-block mb-2 text-info">Item Name</strong></th>
          <th><strong class="d-inline-block mb-2 text-info">Bidding Price</strong></th>
          <th><strong class="d-inline-block mb-2 text-info">Bidding User</strong></th>
        </tr>
      </thead>
      <tbody>
        <tr>
           <?php  
               $query1="SELECT  `Listed_Items_item_id`, `Buyer_Accounts_buyer_id`, `bid_price`,`item_description`,`item_category`,`Fullname`, `item_end_date` FROM `bids` INNER JOIN listed_items on listed_items.item_id=Listed_Items_item_id INNER JOIN user on user.user_id=Buyer_Accounts_buyer_id";
               $result=mysqli_query($connection,$query1);
                if(mysqli_num_rows($result)>0) {
                  while($row= mysqli_fetch_assoc($result)){
                    $cur_date = date('Y-m-d');
                    $end_date = str_replace('/', '-', $row["item_end_date"]);
                    $time = strtotime($end_date);
                    $end_date = date('Y-m-d',$time);
                    if ($cur_date>$end_date)
                      echo "<td>" . $row["item_category"]. "</td><td>".$row["item_description"]. "</td><td> ". $row["bid_price"]. "</td><td>".$row["Fullname"]."</td></tr>";
                  }
                } 
             ?>
        </tr>
      </tbody>
    </table>

  </div>
</body>
</html>
