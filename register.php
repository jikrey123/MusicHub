<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userid = uniqid();
    $fullName = htmlspecialchars($_POST['fullName']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $confirmPassword = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : null;
    

    // Validate passwords match
    if ($password !== $confirmPassword) {
        echo "Passwords do not match!";
        exit;
    }

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'music_website');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert user data
    $sql = "INSERT INTO user (UserID, Username, Email, Password, Confirm_Password) VALUES ('$userid', '$fullName', '$email', '$hashedPassword', '$confirmPassword')";
    
    $conn->close();
}
?>
