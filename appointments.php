<?php
    session_start();
    require 'process/connect_dbshop.php';

    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        if(isset($_GET['action'])) {
            $action = $_GET['action'];
            $id = $_GET['id'];
            $query = "";

            switch($action) {
                case 'accept':
                    $query = "update appointment set status='approved' where appointment_id=$id"; break;
                case 'remove':
                    $query = "delete from appointment where appointment_id=$id";break;
                default: echo "Request Failed";
            }

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
    <link rel="stylesheet" href="css/profile_menu.css">
    <script src="js/main.js" defer></script>
    <script src="js/admin_panel/appointment.js" defer></script>
    <title>Admin Panel</title>

    <style>
        .profile-content {
            padding: 10px 20px;
        }

        .appointments {
            min-height: 500px;
            max-height: 500px;
            width: 80%;
            border: 5px solid black;
            overflow-y: scroll;
            overflow-x: hidden;
        }

        .info-header {
            display: flex;
            width: 100%;
            justify-content: space-between;
            border-bottom: 1px solid black;
        }

        .app-info {
            display: flex;
            width: 100%;
            justify-content: space-between;
        }

        .app-card {
            border: 1px solid black;
            border-radius: 10px;
            padding: 10px 15px;
            margin: 10px;
        }

        .app-btn {
            margin-left: 80%;
        }

        .app-btn > * {
            padding: 5px 8px;
            border: none;
            border-radius: 8px;
            color: white;
        }

        .app-btn > *:hover {
            cursor: pointer;
        }

        .accept-btn {
            background-color: green;
            margin-left: 60%;
            border: none;
            border-radius: 10px;
            padding: 10px 15px;
        }

        .resch-btn {
            background-color: red;
        }

        .remove-btn {
            background-color: black;
            color: white;
        }
    </style>

</head>
<body>

<?php require 'include/header.php' ?>

<div class="grid-container">
        <div class="sidebar">
            <a href="dashboard.php" class="btn active">Dashboard</a>
            <a href="#user" class="btn">Users</a>
            <a href="#mapp" class="btn">Appointments</a>
            <a href="#order" class="btn">Services</a>
            <button id="log-out-btn"><a href="process/log_out.php">Log out</a></button>
        </div>
        
        <div class="profile-content">
            <h1>Pending</h1>
            <div class="appointments">
                
                <div class="appointment">
                <?php
                    $query = "select a.appointment_id, s.service_type, a.appointment_date, u.first_name,
                              p.name 
                              from appointment a, services s, user_data u, pet_data p
                              where a.service_id=s.service_id and a.customer_id=u.user_id and a.pet_id=p.pet_id
                              and a.status='pending'";

                    $results = $conn->query($query);

                    if ($results->num_rows > 0) {
                        while ($row = $results->fetch_assoc()) {
                            $app_id = $row['appointment_id'];
                            $service_type = $row['service_type'];
                            $app_date = $row['appointment_date'];
                            $first_name = $row['first_name'];
                            $pet_name = $row['name'];

                            $element = "<div class='app-card'>
                            <div class='app-info'>
                                <p>$app_id</p>
                                <p><$service_type</p>
                                <p>$app_date</p>
                                <p>$first_name</p>
                                <p>$pet_name</p>
                            </div>
                            <div class='app-btn'>
                                <a href='".$_SERVER['PHP_SELF']."?action=accept&id=$app_id'><button class='accept-btn'>Accept</button></a>
                            </div>
                        </div>";

                        echo $element;

                        }
                    } else {
                        echo "No Pending Appointments";
                    }
                ?>
                   
                </div>
            </div>
            <h1>Approved</h1>
            <div class="appointments">
                
                <div class="appointment">
                <?php
                    $query = "select a.appointment_id, s.service_type, a.appointment_date, u.first_name,
                              p.name 
                              from appointment a, services s, user_data u, pet_data p
                              where a.service_id=s.service_id and a.customer_id=u.user_id and a.pet_id=p.pet_id
                              and a.status='approved'";

                    $results = $conn->query($query);

                    if ($results->num_rows > 0) {
                        while ($row = $results->fetch_assoc()) {
                            $app_id = $row['appointment_id'];
                            $service_type = $row['service_type'];
                            $app_date = $row['appointment_date'];
                            $first_name = $row['first_name'];
                            $pet_name = $row['name'];

                            $element = "<div class='app-card'>
                            <div class='app-info'>
                                <p>$app_id</p>
                                <p><$service_type</p>
                                <p>$app_date</p>
                                <p>$first_name</p>
                                <p>$pet_name</p>
                            </div>
                            <div class='app-btn'>
                                <a href='".$_SERVER['PHP_SELF']."?action=remove&id=$app_id'><button class='remove-btn'>Remove</button></a>
                                <button class='resch-btn'>Re-Schedule</button>
                            </div>
                        </div>";

                        echo $element;

                        }
                    } else {
                        echo "No Approved Appointments";
                    }
                ?>
                </div>
            </div>
        </div>
</div>

<?php require 'include/footer.php' ?>
</body>
</html>
