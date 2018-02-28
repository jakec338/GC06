<?php
	require('../connection.php');
    // If the values are posted, insert them into the database.
    $search_results = array();
    $msg = "";
    $error_code = 1;
    if (isset($_POST['item_id'])){
        $user_id = $_SESSION['logged_in_user_id'];
        $listed_item_id = $_POST['item_id'];
        $query = "INSERT INTO `watching_items` (user_id,listed_item_id) VALUES('$user_id','$listed_item_id')";
        $result = mysqli_query($connection, $query);
        if(!$result) {
            $error_code = "1";
            $msg = "Error while trying to watch";
        }
    } else {
        $error_code = "1";
        $msg = "Required values not sent in the request";
    }
    
    $arr = array('msg' => $msg, 'error_code' => $error_code);
    echo json_encode($arr);
?>