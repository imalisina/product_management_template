<!-- Header layour -->
<?php
require("../client/layout/header.php");
require("../connection/connection.php");

// Checking the availability of the request param - GET
if (isset($_GET["product_id"])) {
    // Store the request param in a variable
    $selected_product_id = $_GET["product_id"];
    // A query to validate the entered ID and get all details
    $validate_product_id_query = "SELECT * FROM products WHERE `id` = $selected_product_id;";
    // Send a request to check whether the product with the entered ID is exist or not
    $selected_product_data = $connection->query($validate_product_id_query)->fetch_assoc();
    // Condition to perform the edit operation if the product exists
    if ($selected_product_data == null) {
        // Display an error message, etc.
    }
}

if (isset($_POST["product_name"]) && isset($_POST["product_price"]) && isset($_POST["product_image"]) && isset($_POST["product_description"])) {
    // Redirect to the admin dashboard
    header("Location: index.php");
}
?>

<!-- Main section -->
<div class="w-full mx-auto my-10">
    <!-- Edit product - Title section -->
    <h2 class="text-center mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl">Edit Product</h2>

    <!-- Edit product - Form section -->
    <form action="" method="post" class="w-80 mx-auto">

        <!-- Product name field -->
        <label for="name_input" class="my-2 text-sm font-medium text-gray-900">Product name</label>
        <input value="<?php echo $selected_product_data["name"] ?>" type="text" placeholder="Enter a new name" name="product_name" id="name_input" class="mx-auto mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 " />

        <!-- Product price field -->
        <label for="price_input" class="my-2 text-sm font-medium text-gray-900">Product price <small>($)</small></label>
        <input value=<?php echo $selected_product_data["price"] ?> type="text" placeholder="Enter a new price" name="product_price" id="price_input" class="mx-auto mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 " />

        <!-- Product image URL field -->
        <label for="image_url_input" class="my-2 text-sm font-medium text-gray-900">Product image <small class="text-red-600">(URL only)</small></label>
        <input value=<?php echo $selected_product_data["image_url"] ?> type="text" placeholder="Enter a new price" name="product_image" id="image_url_input" class="mx-auto mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 " />

        <!-- Product description field -->
        <label for="product_description_input" class="my-2 text-sm font-medium text-gray-900">Product description</label>
        <textarea placeholder="Describe the product" id="product_description_input" name="product_description" rows="4" class="block p-2.5 mb-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"><?php echo $selected_product_data["description"]; ?></textarea>

        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
            Update
        </button>
    </form>
</div>

<!-- Footer layour -->
<?php
require("../client/layout/footer.php");
?>