function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function isValidForm() {

    //assuming everything is valid
    //TODO: have to check on client side if everything is valid
    var full_name = $("#full_name").val();
    var email = $("#reg_email").val();
    var password = $("#reg_password").val();
    var user_type = "buyer";
    if(document.getElementById('buyer_radio_btn').checked) {
        user_type = "buyer";
    } else if(document.getElementById('seller_radio_btn').checked) {
        user_type = "seller";
    } else if(document.getElementById('both_radio_btn').checked) {
        user_type = "both";
    }
    
    if (full_name == "" || email == "" || password == "" ) {
      $("#success-info").css("display","none");
      $("#danger-info").css("display","block");
      $("#danger-info").html("All fields are necessary");
      return false;
    }

    if (!validateEmail(email)) {
      $("#success-info").css("display","none");
      $("#danger-info").css("display","block");
      $("#danger-info").html("Not valid email");
      return false;
    }


    $.ajax({ url: 'signup_backend.php',
         data: {
          'full_name': full_name,
          'reg_email': email,
          'reg_password': password,
          'user_type': user_type
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
    return true;
  }

  function isValidLogin() {
    //assuming everything is valid
    //TODO: have to check on client side if everything is valid
    var email = $("#email").val();
    var password = $("#password").val();
    if (email == "" || password == "") {
      $("#success-info").css("display","none");
      $("#danger-info").css("display","block");
      $("#danger-info").html("All fields are necessary");
      return false;
    }

    $.ajax({ url: 'signin_backend.php',
         data: {
          'email': email,
          'password': password
        },
         type: 'post',
         success: function(output) {
              output = JSON.parse(output);
             if (output.error_code=="0") {
                $("#success-info").css("display","block");
                $("#danger-info").css("display","none");
                $("#success-info").html(output.msg);
                window.location.href = "profile.php";
             } else {
                $("#success-info").css("display","none");
                $("#danger-info").css("display","block");
                $("#danger-info").html(output.msg);
             }
         }
    });

    return true;
  }

  