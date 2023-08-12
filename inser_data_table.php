<?php
require_once "db_connection.php"; // Include your existing db.php file

$sql = "INSERT INTO users (username, password, full_name, email, birthdate)
        VALUES ('user1', 'hashed_password1', 'User One', 'user1@example.com', '2000-01-01'),
               ('user2', 'hashed_password2', 'User Two', 'user2@example.com', '1995-05-15')";

if (mysqli_query($connection, $sql)) {
    echo "Data inserted successfully.";
} else {
    echo "Error inserting data: " . mysqli_error($connection);
}

mysqli_close($connection);
?>