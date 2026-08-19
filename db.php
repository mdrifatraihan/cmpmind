<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "campusmind_db";

// কানেকশন তৈরি
$conn = new mysqli($host, $username, $password, $database);

// কানেকশন চেক করা
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
