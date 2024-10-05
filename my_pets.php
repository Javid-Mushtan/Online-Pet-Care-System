<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start(); // Start the session

// Check if the user is logged in by checking if 'user_id' exists in the session
if (!isset($_SESSION['userid'])) {
    die("Error: You must be logged in to access this page."); // If not logged in, display an error message
}

require "process/connect_dbshop.php";

// Store the logged-in user's ID from the session
$user_id = $_SESSION['userid'];

// Handle delete request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_pet_id'])) {
    $pet_id = $conn->real_escape_string($_POST['delete_pet_id']);
    $delete_query = "DELETE FROM Pet_Data WHERE pet_id='$pet_id' AND owner_id='$user_id'";

    if ($conn->query($delete_query)) {
        echo "Pet deleted successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Fetch the user's pets
$query = "SELECT pet_id, name, pet_image_path FROM Pet_Data WHERE owner_id='$user_id'";
$pname_result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Pets Profile</title>
    <link rel="stylesheet" href="css/P_pet.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="profile_menu.css">
    <link rel="stylesheet" href="css/user_profile/main.css">

    <script src="js/main.js" defer></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Font Awesome for icons -->
</head>
<body>
    <!-- Top Bar -->
    <!-- <div class="topbar">
        <span class="top-menu" onclick="openNav()">&#9776;</span>
        <div class="logo">
            <img src="https://static.vecteezy.com/system/resources/previews/000/467/567/original/pet-shop-logo-vector.jpg" alt="PetLife Co Logo">
        </div>
        <div class="search-bar">
            <input type="text" placeholder="Search..">
            <button type="submit"><i class="fa fa-search"></i></button>
        </div>
        <img src="https://ehonami.blob.core.windows.net/media/2018/07/7-ways-dog-owners-healthier-live-longer.jpg" alt="User Profile" class="user-icon">
    </div> -->

    <!-- Side Navigation -->
    <!-- <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="side-list">
            <a href="My Profile.php">My Account</a>
            <a href="My pets.php">My Pets</a>
            <a href="#">My Appointments</a>
            <a href="#">My Cart</a>
            <a href="Book pet hostel.php">hostel</a>
            <a href="sign up.php">sign up</a>
            <a href="Book vet appointment.php">vet</a>
            <a href="test_vet.php"> vet test </a>
        </div>
        <div class="log-out-button">
            <button>Log Out</button>
        </div>
    </div> -->

    <?php require 'include/header.php' ?>

    <div class="grid-container">
        <div class="sidebar">
            <a href="user_profile.php" class="btn active">My Account</a>
            <a href="my_pets.php" class="btn">My Pets</a>
            <a href="my_appointments.php" class="btn">My Appointments</a>
            <a href="my_cart.php" class="btn">My Cart</a>
            <button id="log-out-btn"><a href="process/log_out.php">Log out</a></button>
        </div>
        
        <div class="profile-content">

            <!-- Main Content -->
            <div id="main">
                <h2 class="title-section">My Pets</h2> <!-- Title for the pets section -->
                <button class="add-pet-btn" onclick="location.href='pet_registration.php';">Add New Pet</button> <!-- Button to add new pet -->

                <!-- Pet Cards Section -->
                <section class="pet-cards">
                    <?php
                    // Check if any pets are found
                    if (mysqli_num_rows($pname_result) > 0) {
                        // Iterate through each pet and create a card
                        while ($row = mysqli_fetch_assoc($pname_result)) {
                            echo '<div class="pet-card">';
                            echo '<img src="profile_pictures/pets/' . htmlspecialchars($row['pet_image_path']) . '" alt="Pet Image" class="pet-image">'; // Fetch and display pet image
                            echo '<h3>' . htmlspecialchars($row['name']) . '</h3>';
                            echo '<form method="POST" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">';
                            echo '<input type="hidden" name="delete_pet_id" value="' . htmlspecialchars($row['pet_id']) . '">';
                            echo '<button type="submit" class="delete-pet-btn">Delete Pet</button>';
                            echo '</form>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p>No pets found.</p>';
                    }
                    ?>
                </section>
                </div>
        </div>

        <!-- Footer -->
        <!-- <footer>
            <p>PetLife Co pvt ltd &copy; 2024</p>
            <p><a href="#">Contact Us</a> | <a href="#">About Us</a></p>
        </footer> -->
    </div>

    <script src="scripts.js">
        // ---------------- PET PROFILE-----------------------------------------------------

        // Event listener for the "Add New Pet" button
        document.getElementById('addPetBtn').addEventListener('click', function() {
            alert('Redirecting to add new pet page...'); // Placeholder action for adding a new pet
            // You can redirect to a new page or open a modal for adding a new pet
            // window.location.href = 'add-pet.html'; // Example of redirecting
        });

    </script> 
    <?php require 'include/footer.php' ?>
</body>
</html>
