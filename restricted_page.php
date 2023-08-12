<?php
// Start a session
require_once "db_connection.php";
session_start();

// Check if the user is logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: signin.php"); // Redirect to sign-in page if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <!-- Page content for logged-in users -->
    <h1>Welcome, <?php echo $_SESSION["username"]; ?></h1>
    <a href="logout.php">Logout</a>
</body>
</html>
