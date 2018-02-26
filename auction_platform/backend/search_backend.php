<?php
	require('../connection.php');
    // If the values are posted, insert them into the database.
    $search_results = array();
    if (isset($_POST['searched_item'])){
		$searched_item = $_POST['searched_item'];
        if ($searched_item == "default") {
            $searched_item = '';
        }
        $query = "SELECT * from `listed_items` where item_description like '%$searched_item%'";
        $result = mysqli_query($connection, $query);
        $msg = "error";
        $error_code = "1";
        $count = 0;
        if(mysqli_num_rows($result)>0){
            $num_items = mysqli_num_rows($result);
            $msg = strval($num_items)." items found";
            $error_code = "0";
            while ($row = $result->fetch_row()) {
                $item_id = $row[0];
                $query1 = "SELECT * from `bids` where Listed_Items_item_id='$item_id'";
                $result1 = mysqli_query($connection, $query1);
                $num_bids = mysqli_num_rows($result1);
                array_push($row, $num_bids);
                array_push($search_results, $row);
                $count++;
                if($count >= 3 && $searched_item=="") {
                    break;
                }
            }
        } else {
            $error_code = 0;
            $msg = "No such items";
        }
    }
    $arr = array('msg' => $msg, 'error_code' => $error_code,
    'search_results' => $search_results);
    echo json_encode($arr);
?>