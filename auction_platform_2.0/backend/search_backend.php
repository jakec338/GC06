<?php
	require('../connection.php');
    // If the values are posted, insert them into the database.
    $search_results = array();
    $msg = "";
    $error_code = "1";
    if (isset($_POST['searched_item']) && isset($_POST['category_query'])){
		$searched_item = $_POST['searched_item'];
        $category_query = $_POST['category_query'];
        if ($searched_item == "default") {
            $searched_item = '';
        }
        if ($category_query!='') {
            $query = "SELECT * from `listed_items` where item_category='$category_query'";
        } else {
            $query = "SELECT * from `listed_items` where item_description like '%$searched_item%'";
        }
        $result = mysqli_query($connection, $query);
        $msg = "error";
        $error_code = "1";
        $count = 0;
        if(mysqli_num_rows($result)>0){
            $user_id = $_SESSION['logged_in_user_id'];
            $num_items = mysqli_num_rows($result);
            $error_code = "0";
            while ($row = $result->fetch_row()) {
                $item_id = $row[0];
                $query1 = "SELECT * from `bids` where Listed_Items_item_id='$item_id'";
                $result1 = mysqli_query($connection, $query1);
                $num_bids = mysqli_num_rows($result1);
                $total_users = array();
                while ($row1 = $result1->fetch_row()) {
                    array_push($total_users, $row1[2]);
                }

                $cur_date = date('Y-m-d');
                $end_date = str_replace('/', '-', $row[5]);
                $time = strtotime($end_date);
                $end_date = date('Y-m-d',$time);

                if($cur_date<$end_date) {
                    if ($num_bids>0) {
                       if (!in_array($user_id, $total_users)) {
                            array_push($row, $num_bids);
                            array_push($search_results, $row);
                            $count++;
                            if($count >= 3 && $searched_item=="") {
                                break;
                            }
                        }
                    } else {
                        array_push($row, $num_bids);
                        array_push($search_results, $row);
                        $count++;
                        if($count >= 3 && $searched_item=="") {
                            break;
                        }
                    }
                }
                $msg = strval($count)." items found";
            }
        } else {
            $error_code = "0";
            $msg = "No such items";
        }
    } else {
        $error_code = "1";
        $msg = "Required values not sent in the request";
    }
    $arr = array('msg' => $msg, 'error_code' => $error_code,
    'search_results' => $search_results);
    echo json_encode($arr);
?>