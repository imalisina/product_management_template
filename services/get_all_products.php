<?php 
    require("../connection/connection.php");
    
    // Request all products for normal clients
    $query = "SELECT * FROM products WHERE is_published = 1 ORDER BY id DESC";
    $allProducts = $connection->query($query);
?>