<?php
session_start();

if(!isset($_SESSION['username'])) {
    header("Location: /");
    exit();
}

$user = null;

// mysql -> select -> where -> username = $_SESSION['username'];

$serverip = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "apprenticemn";

// Create connection
$conn = new mysqli($serverip, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
  header("Location: /register.php?error=database");
  exit();
}
$username = $_SESSION['username'];

$sql = "SELECT * FROM `users` WHERE `username` = '$username'";

$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
} else {
    header("Location: /?aldaa=profile");
    exit();
}
?>