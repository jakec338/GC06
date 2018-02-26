<?php
	require('connection.php');
    // If the values are posted, insert them into the database.
    $msg = "error";
    $error_code = "1";
    if (isset($_POST['reg_email']) && isset($_POST['reg_password']) && isset($_POST['full_name']) && isset($_POST['user_type'])){
		$reg_email = $_POST['reg_email'];
        $reg_password = $_POST['reg_password'];
        $full_name = $_POST['full_name'];
        $user_type = $_POST['user_type'];

        //check if the email already exists
        $query1 = "SELECT * from `buyer_accounts` where Email='$reg_email'";
        $result1 = mysqli_query($connection, $query1);

        $query2 = "SELECT * from `seller_accounts` where Email='$reg_email'";
        $result2 = mysqli_query($connection, $query2);

        $msg = "success";
        $error_code = "0";
        if ((mysqli_num_rows($result1)>0) || (mysqli_num_rows($result2)>0)){
        	$msg ="User exists with this email, please use some other";
        	$error_code = "1";
        	// $_SESSION['failure_sign_up']= "User exists with this email, please use some other";
        } else {
            if ($error_code == "0") {  
                if ($user_type == 'buyer') {
        	        $query = "INSERT INTO `buyer_accounts` (Fullname, Email, Password) VALUES ('$full_name', '$reg_email', '$reg_password')";
        	        $result = mysqli_query($connection, $query);
        	        if($result){
                        // $_SESSION['logged'] = '1';
                        $error_code = "0";
        	            $msg = "Buyer Created Successfully.";
        	        }else{
        	            $msg ="Buyer Registration Failed";
                        $error_code = "1";
        	        }
                } else if ($user_type == 'seller') {
                    $query = "INSERT INTO `seller_accounts` (Fullname, Email, Password) VALUES ('$full_name', '$reg_email', '$reg_password')";
                    $result = mysqli_query($connection, $query);
                    if($result){
                        // $_SESSION['logged'] = '1';
                        $error_code = "0";
                        $msg = "Seller Created Successfully.";
                    }else{
                        $msg ="Seller Registration Failed";
                        $error_code = "1";
                    }
                } else if ($user_type == 'both') {
                    $query = "INSERT INTO `buyer_accounts` (Fullname, Email, Password) VALUES ('$full_name', '$reg_email', '$reg_password')";
                    $result = mysqli_query($connection, $query);
                    if($result){
                        // $_SESSION['logged'] = '1';
                        $error_code = "0";
                        $msg = "User Created Successfully.";
                    }else{
                        $msg ="User Registration Failed";
                        $error_code = "1";
                    }

                    $query = "INSERT INTO `seller_accounts` (Fullname, Email, Password) VALUES ('$full_name', '$reg_email', '$reg_password')";
                    $result = mysqli_query($connection, $query);
                    if($result){
                        // $_SESSION['logged'] = '1';
                        $error_code = "0";
                        $msg = "User Created Successfully.";
                    }else{
                        $msg ="User Registration Failed";
                        $error_code = "1";
                    }
                }
            }
	    }
    }
    $arr = array('msg' => $msg, 'error_code' => $error_code);
    echo json_encode($arr);

?>