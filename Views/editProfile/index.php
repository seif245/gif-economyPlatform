<?php
session_start();
require_once "../../Models/user.php";
require_once "../../Controllers/AuthController.php";
require_once "../../Controllers/DBController.php";



if (isset($_SESSION['$full_name'])) {
	$full_name = $_SESSION['$full_name'];
} else {
	$full_name = "";
}


if (isset($_POST['submitD'])){
	$user = new User();
	$id = $_SESSION['$u_id'];
	$user->deleteUser($id);

	header("Location: ../login_signup/login.php");
	exit();
}

if (isset($_POST['logout'])){
	header("Location: ../login_signup/login.php");
	// To end the session, unset all session variables and destroy the session
unset($_SESSION['$full_name']);
unset($_SESSION['$email']);
session_destroy();
// Redirect to login page
header("Location: ../login_signup/login.php");
exit();
	
}

if (isset($_POST['submitUp'])) {
	// Retrieve form data
	$full_name = $_POST['fullName'];
	$email = $_POST['eMail'];
	$password = $_POST['password'];
	$address = $_POST['Street'];

	$db = new DBController();
	$user = new User();

	$user->full_name = $full_name;
    $user->address = $address;
    $user->email = $email;
    $user->password = $password;
	$user->u_id = $_SESSION['$u_id'] ;
	// Update user data in database
	
	
	$user->updateUser($user);
	$user->reloadUserData($user->u_id);

	// Redirect to home page
	
	header("Location: ../home/home.php");
	
	exit();
}



?>
<!doctype html>
<html lang="en">

<head>
	<title>Edit Profile</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="styles.css">
</head>

<body>
	<form method="post" action="index.php">
		<div class="section">
			<div class="container">
				<div class="row gutters">
					<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
						<div class="card h-100">
							<div class="card-body">
								<div class="account-settings">
									<div class="user-profile">
										<div class="user-avatar">
											<img src="https://bootdey.com/img/Content/avatar/avatar1.png"
												alt="Maxwell Admin">
										</div>
										<h5 class="user-name">
											<?php echo $full_name; ?>
										</h5>
										<h6 class="user-email">
											<?php echo $_SESSION['$email']; ?>
										</h6>
									</div>
									<div class="about">
										<h5 class="mb-2 text-primary">About</h5>
										<p>I'm Yuki. Full Stack Designer I enjoy creating user-centric, delightful and
											human experiences.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
						<div class="card h-100">
							<div class="card-body">
								<div class="row gutters">
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

										<h6 class="mb-3 text-primary">Personal Details</h6>
									</div>

									<!-- Existing code here -->

									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

										<div class="form-group">
											<label for="fullName">Full Name</label>
											<input type="text" name="fullName" class="form-control" id="fullName"
												placeholder="Enter full name" value="<?php echo $full_name; ?> ">
										</div>
									</div>
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
										<div class="form-group">
											<label for="eMail">Email</label>
											<input type="email" name="eMail" class="form-control" id="eMail"
												placeholder="Enter email" value="<?php echo $_SESSION['$email']; ?>">
										</div>
									</div>
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
										<div class="form-group">
											<label for="phone">Password</label>
											<input type="password" name="password" class="form-control" id="password"
												placeholder="Enter password"
												value="<?php echo $_SESSION['$pasword']; ?>">
										</div>
									</div>

								</div>
								<div class="row gutters">
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
										<h6 class="mb-3 text-primary">Address</h6>
									</div>
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
										<div class="form-group">
											<label for="Street">Location</label>
											<input type="name" name="Street" class="form-control" id="Street"
												placeholder="Enter Location"
												value="<?php echo $_SESSION['$address']; ?>">
										</div>
									</div>



								</div>
								<div class="row gutters">
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
										<div class="text-right">
											
												<button class="btn btn-danger float-left" type="submit" name="submitD">Delete Account</button>
												<button type="submit" name="logout" class="btn btn-warning">Log Out</button>
												<button type="submit" id="submit" name="submitC" class="btn btn-secondary"><a
													style="text-decoration: none; color: white;"
													href="../home/home.php">Cancel</a></button>
											<button type="submit" id="submit" name="submitUp"
												class="btn btn-primary">Update</button>
												
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
	
</body>

</html>