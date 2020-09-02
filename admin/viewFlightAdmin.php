<?php
$con = mysqli_connect('localhost', 'root', '', 'project');
session_start();

$search_empty = '';
$searc_query_error = '';


if (!isset($_SESSION['admin_name'])) {
	header("location:admin-login.php");
} else {


	$a_name = $_SESSION['admin_name'];

	$id = $_GET['id'];


?>

	<!DOCTYPE html>
	<html>

	<head>
		<title>View Ticket Full Details</title>
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
						<span class="uname_header"><?php echo $a_name; ?></span>
						<a class="user-option btn-danger" href="admin-logout.php">Logout</a>
					</div>
					<div style="clear:both;"></div>
				</div>
			</div>
		</div>


		<div class="view-area-full">
			<div class="container">
				<div class="view-area">
					<center>
						<span class='go-back-span viewTicket-go'>
							<a class='go-back' href='admin-home.php'>Go Home</a>
						</span>
						<span class='go-back-span viewTicket-go'>
							<a class='go-back' href='viewAllFlights.php'>Go Back</a>
						</span>
					</center>




					<?php


					$search_query = "SELECT * FROM flights_details WHERE id='$id'";

					$res = mysqli_query($con, $search_query);



					if ($res) {
						if (mysqli_num_rows($res) > 0) {

							$rows = mysqli_fetch_array($res);
							$fno = $rows['no'];

							$f_query = "SELECT * FROM flight_class WHERE no='$fno'";

							$fres = mysqli_query($con, $f_query);

							$frows = mysqli_fetch_array($fres);

							$s_query = "SELECT * FROM flight_seats WHERE no='$fno'";

							$sres = mysqli_query($con, $s_query);

							$srows = mysqli_fetch_array($sres);

							echo "<div style='clear:both;'></div>";

							echo "<table class='ticket-view-table'>";
							echo "<tr>
										<td colspan='2' class='c-name-title'>
											
													<h2 class='viewTicket'>" . $rows['name'] . "</h2>
											
										</td>
									</tr>";


							echo "<tr>
										<td>Flight No :</td>
										<td>" . $rows['no'] . "</td>
									</tr>";

							echo "<tr>
										<td>Class :</td>
										<td>" . $frows['class'] . "</td>
									</tr>";

							echo "<tr>
										<td>Departure :</td>
										<td>" . $rows['departure'] . "</td>
									</tr>";

							echo "<tr>
										<td>Departure Time :</td>
										<td>" . $rows['d_time'] . "</td>
									</tr>";
							echo "<tr>
										<td>Arrival :</td>
										<td>" . $rows['arrival'] . "</td>
									</tr>";

							echo "<tr>
										<td>Arrival Time :</td>
										<td>" . $rows['a_time'] . "</td>
									</tr>";

							echo "<tr>
										<td>Capacity :</td>
										<td>" . $srows['seats'] . "</td>
									</tr>";

							echo "<tr>
										<td>Ticket Price :</td>
										<td>" . $frows['price'] . "</td>
									</tr>";


							echo "</table>";
							echo "<div style='clear:both;'></div>";
						} else {
							$search_empty = "<div class='error-msg'>No Reserved Flight Tickets</div>";
						}
					} else {
						$searc_query_error = "<div class='error-msg' >query not executed : error</div>";
					}



					echo $search_empty;
					echo $searc_query_error;


					?>
				</div>
			</div>
		</div>

	</body>

	</html>

<?php
}

?>