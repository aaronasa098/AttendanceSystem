<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="CSS/Universal.css"/>
  <style>
    body {
      padding-top: 56px; /* Adjust this value if your navbar height changes */
    }
    .content {
      margin-top: 20px;
      padding: 20px;
      border-radius: 15px;
      background: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Optional: add a subtle shadow for better contrast */
    }
    .content h1 {
      margin-bottom: 20px;
    }
    .content p, .content ul {
      font-size: 1.2em;
      line-height: 1.6;
    }
  </style>
  <link rel="stylesheet" type="text/css" href="CSS/Universal.css"/>
</head>
<body style="padding-top: 50px;">

<?php include 'Nav/navbar.php'; ?>

<div class="container content mt-5">
  <h1>About This Project</h1>
  <p>Welcome to our project! This project is designed to monitor and track the attendance of all individuals within an organization. It is aimed at providing an efficient and accurate way to manage attendance records, ensuring that all attendance data is recorded and easily accessible.</p>
  
  <h2>Project Overview</h2>
  <p>This attendance monitoring system is built to cater to the needs of various organizations, including schools, offices, and other institutions where attendance tracking is crucial. The system is designed to be user-friendly, with an intuitive interface that allows users to easily check in and out, view their attendance history, and manage their attendance records.</p>
  
  <h2>Features</h2>
  <ul>
    <li><strong>Real-Time Attendance Tracking:</strong> The system allows for real-time tracking of attendance, providing up-to-date records of who is present.</li>
    <li><strong>Automated Reports:</strong> Generate automated attendance reports that provide insights into attendance patterns and trends.</li>
    <li><strong>Secure Data Management:</strong> All attendance data is securely stored and managed to ensure privacy and data integrity.</li>
    <li><strong>User Management:</strong> Administrators can manage user profiles, assign roles, and monitor attendance activities.</li>
    <li><strong>Notifications and Alerts:</strong> Set up notifications and alerts for attendance-related activities, such as reminders for checking in/out.</li>
  </ul>
  
  <h2>How It Works</h2>
  <p>The system works by allowing users to check in and out using various methods such as biometric devices, RFID cards, or a simple web interface. The system records the time and date of each check-in and check-out, compiling the data into comprehensive reports that administrators can use to monitor attendance.</p>
  
  <h2>Benefits</h2>
  <ul>
    <li><strong>Improved Accuracy:</strong> Reduce errors associated with manual attendance tracking.</li>
    <li><strong>Time-Saving:</strong> Automate the attendance tracking process, saving time for both users and administrators.</li>
    <li><strong>Enhanced Accountability:</strong> Ensure that attendance records are accurate and up-to-date, promoting accountability.</li>
    <li><strong>Easy Access to Data:</strong> Access attendance data from anywhere, at any time, through the web interface.</li>
  </ul>
  
  <h2>Future Plans</h2>
  <p>We are constantly working on improving our system to meet the evolving needs of our users. Future updates will include additional features such as advanced analytics, mobile app integration, and more customizable reporting options.</p>
  
  <h2>Contact Us</h2>
  <p>If you have any questions or would like to learn more about our project, please feel free to reach out to us via our <a href="contact.php">Contact Page</a>.</p>
</div>

<?php include 'Nav/footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
