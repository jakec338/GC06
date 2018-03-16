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

  <script type="text/javascript">
    $( document ).ready(function() {
      $("form#additemform").submit(function(e) {
          e.preventDefault();
          var formData = new FormData(this);
          $.ajax({
              url: 'backend/add_item_backend.php',
              type: 'POST',
              data: formData,
              success: function (output) {
                /*  alert(output);*/
                  output = JSON.parse(output);
                  $("#success-info").css("display","block");
                  $("#danger-info").css("display","none");
                  $("#success-info").html(output.msg);
                  $("#cancelbtn").click();
              },
              error : function(error) {
                  $("#add_item_success-info").css("display","none");
                  $("#add_item_danger-info").css("display","block");
                  $("#add_item_danger-info").html(output.msg);
              },
              cache: false,
              contentType: false,
              processData: false
          });
      });
    });
  </script>
</head>
<body>
  <div class="container">
    <?php include ('template/navbar.php');?>
    <div style="display:none" id="success-info" class="alert alert-success" role="alert"></div>
    <div style="display:none" id="danger-info" class="alert alert-danger" role="alert"></div>
    <nav class="navbar navbar-light bg-light">
      <form class="form-inline">
        <button type="button" data-toggle="modal" data-target="#itemModal" class="btn btn-outline-success my-2 my-sm-0">Add New Item</button>
      </form>
    </nav>
    <br>
    <?php include ('template/all_items.php');?>
 


    <div id="addItemsModal">
      <form id="additemform" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="itemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="itemModalLabel">Add an Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                  <div style="display:none" id="add_item_success-info" class="alert alert-success" role="alert"></div>
                  <div style="display:none" id="add_item_danger-info" class="alert alert-danger" role="alert"></div>

                  <div class="row">
                    <div class="col-md-8">
                      <div class="form-label-group">
                        <input name="item_description" type="text" id="item_description" class="form-control" placeholder="Item Name" required="" autofocus="">
                        <!-- <label for="item_name"></label> -->
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-label-group">
                        <select name="item_category" class="form-control" id="item_category">
                          <option>Category</option>
                          <option>Loose Furniture</option>
                          <option>Paintings</option>
                          <option>Sculpture</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <hr/>

                  <div class="form-label-group">
                    <input name="item_starting_price" type="number" id="item_starting_price" class="form-control" placeholder="Starting Price" required="" autofocus="">
                    <!-- <label for="item_starting_price"></label> -->
                  </div>
                  <hr/>

                  <div class="form-label-group">
                    <input name="item_reserved_price" type="number" id="item_reserved_price" class="form-control" placeholder="Reserved Price" required="" autofocus="">
                    <!-- <label for="item_reserved_price"></label> -->
                  </div>
                  <hr/>

                  <div class="form-label-group">
                    <input name="item_ending_date" type="date" id="item_ending_date" class="form-control" placeholder="Ending Date (DD/MM/YYYY)" required="" autofocus="">
                  </div>
                  <hr/>

                  <div class="form-label-group">
                    <input name="item_url" type="file" id="item_url" class="form-control" placeholder="Choose File" required="" autofocus="">
                    <!-- <label for="item_url"></label> -->
                  </div>


              </div>
              <div class="modal-footer">
                <button id="cancelbtn" type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                 <!-- data-dismiss="modal" -->
                <button type="submit" id="add_item_btn" class="btn btn-primary">Add</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
