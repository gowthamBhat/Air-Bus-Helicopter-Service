<?php

session_start();
if (!isset($_SESSION['username'])) {
	header("location:user-login.php");
} else {


	$u_name = $_SESSION['username'];

	$pnr = $_GET['pnr'];
?>

	<!DOCTYPE html>
	<html>

	<head>
		<title>REservation Success</title>
		<meta charset="utf-8" />
		<link rel="shortcut icon" type="image/x-icon" href="img/fav-icon.png" />
		<link rel="stylesheet" type="text/css" href="css/ars.css" />
	</head>

	<body>
		<div class="header-area-full">
			<div class="container">
				<div class="header-area">

					<a class="brand-title" href="index.php">AIR BUS HELICOPTER SERVICE</a>

					<div class="header-menu" id="myNavbar">
						<span class="unmae_header"><?php echo $u_name; ?></span>
						<a class="user-option btn-danger" href="user-logout.php">Logout</a>
					</div>
					<div style="clear:both;"></div>
				</div>
			</div>
		</div>

		<div class="reservation-area-full">
			<div class="container">
				<div class="reservation-area-3">
					<h2 class="success-msg">Ticket Reserved Successfully</h2>

					<center>
						<a class="uview-option" href="viewTicket.php?pnr=<?php echo $pnr; ?>">View My Ticket</a>

						<a href="user-home.php" class="uview-option">Go Home</a>

					</center>
				</div>
			</div>
		</div>

	</body>

	</html>

<?php
}

?>