<?php
	require('../connection.php');
    require_once '../phpmail.php';
    // If the values are posted, insert them into the database.
    $search_results = array();
    if (isset($_POST['bid_item_id']) && 
        isset($_POST['bidstartingprice']) &&
        isset($_POST['bidreservedprice']) &&
        isset($_POST['bid_price']) &&
        isset($_POST['bid_feedback'])) {
		$bid_item_id = $_POST['bid_item_id'];
        $bidstartingprice = $_POST['bidstartingprice'];
        $bidreservedprice = $_POST['bidreservedprice'];
        $bid_price = $_POST['bid_price'];
        $bid_feedback = $_POST['bid_feedback'];
        $user_id = $_SESSION['logged_in_user_id'];
        $user_name = $_SESSION['logged_in_user_name'];

        if ($bid_price > $bidstartingprice) {
            $query = "INSERT INTO `bids` (Listed_Items_item_id, Buyer_Accounts_buyer_id, feedback, bid_price) VALUES ('$bid_item_id', '$user_id', '$bid_feedback', '$bid_price')";

            $result = mysqli_query($connection, $query);
            if($result) {
                // $_SESSION['logged'] = '1';
                //send email to seller
                $query1 = "SELECT * from `bids` INNER JOIN `user` on `bids`.Buyer_Accounts_buyer_id = `user`.user_id  where Listed_Items_item_id='$bid_item_id' && bid_price < $bid_price";
                $result1 = mysqli_query($connection, $query1);
                while ($row = $result1->fetch_row()){
                    $email_id = $row[9];
                    $email_text = "User ".$user_name." has outbided your bid on item ".$row[1];
                    $subject = "Outbided";
                    send_email($email_id,$email_text,$subject);
                }

                $query1 = "SELECT * FROM `bids` INNER JOIN `listed_items` on `bids`.Listed_Items_item_id = `listed_items`.item_id INNER JOIN `user` ON `listed_items`.Seller_Accounts_seller_id=`user`.user_id where Listed_Items_item_id='$bid_item_id'";
                $result1 = mysqli_query($connection, $query1);
                $row = $result1->fetch_row();
                $email_id = $row[17];
                $email_text = "User ".$user_name." has bidded on your item ".$row[1];
                $subject = "New Bid on Your Item";
                send_email($email_id,$email_text,$subject);


                $error_code = "0";
                $msg = "Bid Successfull.";
                $_SESSION['is_bid_success'] = "Bid Successfull";
            } else{
                $msg ="Error while trying to bid ".mysql_error();
                $error_code = "1";
                $_SESSION['is_bid_error'] = $msg;
            }
        } else {
            $msg ="Bid price is less than Bid Starting Price";
            $error_code = "1";
            $_SESSION['is_bid_error'] = $msg;
        }
    }
    $arr = array('msg' => $msg, 'error_code' => $error_code);
    echo json_encode($arr);
?>