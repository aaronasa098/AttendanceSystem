<?php
// Establish database connection (assuming MySQL)
$host = 'localhost';
$dbname = 'aclc_attendance';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query to fetch data
    $stmt = $pdo->query("SELECT * FROM dailyattendance");

    // Fetch all rows as associative array
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Convert PHP array to JSON format
    $json_data = json_encode($rows);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Main Entry</title>

  <link rel="stylesheet" href="../css/Admin_dashboard.css">

  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap JavaScript and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- DataTables CSS and JS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

</head>


<body style="margin: 0; padding: 0;">
    <?php include '../Nav/NavBar.php';?>
    <div id="ContentBody">

<div class="container mt-2 mb-2 p-3" style="border: 5px solid Black; border-radius: 25px; background-color: white; overflow-x: scroll;">
  <h2 style="text-align: center;">MainGate Entry</h2>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addAttendanceModal">
        Add Attendance
    </button>
  <table id="attendanceTable" class="table table-striped table-bordered" style="width:100%; min-width: 700px">
    <thead>
      <tr>
        <th>DATE</th>
        <th>TIME</th>
        <th>USN</th>
        <th>Name</th>
        <th>Attendee</th>
      </tr>
    </thead>
    <tbody>
      <!-- Table body will be populated dynamically -->
    </tbody>
  </table>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="addAttendanceModal" tabindex="-1" role="dialog" aria-labelledby="addAttendanceModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAttendanceModalLabel">Add Attendance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Attendance form -->
                <form id="addAttendanceForm" method="post" action="process_attendance.php">
                    <div class="form-group">
                        <label>Date:</label>
                        <input type="text" class="form-control" name="date"  id="date" value="" readonly>
                    </div>
                    <div class="form-group">
                        <label>Time:</label>
                        <input type="text" class="form-control" name="time" id="time" value="" readonly>
                    </div>
                    <div class="form-group">
                        <label>USN:</label>
                        <input type="text" class="form-control" name="usn"  id="usn" required>
                    </div>
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label>Attendee:</label>
                        <select class="form-control" name="attendee" required>
                            <option value="SHS STUDENT">SHS STUDENT</option>
                            <option value="COLLEGE STUDENT">COLLEGE STUDENT</option>
                            <option value="Instructor">Instructor</option>
                            <option value="Staff Personnel">Staff Personnel</option>
                            <option value="Visitor">Visitor</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Attendance</button>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
<script>
  // Sample data (replace with your actual data)
  var tabledata = <?php echo $json_data; ?>;

  $(document).ready(function() {
    // Initialize DataTable
    var table = $('#attendanceTable').DataTable({
      data: tabledata,
      columns: [
        { data: 'DATE' },
        { data: 'TIME' },
        { data: 'USN' },
        { data: 'NAME' },
        { data: 'ATTENDEE' }
      ],
      "pagingType": "full_numbers", // Enable first, last, previous, next buttons
      "pageLength": 10, // Number of rows per page
      "lengthMenu": [5, 10, 25, 50, 75, 100], // Rows per page options
      "order": [[ 0, 'desc' ]] // Initial sorting by first column descending (DATE)
    });

    // Add search input and styling
    $('#attendanceTable_filter').addClass('float-right');
    $('#attendanceTable_filter label').prepend('<i class="fa fa-search"></i>');

    // Add first and last buttons to the pagination
    $.fn.dataTable.ext.buttons.first = {
      text: 'First',
      action: function ( e, dt, node, config ) {
          dt.page( 'first' ).draw( 'page' );
      }
    };

    $.fn.dataTable.ext.buttons.last = {
      text: 'Last',
      action: function ( e, dt, node, config ) {
          dt.page( 'last' ).draw( 'page' );
      }
    };

    // Initialize DataTable buttons
    //table.buttons().container().appendTo( '#attendanceTable_wrapper .col-md-6:eq(0)' ); // Position buttons in the table wrapper

    // Add icons to the pagination buttons
    $('div.dataTables_paginate > ul.pagination > li.paginate_button').addClass('page-item');
    $('div.dataTables_paginate > ul.pagination > li.paginate_button > a').addClass('page-link');

    // Enable sorting icons
    $('th').addClass('sorting');
    
    // Check if data rows are less than pageLength, append empty rows if needed
    if (tabledata.length < table.page.len()) {
        var difference = table.page.len() - tabledata.length;
        for (var i = 0; i < difference; i++) {
            table.row.add({ DATE: '', TIME: '', USN: '', NAME: '', ATTENDEE: '' }).draw(false);
        }
    }
  });
</script>
    <?php include '../Nav/NavFooter.php';?>
</body>
</html>
