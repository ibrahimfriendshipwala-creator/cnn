<?php
$servername = "localhost"; // Replace with your server name
$username = "u56kioxbatozx"; // Your database username
$password = "ny87so2anxav"; // Your database password
$dbname = "dbrlwdmtv689uo"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
