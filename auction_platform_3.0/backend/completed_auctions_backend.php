<?php
    require('../connection.php');
    $msg = "error";
    $error_code = "1";
    $max_bought_items = array();
    if (isset($_POST['email']) && isset($_POST['user_type'])) {
        $email = $_POST['email'];
        $user_type = $_POST['user_type'];
        $user_id = -1;
        $query = "SELECT * from `user` where Email='$email'";
        $result = mysqli_query($connection, $query);
        $row = $result->fetch_row();
        $user_id = $row[0];

        if ($user_id >= 0) {
            
            if ($user_type == "seller") {
                $user_id = "";
            }

            $max_bought_items = array();
            $query = "SELECT * from `completed_items` where user_id = '$user_id'";
            $result = mysqli_query($connection, $query);
            if (mysqli_num_rows($result)>0) {
                while ($row = $result->fetch_array()) {
                    array_push($max_bought_items,$row);
                }
            }

            $msg = "Successfully received activities";
            $error_code = 0;

        } else {
            $msg = "No such user";
            $error_code = 1;
        }
    }
    $arr = array('msg' => $msg, 'error_code' => $error_code, 'completed_auctions' => $max_bought_items);
    echo json_encode($arr);

?>