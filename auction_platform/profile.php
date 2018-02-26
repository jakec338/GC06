<?php 
  session_start();
  if(!isset($_SESSION['logged'])) {
    header("Location: index.php");
    exit();
  }
?>
<!DOCTYPE html>
<html>
<head>
<?php include ('template/include_files.php');?>
</head>
<body>
  <div class="container">
    <?php include ('template/navbar.php');?>
    <?php if($_SESSION['logged']=="seller") {
        include ('template/reports.php');
      } else if($_SESSION['logged']=="buyer") {
        include ('template/recommendations.php');
      }
    ?>

    <?php include ('template/activity.php');?>
    <?php include ('template/completed_auction.php');?>
    <?php include ('template/ongoing_auction.php');?>
    
  </div>

</body>
</html>