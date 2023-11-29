<?php
$host = "localhost";
$dbname = "freelancerbijoy_matrimony";
$dbuser ="freelancerbijoy_matrimony";
$dbpass = "SQ4x#%GWq^y9";
$conn = new mysqli('localhost', 'root', '', 'freelancerbijoy_matrimony');
    if ($conn->connect_error) {
        die("Database Connection Failed: " . $conn->connect_error);
    }
?>