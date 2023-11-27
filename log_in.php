<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include './includes/config_db.php';

    // Collect form data
    $emailOrPhone = $_POST['email_or_phone'];
    $password = $_POST['password'];

    // Check if the user exists
    $sql = "SELECT * FROM users WHERE email = '$emailOrPhone' OR phone = '$emailOrPhone'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify the password
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            header("Location: index.php");
            exit();
        } else {
            echo "Invalid password";
        }
    } else {
        echo "User not found";
    }

    $conn->close();
}
require 'includes/header.php';
?>
    <h1>Login</h1>
    <form method="post" action="">
        <!-- Your login form fields here -->
        <label>Email or Phone: <input class="form-control" type="text" name="email_or_phone" required></label><br>
        <label>Password: <input class="form-control" type="password" name="password" required></label><br>
        <input class="btn btn-success " type="submit" value="Login">
    </form>
<?php
require 'includes/footer.php'; ?>