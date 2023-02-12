<?php 
    require("../connection/connection.php");
    
    // Request all products for admin panel
    $query = "SELECT * FROM products ORDER BY id DESC";
    $productList = $connection->query($query);
?>