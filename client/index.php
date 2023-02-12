<!-- Header layout -->
<?php
require_once("../client/layout/header.php");
require("../services/get_all_products.php");
?>

<!-- Main section -->
<?php
// Checks whether the data obj is empty or not
if ($rowNum == 0) {
?>
    <div class="mt-10 py-10 mb-10">
        <h1 class="block text-center mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">
            No Products !
        </h1>
        <p class="block text-center mb-6 text-lg font-normal text-gray-500 lg:text-xl">
            Go to the <a href="../admin/index.php" class="font-bold text-green-600 underline">Admin panel</a> and change the published status of products.
        </p>
    </div>
<?php
} else {
?>
    <div class="flex flex-row flex-wrap justify-center mx-4">
        <?php
        foreach ($allProducts as $product) {
        ?>
            <!-- Product card -->
            <div class="max-w-sm my-3 mx-3 bg-white border border-gray-200 rounded-lg shadow">
                <img class="p-8 rounded-t-lg" src=<?php echo $product['image_url'] ?> />
                <div class="px-5 pb-5">
                    <!-- Product title section -->
                    <h5 class="text-xl font-semibold tracking-tight text-gray-900">
                        <?php echo $product["name"] ?>
                    </h5>
                    <!-- Product raiting section -->
                    <div class="flex items-center mt-2.5 mb-5">
                        <?php
                        for ($i = 1; $i <= $product["rates"]; $i++) {
                        ?>
                            <!-- Start icons for rating -->
                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        <?php
                        }
                        ?>
                        <!-- Raiting badge -->
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">
                            <?php echo $product["rates"] . ".0" ?>
                        </span>
                    </div>
                    <div class="flex items-center justify-between">
                        <!-- Product price and button section -->
                        <span class="text-3xl font-bold text-gray-900 dark:text-white"><?php echo "$" . $product["price"] . ".00" ?></span>
                        <a href="" class="text-white bg-gray-400 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Add to cart</a>
                    </div>
                </div>
            </div>
        <?php
        } ?>
    </div>
<?php
}
?>

<!-- Footer layout -->
<?php
require_once("../client/layout/footer.php");
?>