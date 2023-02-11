<?php 
    require_once("../connection/connection.php");
    
    // Request all products
    $query = "SELECT * FROM products";
    $allProducts = $connection->query($query);
    var_dump($allProducts);
?>