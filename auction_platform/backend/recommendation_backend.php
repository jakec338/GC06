<?php
	require('../connection.php');
    $msg = "error";
    $error_code = "1";
    $recommended_items = array();
    if (isset($_POST['email']) && isset($_POST['user_type'])) {
		$email = $_POST['email'];
        $user_type = $_POST['user_type'];
        $user_id = -1;
        if ($user_type == "buyer" || $user_type == "both") {
            //check if the email already exists
            $query = "SELECT * from `buyer_accounts` where Email='$email'";
            $result = mysqli_query($connection, $query);
            if (!$result) {
                $msg = "Could not run query ".mysql_error();
                $error_code = 1;
            } else {
                $row = $result->fetch_row();
                $user_id = $row[0];
            }
        } else {
            $msg = "The user is not a buyer, no recommendations";
            $error_code = 1;
        }

        if ($user_id >= 0) {
            $query = "SELECT * from `bids` where Buyer_Accounts_buyer_id='$user_id'";
            $result = mysqli_query($connection, $query);
            $bid_items = array();
            while ($row = $result->fetch_row()) {
                array_push($bid_items, $row[1]);
            }
            $buyers_with_the_same_items = array();
            foreach ($bid_items as $bid_item) {
                $query = "SELECT * from `bids` where Listed_Items_item_id='$bid_item'";
                $result = mysqli_query($connection, $query);
                if (mysqli_num_rows($result)>0) {
                    while ($row = $result->fetch_row()) {
                        if ($row[2] != $user_id) {
                            array_push($buyers_with_the_same_items, $row[2]);
                        }
                    }
                }
            }

            $recommended_items_id = array();
            foreach ($buyers_with_the_same_items as $buyer) {
                $query = "SELECT * from `bids` where Buyer_Accounts_buyer_id='$buyer'";
                $result = mysqli_query($connection, $query);
                if (mysqli_num_rows($result)>0) {
                    while ($row = $result->fetch_row()) {
                        if (!in_array($row[1], $bid_items)) {
                            array_push($recommended_items_id, $row[1]);
                        }
                    }
                }
            }

            foreach ($recommended_items_id as $recommended_item_id) {
                $query = "SELECT * from `listed_items` where item_id='$recommended_item_id'";
                $result = mysqli_query($connection, $query);
                $row = $result->fetch_row();
                array_push($recommended_items, $row);
            }

            $msg = "Successfully received recommendations";
            $error_code = 0;

        } else {
            $msg = "No such buyer";
            $error_code = 1;
        }
    }
    $arr = array('msg' => $msg, 'error_code' => $error_code, 'recommended_items' => $recommended_items);
    echo json_encode($arr);

?>