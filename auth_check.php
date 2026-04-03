<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Security Check: 
 * Redirects to login if the admin is not authenticated.
 */
function protect_page() {
    if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
        header("Location: login.php");
        exit();
    }
}
?>