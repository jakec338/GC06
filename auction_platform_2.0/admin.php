<!DOCTYPE html>
<html>
<head>
<?php include ('template/include_files.php');?>
<script>
function isAdminLoginValid() {
    //assuming everything is valid
    //TODO: have to check on client side if everything is valid
    var email = $("#email").val();
    var password = $("#password").val();
    var secretkey= $("#secretkey").val();
    if (email == "" || password == "") {
      $("#success-info").css("display","none");
      $("#danger-info").css("display","block");
      $("#danger-info").html("All fields are necessary");
      return false;
    }

    $.ajax({ url: 'admin_login_backend.php',
         data: {
          'email': email,
          'password': password,
          'secretkey':secretkey
        },
         type: 'post',
         success: function(output) {
          alert(output);
               output = JSON.parse(output);
             if (output.error_code=="0") {
                $("#success-info").css("display","block");
                $("#danger-info").css("display","none");
                $("#success-info").html(output.msg);
                window.location.href = "admin_home.php";
             } else {
                $("#success-info").css("display","none");
                $("#danger-info").css("display","block");
                $("#danger-info").html(output.msg);
             }
         }
    });

    return true;
  }

  </script>
</head>
<body>
  <div class="container">
    <?php include ('template/navbar.php');?>
    <form class="form-signin">
      <div class="align-center">
        <i class="icon-gradient2 fab fa-adn fa-5x" ></i>
      </div>
      <br>
      <h1 class="h3 mb-3 font-weight-normal align-center">Admin Sign in</h1>
      <div style="display:none" id="success-info" class="alert alert-success" role="alert"></div>
      <div style="display:none" id="danger-info" class="alert alert-danger" role="alert"></div>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="email" class="form-control" placeholder="Email address" required="" autofocus="">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="password" class="form-control" placeholder="Password" required="">

      <label for="inputPassword" class="sr-only">Security Key</label>
      <input type="password" id="securitykey" class="form-control" placeholder="Security Key" required="">
      
      <button onclick="isAdminLoginValid()" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <br>
      <a class="align-center" href="login.html">Client Login</a>
    </form>
  </div>

</body>
</html>