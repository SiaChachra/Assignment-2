<?php
require_once "db_connection.php"; // Include your existing db.php file

// SQL query to create the 'users' table
$sql = "CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    birthdate DATE NOT NULL
)";

// Execute the SQL query to create the table
if (mysqli_query($connection, $sql)) {
    echo "Table 'users' created successfully."; // Success message if table is created
} else {
    echo "Error creating table: " . mysqli_error($connection); // Error message if query fails
}

mysqli_close($connection); // Close the database connection
?>