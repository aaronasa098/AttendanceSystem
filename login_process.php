<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aclc_attendance";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get username and password from form submission
$username = $_POST['email'];
$password = $_POST['password'];

echo "$username  =  $password";

// SQL query to fetch user details based on username and password
$sql = "SELECT * FROM user_accounts WHERE User_username = '$username' AND User_password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // If user exists, fetch user details
    $row = $result->fetch_assoc();
    $user_status = $row['User_status'];
    $user_type = $row['User_type'];

    // Start session and store user details in session variables
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['user_status'] = $user_status;
    $_SESSION['user_type'] = $user_type;

    // Redirect to a logged-in page
    header("Location: admin/dashboard.php");
} else {
    // If login fails, redirect back to login page with an error message
    header("Location: index.php?error=InvalidCredentials");
}

$conn->close();
?>
