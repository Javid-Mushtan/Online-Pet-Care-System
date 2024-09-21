<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/side_menubar.css">
    <link rel="stylesheet" href="css/pet_store/product_page.css">
    <script src="js/side_menubar.js" defer></script>
    <script src="js/main.js" defer></script>
    <script src="js/user_profile/my_cart/cart_script.js" defer></script>

    <title>Pet Store</title>
</head>
<body>
    <?php require 'include/header.php' ?>

    <div class="content">

    <?php
        require 'process/connect_dbshop.php';

        function createRatingString($rating) {
            $string = "";
            for ($i = 0; $i < $rating; $i++) {
                $string .= "*";
            }

            return $string;
        }

        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if(isset($_GET['section'])) {
                $section = $_GET['section'];
                $product_type;
                $heading = "";

                switch($section) {
                    case 'food': $product_type = 0;
                                 $heading = "Food";
                                 break;
                    case 'health': $product_type = 1;
                                   $heading = "Pet Care";
                                   break;
                }

    ?>
                <h1><?php echo $heading ?> Section</h1>
    <?php

                $query = "select * from productdata where product_type=$product_type";
                $results = $conn->query($query);

                if ($results->num_rows > 0) {
                    while ($row = $results->fetch_assoc()) {
                        $product_id = $row['productId'];
                        $product_name = $row['name'];
                        $product_price = $row['price'];
                        $product_rating = $row['product_rating'];
                        $product_image = $row['image_path'];

                        $rating_y = (int)$product_rating;
                        $rating_b = 5 - (int)$product_rating;

                        ?>                  
                        <div class="product-card">
                            <a href="product" class="product-link">
                                <img src="assets/product_images/<?php echo $product_image?>" alt="" class="product-image">
                                <div class="product-info">
                                    <h2 class="product-name"><?php echo $product_name?></h2>
                                    <span class="product-rating"><span class="rating-yellow"><?php echo createRatingString($rating_y)?></span><span class="rating-black"><?php echo createRatingString($rating_b)?></span></span>
                                    <p class="product-price">Rs.<?php echo $product_price?></p>
                                </div>
                            </a>
                                <button class="add-to-cart-btn" onclick="addToCart(<?php echo $product_id ?>)">Add To cart</button>
                            </div>  
                        
    <?php
                    }

                } else {
                    echo "<h2>No Products</h2>";
                }
            }
        }
     ?>

    

    </div>

    <!-- <?php require 'include/footer.php' ?> -->
</body>
</html>