<?php
    require 'connect_dbshop.php';

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
       if (isset($_POST['action'])) {
        $action = $_POST['action'];
        $product_id = $_POST['product_id'];
        $user_id = $_POST['user_id'];
        $query = "";

        switch ($action) {
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

            case 'total':
                $query = "SELECT p.price, c.itemCount FROM productdata p, cart c WHERE c.userid=$user_id AND p.productId=c.productId";
                $results = $conn->query($query);

                $total = 0;

                if ($results->num_rows > 0) {
                    while ($row = $results->fetch_assoc()) {
                        $price = (float)$row['price'];
                        $count = (float)$row['itemCount'];

                        $total += $price * $count;
                    }
                }

                echo json_encode(
                    ['total' => $total]
                );
                break;
        }
        $conn->close();
       }
    }
?>  