<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: sing_up.php");
    exit();
}
$user_id = $_SESSION['user_id'];
include 'includes/config_db.php';

$sql_profile = "SELECT * FROM users WHERE id = '$user_id'";
$result = $conn->query($sql_profile);


if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $user_gender = ($user['gender'] == 0) ? '1' : '0';
    $user_looking_for = $user['looking_for'];
}

require 'includes/header.php';
include 'includes/nav.php';
?>
<div class="container mt-2">
<?php
// SQL query to select data from your table
$sql = "SELECT * FROM users WHERE gender = $user_gender and looking_for = $user_looking_for and paid = 1 and verified = 1 ORDER BY id DESC";
$result = $conn->query($sql);
// Check if the query was successful
if ($result === false) {
    die("Error executing the query: " . $conn->error);
}
// Fetch data and display it
while ($row = $result->fetch_assoc()) {
    echo '
    <div class="height" style="height: auto;">
    <img class="img-thumbnail rounded-4" src="' . $row["profile_photo"] . '" alt="Profile Photo" id="profilePhoto">
    <form method="post">
    <input type="hidden" name="user_id" value="' . $user_id . '">
    <input type="hidden" name="request_id" value="' . $row["id"] . '">
    <input type="hidden" name="approval" value="0">
    <button name="submitForm' . $row["id"] . '" type="submit" class="mt-2 mb-2 rounded-3 btn btn-warning">Request For ID : <b class="text-success">' . $row["id"] . '</b></button>
    </form>
    </div> ';
    // Check if the form is submitted
    if (isset($_POST['submitForm' . $row["id"] . ''])) {
        // Retrieve form data
        $user_id = $_POST['user_id'];
        $request_id = $_POST['request_id'];
        $approval	 = $_POST['approval'];

        $insertSql = "INSERT INTO request (user_id, request_id, approval) VALUES ('$user_id', '$request_id', '$approval')";
        
        if ($conn->query($insertSql) === true) {
            echo "Request Sent Successfully";
        } else {
            echo "Error: " . $insertSql . "<br>" . $conn->error;
        }
    }
}

// Close connection
$conn->close();
?>
<!----
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
$(document).ready(function(){
    var imgHeight = $("#profilePhoto").height();
    $(".height").height(imgHeight);
});
</script>
---->
</div>
<?php
require 'includes/footer.php'; ?>