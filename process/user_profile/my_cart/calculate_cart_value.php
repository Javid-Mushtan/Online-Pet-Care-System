<?php
    require '../../connect_dbshop.php';
    header('Content-Type: application/json');

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $body = file_get_contents('php://input');
        $user_id = json_decode($body, true);
        $total = 0.0;

        $query = "select productdata.price, cart.itemCount from productdata, cart where cart.userId=1 and productdata.productId=cart.productId;
";
        $results = $conn->query($query);

        if ($results->num_rows > 0) {
            while ($row = $results->fetch_assoc()) {
                $price = (float)$row['price'];
                $count = (float)$row['itemCount'];

                $total += $price * $count;
            }
            echo json_encode(['amount' => "$total"]);
            exit;
        } else {
            echo json_encode([
                'amount' => "empty"
            ]);
            exit;
        }

    }


    $conn->close();

?>