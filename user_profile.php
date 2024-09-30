<?php
    session_start();
    require 'process/connect_dbshop.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="profile_menu.css">
    <link rel="stylesheet" href="css/user_profile/main.css">
    <link rel="stylesheet" href="css/user_profile/my_cart.css">
    <script src="js/main.js" defer></script>
    <script src="js/side_menubar.js" defer></script>
    
    <script src="js/profile_router.js" defer></script>
    <title>My Profile</title>
</head>
<body>

<?php require 'include/header.php' ?>
    
    <div class="grid-container">
        <div class="sidebar">
            <a href="#my_account" class="btn active">My Account</a>
            <a href="#my_pets" class="btn">My Pets</a>
            <a href="#my_pets" class="btn">My Appointments</a>
            <a href="#order" class="btn">My Orders</a>
            <a href="my_cart.php" class="btn">My Cart</a>
            <button id="log-out-btn"><a href="process/log_out.php">Log out</a></button>
        </div>
        
        <div class="profile-content">
            <h1>content</h1>
        </div>
    </div>
    <?php require 'include/footer.php' ?>
</body>
</html>