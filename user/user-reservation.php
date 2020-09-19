<?php
$con = mysqli_connect('localhost', 'root', '', 'project');
session_start();

if (!isset($_SESSION['username'])) {
	header("location:user-login.php");
} else {

	include('inc/functions.php');
	$id = $_GET['id'];  //may be jet id

	$username = $_SESSION['username'];


	$user_query = "SELECT * FROM users WHERE uname='$username'";
	$user_result = mysqli_query($con, $user_query);
	$rows_user = mysqli_fetch_array($user_result);
	$customer = $rows_user['fname'] . " " . $rows_user['mname'] . " " . $rows_user['lname'];
	$email = $rows_user['email'];
	$dob = $rows_user['dob'];
	$gender = $rows_user['gender'];
	$u_name = $rows_user['uname'];



	$flight_query = "SELECT * FROM flights_details WHERE id='$id'";
	$flight_result = mysqli_query($con, $flight_query);
	$rows_flight = mysqli_fetch_array($flight_result);

	$no = $rows_flight['no']; //admin no kottu flight add madovaga adru ticket price mathe class hakirthane,(idu flight id du value store agide)
	$name = $rows_flight['name'];
	$departure = $rows_flight['departure'];
	$d_time = $rows_flight['d_time'];
	$arrival = $rows_flight['arrival'];
	$a_time = $rows_flight['a_time'];




	$class_query = "SELECT * FROM flight_class WHERE no='$no'";  //admin alli add madiro class mathe price illi ond table alli bandu save agirathe
	$class_result = mysqli_query($con, $class_query);
	$rows_class = mysqli_fetch_array($class_result);

	$class = $rows_class['class'];
	$price = $rows_class['price'];

	$total_price = '';



	$seats_query = "SELECT * FROM flight_seats WHERE no='$no'";
	$seats_result = mysqli_query($con, $seats_query);
	$rows_seats = mysqli_fetch_array($seats_result);

	$seats2 = $rows_seats['available']; //idna flight seats restrict ge use madbeku iga

	$sea = $rows_seats['seats'];


	$errortot = "";

	$date = '';
	$adult = '';
	$child = '';
	$date_empty = '';
	$passenger_empty = '';
	$pnr = '';
	$booking_query_failed = '';

	$zr = 0;


	if (isset($_POST['submit'])) {

		$date = $_POST['r-date'];
		$adult = $_POST['r-adult'];
		$child = $_POST['r-child'];




		$current = strtotime(date("Y-m-d"));

		$date2 = strtotime($date);



		if (empty($date)) {
			$date_empty = "<div class='error res-error'> Please Enter Travel Date</div>";
		} else if ($current > $date2) {
			$date_empty = "<div class='error res-error'> you enterd the previous date </div>";
		} else if ($adult == 0 && $child == 0) {
			$passenger_empty = "<div class='error res-error'> both fields cannot be zero</div>";
		} else if ($adult < 0 || $child < 0) {
			$passenger_empty = "<div class='error res-error'> please enter a positive value</div>";
		} else if ($seats2 == 0) {
			$errortot = "<div class='error res-error'> Sorry, Seats Not available  </div>";
		} else if ($adult > $seats2) {
			$errortot = "<div class='error res-error'> seat limit exceeded  </div>";
		} else if ($child > $seats2) {
			$errortot = "<div class='error res-error'> seat limit exceeded  </div>";
		} else if ($adult + $child > $seats2) {
			$errortot = "<div class='error res-error'> seat limit exceeded  </div>";
		}


		/* else if((empty($adult)  && empty($child)) || $adult<0 || $child<0 || $adult===0 || $child===0){
		$passenger_empty="<div class='error res-error'> Please Enter No.of Adult/Child Passengers or enter the valid passenger</div>"; */ else {

			$seats = $adult + $child;
			$total_price = $seats * $price;
			echo $total_price;


			$rand_no = rand(1, 1000) * 3;
			if (!rand_no_exists($rand_no, $con)) {
				$pnr = $rand_no;
			}

			header("location:payment.php?data1=" . $pnr . "&data2=" . $customer . "&data3=" . $no . "&data4=" . $name . "&data5=" . $departure . "&data6=" . $d_time . "&data7=" . $arrival . "&data8=" . $a_time . "&data9=" . $date . "&data10=" . $zr . $adult . "&data11=" . $zr . $child . "&data12=" . $seats . "&data13=" . $email . "&data14=" . $dob . "&data15=" . $gender . "&data16=" . $total_price . "&data17=" . $u_name);
		}
	}

?>



	<!DOCTYPE html>
	<html>

	<head>
		<title>Reservation Form</title>
		<meta charset="utf-8" />
		<link rel="shortcut icon" type="image/x-icon" href="img/fav-icon.png" />
		<link rel="stylesheet" type="text/css" href="css/ars.css" />

		<style type="text/css">
			#adpo {
				cursor: pointer;
			}

			table.user-reserv-table {
				width: 280px;
				display: inline-block;
				padding: 20px 15px;
				/* border: 1px solid #333; */
				background: #33333354;
				margin: 0px 10px;
			}
		</style>
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


		<div class="reservation-area-full">
			<div class="container">
				<div class="reservation-area">

					<h2 class="formarea-title">Tickte Reservation Form</h2>

					<?php
					echo $date_empty;
					echo $passenger_empty;
					echo $booking_query_failed;
					echo $errortot;
					?>
					<form action="" method="POST" name="reservation-form" class="reservation-form">
						<table class="user-reserv-table reservation-one">
							<tr>
								<td><label class="reservation-label">Helicopter No</label></td>
							</tr>

							<tr>
								<td><input type="number" name="r-no" class="reservation-input" value="<?php echo $no; ?>" disabled /></td>
							</tr>

							<tr>
								<td><label class="reservation-label">Helicopter Class</label></td>
							</tr>

							<tr>
								<td><input type="text" name="r-class" class="reservation-input" value="<?php echo $class; ?>" disabled /></td>
							</tr>

							<tr>
								<td><label class="reservation-label">Departure</label></td>
							</tr>


							<tr>
								<td><input type="text" name="r-departure" class="reservation-input" value="<?php echo $departure; ?>" disabled /></td>
							</tr>


							<tr>
								<td><label class="reservation-label">Departure Time</label></td>
							</tr>

							<tr>
								<td><input type="time" name="r-d-time" class="reservation-input" value="<?php echo $d_time; ?>" disabled /></td>
							</tr>

						</table>
						<table class="user-reserv-table reservation-two">

							<tr>
								<td><label class="reservation-label">Arrival</label></td>
							</tr>


							<tr>
								<td><input type="text" name="r-arrival" class="reservation-input" value="<?php echo $arrival; ?>" disabled /></td>
							</tr>
							<tr>
								<td><label class="reservation-label">Arrival Time</label></td>
							</tr>


							<tr>
								<td><input type="time" name="r-a-time" class="reservation-input" value="<?php echo $a_time; ?>" disabled /></td>
							</tr>



							<tr>
								<td><label class="reservation-label">Customer</label></td>
							</tr>

							<tr>
								<td><input type="text" name="r-customer" class="reservation-input" value="<?php echo $customer; ?>" disabled /></td>
							</tr>

							<tr>
								<td><label class="reservation-label">Email ID</label></td>
							</tr>

							<tr>
								<td><input type="email" name="r-email" class="reservation-input" value="<?php echo $email; ?>" disabled /></td>
							</tr>

						</table>
						<table class="user-reserv-table reservation-three">
							<tr>
								<td><label class="reservation-label">Date of Birth</label></td>
							</tr>

							<tr>
								<td><input type="text" name="r-dob" class="reservation-input" value="<?php echo $dob; ?>" disabled /></td>
							</tr>


							<tr>
								<td><label class="reservation-label">Travel Date</label></td>
							</tr>

							<tr>
								<td><input type="date" name="r-date" class="reservation-input" value="<?php echo $date; ?>" /></td>
							</tr>

							<tr>

								<td>
									<p style="color: black; font-weight:bold;">seats available <?php echo "$seats2"; ?></p> <label class="reservation-label">Adult</label>
								</td>
							</tr>

							<tr>
								<td><input type="number" name="r-adult" class="reservation-input" value="<?php echo $adult; ?>" /></td>
							</tr>


							<tr>
								<td><label class="reservation-label">Child</label></td>
							</tr>

							<tr>
								<td><input type="number" name="r-child" class="reservation-input" value="<?php echo $child; ?>" /></td>
							</tr>

						</table>
						<center>
							<input type="submit" name="submit" class="reservation-submit" id="adpo" value="Next Step" />
							<a href="user-home.php" class="reservation-submit signup-link">Cancel</a>


	</body>

	</html>

<?php
}

?>