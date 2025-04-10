<?php
session_start();  // Start the session

// Destroy all session data
session_unset();  // Removes all session variables
session_destroy();  // Destroys the session


// Redirect to the login page or home page
// header("Location: /login.php");  // Adjust the location to where you want to redirect
exit("Logged out successfully" . " - " .  "<a href='login.php'>Login</a>");

?>

