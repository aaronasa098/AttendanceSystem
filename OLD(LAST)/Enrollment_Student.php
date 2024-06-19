<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Enrollment Form</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="CSS/Universal.css"/>
  <style>
    body {
      padding-top: 56px; /* Adjust this value if your navbar height changes */
    }
    #Folder {
      margin-bottom: 70px;
      padding: 20px;
      border-radius: 15px;
      background: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Optional: add a subtle shadow for better contrast */
    }
    #Folder h1 {
      margin-bottom: 20px;
    }
    #Folder p, #Folder ul {
      font-size: 1.2em;
      line-height: 1.6;
    }
  </style>
</head>
<body>

<?php include 'Nav/navbar.php'; ?>

<div class="container mt-5" id="Folder">
  <h1>Student Enrollment Form</h1>
  <form action="enrollment_process.php" method="POST">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="usn">USN</label>
        <input type="text" class="form-control" id="usn" name="usn" required>
      </div>
      <div class="form-group col-md-6">
        <label for="lname">Last Name</label>
        <input type="text" class="form-control" id="lname" name="lname" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="fname">First Name</label>
        <input type="text" class="form-control" id="fname" name="fname" required>
      </div>
      <div class="form-group col-md-4">
        <label for="mname">Middle Name</label>
        <input type="text" class="form-control" id="mname" name="mname">
      </div>
      <div class="form-group col-md-4">
        <label for="suffix">Suffix</label>
        <input type="text" class="form-control" id="suffix" name="suffix">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="birthday">Birthday</label>
        <input type="date" class="form-control" id="birthday" name="birthday" required>
      </div>
      <div class="form-group col-md-8">
        <label for="address">Address</label>
        <input type="text" class="form-control" id="address" name="address" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="form-group col-md-6">
        <label for="contact">Contact Number</label>
        <input type="text" class="form-control" id="contact" name="contact" required>
      </div>
    </div>
    <div class="form-group">
      <label for="parent_name">Parent/Guardian Name</label>
      <input type="text" class="form-control" id="parent_name" name="parent_name" required>
    </div>
    <div class="form-group">
      <label for="parent_contact">Parent/Guardian Contact Number</label>
      <input type="text" class="form-control" id="parent_contact" name="parent_contact" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<?php include 'Nav/footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
