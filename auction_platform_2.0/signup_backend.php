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
        $query = "SELECT * from `user` where Email='$reg_email'";
        $result = mysqli_query($connection, $query);

        //$query2 = "SELECT * from `seller_accounts` where Email='$reg_email'";
        //$result2 = mysqli_query($connection, $query2);

        $msg = "success";
        $error_code = "0";
        if ((mysqli_num_rows($result)>0)){
        	$msg ="User exists with this email, please use some other";
        	$error_code = "1";
        	// $_SESSION['failure_sign_up']= "User exists with this email, please use some other";
        } else {
            if ($error_code == "0") {
                $user_type_id = -1;
                $privilege = -1;
                $user_type_name = "None";
                $table_name = "None";
                $user_id_column_name = 'None';
                if ($user_type == 'buyer') {
                    $user_type = 2;
                    $privilege = 2;
                    $user_type_name = "Buyer";
                    $table_name = "buyer_accounts";
                    $user_id_column_name = 'buyer_id';
                } else if ($user_type == 'seller') {
                    $user_type = 3;
                    $privilege = 3;
                    $user_type_name = "Seller";
                    $table_name = "seller_accounts";
                    $user_id_column_name = 'seller_id';
                } else if ($user_type == 'both') {
                    $user_type = 1;
                    $privilege = 1;
                    $user_type_name = "Buyer/Seller";
                    $table_name = "both";
                    $user_id_column_name = 'both';
                } else {
                    $msg = "Unknown user type";
                    $error_code = "1";
                    $arr = array('msg' => $msg, 'error_code' => $error_code);
                    echo json_encode($arr);
                    die();
                }
                $query = "INSERT INTO `user` (privilege, user_type, Fullname, Email, Password) VALUES ('$privilege','$user_type','$full_name', '$reg_email', '$reg_password')";
                $result = mysqli_query($connection, $query);
                $query = "SELECT user_id from `user` where Email='$reg_email'";
                $result = mysqli_query($connection, $query);
                $row = $result->fetch_row();
                $user_id = $row[0];
                if ($table_name != "both") {
                    $query = "INSERT INTO `".$table_name."` (".$user_id_column_name.") VALUES ('$user_id')";
                    $result = mysqli_query($connection, $query);
                } else {
                    $query = "INSERT INTO `buyer_accounts` (buyer_id) VALUES ('$user_id')";
                    $result = mysqli_query($connection, $query);
                    $query = "INSERT INTO `seller_accounts` (seller_id) VALUES ('$user_id')";
                    $result = mysqli_query($connection, $query);
                }
                $msg = $user_type_name." Created Successfully";
                $error_code = "0";
            }
	    }
    }
    $arr = array('msg' => $msg, 'error_code' => $error_code);
    echo json_encode($arr);

?>