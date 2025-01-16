<?php
// Start session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Retrieve user name from session
$user_name = $_SESSION['user_name'] ?? 'Guest';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f3f3;
            color: #333;
            text-align: center;
        }
        .welcome-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 2.5rem;
            color: #4CAF50;
        }
        p {
            font-size: 1.2rem;
        }
        a {
            display: inline-block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1rem;
        }
        a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <h1>Welcome, <?php echo htmlspecialchars($user_name); ?>!</h1>
        <p>We’re glad to have you here. Explore the music library, create playlists, and enjoy your favorite tunes!</p>
        <a href="library.php">Go to Music Library</a>
        <br><br>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
