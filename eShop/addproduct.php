<?php

// include database configuration file
include 'dbConfig.php';

if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    if($_REQUEST['action'] == 'addToProducts'){
        // get product details
        // $query = $db->query("SELECT * FROM products WHERE id = ".$productID);
        // $row = $query->fetch_assoc();
        extract($_POST);
        $query = $db->query("INSERT INTO `products` (`name`, `description`, `price`, `created`, `modified`) VALUES
        ('".$name."', '".$description."',".$price.", '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."');");
        header("Location: admin.php");
    }
    }else{
        header("Location: home.php");
    }
