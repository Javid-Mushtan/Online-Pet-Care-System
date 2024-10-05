<?php
    session_start();
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">

    <script src="js/main.js" defer></script>
    <title>Services</title>
</head>
<body>
    <?php require 'include/header.php' ?>
    <div class="content">
        <h1>Services</h1>

        <a href="grooming.php">Grooming</a>
        <a href="pet_hostel.php">Pet Hostel</a>
        <a href="vet_booking.php">Vet booking</a>
        <a href="dog_walking.php">Dog Walking</a>
    </div>
    <?php require 'include/footer.php' ?>
</body>
</html>