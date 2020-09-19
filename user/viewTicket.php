<?php
$con = mysqli_connect('localhost', 'root', '', 'project');
session_start();

$search_empty = '';
$searc_query_error = '';


if (!isset($_SESSION['username'])) {
	header("location:user-login.php");
} else {


	$u_name = $_SESSION['username'];

	$pnr = $_GET['pnr'];


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

					<a class="brand-title" href="http://localhost/hal/user/user-home.php">AIRBUS HELICOPTER SERVICE</a>

					<div class="header-menu" id="myNavbar">
						<span class="uname_header"><?php echo $u_name; ?></span>
						<a class="user-option btn-danger" href="user-logout.php">Logout</a>
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
							<a class='go-back' href='user-home.php'>Go Home</a>
						</span>
						<span class='go-back-span viewTicket-go'>
							<a class='go-back' href='viewMyTicket.php'>View All Tickets</a>
						</span>

					</center>




					<?php


					$search_query = "SELECT * FROM booking WHERE pnr='$pnr'";

					$res = mysqli_query($con, $search_query);

					if ($res) {
						if (mysqli_num_rows($res) > 0) {

							$rows = mysqli_fetch_array($res);

							echo "<div style='clear:both;'></div>";

							echo "<table class='ticket-view-table'>";
							echo "<tr>
										<td colspan='2' class='c-name-title'>
											
													<h2 class='viewTicket'>" . $rows['customer'] . "</h2>
											
										</td>
									</tr>";
							echo "<tr>
										<td>PNR No :</td>
										<td>" . $rows['pnr'] . "</td>
									</tr>";

							echo "<tr>
										<td>Flight No :</td>
										<td>" . $rows['no'] . "</td>
									</tr>";

							echo "<tr>
										<td>Flight Name :</td>
										<td>" . $rows['name'] . "</td>
									</tr>";

							echo "<tr>
										<td>From :</td>
										<td>" . $rows['departure'] . "</td>
									</tr>";

							echo "<tr>
										<td>From Time :</td>
										<td>" . $rows['d_time'] . "</td>
									</tr>";
							echo "<tr>
										<td>To :</td>
										<td>" . $rows['arrival'] . "</td>
									</tr>";

							echo "<tr>
										<td>To Time :</td>
										<td>" . $rows['a_time'] . "</td>
									</tr>";

							echo "<tr>
										<td>Date :</td>
										<td>" . $rows['date'] . "</td>
									</tr>";
							echo "<tr>
										<td>Adult :</td>
										<td>" . $rows['adult'] . "</td>
									</tr>";

							echo "<tr>
										<td>Child :</td>
										<td>" . $rows['child'] . "</td>
									</tr>";

							echo "<tr>
										<td>Total Passengers</td>
										<td>" . $rows['seats'] . "</td>
									</tr>";
							echo "<tr>
										<td>Email ID :</td>
										<td>" . $rows['email'] . "</td>
									</tr>";

							echo "<tr>
										<td>Date of Birth :</td>
										<td>" . $rows['dob'] . "</td>
									</tr>";

							echo "<tr>
										<td>Gender :</td>
										<td>" . $rows['gender'] . "</td>
									</tr>";

							echo "<tr>
										<td>Ticket Amount :</td>
										<td>" . $rows['price'] . "</td>
									</tr>";
							echo "<tr>
										<td>Ticket Status :</td>
										<td>" . $rows['status'] . "</td>
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