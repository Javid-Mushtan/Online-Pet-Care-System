<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $page = $_POST['page'];
        $response = "";

        switch($page) {
            case 'dashboard': $response = file_get_contents('../admin_panel/dashboard.php');break;
            case 'appointments': $response = file_get_contents('../admin_panel/appointments.php');break;
            case 'products': $response = file_get_contents('../admin_panel/products.php');break;
            case 'services': $response = file_get_contents('../admin_panel/services.php');break;
            case 'users': $response = file_get_contents('../admin_panel/users.php');break;
            case 'mycart': $response = file_get_contents('../user_profile/my_cart.php');break;
            default: $response = "error";
        }

        echo $response;
    }

?>