<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Grooming Services</title>
    <link rel="stylesheet" href="css/services/grooming.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <!-- <header>
        <div class="logo"><a href="indexnew.html">PetGo</a></div>
    </header> -->

    <?php require 'include/header.php' ?>

    <div class="content">
        
        <section class="hero">
            <h1>Premium Pet Grooming Services</h1>
            <p>Expert care for your furry friend</p>
            <button class="cta-btn" onclick="scrolldown()">Book a Grooming Session</button>
        </section>
    
        <section class="services">
            <h2>Our Grooming Services</h2>
            <div class="service-list">
                <div class="service-item">
                    <img src="assets/images/services/bath.jpg">
                    <h3>Bath and Brush</h3>
                    <p>Keep your pet clean and shiny.</p>
                    <span>Rs.1000</span>
                </div>
                <div class="service-item">
                    <img src="assets/images/services/haircut.jpg">
                    <h3>Haircuts and Trims</h3>
                    <p>Custom styles for your pet's look.</p>
                    <span>Rs.2000</span>
                </div>
                <div class="service-item">
                    <img src="assets/images/services/nail.jpg">
                    <h3>Nail Clipping</h3>
                    <p>Safe and gentle nail trimming.</p>
                    <span>Rs.3000</span>
                </div>
                <div class="service-item">
                    <img src="assets/images/services/board.jpg">
                    <h3>Pet Boarding</h3>
                    <p>Safetly you can board your pet.</p>
                    <span>Rs.4500</span>
                </div>
            </div>
        </section>
    
        <section class="booking" id="booking">
            <h2>Book Your Grooming Session</h2>
            <form id="bookingForm">
                <label for="ownerName">Owner's Name:</label>
                <input type="text" id="ownerName" name="ownerName" required>
    
                <label for="petName">Pet's Name:</label>
                <input type="text" id="petName" name="petName" required>
    
                <label for="service">Select Service:</label>
                <select id="service" name="service" required>
                    <option value="bath">Bath and Brush - Rs.1000</option>
                    <option value="haircut">Haircuts and Trims - Rs.2000</option>
                    <option value="nail">Nail Clipping - Rs.3000</option>
                    <option value="board">Pet Boarding Per Day - Rs.4500</option>
                </select>
    
                <label for="date">Preferred Date:</label>
                <input type="date" id="date" name="date" required>
    
                <label for="time">Preferred Time:</label>
                <input type="time" id="time" name="time" required>
    
                <button type="submit" name="fsub" id="fsub">Submit</button>
            </form>
        </section>

    </div>    

    <?php require 'include/footer.php' ?>

    <script src="js/main.js"></script>
    <script src="js/services/groomingadd.js"></script>
</body>
</html>
