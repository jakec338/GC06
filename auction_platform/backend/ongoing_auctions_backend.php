<?php
    require('../connection.php');
    $msg = "error";
    $error_code = "1";
    $bought_items = array();
    if (isset($_POST['email']) && isset($_POST['user_type'])) {
        $email = $_POST['email'];
        $user_type = $_POST['user_type'];
        $user_id = -1;
        if ($user_type == "buyer" || $user_type == "both") {
            $query = "SELECT * from `buyer_accounts` where Email='$email'";
            $result = mysqli_query($connection, $query);
            if (!$result) {
                $msg = "Could not run query ".mysql_error();
                $error_code = 1;
            } else {
                $row = $result->fetch_row();
                $user_id = $row[0];
            }
        } else if ($user_type == "seller") {
            //check if it is seller
            $query = "SELECT * from `seller_accounts` where Email='$email'";
            $result = mysqli_query($connection, $query);
            if (!$result) {
                $msg = "Could not run query ".mysql_error();
                $error_code = 1;
            } else {
                $row = $result->fetch_row();
                $user_id = $row[0];
            }
        }

        if ($user_id >= 0) {
            $query = "SELECT * from `bids` where Buyer_Accounts_buyer_id='$user_id'";
            $result = mysqli_query($connection, $query);
            $bid_items = array();
            while ($row = $result->fetch_row()) {
                array_push($bid_items, $row[1]);
            }

            // $buyers_and_prices_with_the_same_items = array();
            $bought_items_ids = array();
            foreach ($bid_items as $bid_item) {
                $query = "SELECT * from `bids` where Listed_Items_item_id='$bid_item'";
                $result = mysqli_query($connection, $query);
                if (mysqli_num_rows($result)>0) {
                    $row = $result->fetch_row();
                    array_push($bought_items_ids,$row[1]);
                }
            }

            foreach ($bought_items_ids as $item_id) {
                $query = "SELECT * from `listed_items` where item_id='$item_id'";
                $result = mysqli_query($connection, $query);
                $row = $result->fetch_row();
                $cur_date = date('Y-m-d');
                $end_date = str_replace('/', '-', $row[5]);
                $time = strtotime($end_date);
                $end_date = date('Y-m-d',$time);

                if($cur_date<$end_date) {
                    array_push($bought_items, $row);
                }
            }

            $msg = "Successfully received activities";
            $error_code = 0;

        } else {
            $msg = "No such buyer";
            $error_code = 1;
        }
    }
    $arr = array('msg' => $msg, 'error_code' => $error_code, 'ongoing_auctions' => $bought_items);
    echo json_encode($arr);

?>