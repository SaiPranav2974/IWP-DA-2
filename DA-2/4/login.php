<?php
$username = $_POST['username'];
$password = $_POST['password'];

// Check if the password is the reverse of username
if ($password === strrev($username)) {
    echo "Welcome!";
    // Redirect to home page after successful login
    header("Location: home.html");
    exit;
} else {
    echo "Password incorrect.";
}
?>
