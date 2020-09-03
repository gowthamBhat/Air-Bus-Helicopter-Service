<?php
try {
	$con = mysqli_connect('localhost', 'root', '', 'project');
} catch (MySQli_Sql_Exception $ex) {
	echo "connection Error:" . $ex;
}
session_start();
if (isset($_SESSION['admin_name'])) {
	header("location:admin-home.php");
} else {





	include("inc/functions.php");

	$success = '';
	$reg_error = '';
	$firstname_empty = '';
	$firstname_len = '';
	$lastname_empty = '';
	$lastname_len = '';
	$middlename_empty = '';
	$middlename_len = '';
	$username_empty = '';
	$username_len = '';
	$email_empty = '';
	$email_format = '';
	$email_val = '';
	$email_exists = '';
	$mobile_empty = '';
	$mobile_len = '';
	$dob_empty = '';
	$gender_empty = '';
	$password_empty = '';
	$password_len = '';
	$cpassword_empty = '';
	$password_match = '';


	$firstname = '';
	$middlename = '';
	$lastname = '';
	$username = '';
	$email = '';
	$mobile = '';
	$dob = '';
	$gender = '';
	$password = '';
	$cpassword = '';


	$username_exists = '';
	$email_exists = '';
	$mobile_exists = '';
	$gender_format = '';

	if (isset($_POST['signup-submit'])) {
		$firstname = $_POST['user-firstname'];
		$middlename = $_POST['user-middlename'];
		$lastname = $_POST['user-lastname'];
		$username = $_POST['user-username'];
		$email = $_POST['user-email'];
		$mobile = $_POST['user-mobile'];
		$dob = $_POST['user-dob'];
		$gender = $_POST['user-gender'];
		$password = $_POST['user-password'];
		$cpassword = $_POST['user-cpassword'];

		$current = strtotime(date("Y-m-d"));
		$validateDOB = strtotime($dob);



		if (empty($firstname)) {
			$firstname_empty = "<div class='error signup-error'> Please Enter First Name</div>";
		} else if (strlen($firstname) < 3) {
			$firstname_len = "<div class='error signup-error'> First Name character must be 3 or more</div>";
		} else if (empty($middlename)) {
			$middlename_empty = "<div class='error signup-error'> Please Enter Middle Name</div>";
		} else if (strlen($middlename) < 3) {
			$middlename_len = "<div class='error signup-error'> Middle Name character must be 3 or more</div>";
		} else if (empty($lastname)) {
			$lastname_empty = "<div class='error signup-error'> Please Enter Last Name</div>";
		} else if (strlen($lastname) < 3) {
			$lastname_len = "<div class='error signup-error'> Last Name character must be 3 or more</div>";
		} else if (empty($username)) {
			$username_empty = "<div class='error signup-error'> Please Enter Username</div>";
		} else if (strlen($username) < 3) {
			$username_len = "<div class='error signup-error'> Username character must be 3 or more</div>";
		} else if (admin_exists($username, $con)) {

			$username_exists = "<div class='error signup-error'> Username Not Available try different one</div>";
		} else if (empty($email)) {
			$email_empty = "<div class='error signup-error'> Please Enter Email ID</div>";
		} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$email_format = "<div class='error signup-error'>Enter Valid Email Address</div>";
		} else if (admin_email_exists($email, $con)) {

			$email_exists = "<div class='error signup-error'>Email Already Used</div>";
		} else {

			if (empty($mobile)) {
				$mobile_empty = "<div class='error signup-error'> Please Enter Mobile Number</div>";
			} else if (strlen($mobile) != 10) {
				$mobile_len = "<div class='error signup-error'> Enter 10 Digit Mobile Number</div>";
			} else if (admin_mobile_exists($mobile, $con)) {
				$mobile_exists = "<div class='error signup-error'>Mobile Number Already Used</div>";
			} else {

				if (empty($dob)) {
					$dob_empty = "<div class='error signup-error'> Please Enter DOB</div>";
				} else if ($current < $validateDOB) {
					$dob_empty = "<div class='error signup-error'> You enterd upcomming date</div>";
				} else if (empty($gender)) {
					$gender_empty = "<div class='error signup-error'> Please Enter your Gender</div>";
				} else if ($gender == 'Male' || $gender == 'Female' || $gender == 'Others') {
					if (empty($password)) {
						$password_empty = "<div class='error signup-error'> Please Enter Password</div>";
					} else if (strlen($password) < 8) {
						$password_len = "<div class='error signup-error'> Password must be 8 or more character</div>";
					} else if (empty($cpassword)) {
						$cpassword_empty = "<div class='error signup-error'> Please Enter Confirm Password</div>";
					} else if ($password != $cpassword) {
						$password_match = "<div class='error signup-error'> Password Not Matched</div>";
					} else {
						$signup_query = "INSERT INTO `admin`(`fname`,`mname`, `lname`, `aname`, `email`, `mobile`, `dob`, `gender`, `password`) 
							VALUES ('$firstname','$middlename','$lastname','$username','$email','$mobile','$dob','$gender','$password')";
						$res_result = mysqli_query($con, $signup_query);

						if ($res_result) {
							if (mysqli_affected_rows($con) > 0) {
								$success = "<div class='success-msg signup-success'>Registered Successfully</div>";
								$firstname = '';
								$middlename = '';
								$lastname = '';
								$username = '';
								$email = '';
								$mobile = '';
								$dob = '';
								$gender = '';
								$password = '';
								$cpassword = '';
							} else {
								$reg_error = "<div class='error-msg signup-error'>Registeration Failed</div>";
							}
						}
					}
				} else {
					$gender_format = "<div class='error signup-error'> Enter Proper Gender (only Male, Female,Others) Value</div>";
				}
			}
		}
	}

?>

	<!DOCTYPE html>
	<html>

	<head>
		<title>Admin Signup Form</title>
		<meta charset="utf-8" />
		<link rel="shortcut icon" type="image/x-icon" href="img/fav-icon.png" />
		<link rel="stylesheet" type="text/css" href="css/ars.css" />
	</head>

	<body>

		<div class="header-area-full">
			<div class="container">
				<div class="header-area">

					<a class="brand-title" href="http://localhost/hal/index.php">AIR BUS HELICOPTER SERVICE</a>

					<div class="header-menu" id="myNavbar">

						<a class="user-option" href="admin-login.php">Login</a>
						<a class="user-option" href="admin-signup.php">Signup</a>
					</div>
					<div style="clear:both;"></div>
				</div>
			</div>
		</div>

		<div class="signup-area-full">
			<div class="container">
				<div class="signup-area">



					<h2 class="formarea-title">Admin Signup Form</h2>
					<?php echo $success;
					echo $reg_error; ?>
					<?php echo $firstname_empty;
					echo $firstname_len; ?>
					<?php echo $middlename_empty;
					echo $middlename_len; ?>
					<?php echo $lastname_empty;
					echo $lastname_len; ?>
					<?php echo $username_empty;
					echo $username_len;
					echo $username_exists; ?>
					<?php echo $email_empty;
					echo $email_val;
					echo $email_format;
					echo $email_exists; ?>
					<?php echo $mobile_empty;
					echo $mobile_len;
					echo $mobile_exists; ?>
					<?php echo $dob_empty; ?>
					<?php echo $gender_empty;
					echo $gender_format; ?>
					<?php echo $password_empty;
					echo $password_len; ?>
					<?php echo $cpassword_empty;
					echo $password_match; ?>
					<form action="admin-signup.php" method="POST" name="signup-form" id="signup-form" enctype="multipart/form-data">

						<table class="signup-table signup-table-one">
							<tr>
								<td><label class="signup-label" form="user-firstname">First Name</label></td>
							</tr>
							<tr>
								<td>
									<input type="text" name="user-firstname" placeholder="Enter First Name" class="signup-input" id="user-firstname" value="<?php echo $firstname; ?>" />

								</td>

							</tr>
							<tr>
								<td><label class="signup-label" form="user-middlename">Middle Name</label></td>
							</tr>
							<tr>
								<td>
									<input type="text" name="user-middlename" placeholder="Enter Middle Name" class="signup-input" id="user-middlename" value="<?php echo $middlename; ?>" />

								</td>
							</tr>
							<tr>
								<td><label class="signup-label" form="user-lastname">Last Name</label></td>
							</tr>
							<tr>
								<td>
									<input type="text" name="user-lastname" placeholder="Enter Last Name" class="signup-input" id="user-lastname" value="<?php echo $lastname; ?>" />

								</td>
							</tr>
							<tr>
								<td><label class="signup-label" form="user-username">User name</label></td>
							</tr>
							<tr>
								<td>
									<input type="text" name="user-username" placeholder="Enter username" class="signup-input" id="user-username" value="<?php echo $username; ?>" />

								</td>
							</tr>

							<tr>
								<td><label class="signup-label" form="user-password">Email ID</label></td>
							</tr>
							<tr>
								<td>
									<input type="text" name="user-email" placeholder="Enter Email ID" class="signup-input" id="user-email" value="<?php echo $email; ?>" />

								</td>
							</tr>
						</table>

						<table class="signup-table signup-table-two">
							<tr>
								<td><label class="signup-label" form="user-mobile">Mobile Number</label></td>
							</tr>
							<tr>
								<td>
									<input type="number" name="user-mobile" placeholder="Enter Mobile No" class="signup-input" id="user-mobile" value="<?php echo $mobile; ?>" />

								</td>
							</tr>

							<tr>
								<td><label class="signup-label" form="user-dob">Date of Birth</label></td>
							</tr>
							<tr>
								<td>
									<input type="date" name="user-dob" placeholder="Enter DOB" class="signup-input signup-input-date" id="user-dob" value="<?php echo $dob; ?>" />

								</td>
							</tr>

							<tr>
								<td><label class="signup-label" form="user-gender">Gender</label></td>
							</tr>
							<tr>
								<td>
									<input type="text" name="user-gender" placeholder="Male , Female or Others" class="signup-input" id="user-gender" value="<?php echo $gender; ?>" />

								</td>
							</tr>

							<tr>
								<td><label class="signup-label" form="user-password">Password</label></td>
							</tr>
							<tr>
								<td>
									<input type="text" name="user-password" placeholder="Enter Password" class="signup-input" id="user-password" value="<?php echo $password; ?>" />

								</td>
							</tr>
							<tr>
								<td><label class="signup-label" form="user-cpassword">Confirm Password</label></td>
							</tr>
							<tr>
								<td>
									<input type="text" name="user-cpassword" placeholder="Re-enter Password" class="signup-input" id="user-cpassword" value="<?php echo $cpassword; ?>" />

								</td>
							</tr>
						</table>

						<div style="clear:both;"></div>
						<center>
							<button class="signup-submit" type="submit" id="signup-submit" name="signup-submit">Signup</button>
						</center>


					</form>
				</div>
			</div>
		</div>
		<div class="footer-area-full">
			<div class="container">
				<div class="footer-area">


					<p>AIR BUS HELICOPTER SERVICE</p>

				</div>
			</div>
		</div>
	</body>

	</html>


<?php


}


?>