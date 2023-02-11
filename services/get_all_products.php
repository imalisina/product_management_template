<?php 
    require("../connection/connection.php");
    
    // Request all products
    $query = "SELECT * FROM products WHERE is_published = 1";
    $allProducts = $connection->query($query);
?>