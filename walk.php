<?php
    session_start();

    if (!isset($_SESSION['userid'])) {
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog Walking Booking Page</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/services/dog_walking.css">
    <link rel="icon" href="assets/images/logo.jpeg" sizes="16x16" type="image/jpeg">


    <script src="js/main.js" defer></script>

    <style>
        .content {
            height: 100vh;
        }
    </style>
</head>
<body>
    
    <?php require 'include/header.php'?>

    <div class="content">
        <!-- <section class="hero-banner">
        
            <img src="assets/images/services/dog_walkin.jpg"alt="pet" class="booking-icon">
        </section> -->

        <section class="service-options">
            <div class="frequency">
                <p style="color:whitesmoke;font-size:1.5rem;font-weight:bold">How often do you want the service?</p>
                <button class="service-button" id="oneTime">One-time</button>
                <button class="service-button" id="onceAWeek">Once-a-week</button>
            </div>

            <div class="filters">
                <select name="pet" id="pet">
                    <option value="">Select Pet</option>
                    <option value="dog">Dog</option>
                    <option value="cat">Cat</option>
                </select>

                <input type="text" placeholder="Dog walkers near me" class="postal-code" id="postalCode">
                <input type="date" class="date-picker" id="datePicker">
                <input type="time" class="time-picker" id="timePicker">
                <button class="search-button" id="searchButton">Search</button>
            </div>
        </section>

        <section class="walker-listings" id="walkerListings">
            <div class="walker-card">
                <img src="assets/images/services/R.jpeg" alt="Walker" class="walker-icon">
                <h3>Leo Banenda</h3>
                <p> **10 reviews**</p>
                <p>Rs. 1700/day</p>
                
            </div>

            <div class="walker-card">
                <img src="assets/images/services/Pet-Cares.jpg" alt="Walker" class="walker-icon">
                <h3>Jaky Nerona</h3>
                <p> **9 reviews**</p>
                <p>Rs. 1400/day</p>
                
            </div>

            <div class="walker-card">
                <img src="assets/images/services/OIP.jpeg" alt="Walker" class="walker-icon">
                <h3>Gewon shap</h3>
                <p>**12 reviews**</p>
                <p>Rs. 1200/day</p>
                
            </div>
        </section>
    </div>

    <script>
  document.addEventListener('DOMContentLoaded', () => {
    const searchButton = document.querySelector('.search-button');
    
    searchButton.addEventListener('click', () => {
        alert('Searching for dog walkers...');
        // Add logic for filtering the listings based on input criteria
    });
});

    </script>

    <?php require 'include/footer.php' ?>
</body>
</html>
