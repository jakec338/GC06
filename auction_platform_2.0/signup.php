<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php include ('template/include_files.php');?>
</head>
<body>
  <div class="container">
    <?php include ('template/navbar.php');?>
    <form class="form-signin"> 
      <div class="align-center">
        <i class="icon-gradient fab fa-adn fa-5x" ></i>
      </div>
      <br>
      <h1 class="h3 mb-3 font-weight-normal align-center">Please sign up</h1>
      <div style="display:none" id="success-info" class="alert alert-success" role="alert"></div>
      <div style="display:none" id="danger-info" class="alert alert-danger" role="alert"></div>
      <div class="form-label-group">
        <input name="full_name" type="text" id="full_name" class="form-control" placeholder="Name" required="" autofocus="">
        <label for="full_name"></label>
      </div>
      <div class="form-label-group">
        <input name="email" type="email" id="reg_email" class="form-control" placeholder="Email address" required="" autofocus="">
        <label for="email"></label>
      </div>

      <div class="form-label-group">
        <input name="password" type="password" id="reg_password" class="form-control" placeholder="Password" required="" autofocus="">
        <label for="reg_password"></label>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="radio" name="user_type" id="buyer_radio_btn" value="option1" checked>
        <label class="form-check-label" for="buyer_radio_btn">
          Buyer
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="user_type" id="seller_radio_btn" value="option2">
        <label class="form-check-label" for="seller_radio_btn">
          Seller
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="user_type" id="both_radio_btn" value="option2">
        <label class="form-check-label" for="both_radio_btn">
          Both
        </label>
      </div>
      <br>
      <button onclick="isValidForm()" class="btn btn-lg btn-primary btn-block" type="button">Sign up</button>
    </form>
  </div>