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

<<<<<<< HEAD
    <!-- PluginScripts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- PAGE STYLE -->
    <link rel="stylesheet" href="../css/Admin_dashboard.css">

    <!-- UNIVERSAL DESIGN -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <script>
        // Define a JavaScript variable to hold the data
        var tableData = <?php echo $json_data; ?>;
        console.log(tableData);
        tableData = [
            { date: "2023-01-15", name: "John Doe", email: "john.doe@example.com" },
            { date: "2023-02-20", name: "Jane Smith", email: "jane.smith@example.com" },
            { date: "2023-03-10", name: "Bob Johnson", email: "bob.johnson@example.com" },
            { date: "2023-04-05", name: "Alice Brown", email: "alice.brown@example.com" },
            { date: "2023-05-12", name: "Charlie Wilson", email: "charlie.wilson@example.com" },
            { date: "2023-06-08", name: "Eva Martinez", email: "eva.martinez@example.com" },
            { date: "2023-07-30", name: "Frank Miller", email: "frank.miller@example.com" },
            { date: "2023-08-17", name: "Grace Lee", email: "grace.lee@example.com" },
            { date: "2023-09-25", name: "Henry Clark", email: "henry.clark@example.com" },
            { date: "2023-10-03", name: "Ivy Wang", email: "ivy.wang@example.com" },
            { date: "2023-02-20", name: "Jane Smith", email: "jane.smith@example.com" },
            { date: "2023-03-10", name: "Bob Johnson", email: "bob.johnson@example.com" },
            { date: "2023-04-05", name: "Alice Brown", email: "alice.brown@example.com" },
            { date: "2023-05-12", name: "Charlie Wilson", email: "charlie.wilson@example.com" },
            { date: "2023-06-08", name: "Eva Martinez", email: "eva.martinez@example.com" },
            { date: "2023-07-30", name: "Frank Miller", email: "frank.miller@example.com" },
            { date: "2023-08-17", name: "Grace Lee", email: "grace.lee@example.com" },
            { date: "2023-09-25", name: "Henry Clark", email: "henry.clark@example.com" },
            { date: "2023-10-03", name: "Ivy Wang", email: "ivy.wang@example.com" },
            { date: "2023-02-20", name: "Jane Smith", email: "jane.smith@example.com" },
            { date: "2023-03-10", name: "Bob Johnson", email: "bob.johnson@example.com" },
            { date: "2023-04-05", name: "Alice Brown", email: "alice.brown@example.com" },
            { date: "2023-05-12", name: "Charlie Wilson", email: "charlie.wilson@example.com" },
            { date: "2023-06-08", name: "Eva Martinez", email: "eva.martinez@example.com" },
            { date: "2023-07-30", name: "Frank Miller", email: "frank.miller@example.com" },
            { date: "2023-08-17", name: "Grace Lee", email: "grace.lee@example.com" },
            { date: "2023-09-25", name: "Henry Clark", email: "henry.clark@example.com" },
            { date: "2023-10-03", name: "Ivy Wang", email: "ivy.wang@example.com" },
            { date: "2023-02-20", name: "Jane Smith", email: "jane.smith@example.com" },
            { date: "2023-03-10", name: "Bob Johnson", email: "bob.johnson@example.com" },
            { date: "2023-04-05", name: "Alice Brown", email: "alice.brown@example.com" },
            { date: "2023-05-12", name: "Charlie Wilson", email: "charlie.wilson@example.com" },
            { date: "2023-06-08", name: "Eva Martinez", email: "eva.martinez@example.com" },
            { date: "2023-07-30", name: "Frank Miller", email: "frank.miller@example.com" },
            { date: "2023-08-17", name: "Grace Lee", email: "grace.lee@example.com" },
            { date: "2023-09-25", name: "Henry Clark", email: "henry.clark@example.com" },
            { date: "2023-10-03", name: "Ivy Wang", email: "ivy.wang@example.com" }
            // Add more data as needed
        ];
    </script>

    <!-- Custom CSS for smaller dropdown -->
    <style>
        .custom-select-sm {
            width: 80px; /* Adjust width as needed */
        }
    </style>
</head>
<body style="margin: 0; padding: 0;">
    <?php include '../Nav/NavBar.php';?>
    <div id="ContentBody">
        <div class="container mt-3 pb-1" style="background-color:white; border-style: solid;">
            <h2>Paginated Bootstrap Table Example with Sorting and Search</h2>

            <!-- Search Input -->
            <div class="form-group">
                <input type="text" class="form-control" id="searchInput" placeholder="Search by Name">
            </div>

            <!-- Page Limit Dropdown -->
            <div class="form-group">
                <!-- Sorting Buttons -->
                <button type="button" class="btn btn-primary" id="ascButton" onclick="sortTable('asc')">Asc</button>
                <button type="button" class="btn btn-primary" id="descButton" onclick="sortTable('desc')">Desc</button>
                <label for="pageLimitSelect">Items per page:</label>
                <select class="custom-select custom-select-sm" id="pageLimitSelect" onchange="changePageSize(this.value)">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <option value="all">All</option>
                </select>
            </div>


            <!-- Table -->
            <table id="dataTable" class="table table-bordered table-striped">
                <thead style="background: white;">
                    <tr>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody id="tableBody" style="background: #fffdfa;">
                    <!-- Table rows will be dynamically added here -->
                </tbody>
            </table>

            <!-- Pagination -->
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center" id="pagination">
                    <!-- Pagination links will be dynamically added here -->
                </ul>
            </nav>
        </div>
    </div>
    <?php include '../Nav/NavFooter.php';?>

    <!-- Bootstrap JS and jQuery (optional, for Bootstrap components) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        var currentPage = 1;
        var pageSize = 10; // Default page size
        var sortOrder = 'desc'; // Default sorting order

        function populateTable(pageNumber, pageSize, searchText) {
            var tableBody = document.getElementById("tableBody");
            tableBody.innerHTML = ''; // Clear existing table rows

            var startIndex = (pageNumber - 1) * pageSize;
            var endIndex = startIndex + pageSize;

            var filteredData = tableData;
            if (searchText) {
                filteredData = tableData.filter(function(item) {
                    return item.name.toLowerCase().includes(searchText.toLowerCase());
                });
            }

            filteredData.sort(function(a, b) {
                var dateA = new Date(a.date);
                var dateB = new Date(b.date);
                if (sortOrder === 'asc') {
                    return dateA - dateB;
                } else {
                    return dateB - dateA;
                }
            });

            var paginatedData = filteredData.slice(startIndex, endIndex);

            paginatedData.forEach(function(rowData) {
                var row = document.createElement("tr");

                Object.keys(rowData).forEach(function(key) {
                    var cell = document.createElement("td");
                    var cellText = document.createTextNode(rowData[key]);
                    cell.appendChild(cellText);
                    row.appendChild(cell);
                });

                tableBody.appendChild(row);
            });
        }

        function sortTable(order) {
            sortOrder = order;
            var searchText = document.getElementById("searchInput").value.trim();
            populateTable(currentPage, pageSize, searchText);
            createPaginationLinks(Math.ceil(tableData.length / pageSize));
        }

        function createPaginationLinks(pageCount) {
            var paginationElement = document.getElementById("pagination");
            paginationElement.innerHTML = ''; // Clear existing pagination links

            var firstLi = document.createElement("li");
            firstLi.classList.add("page-item");
            var firstLink = document.createElement("a");
            firstLink.classList.add("page-link");
            firstLink.href = "#";
            firstLink.textContent = "First";
            firstLink.onclick = function() {
                currentPage = 1;
                var searchText = document.getElementById("searchInput").value.trim();
                populateTable(currentPage, pageSize, searchText);
                updatePagination();
                return false;
            };
            firstLi.appendChild(firstLink);
            paginationElement.appendChild(firstLi);

            var prevLi = document.createElement("li");
            prevLi.classList.add("page-item");
            var prevLink = document.createElement("a");
            prevLink.classList.add("page-link");
            prevLink.href = "#";
            prevLink.textContent = "Previous";
            prevLink.onclick = function() {
                if (currentPage > 1) {
                    currentPage--;
                    var searchText = document.getElementById("searchInput").value.trim();
                    populateTable(currentPage, pageSize, searchText);
                    updatePagination();
                }
                return false;
            };
            prevLi.appendChild(prevLink);
            paginationElement.appendChild(prevLi);

            for (var i = 1; i <= pageCount; i++) {
                var li = document.createElement("li");
                li.classList.add("page-item");
                var link = document.createElement("a");
                link.classList.add("page-link");
                link.href = "#";
                link.textContent = i;
                link.onclick = function() {
                    currentPage = parseInt(this.textContent);
                    var searchText = document.getElementById("searchInput").value.trim();
                    populateTable(currentPage, pageSize, searchText);
                    updatePagination();
                    return false;
                };
                li.appendChild(link);
                paginationElement.appendChild(li);
            }

            var nextLi = document.createElement("li");
            nextLi.classList.add("page-item");
            var nextLink = document.createElement("a");
            nextLink.classList.add("page-link");
            nextLink.href = "#";
            nextLink.textContent = "Next";
            nextLink.onclick = function() {
                if (currentPage < pageCount) {
                    currentPage++;
                    var searchText = document.getElementById("searchInput").value.trim();
                    populateTable(currentPage, pageSize, searchText);
                    updatePagination();
                }
                return false;
            };
            nextLi.appendChild(nextLink);
            paginationElement.appendChild(nextLi);

            var lastLi = document.createElement("li");
            lastLi.classList.add("page-item");
            var lastLink = document.createElement("a");
            lastLink.classList.add("page-link");
            lastLink.href = "#";
            lastLink.textContent = "Last";
            lastLink.onclick = function() {
                currentPage = pageCount;
                var searchText = document.getElementById("searchInput").value.trim();
                populateTable(currentPage, pageSize, searchText);
                updatePagination();
                return false;
            };
            lastLi.appendChild(lastLink);
            paginationElement.appendChild(lastLi);
        }

        function changePageSize(newPageSize) {
            pageSize = newPageSize === "all" ? tableData.length : parseInt(newPageSize);
            currentPage = 1; // Reset to first page
            var searchText = document.getElementById("searchInput").value.trim();
            populateTable(currentPage, pageSize, searchText);
            createPaginationLinks(Math.ceil(tableData.length / pageSize));
        }

        function updatePagination() {
            var paginationItems = document.querySelectorAll("#pagination .page-item");
            paginationItems.forEach(function(item, index) {
                if (index === currentPage) {
                    item.classList.add("active");
                } else {
                    item.classList.remove("active");
                }
            });
        }

        document.getElementById("searchInput").addEventListener("input", function() {
            currentPage = 1; // Reset to first page
            var searchText = this.value.trim();
            populateTable(currentPage, pageSize, searchText);
            createPaginationLinks(Math.ceil(tableData.length / pageSize));
        });

        window.onload = function() {
            var searchText = document.getElementById("searchInput").value.trim();
            populateTable(currentPage, pageSize, searchText);
            createPaginationLinks(Math.ceil(tableData.length / pageSize));
        };
    </script>
=======
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
>>>>>>> 9c9458c6fe8915de9c7455d3eb26451c14cb11ba
</body>
</html>
