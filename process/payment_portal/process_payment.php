<?php
    session_start();
    require '../../process/connect_dbshop.php';

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['method'])) {
            $method = $_POST['method'];
            $userid = $_SESSION['userid'];

            switch ($method) {                
                case 'getcard':
                    header("Content-Type: application/json");
                    $check_card_availabitilty = "select * from payment_info where customer_id=$userid";
                    $results = $conn->query($check_card_availabitilty);

                    if ($results->num_rows > 0) {
                        $row = $results->fetch_assoc();
                        $credit_card_data = [
                            "status"=>"success",
                            "name"=>$row['customer_name'],
                            "cardnum"=>$row['card_number'],
                            "expdate"=>$row['expiry_date'],
                            'cvc'=>$row['card_verification_code']
                        ];

                    } else {
                        $credit_card_data = [
                            "status"=>"error",
                        ];
                    }
                    echo json_encode($credit_card_data);
                    exit;
                }
        }


        $conn->close();
    }
?>