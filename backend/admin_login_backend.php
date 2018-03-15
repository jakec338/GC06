<?php
    require('../connection.php');
    // If the values are posted, insert them into the database.
    if (isset($_POST['email']) && isset($_POST['password'])&&isset($_POST['secretkey'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $secretkey=$_POST['secretkey'];

        $query = "SELECT `user_id`, `privilege`,`Email`, `Password`,`secretkey` FROM `user` INNER JOIN administrator_accounts on administrator_accounts.administrator_id=user_id WHERE `Email`='$email' AND `Password`='$password'";
        $result = mysqli_query($connection, $query);
  
        $msg = "error";
        $error_code = "1";
        
       if(mysqli_num_rows($result)>0){
            $row = $result->fetch_array();
            $user_privilege = $row["privilege"];
           
            if ($user_privilege== 0) {
                if ($secretkey == $row["secretkey"]) {
                    $error_code = "0";
                    $msg = "Admin logged in successfully";
                    $user_type_name = "both";
                    $_SESSION['is_admin'] = "Admin";  
                } else {
                    $error_code = "1";
                    $msg = "Not matching info";
                }
            } else {
                $msg = "Erroneous user type";
                $error_code = "1";
            }
        }
    }

    $arr = array('msg' => $msg, 'error_code' => $error_code);
    echo json_encode($arr);
?>