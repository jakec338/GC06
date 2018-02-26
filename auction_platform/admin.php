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
        <i class="icon-gradient2 fab fa-adn fa-5x" ></i>
      </div>
      <br>
      <h1 class="h3 mb-3 font-weight-normal align-center">Admin sign in</h1>
      <div style="display:none" id="success-info" class="alert alert-success" role="alert"></div>
      <div style="display:none" id="danger-info" class="alert alert-danger" role="alert"></div>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="">

      <label for="inputPassword" class="sr-only">Security Key</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Security Key" required="">
      
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <br>
      <a class="align-center" href="login.html">Client Login</a>
    </form>
  </div>

</body>
</html>