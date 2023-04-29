<?php

#include('config.php');
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "database";

// // Create connection
// $conn = mysqli_connect($servername, $username, $password, $dbname);

// // Check connection
// if (!$conn) {
//   die("Connection failed: " . mysqli_connect_error());
// } else {
//   echo "connected" ;
// }
require_once "../../Models/user.php";
require_once "../../Controllers/AuthController.php";
require_once "../../Controllers/DBController.php";

$errMsg = 0;

if (isset($_POST['email']) && isset($_POST['password'])) {
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $db = new DBController;
    $user = new User;
    $auth = new AuthController;

    $user->email = $_POST['email'];
    $user->password = $_POST['password'];
    if (!$auth->login($user)) {
      $errMsg = 1;
    } else {
      #session_start();
      if (session_status() == PHP_SESSION_ACTIVE) {
        // session started
        if ($_SESSION['$role_id'] == 1) {
          header("Location: ../home/home.php");
        } else {
          header("Location: ../admin/admin.php");
        }
      } else {
        // session not started
        echo "session not started";
      }


      #header("Location: ../home/home.html");
    }
  }
}

if (isset($_POST['fullname']) && isset($_POST['location']) && isset($_POST['semail']) && isset($_POST['spass'])) {
  if (!empty($_POST['fullname']) && !empty($_POST['location']) && !empty($_POST['semail']) && !empty($_POST['spass'])) {
    $db = new DBController;
    $user = new User;
    $auth = new AuthController;

    $user->full_name = $_POST['fullname'];
    $user->address = $_POST['location'];
    $user->email = $_POST['semail'];
    $user->password = $_POST['spass'];
    if ($auth->register($user)) {
      header("login.php");
    }
  }
}

?>
<!doctype html>
<html lang="en">

<head>
  <title>Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div class="section">
    <div class="container">
      <div class="row full-height justify-content-center">
        <div class="col-12 text-center align-self-center py-5">
          <div class="section pb-5 pt-5 pt-sm-2 text-center">
            <h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
            <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
            <label for="reg-log"></label>
            <div class="card-3d-wrap mx-auto">
              <div class="card-3d-wrapper">
                <div class="card-front">
                  <div class="center-wrap">
                    <div class="section text-center">
                      <form action="login.php" method="post">
                        <h4 class="mb-4 pb-3">Log In
                        </h4>

                        <?php
                        if ($errMsg) {
                          ?>

                          <div class="alert alert-danger" role="alert">
                            Wrong Email or Password
                          </div>

                          <?php

                        }


                        ?>

                        <div class="form-group">
                          <input type="email" class="form-style" placeholder="Email" name="email" required>
                          <i class="input-icon uil uil-at"></i>
                        </div>
                        <div class="form-group mt-2">
                          <input type="password" class="form-style" placeholder="Password" name="password" required>
                          <i class="input-icon uil uil-lock-alt"></i>
                        </div>
                        <button type="submit" class="btn mt-4" name="send">Log In</button>
                        <p class="mb-0 mt-4 text-center"><a href="" class="link">Forgot your
                            password?</a></p>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="card-back">
                  <div class="center-wrap">
                    <div class="section text-center">
                      <form action="login.php" method="post">
                        <h4 class="mb-3 pb-3">Sign Up</h4>
                        <div class="form-group">
                          <input type="text" class="form-style" placeholder="Full Name" name="fullname" required>
                          <i class="input-icon uil uil-user"></i>
                        </div>
                        <div class="form-group mt-2" style="display: flex;">
                          <input type="tel" class="form-style" placeholder="Location" name="location" required>
                          <span style="padding: .375rem .75rem;position: absolute;top: 0;left: 18px;height: 48px;"><svg
                              xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                              class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                              <path
                                d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                            </svg></span>


                          <i class="bi bi-geo-alt-fille"></i>

                        </div>
                        <div class="form-group mt-2">
                          <input type="email" class="form-style" placeholder="Email" name="semail" required>
                          <i class="input-icon uil uil-at"></i>
                        </div>
                        <div class="form-group mt-2">
                          <input type="password" class="form-style" placeholder="Password" name="spass" required>
                          <i class="input-icon uil uil-lock-alt"></i>
                        </div>
                        <button type="submit" class="btn mt-4" name="send">Register</button>
                      </form>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>