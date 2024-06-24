<?php
// Start session
session_start();

// Check if user is already logged in
if (isset($_SESSION['username'])) {
    // Redirect to appropriate dashboard based on user type
    if ($_SESSION['user_type'] == 'Admin') {
        header("Location: admin/dashboard.php");
    } else {
        header("Location: user/dashboard.php");
    }
    exit; // Ensure script stops execution after redirection
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
    <link rel="stylesheet" href="css/LoginCSS.css">

    <!--UNIVERSAL DESIGN-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body style="margin: 0; padding: 0;">
    <div id="ContentBody">
    <section class="p-3 p-md-4 p-xl-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-xxl-11">
          <div class="card border-light-subtle shadow-sm" style="min-width: 514px;">
            <div class="row g-0">
              <div class="col-12 col-md-6">
                <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy" src="ASSETS/Buildings/aclcbukidn.png" alt="Welcome back you've been missed!" style="box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.616);">
              </div>
              <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                <div class="col-12 col-lg-11 col-xl-10">
                  <div class="card-body p-3 p-md-4 p-xl-5">
                    <div class="row">
                      <div class="col-12">
                        <div class="mb-5">
                          <div class="text-center mb-4">
                            <a href="#!">
                              <img src="ASSETS/Logo.png" width="200" height="57" style="object-fit: contain;">
                            </a>
                          </div>
                          <h4 class="text-center">Welcome back, you've been missed!</h4>
                        </div>
                      </div>
                    </div>
                    <form action="login_process.php" method="post">
                      <div class="row gy-3 overflow-hidden">
                        <div class="col-12">
                          <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-floating mb-2">
                            <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" required>
                          </div>
                        </div>
                        <div class="col-12">
                            <!-- -->
                          <div class="form-check ml-1 mb-2">
                            <input class="form-check-input" type="checkbox" value="" name="remember_me" id="remember_me">
                            <label class="form-check-label text-secondary" for="remember_me">
                              Keep me logged in
                            </label>
                          </div>
                            <!-- -->
                        </div>
                        <div class="col-12">
                          <div class="d-grid">
                            <center><button class="btn btn-dark btn-lg" type="submit" style="width: 134px;">Log in</button><center>
                          </div>
                        </div>
                      </div>
                    </form>
                    <div class="row">
                      <div class="col-12">
                        <div class="d-flex gap-2 gap-md-4 flex-md-row justify-content-md-center mt-2 justify-content-center">
                          <a href="#!" class="link-secondary text-decoration-none">Forgot password</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    </div>
    <?php include 'Nav/NavFooter.php';?>

<!--EndScript-->
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>