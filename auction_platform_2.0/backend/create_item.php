<?php require_once("../connection.php"); ?>


<?php
$msg = "error";
$error_code = "1";
if (!empty($_POST["item_description"]) && 
    !empty($_POST["item_category"]) &&
    !empty($_POST["item_start_price"]) &&
    !empty($_POST["item_reserve_price"]) &&
    !empty($_POST["item_end_date"])) {

    $item_description = $_POST['item_description'];
    $item_category = $_POST['item_category'];
    $item_start_price = $_POST['item_start_price'];
    $item_reserve_price = $_POST['item_reserve_price'];
    $item_end_date = $_POST['item_end_date'];
    $Seller_id = $_SESSION['logged_in_user_id'];

    // $item_image = $_POST['item_image'];

    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            ?><script>console.log("work??")</script><?php
        } else {
            ?><script>console.log("work??")</script><?php;
            echo "Sorry, there was an error uploading your file.";
        }
    


    // move_uploaded_file($_FILES['file']['tmp_name'], "../images/".$_FILES['file']['name']);


    // $image_file_path = "../images/".basename($_FILES['item_image']['name']);
    // $item_image = $_FILES['image']['name'];

    
	
	$query  = "INSERT INTO listed_items (";
	$query .= "item_description, item_category, item_start_price, item_reserve_price, item_end_date, Seller_Accounts_seller_id, img_url";
	$query .= ") VALUES (";
	$query .= "'$item_description', '$item_category', '$item_start_price', '$item_reserve_price', '$item_end_date', '$Seller_id', '$uploadedFile'";
    $query .= ");";
    // $query = "INSERT INTO Items (item_description, item_category)
    // VALUES ('$item_description', '$item_category');";
	$result = mysqli_query($connection, $query);

	if ($result) {
        $msg = "Item Created";
        $error_code = "0";
	} else {
        $error_code = "3";

	}

}

    $arr = array('msg' => $msg, 'error_code' => $error_code);
    echo json_encode($arr);

?>
