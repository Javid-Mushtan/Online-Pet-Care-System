<?php
    session_start();
    require 'process/connect_dbshop.php';
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/main.css">
    <script src="js/main.js" defer></script>
    <link rel="stylesheet" href="nstyle.css">
    
    <title>Pet Care</title>

    <script src="newjs.js" defer></script>
</head>
<body>
    <?php require 'include/header.php' ?>
    <!-- <div class="navbar">
        
        <div id="myDropdown" class="dropdown-content" style="display: none;">
        <input type="submit" onclick="toggleDropdown()" id="drop" value="Services">
            <a href="#service1">Service 1</a>
            <a href="#service2">Service 2</a>
            <a href="#service3">Service 3</a>
        </div>

        <input type="text" name="search" class="search" placeholder="Search...">
        <input type="submit" name="sb" class="sbutton" value="Search">

        <php?
        
        ?>

        <a href="#su" class="signin">Sign Up</a>
        <a href="#si" class="signup">Sign In</a>
    </div> -->

    <img src="dog.jpg" alt="Pet Care">
    <h1 id="def">We look after your pets with Expert Care</h1>
</body>
</html>