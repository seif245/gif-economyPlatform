<?php

/*session_start();
 if(!isset($_SESSION['$full_name']))
 {
  header("location:../login_signup/login.php");
 }
 else
 {
  if($_SESSION['$full_name']!='Admin')
  {
    header("location:../login_signup/login.php");
  }
 }
*/

require_once '../../Models/posts.php';
require_once '../../Controllers/PostController.php';

$postController = new PostController;

$posts = $postController->getinformation();



?>



<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Information Of Post</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="../assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="../assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="../assets/js/config.js"></script>
</head>

<body>

  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span> Post Information</h4>

    <!-- Basic Bootstrap Table -->


    <!-- Striped Rows -->
    <div class="card">
      <h5 class="card-header"></h5>
      <?php
      if (count($posts) == 0) {
      ?>
        <div class="alert alert-danger" role="alert">NO Available Information</div>
      <?php
      } else {

      ?>
        <div class="table-responsive text-nowrap">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Id_post</th>
                <th>Publisher</th>
                <th>Post Name</th>
                <th>Description</th>

              </tr>
            </thead>
            <tbody class="table-border-bottom-0">


              <?php


              foreach ($posts as $post) {
              ?>
                <tr>
                  <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <?php echo $post["id_post"] ?><strong></strong></td>
                  <td><?php echo $post["name_publisher"] ?></td>
                  <td>
                    <?php echo $post["name_post"] ?>
                  </td>
                  <td><span class="badge bg-label-primary me-1"><?php echo $post["description"] ?></span></td>

                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      <?php
      }
      ?>


    </div>
    <!--/ Striped Rows -->

    <hr class="my-5" />

    <!-- Bordered Table -->
    <!--/ Bordered Table -->



    <!-- Footer -->
    <div>
      <a href="admin.php" target="_blank"><span class="tf-icons bx bx-add-to-queue"></span>Back</a>
    </div>
    <!-- / Footer -->

    <div class="content-backdrop fade"></div>
  </div>
  <!-- Content wrapper -->
  </div>
  <!-- / Layout page -->
  </div>

  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->



  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="../assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../assets/vendor/libs/popper/popper.js"></script>
  <script src="../assets/vendor/js/bootstrap.js"></script>
  <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="../assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->

  <!-- Main JS -->
  <script src="../assets/js/main.js"></script>

  <!-- Page JS -->

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>