<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
require 'includes/header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include './includes/config_db.php';

    // Collect form data
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $fullname = $_POST['fullname'];
    $gender = $_POST['gender'];
    $looking_for = $_POST['looking_for'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $height = $_POST['height'];
    $education = $_POST['education'];
    $occupation = $_POST['occupation'];
    $income = $_POST['income'];
    $caste = $_POST['caste'];
    $sub_caste = $_POST['sub_caste'];
    $moon_sing = $_POST['moon_sing'];
    $tribe = $_POST['tribe'];
    // Hash the password
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    // Handle file upload
    $targetDir = "src/img/";  // Create a directory named 'src/img/' to store uploaded files
    $targetFile = $targetDir . basename($_FILES["profile_photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["profile_photo"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["profile_photo"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["profile_photo"]["tmp_name"], $targetFile)) {
            echo "The file ". basename( $_FILES["profile_photo"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }


    date_default_timezone_set("Asia/Dhaka");
    $signup_time = date("d-m-Y h:i:sa");
    $about = $_POST['about'];
    // Insert data into the database	
    $sql = "INSERT INTO users (email, phone, fullname, gender, looking_for, address, age, height, education, occupation, income, caste, sub_caste, moon_sing, tribe, password, profile_photo, signup_time, about) VALUES ('$email', '$phone', '$fullname', '$gender', '$looking_for', '$address', '$age', '$height', '$education', '$occupation', '$income', '$caste', '$sub_caste', '$moon_sing', '$tribe', '$password', '$targetFile', '$signup_time', '$about' )";

    if ($conn->query($sql) === TRUE) {
        // Automatically log in after successful signup
        $_SESSION['user_id'] = $conn->insert_id;
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
   <h1>Sign Up</h1>
    <form method="post" class="" action="" enctype="multipart/form-data">
        <!-- Your form fields here -->
        <label>Email: <input class="form-control" type="text" name="email" required></label><br>
        <label>Phone: <input class="form-control" type="text" name="phone" required></label><br>
        <label>Full Name: <input class="form-control" type="text" name="fullname" required></label><br>
        <label>Gender: <input class="" type="radio" name="gender" value="1"> Male <input class="" type="radio" name="gender" value="0">Female</label><br>
        <label>Looking For : <input class="" type="radio" name="looking_for" value="1"> Marriage <input class="" type="radio" name="looking_for" value="0">Relationship</label><br>
        <label>address: <input class="form-control" type="text" name="address" required></label><br>
        <label>age: <input class="form-control" type="text" name="age" required></label><br>
        <label>height: <input class="form-control" type="text" name="height" required></label><br>
        <label>education: <input class="form-control" type="text" name="education" required></label><br>
        <label>occupation: <input class="form-control" type="text" name="occupation" required></label><br>
        <label>income: <input class="form-control" type="text" name="income" required></label><br>
        <label>caste: <input class="form-control" type="text" name="caste" required></label><br>
        <label>sub_caste: <input class="form-control" type="text" name="sub_caste" required></label><br>
        <label>moon_sing: <input class="form-control" type="text" name="moon_sing" required></label><br>
        <label>tribe: <input class="form-control" type="text" name="tribe" required></label><br>
        <label>profile_photo: <input class="form-control" type="file" name="profile_photo" accept="image/*" required></label><br>
        <label>about: <input class="form-control" type="text" name="about" required></label><br>
        <!-- ... other form fields ... -->
        <label>Password: <input class="form-control" type="password" name="password" required></label><br>
        <label>Confirm Password: <input class="form-control" type="password" name="confirm_password" required></label><br>
        <div class="col-12 justify-content-center d-flex">
            <input class="btn btn-success justify-content-center" type="submit" value="Sign Up">
        </div>
        
    </form>
    <div class="col-12 justify-content-center d-flex p-2">
        <a class="btn btn-warning" href="log_in.php">Log In</a>
    </div>
    
<?php
require 'includes/footer.php'; ?>