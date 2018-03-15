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
<script type="text/javascript" src="js/dog_watcher.js"></script>
<script type="text/javascript">
    $( document ).ready(function() {
      dogwatcher();
    });
</script>
</head>
<body>
  <div class="container">
    <?php include ('template/navbar.php');?>
    <?php if($_SESSION['logged']=="seller" || $_SESSION["logged"]=="both") {
        include ('template/reports.php');
      }
      if($_SESSION['logged']=="buyer" || $_SESSION['logged'] =="both") {
        include ('template/recommendations.php');
      }
    ?>
    <hr/>
    <?php include ('template/activity.php');?>
    <hr/>
    <!-- <?php include ('template/completed_auction.php');?> -->
    <hr/>
    <?php include ('template/ongoing_auction.php');?>
    
  </div>

</body>
</html>