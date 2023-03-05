<?php
// Connect to the database
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'Web';

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the table
$sql = "SELECT * FROM big_game_species";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>
