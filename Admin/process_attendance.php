<?php
// Establish database connection
$host = 'localhost';
$dbname = 'aclc_attendance';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare SQL statement to insert attendance record
    $stmt = $pdo->prepare("INSERT INTO dailyattendance (DATE, TIME, USN, NAME, ATTENDEE) VALUES (?, ?, ?, ?, ?)");

    // Bind parameters
    $date = $_POST['date'];
    $time = $_POST['time'];
    $usn = $_POST['usn'];
    $name = $_POST['name'];
    $attendee = $_POST['attendee'];

    $stmt->execute([$date, $time, $usn, $name, $attendee]);


    echo "$date, $time, $usn, $name, $attendee";
    // Redirect back to the attendance page or display success message
    header("Location: DASHBOARD.php"); // Replace with your attendance page
    exit();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
