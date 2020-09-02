<?php
$con = mysqli_connect('localhost', 'root', '', 'project');
session_start();


if (!isset($_SESSION['admin_name'])) {
	header("location:admin-login.php");
} else {

	$a_name = $_SESSION['admin_name'];
	include('inc/functions.php');

	$no = '';
	$name = '';
	$departure = '';
	$arrival = '';
	$d_time = '';
	$a_time = '';
	$class = '';
	$seats = '';
	$price = '';

	$no_empty = '';
	$no_exists = '';
	$name_empty = '';
	$name_exists = '';
	$departure_empty = '';
	$arrival_empty = '';
	$d_time_empty = '';
	$a_time_empty = '';
	$seats_empty = '';
	$price_empty = '';


	$seats_query_failed = '';
	$class_query_failed = '';
	$flight_query_failed = '';

	$flight_add_success = '';


	$class_query = "SELECT * FROM plain_class";
	$class_res = mysqli_query($con, $class_query);



	if (isset($_POST['add-submit'])) {

		$no = $_POST['no'];
		$name = $_POST['name'];
		$departure = $_POST['departure'];
		$arrival = $_POST['arrival'];
		$d_time = $_POST['d-time'];
		$a_time = $_POST['a-time'];
		$class = $_POST['class'];
		$seats = $_POST['seats'];
		$price = $_POST['price'];

		if (empty($no)) {
			$no_empty = "<div class='error msg'>Flight Number Empty</div>";
		} else if (no_exists($no, $con)) {
			$no_exists = "<div class='error msg'>Flight Number Already Exists</div>";
		} else if (empty($name)) {
			$name_empty = "<div class='error msg'>Flight Name Empty</div>";
		} else if (name_exists($name, $con)) {
			$name_exists = "<div class='error msg'>Flight Name Already Exists</div>";
		} else if (empty($departure)) {
			$departure_empty = "<div class='error msg'>Departure Place Empty</div>";
		} else if (empty($arrival)) {
			$arrival_empty = "<div class='error msg'>Arrival Place Empty</div>";
		} else if (empty($d_time)) {
			$d_time_empty = "<div class='error msg'>Departure Time Empty</div>";
		} else if (empty($a_time)) {


			$a_time_empty = "<div class='error msg'>Arrival Time Empty</div>";
		} else if (empty($seats)) {


			$seats_empty = "<div class='error msg'>Type No of Seats</div>";
		} else if (empty($price)) {
			$price_empty = "<div class='error msg'>Enter Ticket Price</div>";
		} else {

			$d_time = date("g:i a", strtotime($_POST['d-time']));
			$a_time = date("g:i a", strtotime($_POST['a-time']));
			$flight_add_query = "INSERT INTO `flights_details`( `no`, `name`, `departure`, `d_time`, `arrival`, `a_time`) VALUES ($no,'$name','$departure','$d_time','$arrival','$a_time')";


			$flight_add_result = mysqli_query($con, $flight_add_query);

			if ($flight_add_result) {
				if (mysqli_affected_rows($con) > 0) {

					$type_add_query = "INSERT INTO `flight_class`(`no`, `class`, `price`) VALUES ($no,'$class','$price')";

					$type_add_result = mysqli_query($con, $type_add_query);

					if ($type_add_result) {
						if (mysqli_affected_rows($con) > 0) {

							$seats_add_query = "INSERT INTO `flight_seats`(`no`, `seats`,`available`) VALUES ($no,$seats,$seats)";

							$seats_add_result = mysqli_query($con, $seats_add_query);

							if ($seats_add_result) {
								if (mysqli_affected_rows($con) > 0) {
									$flight_add_success = "<div class='success-msg add-success-mgs'>Flight Added Successfully</div>";

									$no = '';
									$name = '';
									$departure = '';
									$arrival = '';
									$d_time = '';
									$a_time = '';
									$class = '';
									$seats = '';
									$price = '';
								}
							} else {
								$seats_query_failed = "<div class='error-msg add-success-mgs'>Seats query failed</div>";
							}
						}
					} else {
						$class_query_failed = "<div class='error-msg add-success-mgs'>Class query failed</div>";
					}
				}
			} else {
				$flight_query_failed = "<div class='error-msg add-success-mgs'>Flight query failed</div>";
			}
		}
	}
?>


	<!DOCTYPE html>
	<html>

	<head>
		<title>Add Helicopter</title>
		<meta charset="utf-8" />
		<link rel="shortcut icon" type="image/x-icon" href="img/fav-icon.png" />
		<link rel="stylesheet" type="text/css" href="css/ars.css" />
	</head>

	<body>
		<div class="header-area-full">
			<div class="container">
				<div class="header-area">

					<a class="brand-title" href="http://localhost/hal/admin/admin-home.php">AIR BUS HELICOPTER SERVICE</a>

					<div class="header-menu" id="myNavbar">

						<span class="aname_header"><?php echo $a_name; ?></span>
						<a class="admin-option btn-danger" href="admin-logout.php">Logout</a>
					</div>
					<div style="clear:both;"></div>
				</div>
			</div>
		</div>

		<div class="signup-area-full">
			<div class="container">
				<div class="signup-area">
					<h2 class="formarea-title">Add Helicopter</h2>

					<?php
					echo $no_empty;
					echo $no_exists;
					echo $name_empty;
					echo $name_exists;
					echo $departure_empty;
					echo $arrival_empty;
					echo $d_time_empty;
					echo $a_time_empty;
					echo $seats_empty;
					echo $price_empty;


					echo $seats_query_failed;
					echo $class_query_failed;



					?>
					<form action="" method="POST" name="Helicopter-add-form" class="Helicopter-add-form">

						<table class="signup-table signup-table-one">
							<tr>
								<td><label class="signup-label" form="no">Helicopter Number</label></td>
							</tr>
							<tr>
								<td>
									<input type="number" name="no" placeholder="Enter flight No" class="signup-input" id="no" value="<?php echo $no; ?>" />
								</td>

							</tr>

							<tr>
								<td><label class="signup-label" form="name">Helicopter Name</label></td>
							</tr>
							<tr>
								<td>
									<input type="text" name="name" placeholder="Enter flight Name" class="signup-input" id="name" value="<?php echo $name; ?>" />
								</td>

							</tr>

							<tr>
								<td><label class="signup-label" form="departure">Helicopter Departure</label></td>
							</tr>
							<tr>
								<td>
									<input type="text" name="departure" placeholder="Enter flight departure place" class="signup-input" id="departure" value="<?php echo $departure; ?>" />
								</td>

							</tr>

							<tr>
								<td><label class="signup-label" form="arrival">Helicopter Arrival</label></td>
							</tr>
							<tr>
								<td>
									<input type="text" name="arrival" placeholder="Enter flight arrival place" class="signup-input" id="arrival" value="<?php echo $arrival; ?>" />
								</td>

							</tr>
						</table>
						<table class="signup-table signup-table-two">
							<tr>
								<td><label class="signup-label" form="d-time">Departure Time</label></td>
							</tr>
							<tr>
								<td>
									<input type="time" name="d-time" class="signup-input signup-input-time" id="d-time" value="<?php echo $d_time; ?>" />
								</td>

							</tr>
							<tr>
								<td><label class="signup-label" form="a-time">Arrival Time</label></td>
							</tr>
							<tr>
								<td>
									<input type="time" name="a-time" class="signup-input signup-input-time" id="a-time" value="<?php echo $a_time; ?>" />
								</td>

							</tr>

							<tr>
								<td><label class="signup-label" form="class">Helicopter Class</label></td>
							</tr>
							<tr>
								<td>

									<select name="class" class="signup-input" value="<?php echo $class; ?>">
										<?php
										while ($rows = mysqli_fetch_array($class_res)) {
											echo "<option value='" . $rows['class'] . "'>" . $rows['class'] . "</option>";
										}

										?>
									</select>
								</td>

							</tr>



							<tr>
								<td><label class="signup-label" form="seats">Helicopter Capacity</label></td>
							</tr>
							<tr>
								<td>
									<input type="text" name="seats" placeholder="Enter flight Seats" class="signup-input" id="seats" value="<?php echo $seats; ?>" />
								</td>

							</tr>


						</table>
						<table class="signup-table signup-table-three">
							<tr>
								<td><label class="signup-label" form="price">Ticket Price</label></td>
							</tr>
							<tr>
								<td>
									<input type="text" name="price" placeholder="Enter price" class="signup-input" id="price" value="<?php echo $price; ?>" />
								</td>

							</tr>
						</table>

						<center>
							<button class="signup-submit" type="submit" id="signup-submit" name="add-submit" style="cursor:pointer; ">Add Helicopter</button>

							<a class="signup-submit signup-link" href="admin-home.php">Go Back</a>
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