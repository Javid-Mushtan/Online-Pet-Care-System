<?php 
    require 'process/connect_dbshop.php';

    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $check_cart_query = "SELECT * FROM cart WHERE productId=$id";
            $result = $conn->query($check_cart_query);
            if ($result->num_rows > 0) {
                echo "1";
            } else {
                $add_to_cart_query = "INSERT INTO cart(productId, userId, itemCount)
                        VALUES($id, 1, 1)";

                $conn->query($add_to_cart_query);
            }
            
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/pet_store/main.css">
    <script src="js/main.js" defer></script>
    <title>Pet Store</title>
</head>
<body>
    <?php require 'include/header.php' ?>
    <div class="content">
        <a href="index.php">Cart</a>    

        <?php
            $query = "SELECT * FROM productdata";
            $results = $conn->query($query);

            if ($results->num_rows > 0) {
                while ($row = $results->fetch_assoc()) {
                    $product_id = $row['productId'];
                    $product_name = $row['name'];
                    $product_price = $row['price'];
                    $image_path = $row['image_path'];
        ?>
                    <div class="product-card">
                        <img src="assets/product_images/<?php echo $image_path ?>" alt="">
                        <div class="product-info">
                            <p><?php echo $product_name ?></p>
                            <p>Rs.<?php echo $product_price ?></p>
                        </div>
                        <button><a href="pet_store.php?id=<?php echo $product_id ?>">Add to Cart</a></button>
                    </div>
        <?php
                }
            } else {
                echo "No Products";
            }
        ?>  
    </div>
</body>
</html>