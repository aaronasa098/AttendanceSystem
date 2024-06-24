<script>
    function updateClock() {
        const now = new Date();
        const date = now.toLocaleDateString('en-US', {year: 'numeric', month: 'long', day: 'numeric' });
        let hours = now.getHours();
        const minutes = now.getMinutes().toString().padStart(2, '0');
        const seconds = now.getSeconds().toString().padStart(2, '0');
        let period = 'AM';

        if (hours > 12) {
            hours -= 12;
            period = 'PM';
        } else if (hours === 12) {
            period = 'PM';
        } else if (hours === 0) {
            hours = 12; // Midnight (12 AM)
        }

        const timeString = `${hours}:${minutes}:${seconds} ${period}`;
        //document.getElementById('clock').innerHTML = `${date} // ${timeString}`;
        $('#date').val(date);
        $('#time').val(timeString);
        var NavTime_DATE = date;
        var NavTime_TIME = timeString;
        document.getElementById("NavTime").textContent=date+" || "+timeString;
    }

    // Update clock every second
    var clocktimer = setInterval(updateClock, 1000);
</script>
<!-- navbar.php -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="Dashboard.php"><img src="../ASSETS/Logo.png" height="32px"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="contactDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Enrollment
        </a>
        <div class="dropdown-menu" aria-labelledby="contactDropdown">
          <a class="dropdown-item" href="enrollment_student.php">Student</a>
          <a class="dropdown-item" href="enrollment_staff.php">Staff</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Services
        </a>
        <div class="dropdown-menu" aria-labelledby="servicesDropdown">
          <a class="dropdown-item" href="service1.php">Service 1</a>
          <a class="dropdown-item" href="service2.php">Service 2</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="service3.php">Service 3</a>
        </div>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" id="NavTime"></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-0">
      <li class="nav-item">
        <a class="nav-link" href="../logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>