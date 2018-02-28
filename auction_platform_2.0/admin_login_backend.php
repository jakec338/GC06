<?php
    require('connection.php');
    // If the values are posted, insert them into the database.
    if (isset($_POST['email']) && isset($_POST['password'])&&isset($_POST['secretkey'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $secretkey=$_POST['secretkey'];
        $query = "SELECT * from `user` where Email='$email' && Password='$password'";
        $result = mysqli_query($connection, $query);
        $row = $result->fetch_row();
        $msg = "error";
        $error_code = "1";
        $user_id=$row[0];
        $user_privilege=$row[1];

        if($user_privilege=="0"){
       
            $query1="SELECT * from `adminstrator_account` where administrator_id=$user_id";
            $result1=mysql_query($query1);
             if(mysqli_num_rows($result1)>0){
                 $msg = "Admin logged in successfully";
                $user_type_name = "Admin";
                $_SESSION['Admin'] = "admin";

            
          
         /*   $user_type_name = "none";
            if ($user_type == 1) {
                $msg = "Buyer/Seller logged in successfully";
                $user_type_name = "both";
                $_SESSION['is_both'] = "both";
            } else if ($user_type == 2) {
                $msg = "Buyer logged in successfully";
                $user_type_name = "buyer";
            } else if ($user_type == 3) {
                $msg = "Seller logged in successfully";
                $user_type_name = "seller";
            } else if ($user_type == 0) {
                $msg = "Admin logged in successfully";
                $user_type_name = "admin";*/
            } else {
                $msg = "Erroneous user type";
                $error_code = 1;
                $arr = array('msg' => $msg, 'error_code' => $error_code);
                echo json_encode($arr);
                die();
            }
            $error_code = 0;
            $_SESSION['logged'] = $user_type_name;
            $_SESSION['logged_in_user'] = $email;
            $_SESSION['logged_in_user_id'] = $row[0];
            $_SESSION['logged_in_user_name'] = $row[3];
        }
    }
    $arr = array('msg' => $msg, 'error_code' => $error_code);
    echo json_encode($arr);
?>