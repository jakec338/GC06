<?php
	require('connection.php');
    // If the values are posted, insert them into the database.
    if (isset($_POST['email']) && isset($_POST['password'])){
		$email = $_POST['email'];
        $password = $_POST['password'];
        $query = "SELECT * from `user` where Email='$email' && Password='$password'";
        $result = mysqli_query($connection, $query);
        $msg = "error";
        $error_code = "1";
        if(mysqli_num_rows($result)>0){
            $row = $result->fetch_row();
            $user_type = $row[2];
            $user_type_name = "none";
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
                $user_type_name = "admin";
            } else {
                $msg = "Erroneous user type";
                $error_code = 1;
                $arr = array('msg' => $msg, 'error_code' => $error_code);
                echo json_encode($arr);
                die();
            }
            $error_code = "0";
            $_SESSION['logged'] = $user_type_name;
            $_SESSION['logged_in_user'] = $email;
            $_SESSION['logged_in_user_id'] = $row[0];
            $_SESSION['logged_in_user_name'] = $row[3];
        } else {
             $msg = "Email/Password do not match";
            $error_code = "1";
        }
    }
    $arr = array('msg' => $msg, 'error_code' => $error_code);
    echo json_encode($arr);
?>