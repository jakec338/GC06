<?php
	require('connection.php');
    // If the values are posted, insert them into the database.
    if (isset($_POST['email']) && isset($_POST['password'])){
		$email = $_POST['email'];
        $password = $_POST['password'];
        $query = "SELECT * from `buyer_accounts` where Email='$email' && Password='$password'";
        $result = mysqli_query($connection, $query);
        $msg = "error";
        $error_code = "1";
        if(mysqli_num_rows($result)>0){
            $msg = "Buyer logged in successfully.";
            $error_code = "0";
            $_SESSION['logged'] = "buyer";
            $_SESSION['logged_in_user'] = $email;
        } else {
            $query = "SELECT * from `seller_accounts` where Email='$email' && Password='$password'";
            $result = mysqli_query($connection, $query);
            if(mysqli_num_rows($result)>0){
                $msg = "Seller logged in successfully.";
                $error_code = "0";
                $_SESSION['logged'] = "seller";
                $_SESSION['logged_in_user'] = $email;
            } else {
                $msg = "Email or Password does not match";
                $error_code = "1";
                //TODO:: Admin login check
                // $query = "SELECT * from `administrator_accounts` where Email='$email' && Password='$password'";
                // $result = mysqli_query($connection, $query);
                // if(mysqli_num_rows($result)>0){
                //     $msg = "Admin logged in successfully.";
                //     $error_code = "0";
                // } else {
                //     $msg = "Email or Password does not match";
                //     $error_code = "1";
                // }
            }
        }
    }
    $arr = array('msg' => $msg, 'error_code' => $error_code);
    echo json_encode($arr);
?>