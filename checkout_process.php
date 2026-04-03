<?php
session_start();

// 1. Check if the user is logged in
// Replace 'user_id' with whatever session key you use when a user logs in
if (!isset($_SESSION['user_id'])) {
    // User is NOT registered/logged in
    // Redirect to registration with a return URL so they can come back after signing up
    header("Location: register.php?msg=please_login");
    exit();
}

// 2. If logged in, get the service details
if (isset($_GET['service_id'])) {
    $_SESSION['selected_service'] = $_GET['service_id'];
    // Redirect to your payment selection page
    header("Location: payment_gateway.php");
    exit();
} else {
    header("Location: services.php"); // Redirect back if no ID found
    exit();
}
?>