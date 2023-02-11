<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management Template | @imalisina</title>
    <!-- TailwindCSS CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <!-- Navbar -->
    <nav class="bg-white px-2 sm:px-4 py-2.5 w-full border-b border-gray-200">
        <a href="<?php $_SERVER["PHP_SELF"] == "/product_management_template/client/index.php" ? print("/product_management_template/admin/index.php") : print("/product_management_template/client/index.php") ?>" type="button" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0">
            <!-- Checks whether the admin in the preview mode or not and shows a dynamic title for button -->
            <?php
            $_SERVER["PHP_SELF"] == "/product_management_template/client/index.php"
                ? print("Admin Panel")
                : print("Preview")
            ?>
        </a>
    </nav>