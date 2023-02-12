<?php 
    require("../connection/connection.php");
    
    // Request all products for normal clients
    $query = "SELECT * FROM products WHERE is_published = 1 ORDER BY id DESC";
    $allProducts = $connection->query($query);
    // A variable to store the status of products - Checks whether the data is empty or not
    $rowNum = mysqli_num_rows($allProducts);
?>