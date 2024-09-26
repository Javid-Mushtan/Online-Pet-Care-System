<?php
    session_start();
    require 'process/connect_dbshop.php';

    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $query = "DELETE FROM cart WHERE productId=$id";
            $conn->query($query);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/side_menubar.css">
    <link rel="stylesheet" href="css/user_profile/main.css">
    <link rel="stylesheet" href="css/user_profile/my_cart.css">
    <script src="js/main.js" defer></script>
    <script src="js/side_menubar.js" defer></script>
    <script src="js/user_profile/my_cart/cart_script.js" defer></script>
    <title>MyCart</title>
</head>
<body>

    <?php require 'include/header.php' ?>
    
    <div class="sidebar">
        <a href="#my_account" class="btn active">My Account</a>
        <a href="#my_pets" class="btn">My Pets</a>
        <a href="#my_pets" class="btn">My Appointments</a>
        <a href="#order">My Orders</a>
        <a href="index.php" class="btn">My Cart</a>
        <button id="log_out_btn"><a href="process/log_out.php">Log out</a></button>
    </div>
    
    <div class="content">

        <h1>Shopping Cart</h1>

        <?php
            $query = "SELECT p.productId, p.name, p.price, p.image_path, c.itemCount 
                      FROM cart c, productdata p WHERE p.productId=c.productId";
            $results = $conn->query($query);

            if ($results->num_rows > 0) {
                $_SESSION['is_cart_empty'] = false;
            ?>
            <table>
                <tr>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Item Count</th>
                    <th>Action</th>
                </tr>
            
            <?php
                while ($row = $results->fetch_assoc()) {
                    $product_id = $row['productId'];
                    $product_name = $row['name'];
                    $product_price = $row['price'];
                    $product_count = $row['itemCount'];
                    $image_path = $row['image_path'];

            ?>
                <tr>
                    <td><img class="product-image" src="assets/product_images/<?php echo $image_path ?>" alt=""></td>
                    <td><?php echo $product_name ?></td>
                    <td>Rs.<?php echo $product_price ?></td>
                    <td>
                        <div class="item-count">
                            <button onclick="decreaseItemCount(<?php echo $product_id ?>)" class="update-amount-btn">-</button>
                            <p id="item-count-<?php echo $product_id ?>"><?php echo $product_count ?></p>
                            <button onclick="increaseItemCount(<?php echo $product_id ?>)" class="update-amount-btn">+</button>
                        </div>
                    </td>
                    <td><a href="index.php?id=<?php echo $product_id ?>"><button class="delete-btn"><img src="assets/icons/delete_icon.png" alt=""></button></a></td>
                </tr>
        
            <?php
                }
            } else {
                $_SESSION['is_cart_empty'] = true;
                echo "Cart is Empty";
            }

            $conn->close();
        ?>
        </table>

        <?php
            if (!$_SESSION['is_cart_empty']) {
                echo '
                    <div id="cart-summary">
                        <p id="label">Total:</p>
                        <p id="amount"></p>
                        <a href="payment_portal.php"><button>Check Out</button></a>
                    </div>';
            }
        ?>

        

    </div>

    <?php require 'include/footer.php' ?>
</body>
</html>