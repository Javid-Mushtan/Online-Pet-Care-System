<?php
    session_start();
    $_SESSION['userid'] = 1;
    $_SESSION['loggedin'] = true;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $path = "";
        if ($_SESSION['userid'] == 0) {
            $path = "../admin_panel.php";
            $_SESSION['profile_path'] = "admin_panel.php";
        } else if ($_SESSION['userid'] == 1) {
            $path = "../index.php";
            $_SESSION['profile_path'] = "index.php";
        }
        
        echo "<a href='$path'><button>Login</button></a>";
    ?>
    
</body>
</html>