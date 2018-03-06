<?php
         

        function find_seller_profile_by_email($email){
            global $connection;
            $query  = "SELECT * ";
            $query .= "FROM seller_accounts ";
            $query .= "WHERE Email = '{$email}' ";
            $get_profiles = mysqli_query($connection, $query);
            confirm_query ($get_profiles); 
            if ($profile = mysqli_fetch_assoc($get_profiles)){  // it aint 
                return $profile;
            } else {
                return null;
            }
        }

        function attempt_login($username, $password){
            $profile = find_profile_by_username($username);
            if ($profile){
                if ($password == $profile["password"]){
                    //password match 
                    return $profile;
                } else {
                    //password not match
                    return false;
                }
            } else {
                // username not found
                return false; 
            }
        }

        function get_selling_items($connection, $id){
            $query  = "SELECT * ";
            $query .= "FROM listed_items ";
            $query .= "WHERE UNIX_TIMESTAMP(item_end_date) >= UNIX_TIMESTAMP() ";
            $query .= "AND `Seller_Accounts_seller_id` = {$id} ";
            $query .= "ORDER BY item_end_date ASC";
            $get_selling_items = mysqli_query($connection, $query);
            return $get_selling_items;
        }


        function get_sold_items($connection, $id){
            $query  = "SELECT * ";
            $query .= "FROM listed_items ";
            $query .= "WHERE UNIX_TIMESTAMP(item_end_date) < UNIX_TIMESTAMP() ";
            $query .= "AND `Seller_Accounts_seller_id` = {$id} ";
            $query .= "ORDER BY item_end_date ASC";
            $get_sold_items = mysqli_query($connection, $query);
            return $get_sold_items;
        }

        function get_highest_bid($connection, $item_id){
            $query  = "SELECT MAX(bid_price) ";
            $query .= "FROM bids ";
            $query .= "WHERE Listed_Items_item_id = {$item_id} ";
            $get_highest_bid = mysqli_query($connection, $query);
            return $get_highest_bid;
        }






        function logged_in(){
            return isset($_SESSION["admin_id"]);
        }


        function confirm_logged_in(){
            if (!isset($_SESSION["admin_id"])){
                redirect_to("login.php");
            }
        } 

?>