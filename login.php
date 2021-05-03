<?php
session_start();

// UPDATE `users` SET `password` = '$2y$10$nM9isrzR2aly26Z7AhtKKeJg/ezyIkgplwO2mUrMYRodWH/w0/vy.' WHERE id > 0
// password: asdfasdf
// hash: $2y$10$nM9isrzR2aly26Z7AhtKKeJg/ezyIkgplwO2mUrMYRodWH/w0/vy.

if(isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];

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
  
    $sql = "SELECT * FROM `users` WHERE `email` = '$email'";

    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if(password_verify($_POST['password'], $row['password'])) {
            $_SESSION['username'] = $row['username'];
            header("Location: /profile.php");
            exit();
        } else {
            header("Location: /?aldaa=password");
            exit();
        }
    } else {
        header("Location: /?aldaa=num_rows");
        exit();
    }
} else {
    header("Location: /");
    exit();
}
?>