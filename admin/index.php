<!-- Header layout -->
<?php
require("../client/layout/header.php");
require("../services/get_products_for_admin.php");
require_once("../connection/connection.php");

// Checking the availability of the request param - POST
if (isset($_POST["toggle_button"])) {
    // Store the request param in a variable
    $selected_product_id = $_POST["toggle_button"];
    // A query to get the publish status of the selected product 
    $get_product_publish_status = "SELECT `is_published` FROM `products` WHERE `id` = $selected_product_id;";
    // Send a request to get the publish status of the product
    $publish_status = $connection->query($get_product_publish_status)->fetch_row();
    // Create a query and send a request to toggle the publish status
    if ($publish_status[0] == 0) {
        $toggle_product_publish_query = "UPDATE `products` SET `is_published` = 1 WHERE `products`.`id` = $selected_product_id;";
        $connection->query($toggle_product_publish_query);
    } else {
        $toggle_product_publish_query = "UPDATE `products` SET `is_published` = 0 WHERE `products`.`id` = $selected_product_id;";
        $connection->query($toggle_product_publish_query);
    }
    // Refresh and apply changes in the page
    header('Location: index.php');
}

// Checking the availability of the request param - DELETE
if (isset($_POST["delete_product"])) {
    // Store the request param in a variable
    $selected_product_id = $_POST["delete_product"];
    // A query to get delete the product with the specified ID
    $delete_product_query = "DELETE FROM `products` WHERE `products`.`id` = $selected_product_id;";
    // Send a request to delete the selected product
    $connection->query($delete_product_query);

    // Refresh and apply changes in the page
    header('Location: index.php');
}
?>

<!-- Admin panel - Main section -->
<div class="mt-4 px-6 mx-4 relative">
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Product name
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Image
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Published
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($productList as $product) {
            ?>
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        <?php echo $product["name"] ?>
                    </th>
                    <td class="px-6 py-4">
                        <?php echo $product["description"] ?>
                    </td>
                    <td class="px-6 py-4">
                        <img class="w-20 h-20 border rounded-sm" src="<?php echo $product["image_url"] ?>">
                    </td>
                    <td class="px-6 py-4">
                        <?php echo "$ " . $product["price"] . ".00" ?>
                    </td>
                    <td class="px-6 py-4">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <button value="<?php echo $product["id"] ?>" name="toggle_button" type="submit" class="font-medium <?php $product["is_published"] == 0 ? print("text-yellow-400") : print("text-green-400") ?> hover:underline">
                                <?php $product["is_published"] == 0 ? print("Not published") : print("Published") ?>
                            </button>
                        </form>
                    </td>
                    <td class="px-6 py-4">
                        <form class="inline" action="edit_product.php" method="get">
                            <button name="product_id" type="submit" value=<?php echo $product["id"] ?> class="mx-1 font-medium text-blue-600 hover:underline">Edit</button>
                        </form>
                        <form class="inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <button name="delete_product" value="<?php echo $product["id"] ?>" type="submit" class="mx-1 font-medium text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>


<!-- Footer layout -->
<?php
require("../client/layout/footer.php");
?>