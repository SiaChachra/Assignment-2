<?php
// Start a session
require_once "db_connection.php";
session_start();

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $username = $_POST["signin-username"];
    $password = $_POST["signin-password"];

    // Retrieve user data from the database
    
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($connection, $sql);
    $user = mysqli_fetch_assoc($result);

    // Check if user exists and password is correct
    if ($user && password_verify($password, $user["password"])) {
        // Store user data in the session
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["username"] = $user["username"];
        header("Location: restricted_page.php"); // Redirect to restricted page after successful login
        exit();
    } else {
        $error = "Invalid username or password";
    }

    mysqli_close($connection);
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

<!-- Header section -->
<header>
     <h1> Welcome to the website </h1>
</header>

<!-- Main content container -->
     <div class="container">
        <!-- Sign In Form Container -->
        <div class="form-container 2">
            <h2>Sign In</h2>
            <form action="signin.php" method="POST">
                <label for="signin-username">Username:</label>
                <input type="text" id="signin-username" name="signin-username" required><br><br>

                <label for="signin-password">Password:</label>
                <input type="password" id="signin-password" name="signin-password" required><br><br>

                <button type="submit">Sign In</button>

                <!-- Link to sign up page -->
                <h3>Don't have an account? <a href="signup.php">Join Us</a></h3>
            </form>
        </div> 

        <!-- Footer section -->
        <footer>
    <div class="footer-container">
      <p>&copy; 2023 Sia Chachra | All rights reserved</p>
       <a href="#">Copyright Info</a> 
    </div>
  </footer>
</body>
</html>
