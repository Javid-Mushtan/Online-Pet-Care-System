<?php
    require '../../process/connect_dbshop.php';

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['method'])) {
            $method = $_POST['method'];
            if (isset($_POST['userid'])) {
                $userid = 1;
            }


            switch ($method) {                
                case 'getcard':
                    header("Content-Type: application/json");
                    $check_card_availabitilty = "select * from credit_card_data where userId=$userid";
                    $results = $conn->query($check_card_availabitilty);

                    if ($results->num_rows > 0) {
                        $row = $results->fetch_assoc();
                        $credit_card_data = [
                            "status"=>"success",
                            "name"=>$row['name'],
                            "cardnum"=>$row['cardNo'],
                            "expdate"=>$row['expDate'],
                            'cvc'=>$row['cvc']
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