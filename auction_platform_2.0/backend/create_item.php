
<?php require_once("../connection.php"); ?>


<?php
$error_code = "1";
if (isset($_POST['item_description'])) {

    $item_description = $_POST['item_description'];
    $item_category = $_POST['item_category'];
    $item_start_price = $_POST['item_start_price'];
    $item_reserve_price = $_POST['item_reserve_price'];
    $item_end_date = $_POST['item_end_date'];
    
	
	$query  = "INSERT INTO Items (";
	$query .= "item_description, item_category, item_start_price, item_reserve_price, item_end_date";
	$query .= ") VALUES (";
	$query .= "'$item_description', '$item_category', '$item_start_price', '$item_reserve_price', '$item_end_date'";
    $query .= ");";
    // $query = "INSERT INTO Items (item_description, item_category)
    // VALUES ('$item_description', '$item_category');";
	$result = mysqli_query($connection, $query);

	if ($result) {
        $error_code = "0";
	} else {
        $error_code = "3";

	}

}
    $arr = array('error_code' => $error_code);
        echo json_encode($arr);

?>
