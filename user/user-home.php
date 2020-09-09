<?php
session_start();



if (!isset($_SESSION['username'])) {
	header("location:user-login.php");
} else {

	$u_name = $_SESSION['username'];

?>
	<!DOCTYPE html>
	<html>

	<head>
		<title>Home Page</title>
		<meta charset="utf-8" />
		<link rel="shortcut icon" type="image/x-icon" href="img/fav-icon.png" />

		<link rel="stylesheet" type="text/css" href="css/ars.css" />
	</head>

	<body>

		<div class="header-area-full">
			<div class="container">
				<div class="header-area">

					<a class="brand-title" href="http://localhost/hal/index.php">AIRBUS HELICOPTER SERVICE</a>

					<div class="header-menu" id="myNavbar">
						<span class="uname_header"><?php echo $u_name; ?></span>
						<a class="user-option btn-danger" href="user-logout.php">Logout</a>
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
							<a class='home-link' href="searchFlightsByPlace.php">Search Helicopter By Place</a>
						</div>
						<div class="option-area">
							<a class='home-link' href="viewFlightsUser.php">View All HELICOPTER SERVICE</a>
						</div>
						<div class="option-area">
							<a class='home-link' href="viewMyTicket.php?name=<?php echo $u_name; ?>">View My Tickets</a>
						</div>
						<div class="option-area">
							<a class='home-link' href="viewMyCancelledTicket.php">View Cancelled Tickets</a>
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