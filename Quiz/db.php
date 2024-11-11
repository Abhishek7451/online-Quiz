<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = ""; // Adjust as necessary
$dbname = "quiz";

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (mysqli_connect_errno()) {
    die("Database Connection Failed: " . mysqli_connect_error());
}
?>
