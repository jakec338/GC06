<?php
    require('connection.php');
    $msg = "error";
    $error_code = "1";
    if (!empty($_POST["email"]) && 
        !empty($_POST["password"])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = "SELECT * FROM user INNER JOIN administrator_accounts ON user.user_id = administrator_id WHERE Email='$email' AND Password='$password'";
        $result = mysqli_query($connection, $query);
        $row = $result->fetch_row();
        $user_id=$row[0];
        $user_privilege=$row[1];
        
             if(mysqli_num_rows($result)>0){
                 $msg = "Admin logged in successfully";
                $user_type_name = "Admin";
                $_SESSION['Admin'] = "admin";
            } else {
                $msg = "Incorrect Details";
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
    
    $arr = array('msg' => $msg, 'error_code' => $error_code);
    echo json_encode($arr);
?>