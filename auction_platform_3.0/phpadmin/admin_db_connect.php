<?php
//------------------Connect to the database----------------------------

$conn = new mysqli("localhost", "root", "", "auction_platform2");
if ($conn -> connect_error) {
die("Connection failed:" . $conn -> connect_error);
}
?>