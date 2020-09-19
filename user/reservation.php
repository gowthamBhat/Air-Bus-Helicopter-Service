<?php
$con = mysqli_connect('localhost', 'root', '', 'project');
session_start();


if (!isset($_SESSION['username'])) {
	header("location:user-login.php");
} else {

	include('inc/functions.php');

	$u_name = $_SESSION['username'];

	$pnr = $_GET['data1'];
	$customer = $_GET['data2'];
	$no = $_GET['data3'];
	$name = $_GET['data4'];
	$departure = $_GET['data5'];
	$d_time = $_GET['data6'];
	$arrival = $_GET['data7'];
	$a_time = $_GET['data8'];
	$date = $_GET['data9'];
	$adult = $_GET['data10'];
	$child = $_GET['data11'];
	$seats = $_GET['data12'];
	$email = $_GET['data13'];
	$dob = $_GET['data14'];
	$gender = $_GET['data15'];
	$total_price = $_GET['data16'];
	$uname = $_GET['data17'];

	$booking_res_failed = '';
	$booking_query_failed = '';

	if (isset($_POST['submit'])) {

		$booking_query = "INSERT INTO `booking`(`uname`,`pnr`, `customer`, `no`, `name`, `departure`, `d_time`, `arrival`, `a_time`, `date`, `adult`, `child`, `seats`, `email`, `dob`, `gender`, `price`,`status`) VALUES ('$uname',$pnr,'$customer',$no,'$name','$departure','$d_time','$arrival','$a_time','$date',$adult,$child,$seats,'$email','$dob','$gender',$total_price,'Booked')";

		$booking_result = mysqli_query($con, $booking_query);

		//SEATS QUERY
		$seats_query = "SELECT * FROM flight_seats WHERE no='$no'";
		$seats_result = mysqli_query($con, $seats_query);
		$rows_seats = mysqli_fetch_array($seats_result);

		$seatsAvailable = $rows_seats['available'];
		$totalSeats = $rows_seats['seats'];

		//REMAINING SEATS CALCULATION
		$remainingSeats =  $seatsAvailable - $seats;

		//UPDATE QUERY
		$updateSeatsQuery = "UPDATE `flight_seats` SET `available` = '$remainingSeats' WHERE `flight_seats`.`no` = '$no'";
		$updateSeats_result = mysqli_query($con, $updateSeatsQuery);



		if ($booking_result && $updateSeats_result && $seats_result) {
			if (mysqli_affected_rows($con) > 0) {
				header("location:reservation-success.php?pnr=" . $pnr);
			} else {
				$booking_res_failed = "<div class='error msg'>Booking not Done: error </div>";
			}
		} else {
			$booking_query_failed = "<div class='error-msg'>Booking Query failed</div>";
		}
	}


?>


	<!DOCTYPE html>
	<html>

	<head>
		<title>Ticket</title>
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
						<span class="unmae_header"><?php echo $u_name; ?></span>
						<a class="user-option btn-danger" href="user-logout.php">Logout</a>
					</div>
					<div style="clear:both;"></div>
				</div>
			</div>
		</div>

		<div class="reservation-area-full">
			<div class="container">
				<div class="reservation-area-2">
					<h2 class="formarea-title"><?php echo $customer; ?></h2>
					<?php
					echo $booking_res_failed;
					echo $booking_query_failed;
					?>

					<p class="r-details">Your Ticket PNR number: &nbsp;&nbsp;<span class="r-details-span"><?php echo $pnr; ?></span></p>
					<p class="r-details">Your Ticket Amount: &nbsp;&nbsp;<span class="r-details-span"><?php echo $total_price; ?></span></p>
					<form action="" method="post">
						<center>


							<input type="submit" class="reservation-submit signup-link" name="submit" value="Reserve Ticket" style="cursor:pointer; " />
							<a href="user-home.php" class="reservation-submit signup-link">cancel</a>
						</center>

					</form>
				</div>
			</div>
		</div>

	</body>

	</html>

<?php

}

?>