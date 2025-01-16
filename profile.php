<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

// Fetch user details from the database
require 'db_connection.php'; // Replace with your database connection file
$user_id = $_SESSION['user_id'];

$sql = "SELECT name, email, created_at FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Pass user data to the HTML template (Optional in this case)
$name = htmlspecialchars($user['name']);
$email = htmlspecialchars($user['email']);
$created_at = htmlspecialchars($user['created_at']);
?>
