<?php
	require('../connection.php');
    require_once '../phpmail.php';
    $msg = "";
    $error_code = 1;
    if (isset($_POST['user_id'])){
        $user_id = $_POST['user_id'];
        $query = "SELECT privilege, Email from `user` where user_id='$user_id'";
        $result = mysqli_query($connection, $query);
        $row = $result->fetch_array();
        $privilege = !$row["privilege"];
        $query = "UPDATE `user` SET privilege='$privilege' where user_id='$user_id'";
        $result = mysqli_query($connection, $query);
        if(!$result) {
            $error_code = "1";
            $msg = "Error while trying to update privilege";
        } else {
            if ($privilege == 0) {
                $sec_key = rand(0,10000);
                $query = "INSERT INTO `administrator_accounts` (administrator_id, secretkey) VALUES('$user_id','$sec_key')";
                $result = mysqli_query($connection, $query);
                $error_code = "0";
                $msg = "Successfully added the user as admin, Your security key is ".$sec_key;
                $email_id = $row["Email"];
                send_email($email_id,$msg,"Added as admin");
            } else {
                $query = "DELETE FROM `administrator_accounts` where administrator_id = '$user_id'";
                $result = mysqli_query($connection, $query);
                $error_code = "0";
                $msg = "Successfully removed the user from admin";
            }
            
        }
    } else {
        $error_code = "1";
        $msg = "Required values not sent in the request";
    }
    
    $arr = array('msg' => $msg, 'error_code' => $error_code);
    echo json_encode($arr);
?>