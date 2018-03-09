<?php
	require('../connection.php');
    $msg = "error";
    $error_code = "1";

    if (isset($_POST['item_description']) && isset($_POST['item_category']) && isset($_POST['item_starting_price']) && isset($_POST['item_reserved_price']) && isset($_POST['item_ending_date'])) {

        // let's upload the image first
        $target_dir = "../images/";
        $target_file = $target_dir . basename($_FILES["item_url"]["name"]);
        $error_code = "1";
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["item_url"]["tmp_name"]);
            if($check !== false) {
                $msg="File is an image - " . $check["mime"] . ".";
                $error_code = "0";
            } else {
                $msg = "File is not an image.";
                $error_code = "1";
            }
        }
        if (file_exists($target_file)) {
            $msg = "Sorry, file already exists.";
            $error_code = "1";
        }
        
        if (move_uploaded_file($_FILES["item_url"]["tmp_name"], $target_file)) {
            // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            $msg = "Sorry, there was an error uploading your file.";
            $error_code = "1";
        }

        $item_description = $_POST['item_description'];
        $item_category = $_POST['item_category'];
        $item_start_price = $_POST['item_starting_price'];
        $item_reserve_price = $_POST['item_reserved_price'];
        $item_end_date = $_POST['item_ending_date'];
        $user_id = $_SESSION['logged_in_user_id'];
        $img_url = $_FILES["item_url"]["name"];
        $cur_date = date('Y-m-d');
        $query = "INSERT INTO `listed_items` (item_description, item_category, item_start_price, item_reserve_price,
            item_end_date, Seller_Accounts_seller_id, img_url, item_added_date) VALUES('$item_description','$item_category','$item_start_price','$item_reserve_price','$item_end_date','$user_id','$img_url', '$cur_date')";
        $result = mysqli_query($connection, $query);
        if ($result) {
            $msg = "Successfully added item";
            $error_code = "0";
        } else {
            $msg = "Error while adding into database ".mysql_error();
            $error_code = "1";
        }

    } else {
        $msg = "All fields are not provided";
        $error_code = "1";
    }
    $arr = array('msg' => $msg, 'error_code' => $error_code);
    echo json_encode($arr);


?>