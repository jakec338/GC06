<?php
    require('../connection.php');
    require_once 'watching_auctions_backend.php';
    $msg = "error";
    $error_code = "1";
    $bought_items = array();
    $user_bought_items = array();
    $watching_auctions = array();
    if (isset($_POST['email']) && isset($_POST['user_type'])) {
        $email = $_POST['email'];
        $user_type = $_POST['user_type'];
        $user_id = -1;
        $query = "SELECT * from `user` where Email='$email'";
        $result = mysqli_query($connection, $query);
        $row = $result->fetch_row();
        $user_id = $row[0];

        if ($user_id >= 0) {
            $query = "SELECT * from `bids`"; //where Buyer_Accounts_buyer_id='$user_id'
            $result = mysqli_query($connection, $query);
            $bid_items = array();
            $user_bid_items = array();
            while ($row = $result->fetch_row()) {
                array_push($bid_items, $row[1]);
                if($row[2] == $user_id) {
                    array_push($user_bid_items, $row[1]);
                }
            }

            $bought_items_ids = array();
            $user_bought_items_ids = array();
            foreach ($bid_items as $bid_item) {
                $query = "SELECT * from `bids` where Listed_Items_item_id='$bid_item'";
                $result = mysqli_query($connection, $query);
                if (mysqli_num_rows($result)>0) {
                    $row = $result->fetch_row();
                    array_push($bought_items_ids,$row[1]);
                    if (in_array($bid_item, $user_bid_items)) {
                        array_push($user_bought_items_ids, $row[1]);
                    }
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
                    if (!in_array($row, $bought_items)) {
                        array_push($bought_items, $row);
                        if (in_array($item_id, $user_bought_items_ids)) {
                            array_push($user_bought_items, $row[0]);
                        }
                    }
                }
            }


            // $query = "SELECT * from `listed_items` WHERE UNIX_TIMESTAMP(item_end_date) >= UNIX_TIMESTAMP()";
            // $result = mysqli_query($connection, $query);
            

            $result = watching_auctions($connection,$user_id);
            while($row = $result->fetch_row()) {
                array_push($watching_auctions, $row[1]);
            }

            $msg = "Successfully received activities";
            $error_code = "0";

        } else {
            $msg = "No such buyer";
            $error_code = "1";
        }
    }
    $arr = array('msg' => $msg, 'error_code' => $error_code, 'ongoing_auctions' => $bought_items,
    'ongoing_auctions_of_user' => $user_bought_items, 'watching_auctions' => $watching_auctions);
    echo json_encode($arr);

?>