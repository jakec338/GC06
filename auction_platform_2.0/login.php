<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
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
      <h1 class="h3 mb-3 font-weight-normal align-center">Please sign in</h1>
      <div style="display:none" id="success-info" class="alert alert-success" role="alert"></div>
      <div style="display:none" id="danger-info" class="alert alert-danger" role="alert"></div>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="email" class="form-control" placeholder="Email address" required="" autofocus="">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="password" class="form-control" placeholder="Password" required="">
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button onclick="isValidLogin()" class="btn btn-lg btn-primary btn-block" type="button">Sign in</button>
      <br>
      <a type="button" class="align-center" href="admin.php">Admin Login</a>
    </form>
  </div>

</body>
</html>




