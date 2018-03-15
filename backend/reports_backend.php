<?php
	require('../connection.php');
    $msg = "error";
    $error_code = "1";
    $reports = array();
    if (isset($_POST['email']) && isset($_POST['user_type'])) {
		$email = $_POST['email'];
        $user_type = $_POST['user_type'];
        $user_id = $_SESSION['logged_in_user_id'];

        $query = "SELECT * from `listed_items` where Seller_Accounts_seller_id='$user_id'";
        $result = mysqli_query($connection, $query);
        while($row = $result->fetch_array()) {
            $item_id = $row["item_id"];
            $num_bids_query = "SELECT bid_id from `bids` where Listed_Items_item_id='$item_id'";
            $num_bids_query_result = mysqli_query($connection, $num_bids_query);
            $num_bids = mysqli_num_rows($num_bids_query_result);

            $num_watches_query = "SELECT * from `watching_auctions` where listed_item_id='$item_id'";
            $num_watches_query_result = mysqli_query($connection, $num_watches_query);
            $num_watches = mysqli_num_rows($num_watches_query_result);

            $row["num_watches"] = $num_watches;
            $row["num_bids"] = $num_bids;
            array_push($reports, $row);
        }

        $msg = "Successfully received reports";
        $error_code = 0;
    }
    $arr = array('msg' => $msg, 'error_code' => $error_code, 'reports' => $reports);
    echo json_encode($arr);

?>