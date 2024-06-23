<?php
// Example PHP script to handle the POST request and insert into MariaDB

// Retrieve POST data sent from JavaScript
$data = json_decode(file_get_contents("php://input"));

// Example of how to connect to MariaDB (you should use PDO or MySQLi for security)
$servername = "localhost";
$username = 'root';
$password = '';
$dbname = 'aclc_attendance';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement (assuming your table is named 'attendees')
$sql = "INSERT INTO dailyattendance (date, time, usn, name, attendee) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $data->date, $data->time, $data->usn, $data->name, $data->attendee);

// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connections
$stmt->close();
$conn->close();
?>
