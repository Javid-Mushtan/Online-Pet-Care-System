<?php
    session_start();
    require 'process/connect_dbshop.php';

    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
            $id = $_GET['id'];
            $manage_app_query = "";

            switch ($action) {
                case 'cancel':
                    $manage_app_query = "delete from appointment where appointment_id=$id";
                    break;
            }

            $conn->query($manage_app_query);
        }
    }
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/user_profile/main.css">

    <script src="js/main.js" defer></script>
    <script src="js/side_menubar.js" defer></script>
    <script src="js/user_profile/my_appointments/manage_appointments.js" defer></script>

    <title>My Appointments</title>

    <style>

        .app-card {
            min-width: 500px;
            border: 1px solid black;
            border-radius: 5px;
            margin: 10px 0;

        }

        .app-header {
            width: 100%;
            display: flex;
            justify-content: space-between;
            height: 40px;
            padding: 0;
            margin: 0;
            border-bottom: 1px solid black;
        }

        .app-info {
            width: 100%;
            display: flex;
            justify-content: space-between;
        }

        .app-header, .app-info p{
            margin-right: 2px
        }

        .app-btn {
            margin-left: 80%;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <?php require 'include/header.php' ?>

    <div class="grid-container">
        <div class="sidebar">
            <a href="user_profile.php" class="btn active">My Account</a>
            <a href="my_pets.php" class="btn">My Pets</a>
            <a href="my_appointments.php" class="btn">My Appointments</a>
            <a href="my_cart.php" class="btn">My Cart</a>
            <a href="process/log_out.php"><button id="log-out-btn">Log out</button></a>
        </div>

        <div class="profile-content">
            <h1>My Appointments</h1>

            <?php
                $user_id = $_SESSION['userid'];
                $get_appointments_query = "select * from appointment where customer_id=$user_id";

                $results = $conn->query($get_appointments_query);

                if ($results->num_rows > 0) {
                    while($row = $results->fetch_assoc()) {
                        $app_id = $row['appointment_id'];
                        $pet_id = $row['pet_id'];
                        $date = $row['appointment_date'];
                        $time = $row['appointment_time'];
                        $service = $row['service'];
                        $status = $row['status'];

                        $get_pet_name_query = "select name from pet_data where pet_id=$pet_id";
                        $pet_name_result = $conn->query($get_pet_name_query);
                        $pet_row = $pet_name_result->fetch_assoc();

                        $pet_name = $pet_row['name'];

                ?>
                        <div class="app-card">
                            <div class="app-header">
                                <p>Pet Name</p>
                                <p>Date</p>
                                <p>Time</p>
                                <p>Service</p>
                                <p>Status</p>
                            </div>
                            <div class="app-info">
                                <p><?php echo $pet_name ?></p>
                                <p><?php echo $date ?></p>
                                <p><?php echo $time ?></p>
                                <p><?php echo $service ?></p>
                                <p><?php echo $status ?></p>
                            </div>

                            <div class="app-btn">
                                <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>?action=cancel&id=<?php echo $app_id ?>"><button class="cancel-btn">Cancel</button></a>
                                <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>?action=reschedule&id=<?php echo $app_id ?>"><button class="resh-btn">Re-Schedule</button></a>
                            </div>
                        </div>
                <?php
                    } 
                } else {
                    echo "No Appointments";
                }

                $conn->close();
            ?>
            
            

        </div>

    </div>

    <?php require 'include/footer.php' ?>
</body>
</html>