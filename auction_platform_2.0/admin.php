<!DOCTYPE html>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<script src="js/jquery-1.11.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<script src="js/validation.js"></script>

<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/signin.css">
<body>
  <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
  <h5 class="my-0 mr-md-auto text-dark">Auction</h5>
    <nav class="my-2 my-md-0 mr-md-3">
      <a class="p-2 text-dark" href="profile.php">Home</a>
        <a class="p-2 text-dark" href="buy.php">Buy</a>
      <a class="p-2 text-dark" href="#">Sell</a>
    </nav>
 
  } else {?>
    <a class="btn btn-outline-primary mr-sm-2" href="signup.php">Sign up</a>
    <a class="btn btn-outline-primary" href="login.php">Sign in</a>
  <?php }?>
</div>
  
    <?php include ('template/navbar.html');?>
  
    <form class="form-signin">

     
     
      <div class="align-center">
        <i class="icon-gradient2 fab fa-adn fa-5x" ></i>
      </div>
      <br>
      <h1 class="h3 mb-3 font-weight-normal align-center">Admin sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="">

      <label for="inputPassword" class="sr-only">Security Key</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Security Key" required="">
      
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <br>
      <a class="align-center" href="login.php">Client Login</a>
    </form>
  </div>

</body>
</html>