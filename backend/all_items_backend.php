<?php
	require('../connection.php');
    // If the values are posted, insert them into the database.
    $your_items = array();
    $other_items = array();
    $msg = "error";
    $error_code = "1";
    $count = 0;
    $user_id = $_SESSION['logged_in_user_id'];
    $query = "SELECT * from `listed_items` where Seller_Accounts_seller_id='$user_id'";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        $error_code = "1";
        $msg = "Error retrieving your items";
                
        $arr = array('msg' => $msg, 'error_code' => $error_code,
        'your_items' => $your_items, 'other_items' => $other_items);
        echo json_encode($arr);
    }
    while($row = $result->fetch_array()) {
        array_push($your_items, $row);
    }

    $query = "SELECT * from `listed_items` where Seller_Accounts_seller_id!='$user_id'";
    $result = mysqli_query($connection, $query);

    if(!$result) {
        $error_code = "1";
        $msg = "Error retrieving other sellers items";
                
        $arr = array('msg' => $msg, 'error_code' => $error_code,
        'your_items' => $your_items, 'other_items' => $other_items);
        echo json_encode($arr);
    }
    
    while($row = $result->fetch_array()) {
        array_push($other_items, $row);
    }

    $error_code = "0";
    $msg = "Successfully received items";
            
    $arr = array('msg' => $msg, 'error_code' => $error_code,
    'your_items' => $your_items, 'other_items' => $other_items);
    echo json_encode($arr);
?>