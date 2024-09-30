<?php
    session_start();
    require 'process/connect_dbshop.php';

    function emptyCart($id) {
        global $conn;
        $empty_cart_query = "delete from cart where customer_id=$id";
        $conn->query($empty_cart_query);
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $userid = $_SESSION['userid'];
        $card_number = $_POST['card-number'];
        $exp_date = $_POST['exp-date'];
        $cvc = $_POST['cvc'];
        $name = $_POST['name'];

        if (isset($_POST['option'])) {
            $save = $_POST['option'];
            if ($save == "save") {
                $save_card_query = "insert into payment_info(customer_id, customer_name, card_number, expiry_date, card_verification_code) values($userid, '$name', '$card_number', '$exp_date', '$cvc');";
                $conn->query($save_card_query);
            }
        }
        emptyCart($userid);

        $conn->close();
        header("Location: index.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/payment_portal/main.css">
    <script src="js/main.js" defer></script>
    <script src="js/payment_portal/main.js" defer></script>
    <title>Check Out</title>
</head>
<body>

    <?php require 'include/header.php' ?>

    <div class="content">
        <h1>Payment Portal</h1>
        
        
        <button class="accordion" onclick="getSavedCardInfo(1)">Pay with Credit/Debit Card</button>
        <div class="panel" id="card">
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" id="card-form">
                <label for="card-number">Card Number</label><br>
                <input type="text" name="card-number" id="card-number"><br>

                <label for="exp-date">Expiry Date</label><br>
                <input type="text" name="exp-date" id="exp-date"><br>

                <label for="cvc">CVC</label><br>
                <input type="text" name="cvc" id="cvc" min="100" max="999"><br>

                <label for="name">Name on Card</label><br>
                <input type="text" name="name" id="name"><br>

                <input type="checkbox" name="option" value="save" id="save-card"> Save my card for future payments<br>

                <input type="submit" value="Place Order">
            </form>
        </div>

        <button class="accordion">Cash On Delivery</button>
        <div class="panel">
            <button id="auto-fill">Auto Fill</button>
            <form action="process/payment_portal/payment_portal.php?method=cod" method="POST">
                <label for="full-name">Full Name</label><br>
                <input type="text" name="full-name" id="full-name" required><br>

                <label for="mobile-num">Mobile Number</label><br>
                <input type="number" name="mobile-num" id="mobile-num" required><br>

                <label for="address">Address</label><br>
                <textarea name="address" id="address" rows="3" cols="30" required></textarea><br>

                <label for="postal-code">Postal Code</label><br>
                <input type="number" name="postal-code" id="postal-code" required><br>

                <input type="submit" value="Place Order">
            </form>
        </div>

    </div>
</body>
</html>