<?php
$host = "locallhost";
$dbname = "freelancerbijoy_matrimony";
$dbuser ="freelancerbijoy_matrimony";
$dbpass = "SQ4x#%GWq^y9";
$conn = new mysqli('localhost', 'root', '', 'freelancerbijoy_matrimony');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>