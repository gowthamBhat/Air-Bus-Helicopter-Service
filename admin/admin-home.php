<?php
session_start();


if (!isset($_SESSION['admin_name'])) {
	header("location:admin-login.php");
} else {

	$a_name = $_SESSION['admin_name'];

?>
	<!DOCTYPE html>
	<html>

	<head>
		<title>Admin Home Page</title>
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
						<span class="uname_header"><?php echo $a_name; ?></span>

						<a class="user-option btn-success" href="http://localhost/hal/admin/admin-signup.php">Add Admin</a>
						<a class="user-option btn-danger" href="admin-logout.php">Logout</a>
					</div>
					<div style="clear:both;"></div>
				</div>
			</div>
		</div>



		<div class="home-area-full">
			<div class="container">
				<div class="home-area">
					<h2>Pick Your Options</h2>
					<div class="home-options">
						<div class="option-area">
							<a class='home-link' href="addFlightAdmin.php">Add helicopter</a>
						</div>
						<div class="option-area">
							<a class='home-link' href="viewAllFlights.php">View All helicopter</a>
						</div>
						<div class="option-area">
							<a class='home-link' href="viewAllTicket.php">View All Booked Tickets</a>
						</div>
						<div class="option-area">
							<a class='home-link' href="viewAllCancelledTicket.php">View All Cancelled Tickets</a>
						</div>
						<div class="option-area">
							<a class='home-link' href="viewAllUsers.php">View All Users</a>
						</div>


					</div>
				</div>
			</div>
		</div>

	</body>

	</html>

<?php

}

?>