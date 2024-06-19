<?php
// Get the URL parameter
$url = isset($_GET['url']) ? $_GET['url'] : '';

// Define the base directory where your files are located
$baseDir = __DIR__ . '/pages/';

// Define the file path
$filePath = $baseDir . $url . '.php';

// Check if the file exists
if (file_exists($filePath)) {
    // Include the requested file
    include($filePath);
} else {
    // File does not exist, redirect to the main page
    header("Location: /MyWebsites/AttendanceSystem/dashboard.php");
    exit();
}
?>