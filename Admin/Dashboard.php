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
    <title>Document</title>

    <!--PluginScripts-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--PAGE STYLE-->
    <link rel="stylesheet" href="../css/Admin_dashboard.css">

    <!--UNIVERSAL DESIGN-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">


<script>
    // Define a JavaScript variable to hold the data
    var tableData = <?php echo $json_data; ?>;
    
    // Now you can use tableData in your JavaScript code
    //console.log(tableData); // Example: Output data to console
</script>

</head>

<body style="margin: 0; padding: 0;"  onload="updateTable()">
    <?php include '../Nav/NavBar.php';?>
    <div id="ContentBody">
<!---EDITZONE------------------------------------------------------------------------------------------------------------> 
<!---EDITZONE------------------------------------------------------------------------------------------------------------> 
<!---EDITZONE------------------------------------------------------------------------------------------------------------> 
    <script>

        let currentPage = 1;
        const itemsPerPage = 10;
        const maxPageNumbers = 10; 
        let sortConditions = [];
        let isSortingEnabled = false; // Control sorting with a checkbox

        function renderTable(data) {
            const tableBody = document.getElementById('dataTableBody');
            tableBody.innerHTML = '';
            data.forEach(item => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${item.DATE}</td>
                    <td>${item.TIME}</td>
                    <td>${item.USN}</td>
                    <td>${item.NAME}</td>
                    <td>${item.ATTENDEE}</td>
                `;
                tableBody.appendChild(row);
            });
        }
        

        function paginateData(data, page, itemsPerPage) {
            const startIndex = (page - 1) * itemsPerPage;
            const endIndex = Math.min(startIndex + itemsPerPage, data.length);
            return data.slice(startIndex, endIndex);
        }

        function renderPagination(totalItems, itemsPerPage) {
            const paginationContainer = document.getElementById('paginationContainer');
            paginationContainer.innerHTML = '';
            const totalPages = Math.ceil(totalItems / itemsPerPage);

            const createPageButton = (page, text) => {
                const button = document.createElement('button');
                button.className = 'btn btn-outline-secondary mx-1';
                button.innerText = text;
                button.disabled = currentPage === page;
                button.onclick = () => {
                    currentPage = page;
                    updateTable();
                };
                return button;
            };

            const currentBlock = Math.ceil(currentPage / maxPageNumbers);
            const startPage = (currentBlock - 1) * maxPageNumbers + 1;
            const endPage = Math.min(startPage + maxPageNumbers - 1, totalPages);

            if (currentPage > 1) {
                paginationContainer.appendChild(createPageButton(currentPage - 1, 'Previous'));
            }

            if (startPage > 1) {
                paginationContainer.appendChild(createPageButton(1, '1'));
                if (startPage > 2) {
                    paginationContainer.appendChild(createPageButton(startPage - 1, '...'));
                }
            }

            for (let i = startPage; i <= endPage; i++) {
                paginationContainer.appendChild(createPageButton(i, `${i}`));
            }

            if (endPage < totalPages) {
                if (endPage < totalPages - 1) {
                    paginationContainer.appendChild(createPageButton(endPage + 1, '...'));
                }
                paginationContainer.appendChild(createPageButton(totalPages, `${totalPages}`));
            }

            if (currentPage < totalPages) {
                paginationContainer.appendChild(createPageButton(currentPage + 1, 'Next'));
            }
        }

        function updateTable() {
            let filteredData = tableData;
            const searchInput = document.getElementById('searchInput').value.trim().toLowerCase();
            if (searchInput) {
                filteredData = filteredData.filter(item => {
                    return Object.values(item).some(value => {
                        return String(value).toLowerCase().includes(searchInput);
                    });
                });
            }

            if (isSortingEnabled && sortConditions.length > 0) {
                filteredData.sort((a, b) => {
                    for (const condition of sortConditions) {
                        const { column, direction } = condition;
                        const comparison = direction === 'asc'
                            ? a[column] > b[column] ? 1 : -1
                            : a[column] < b[column] ? 1 : -1;
                        if (comparison !== 0) {
                            return comparison;
                        }
                    }
                    return 0;
                });
            }

            const paginatedData = paginateData(filteredData, currentPage, itemsPerPage);
            renderTable(paginatedData);
            renderPagination(filteredData.length, itemsPerPage);
            updateHeaderIndicators();
        }

        function handleSort(column) {
            if (!isSortingEnabled) {
                return;
            }

            const existingConditionIndex = sortConditions.findIndex(cond => cond.column === column);
            if (existingConditionIndex !== -1) {
                const existingCondition = sortConditions[existingConditionIndex];
                existingCondition.direction = existingCondition.direction === 'asc' ? 'desc' : 'asc';
            } else {
                sortConditions.push({ column, direction: 'asc' });
            }
            updateTable();
        }

        function toggleSorting(isChecked) {
            isSortingEnabled = isChecked;
            if (!isSortingEnabled) {
                sortConditions = []; // Clear sort conditions when sorting is disabled
            }
            updateTable();
        }

        function updateHeaderIndicators() {
            const headers = document.querySelectorAll('#dataTable th');
            headers.forEach(header => {
                const column = header.innerText.split(' ')[0].toLowerCase();
                const conditionIndex = sortConditions.findIndex(cond => cond.column === column);
                if (isSortingEnabled && conditionIndex !== -1) {
                    const direction = sortConditions[conditionIndex].direction;
                    const indicator = direction === 'asc' ? '↑' : '↓';
                    header.innerText = `${header.innerText.split(' ')[0]} ${indicator}`;
                } else {
                    header.innerText = header.innerText.split(' ')[0];
                }
            });
        }

        function setupTable() {
            const headers = document.querySelectorAll('#dataTable th');
            headers.forEach(header => {
                const column = header.innerText.split(' ')[0].toLowerCase();
                header.style.cursor = 'pointer';
                header.onclick = () => handleSort(column);
            });

            updateTable();
        }

        function Return2Page1(){
            currentPage = 1;
            updateTable();
        }
        var DBcontentCheck = setInterval(setupTable, 1000);
    </script>     

<div class="container mt-3 mb-3 rounded text-nowrap" style="border: solid 10px; background-color: white; min-height: 625px;">
        <b><center class="mb-2 mt-2" style="font-size: 30px;">MAIN ENTRANCE ENTRY</center></b>
        <!-- Search input -->
        <div class="mb-3">
            <input
                type="text"
                id="searchInput"
                class="form-control"
                placeholder="Search..."
                onkeyup="Return2Page1()"
            />
        </div>

        <!-- Scrollable table container -->
        <div style="overflow-x: auto; height: 600px;">
        <!-- Button to Open the Modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#attendanceModal">Add Attendance</button>
            <!-- Toggle sorting checkbox -->
            <input
                type="checkbox"
                id="sortToggleCheckbox"
                onchange="toggleSorting(this.checked)"
                checked
                disabled = true
            />
            <label for="sortToggleCheckbox">Enable Sorting</label>

            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>DATE</th>
                        <th>TIME</th>
                        <th>USN</th>
                        <th>Name</th>
                        <th>Attendee</th>
                    </tr>
                </thead>
                <tbody id="dataTableBody">
                    <!-- Table rows will be dynamically populated by JavaScript -->
                </tbody>
            </table>
        </div>

        <!-- Pagination buttons -->
        <hr style="margin-top: 0px; margin-bottom: 12px;">
        <div id="paginationContainer" class="text-center mb-3"></div>
    </div>

    <div class="modal fade" id="attendanceModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Attendance</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <form id="attendanceForm">
          <div class="form-group">
            <label for="date">Date:</label>
            <input type="text" class="form-control" id="date" name="date" readonly>
          </div>
          <div class="form-group">
            <label for="time">Time:</label>
            <input type="text" class="form-control" id="time" name="time" readonly>
          </div>
          <div class="form-group">
            <label for="USN">USN:</label>
            <input type="text" class="form-control" id="USN" name="USN" required>
          </div>
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <div class="form-group">
            <label for="attendee">Attendee:</label>
            <select class="form-control" id="attendee" name="attendee" required>
              <option value="SHS student">SHS student</option>
              <option value="College Student">College Student</option>
              <option value="Instructor">Instructor</option>
              <option value="Visitor">Visitor</option>
              <option value="Staff Personal">Staff Personal</option>
            </select>
          </div>
        </form>
      </div>

      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success" onclick="submitAttendance()">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<script>
function submitAttendance() {
    const form = document.getElementById('attendanceForm');
    if (form.checkValidity()) {
      // Here you would typically handle the form data submission, e.g., via AJAX
      var date = document.getElementById("date").value;
      var time = document.getElementById("time").value;
      var usn = document.getElementById("USN").value;
      var name = document.getElementById("name").value;
      var attendee = document.getElementById("attendee").value;

      var formData = {
        date: date,
        time: time,
        usn: usn,
        name: name,
        attendee: attendee
    };

    // Assuming you are using AJAX to send the data to your server-side script
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "process_form.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Optional: Handle response from server if needed
            console.log(xhr.responseText);
        }
    };
    xhr.send(JSON.stringify(formData));

      console.log(document.getElementById("date").value +
      document.getElementById("time").value +
      document.getElementById("USN").value +
      document.getElementById("name").value +
      document.getElementById("attendee").value);

      alert('Attendance submitted successfully!');
      $('#attendanceModal').modal('hide');
    } else {
      form.reportValidity();
    }
  }
</script>

<!---EDITZONE------------------------------------------------------------------------------------------------------------> 
<!---EDITZONE------------------------------------------------------------------------------------------------------------> 
<!---EDITZONE------------------------------------------------------------------------------------------------------------> 
    </div>
    <?php include '../Nav/NavFooter.php';?>

<!--EndScript-->
  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/main.js"></script>
</body>
</html>