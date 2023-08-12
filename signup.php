<?php
// Check if the form has been submitted
require_once "db_connection.php"; //Include database connection
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $username = $_POST["signup-username"];
    $password = password_hash($_POST["signup-password"], PASSWORD_BCRYPT); // Hash the password
    $fullName = $_POST["full-name"];
    $email = $_POST["email"];
    $birthdate = $_POST["birthdate"];

    // Store user data in the database 
    $sql = "INSERT INTO users (username, password, full_name, email, birthdate) VALUES ('$username', '$password', '$fullName', '$email', '$birthdate')";
    
    if (mysqli_query($connection, $sql)) {  //Execute the SQL query
        header("Location: signin.php"); // Redirect to sign in page after successful signup
        exit();
    } else {
        echo "Error: " . mysqli_error($connection); // Print error message if query fails
    }

    mysqli_close($connection); // Close the database connection
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
<div class="form-container"> 
            <h2>Sign Up</h2>
            <form action="signup.php" method="POST">
                <label for="signup-username">Username:</label>
                <input type="text" id="signup-username" name="signup-username" required><br><br>

                <label for="signup-password">Password:</label>
                <input type="password" id="signup-password" name="signup-password" required><br><br>

                <label for="full-name">Full Name:</label>
                <input type="text" id="full-name" name="full-name" required><br><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br><br>

                <label for="birthdate">Date of Birth:</label>
                <input type="date" id="birthdate" name="birthdate" required><br><br>

                <button type="submit">Sign Up</button>
            </form> 
        </div>
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
