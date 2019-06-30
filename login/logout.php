<?php

// Inialize session
session_start();

// Delete certain session
unset($_SESSION['name']);
unset($_SESSION['userId']);
// Delete all session variables
 session_destroy();

// Jump to login page
header('Location: /babar/login/login.php');

?>