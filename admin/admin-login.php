<?php
$con = mysqli_connect('localhost', 'root', '', 'project');
session_start();




if (isset($_SESSION['admin_name'])) {
	header("location:admin-home.php");
} else {

	$name = '';
	$password = '';


	$name_empty = '';
	$password_empty = '';
	$login_error = '';

	if (isset($_POST['submit'])) {

		$name = $_POST['name'];
		$password = $_POST['password'];



		if (empty($name)) {
			$name_empty = "<div class='error'>Please Enter Username</div>";
		} else if (empty($password)) {
			$password_empty = "<div class='error'>Please Enter Password</div>";
		} else {

			$login_query = "SELECT * FROM admin WHERE aname='$name' AND password='$password'";
			$login = mysqli_query($con, $login_query);

			if (mysqli_num_rows($login) == 1) {
				$_SESSION['admin_name'] = $name;
				header("location:admin-home.php");
			} else {
				$login_error = "<div class='error-msg'>Wrong Username/Password</div>";
			}
		}
	}
?>



	<!DOCTYPE html>
	<html>

	<head>
		<title>Admin Login Page</title>
		<meta charset="utf-8" />
		<link rel="shortcut icon" type="image/x-icon" href="img/fav-icon.png" />
		<link rel="stylesheet" type="text/css" href="css/ars.css" />
	</head>

	<body>
		<div class="header-area-full">
			<div class="container">
				<div class="header-area">

					<a class="brand-title" href="../index.php">AIRBUS HELICOPTER SERVICE</a>

					<div class="header-menu" id="myNavbar">

						<!-- <a class="user-option" href="admin-login.php">Login</a>
						<a class="user-option" href="admin-signup.php">Signup</a> -->
					</div>
					<div style="clear:both;"></div>
				</div>
			</div>
		</div>

		<div class="login-area-full">
			<div class="container">
				<div class="login-area box-one">
					<h2>Admin Login Form</h2>

					<?php
					echo $login_error;
					echo $name_empty;
					echo $password_empty;
					?>
					<form action="" method="POST" name="login-form" class="login-form">
						<label class="login-lable">Username</label>
						<input type="text" name="name" class="login-input" placeholder="Enter Username" value="<?php echo $name; ?>" />
						<label class="login-lable">Password</label>
						<input type="password" name="password" class="login-input" placeholder="Enter Password" value="<?php echo $password; ?>" />
						<input type="submit" name="submit" Value="Login" class="login-input" />
					</form>
				</div>
			</div>
		</div>
					<center> <a class="go-back" href="http://localhost/hal/index.php" >Go Back</a> </center>
	</body>

	</html>

<?php

}

?>