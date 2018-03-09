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
  <script type="text/javascript" src="js/searched_item.js"></script>
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
  <?php include ('template/searched_items.php');?>
<!-- <a class="align-right" href="#">More</a> -->
<!-- <br> -->

    <!-- Modal -->
  <div id="allbidModal">
    <div class="modal fade" id="bidModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="bidModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table>
              <thead>
                <tr>
                  <td scope="col">
                    Item
                  </td>
                  <td scope="col">
                    Starting Price
                  </td>
                  <td scope="col">
                    Reserved Price
                  </td scope="col">
                </tr>
                <tbody>
                  <tr>
                    <td>
                      <small id="biditem" class="text-muted"></small>
                    </td>
                    <td>
                      <small id="bidstartingprice" class="text-muted"></small>
                    </td>
                    <td>
                      <small id="bidreservedprice" class="text-muted"></small>
                    </td>
                    <td>
                      <div class="form-label-group">
                        <input name="bid_price" type="number" id="bid_price" class="form-control" placeholder="Bid amount" required="" autofocus="">
                      </div>
                    </td>
                  </tr>
                </tbody>
              </thead>
            </table>
            <hr />
            <div class="form-label-group">
              <input name="bid_feedback" type="text" id="bid_feedback" class="form-control" placeholder="Feedback to seller" required="" autofocus="">
              <hr/>
              <select name="bid_rating" class="form-control" id="bid_rating">
                <option>Rating</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button onclick="bidOnIt()" type="button" class="btn btn-primary">Bid</button>
          </div>
        </div>
      </div>
    </div>  
  </div>

  <?php include ('template/categories.php');?>
</div>

</body>
</html>
