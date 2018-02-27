<?php
	require('../connection.php');
    // If the values are posted, insert them into the database.
    $search_results = array();
    $query = "SELECT * from `categories`";
    $result = mysqli_query($connection, $query);
    $msg = "error";
    $error_code = "1";
    $count = 0;
    $total_categories = array();
    if(mysqli_num_rows($result)>0) {
        $error_code = 0;
        $msg = "Successfully retrieved categories";
        while ($row = $result->fetch_row()) {
            array_push($total_categories,$row);
        }
    } else {
        $error_code = 0;
        $msg = "Not any categories";
    }
    
    $arr = array('msg' => $msg, 'error_code' => $error_code,
    'total_categories' => $total_categories);
    echo json_encode($arr);
?>