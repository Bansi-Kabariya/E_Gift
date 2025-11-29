<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "e_gift";  // change this to your actual database name

$con = new mysqli($host, $user, $pass, $db);

// Stop showing error messages on the page
if ($con->connect_error) {
    die("Database connection failed: " . $con->connect_error);
}
?>