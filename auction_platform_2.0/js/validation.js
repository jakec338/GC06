
console.log("fuck0ff");

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
      $("#danger-info").html("All fields are necessarysss");
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
                $("#success-info").html("fuj");
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
  

  function isAdminLoginValid() {
    console.log("tets");
    var email = $("#email").val();
    var password = $("#password").val();
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
        },
         type: 'post',
         success: function(output) {
          //  console.log(output)
          alert(output);
               output = JSON.parse(output);
             if (output.error_code=="0") {
                $("#success-info").css("display","block");
                $("#danger-info").css("display","none");
                $("#success-info").html(output.msg);
                window.location.href = "admin_dashboard.php";
             } else {
                $("#success-info").css("display","none");
                $("#danger-info").css("display","block");
                $("#danger-info").html(output.msg);
                window.location.href = "index.php";
             }
         }
    });

    return true;
  }



  function isValidItemAdd() {
    //assuming everything is valid
    //TODO: have to check on client side if everything is valid
    var item_description = $("#item_description").val();
    var item_category = $("#item_category").val();
    var item_start_price = $("#item_start_price").val();
    var item_reserve_price = $("#item_reserve_price").val();
    var item_end_date = $("#item_end_date").val();
    var item_image = $("#item_image").files[0];
    if (item_description == "" || item_category == "") {
      $("#success-info").css("display","none");
      $("#danger-info").css("display","block");
      $("#danger-info").html("All fields are necessary");
      return false;
    }
    console.log(item_image);
    

    $.ajax({ url: 'backend/create_item.php',
         data: {
          'item_description': item_description,
          'item_category': item_category,
          'item_start_price': item_start_price,
          'item_reserve_price': item_reserve_price,
          'item_end_date': item_end_date,
          'item_image': item_image
        },
         type: 'post',
         success: function(output2) {
              output2 = JSON.parse(output2);
             if (output2.error_code=="0") {
                window.location.href = "profile.php";
                $("#success-info").css("display","block");
                $("#danger-info").css("display","none");
                $("#success-info").html(output2.msg);
             } else if (output2.error_code =="1"){
                $("#success-info").css("display","none");
                $("#danger-info").css("display","block");
                $("#danger-info").html(output2.msg);
             } else if (output2.error_code =="3") {
              window.location.href = "login.php";
             }
         }
    });
    return true;
  }
