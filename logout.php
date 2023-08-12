<?php
// Start a session
session_start();

// Destroy the session and redirect to sign-in page
session_destroy();
header("Location: signin.php");
exit();
?>
