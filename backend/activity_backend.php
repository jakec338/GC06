<?php
	require('../connection.php');
    require_once 'watching_auctions_backend.php';
    $msg = "error";
    $error_code = "1";
    $buyers_and_comments_with_the_same_items = array();
    $bid_items = array();
    $bidded_items = array();
    $watching_auctions_info = array();
    $watching_auctions_activities = array();
    $sold_items = array();
    $sold_items_activities = array();
    if (isset($_POST['email']) && isset($_POST['user_type'])) {
		$email = $_POST['email'];
        $user_type = $_POST['user_type'];
        $user_id = -1;
        $query = "SELECT * from `user` where Email='$email'";
        $result = mysqli_query($connection, $query);
        $row = $result->fetch_array();
        $user_id = $row["user_id"];

        if ($user_id >= 0) {
            if ($user_type == "buyer" || $user_type == "both") {
                $query = "SELECT * from `bids` where Buyer_Accounts_buyer_id='$user_id'";
                $result = mysqli_query($connection, $query);
                while ($row = $result->fetch_array()) {
                    array_push($bid_items, $row["Listed_Items_item_id"]);
                }

                foreach ($bid_items as $bid_item) {
                    $query = "SELECT * from `bids` where Listed_Items_item_id='$bid_item'";
                    $result = mysqli_query($connection, $query);
                    if (mysqli_num_rows($result)>0) {
                        while ($row = $result->fetch_array()) {
                            $feedback_user_id = $row["Buyer_Accounts_buyer_id"];
                            $query1 = "SELECT * from `user` where user_id='$feedback_user_id'";
                            $result1 = mysqli_query($connection, $query1);
                            $row1 = $result1->fetch_array();

                            $query2 = "SELECT img_url,item_description from `listed_items` where item_id='$bid_item'";
                            $result2 = mysqli_query($connection, $query2);
                            $row2 = $result2->fetch_array();
                            if (!in_array(array("bid_item" => $bid_item,"user_type" => $row1["user_type"], "Fullname" => $row1["Fullname"], "feedback" => $row["feedback"],"rating" => $row["rating"], "img_url" => $row2[0],"bid_price" => $row["bid_price"]), $buyers_and_comments_with_the_same_items)) {
                                array_push($buyers_and_comments_with_the_same_items, array("bid_item" => $bid_item,"user_type" => $row1["user_type"], "Fullname" => $row1["Fullname"], "feedback" => $row["feedback"],"rating" => $row["rating"], "img_url" => $row2[0],"bid_price" => $row["bid_price"]));
                            }
                            if (!in_array(array("bid_item" => $bid_item, "img_url" => $row2["img_url"], "item_description" => $row2["item_description"]), $bidded_items)) {
                                array_push($bidded_items, array("bid_item" => $bid_item, "img_url" => $row2["img_url"], "item_description" => $row2["item_description"])); 
                            }
                        }
                    }
                }

                $watching_auctions_ids = array();
                $result = watching_auctions($connection,$user_id);
                while($row = $result->fetch_array()) {
                    array_push($watching_auctions_info, $row);
                }

                foreach ($watching_auctions_info as $watching_auction) {
                    $bid_item = $watching_auction["listed_item_id"];
                    $query = "SELECT * from `bids` where Listed_Items_item_id='$bid_item'";
                    $result = mysqli_query($connection, $query);
                    if (mysqli_num_rows($result)>0) {
                        while ($row = $result->fetch_array()) {
                            $feedback_user_id = $row["Buyer_Accounts_buyer_id"];
                            $query1 = "SELECT * from `user` where user_id='$feedback_user_id'";
                            $result1 = mysqli_query($connection, $query1);
                            $row1 = $result1->fetch_array();

                            $query2 = "SELECT img_url,item_description from `listed_items` where item_id='$bid_item'";
                            $result2 = mysqli_query($connection, $query2);
                            $row2 = $result2->fetch_array();
                            if (!in_array(array("bid_item" => $bid_item,"Fullname" => $row1["Fullname"],"feedback" => $row["feedback"], "rating" => $row["rating"],"img_url" => $row2["img_url"], "bid_price" => $row["bid_price"]), $watching_auctions_activities)) {
                                array_push($watching_auctions_activities, (array("bid_item" => $bid_item,"Fullname" => $row1["Fullname"],"feedback" => $row["feedback"], "rating" => $row["rating"],"img_url" => $row2["img_url"], "bid_price" => $row["bid_price"])));
                            }
                        }
                    }
                }

                $msg = "Successfully received activities";
                $error_code ="0" ;
            }

            if ($user_type == "seller" || $user_type == "both") {
                $error_code = "0";
                $query = "SELECT * FROM `listed_items` WHERE Seller_Accounts_seller_id = '$user_id'";
                $result = mysqli_query($connection, $query);
                while($row = $result->fetch_array()) {
                    array_push($sold_items, $row);
                }
                $query = "SELECT * FROM `listed_items` INNER JOIN `bids` ON `bids`.Listed_Items_item_id=`listed_items`.item_id INNER JOIN `user` ON `bids`.Buyer_Accounts_buyer_id=`user`.user_id WHERE Seller_Accounts_seller_id = '$user_id'";
                $result = mysqli_query($connection, $query);
                while($row = $result->fetch_array()) {
                    array_push($sold_items_activities, $row);
                }
                $msg = "Successfully received activities";
            }

        } else {
            $msg = "No such buyer";
            $error_code = "1";
        }
    }
    $arr = array('msg' => $msg, 'error_code' => $error_code,
    'bidding_activities' => $buyers_and_comments_with_the_same_items,
    'bided_items' => $bidded_items,
    'watching_auctions_info' => $watching_auctions_info,
    'watching_auctions_activities' => $watching_auctions_activities,
    'sold_items' => $sold_items,
    'sold_items_activities' => $sold_items_activities);
    echo json_encode($arr);

?>