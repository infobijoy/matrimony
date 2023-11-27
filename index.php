<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: sing_up.php");
    exit();
}

if (isset($_POST['logout'])) {
    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect to the login page
    header("Location: log_in.php");
    exit();
}
require 'includes/header.php';
include 'includes/nav.php';
?>
<h1>Welcome to the Home Page</h1>
<?php
require 'includes/footer.php'; ?>