<?php 
if (isset($_POST['logout'])) {
    // Unset all session variables
    session_unset();
    // Destroy the session
    session_destroy();
    // Redirect to the login page
    header("Location: log_in.php");
    exit();
}
include 'includes/config_db.php';
// Fetch user information
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $user_fullname = $user['fullname'];
} else {
    // Handle the case where user information is not found
    $user_fullname = "User";
}
?>
<div class="container ps-0 pe-0">
    <div class="d-flex justify-content-evenly navbar bg-info">
        <div class="">
            <a class="btn btn-warning" href="index.php">Home</a>
        </div>

        <div class="">
            <a class="btn btn-success" href="profile.php">Profile</a>
        </div>

        <div class="">
        <form method="post" action="">
            <input class="btn btn-danger" type="submit" name="logout" value="Log Out">
        </form>
        </div>
    </div>
</div>
<div class="container p-2 pb-0 ">
    <div class="alert alert-info mb-0 text-center" role="alert">
     Welcome, Dear <span class="text-success"> <?php echo $user_fullname; ?></span>
    </div>
</div>