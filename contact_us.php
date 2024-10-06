<?php

session_start();
require "process/connect_dbshop.php";

// Handle form submission (Create Inquiry)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action']) && $_POST['action'] == 'add') {
        // Get form data
        $email = $_POST['email'];
        $name = $_POST['name'];
        $message = $_POST['message'];

        // Insert data into the Inquiry table
        $sql = "INSERT INTO Inquiry (customer_id, inquiry_type, inquiry_description) VALUES (1, '$name', '$message')";
        if (mysqli_query($conn, $sql)) {
            echo "Inquiry added successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

// Handle form update (Edit Inquiry)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action']) && $_POST['action'] == 'edit') {
        // Get edited data
        $inquiry_id = $_POST['id'];
        $name = $_POST['name'];
        $message = $_POST['message'];

        // Update inquiry in the database
        $sql = "UPDATE Inquiry SET inquiry_type='$name', inquiry_description='$message' WHERE inquiry_id='$inquiry_id'";
        if (mysqli_query($conn, $sql)) {
            echo "Inquiry updated successfully!";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
}

// Handle query deletion (Delete Inquiry)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action']) && $_POST['action'] == 'delete') {
        // Get the inquiry ID
        $inquiry_id = $_POST['id'];

        // Delete the inquiry from the database
        $sql = "DELETE FROM Inquiry WHERE inquiry_id='$inquiry_id'";
        if (mysqli_query($conn, $sql)) {
            echo "Inquiry deleted successfully!";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }
}

// Fetch all existing inquiries from the database
$inquiries = [];
$sql = "SELECT inquiry_id, inquiry_type, inquiry_description FROM Inquiry";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $inquiries[] = $row;
    }
}

// Close the connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - PetLife Co</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/contact_us.css">
    <script src="js/main.js" defer></script>
    <link rel="icon" href="assets/images/logo.jpeg" sizes="16x16" type="image/jpeg">
</head>
<body>

    <?php require 'include/header.php' ?>

    <div class="content">
        <div class="container">
            <h1>Contact Us</h1>
            <p>Any questions or remarks? Just write us a message!</p>

            <form id="contact-form" method="POST">
                <input type="hidden" name="action" value="add">
                <div class="input-group">
                    <input type="email" id="email" name="email" placeholder="Email" required>
                    <input type="text" id="name" name="name" placeholder="Name" required>
                </div>
                <textarea id="message" name="message" placeholder="Type your issues and remarks" required></textarea>
                <button type="submit" class="submit-button">Submit</button>
            </form>

            <div class="query-list">
                <h2>Submitted Queries</h2>
                <ul id="query-items">
                    <!-- Loop through inquiries fetched from the database -->
                    <?php foreach($inquiries as $inquiry): ?>
                        <li id="query-<?= $inquiry['inquiry_id'] ?>">
                            <span><strong>Name:</strong> <?= $inquiry['inquiry_type'] ?></span><br>
                            <span><strong>Message:</strong> <?= $inquiry['inquiry_description'] ?></span><br>
                            <button class="edit-button" onclick="editQuery(<?= $inquiry['inquiry_id'] ?>)">Edit</button>
                            <button class="save-button" style="display:none;" onclick="saveQuery(<?= $inquiry['inquiry_id'] ?>)">Save</button>
                            <button class="cancel-button" style="display:none;" onclick="cancelEdit(<?= $inquiry['inquiry_id'] ?>)">Cancel</button>
                            <button class="delete-button" onclick="deleteQuery(<?= $inquiry['inquiry_id'] ?>)">Delete</button>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

   

    <script src="js/contact_us.js"></script>

    <?php require 'include/footer.php' ?>

</body>
</html>
