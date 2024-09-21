<?php
    require '../../connect_dbshop.php';

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
       if (isset($_POST['action'])) {
        $action = $_POST['action'];
        $product_id = $_POST['product_id'];
        // $user_id = $_POST['user_id'];
        $query = "";

        switch ($action) {
            case 'add':
                header("Content-Type: application/json");
                $user_id = 1;
                $query = "SELECT * FROM cart WHERE productId=$product_id";
                $results = $conn->query($query);

                if ($results->num_rows > 0) {
                    echo json_encode([
                        "status"=>"error",
                        "body"=>"Product already in the cart."
                    ]);
                    exit;
                } else {
                    $add_query = "INSERT INTO cart(productId, userId, itemCount) VALUES($product_id, $user_id, 1)";
                    $conn->query($add_query);
                    echo json_encode([
                        "status"=>"success",
                        "body"=>"Product added to cart!."
                    ]);
                    exit;
                }

                break;

            case 'decrease':
                $query = "UPDATE cart SET itemCount=itemCount-1 WHERE productId=$product_id";
                $conn->query($query);
                break;

            case 'increase':
                $query = "UPDATE cart SET itemCount=itemCount+1 WHERE productId=$product_id";
                $conn->query($query);
                break;

            case 'delete':
                $query = "DELETE FROM cart WHERE productId=$product_id";
                $conn->query($query);
                break;
        }
        $conn->close();
       }
    }
?>  