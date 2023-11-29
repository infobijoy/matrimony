<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: sing_up.php");
    exit();
}
$user_id = $_SESSION['user_id'];
require 'includes/header.php';
include 'includes/nav.php';
?>
<?php
include 'includes/config_db.php';
// Fetch user information
$sql = "SELECT * FROM users WHERE id = '$user_id'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $user_fullname = $user['fullname'];
    $user_email = $user['email'];
    $user_phone = $user['phone'];
    $user_gender = ($user['gender'] == 0) ? 'Female' : 'Male';
    $user_address = $user['address'];
    $user_looking_for = ($user['looking_for'] == 0) ? 'Relationship' : 'Marriage';
    $user_age = $user['age'];
    $user_height = $user['height'];
    $user_education = $user['education'];
    $user_occupation = $user['occupation'];
    $user_income = $user['income'];
    $user_caste = $user['caste'];
    $user_sub_caste = $user['sub_caste'];
    $user_moon_sing = $user['moon_sing'];
    $user_tribe = $user['tribe'];
    $user_profile_photo = $user['profile_photo'];
    $user_verified = ($user['verified'] == 0) ? 'Not verified' : 'Verified';
    $user_signup_time = $user['signup_time'];
    $user_about = $user['about'];
    $user_paid = ($user['paid'] == 0) ? 'Not Paid' : 'Paid';
}

$conn->close();
?>
<div class="container">

    <table class="table table-striped border">
        <tr>
        <img class=" col-12 img-thumbnail mb-2" src="<?php echo $user_profile_photo; ?>" alt="">
        </tr>
    <tr>
        <td class=" border-end">Email</td>
        <td><?php echo $user_email; ?></td>
    </tr>
    <tr>
        <td class=" border-end">Phone</td>
        <td><?php echo $user_phone; ?></td>
    </tr>
    <tr>
        <td class=" border-end">Phone</td>
        <td><?php echo $user_gender; ?></td>
    </tr>
    <tr>
        <td class=" border-end">Address</td>
        <td><?php echo $user_address; ?></td>
    </tr>
    <tr>
        <td class=" border-end">Looking For</td>
        <td><?php echo $user_looking_for; ?></td>
    </tr>
    <tr>
        <td class=" border-end">Age</td>
        <td><?php echo $user_age; ?></td>
    </tr>
    <tr>
        <td class=" border-end">Height</td>
        <td><?php echo $user_height; ?></td>
    </tr>
    <tr>
        <td class=" border-end">Education</td>
        <td><?php echo $user_education; ?></td>
    </tr>
    <tr>
        <td class=" border-end">Occupation</td>
        <td><?php echo $user_occupation; ?></td>
    </tr>
    <tr>
        <td class=" border-end">Income</td>
        <td><?php echo $user_income; ?></td>
    </tr>
    <tr>
        <td class=" border-end">Caste</td>
        <td><?php echo $user_caste; ?></td>
    </tr>
    <tr>
        <td class=" border-end">Sub Caste</td>
        <td><?php echo $user_sub_caste; ?></td>
    </tr>
    <tr>
        <td class=" border-end">Moon Sing</td>
        <td><?php echo $user_moon_sing; ?></td>
    </tr>
    <tr>
        <td class=" border-end">Tribe</td>
        <td><?php echo $user_tribe; ?></td>
    </tr>
    <tr>
        <td class=" border-end">Verification</td>
        <td><?php echo $user_verified; ?></td>
    </tr>
    <tr>
        <td class=" border-end">Signup Time</td>
        <td><?php echo $user_signup_time; ?></td>
    </tr>
    <tr>
        <td class=" border-end">About</td>
        <td><?php echo $user_about; ?></td>
    </tr>
    <tr>
        <td class=" border-end">Payment</td>
        <td><?php echo $user_paid; ?></td>
    </tr>
    </table>
</div>

<?php
require 'includes/footer.php'; ?>