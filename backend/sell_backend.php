<?php
	require('../connection.php');
    // If the values are posted, insert them into the database.
    $selling = array();
    $sold = array();
    $msg = "error";
    $error_code = "1";
    $count = 0;
    $max_bid = 0;
    $user_id = $_SESSION['logged_in_user_id'];
    $query = "SELECT * FROM listed_items LEFT JOIN bids ON listed_items.item_id=bids.Listed_Items_item_id WHERE Seller_Accounts_seller_id='$user_id' && UNIX_TIMESTAMP(item_end_date) >= UNIX_TIMESTAMP()";
    // $query = "SELECT * FROM `listed_items` WHERE Seller_Accounts_seller_id='$user_id' && UNIX_TIMESTAMP(item_end_date) >= UNIX_TIMESTAMP()";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        $error_code = "1";
        $msg = "Error retrieving your selling items";
                
        $arr = array('msg' => $msg, 'error_code' => $error_code,
        'selling' => $selling, 'sold' => $sold);
        echo json_encode($arr);
    }
  
    while($row = $result->fetch_array()) {
        array_push($selling, $row);
    }

    $query = "SELECT * FROM `listed_items` WHERE Seller_Accounts_seller_id='$user_id' && UNIX_TIMESTAMP(item_end_date) < UNIX_TIMESTAMP()";
    $result = mysqli_query($connection, $query);

    if(!$result) {
        $error_code = "1";
        $msg = "Error retrieving sold items";
                
        $arr = array('msg' => $msg, 'error_code' => $error_code,
        'selling' => $selling, 'sold' => $sold);
        echo json_encode($arr);
    }
    
    while($row = $result->fetch_array()) {
        array_push($sold, $row);
    }

    $error_code = "0";
    $msg = "Successfully received items";
            
    $arr = array('msg' => $msg, 'error_code' => $error_code,
    'selling' => $selling, 'sold' => $sold);
    echo json_encode($arr);
?>
