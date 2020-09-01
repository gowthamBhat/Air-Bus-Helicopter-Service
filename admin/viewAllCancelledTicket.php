<?php
$con = mysqli_connect('localhost', 'root', '', 'project');
session_start();



if (!isset($_SESSION['admin_name'])) {
	header("location:admin-login.php");
} else {

	$a_name = $_SESSION['admin_name'];
	$search_empty = '';
	$search_query_error = '';

?>


	<!DOCTYPE html>
	<html>

	<head>
		<title>Helicopter Search By Place</title>
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
						<span class="aname_header"><?php echo $a_name; ?></span>
						<a class="admin-option btn-danger" href="admin-logout.php">Logout</a>
					</div>
					<div style="clear:both;"></div>
				</div>
			</div>
		</div>


		<div class="view-area-full">
			<div class="container">
				<div class="view-area">


					<table class='flights-view-table all-view'>
						<span class="go-back-span">
							<a class="go-back" href="admin-home.php">Go Back</a>
						</span>


						<?php


						$search_query = "SELECT * FROM cancel";

						$res = mysqli_query($con, $search_query);

						if ($res) {
							if (mysqli_num_rows($res) > 0) {
								echo "<div class='success count-div'>Available Flights - <span class='flight-count'>" . mysqli_num_rows($res) . "</span></div>";
								echo "
							<div style='clear:both;'></div>
							<thead>
					<tr>
						<th>PNR No</th>
						<th>Flight No</th>
						<th>Flight Name</th>
						
						<th>Flight From</th>
						<th>Depart Time</th>
						<th>Flight To</th>
						<th>Reach Time</th>
						<th>No.of Passengers</th>
						<th>Amount</th>
						<th>Status</th>

					</tr>
				</thead>";

								while ($row = mysqli_fetch_array($res)) {
									echo "<tr>";
									echo "<td>" . $row['pnr'] . "</td>";
									echo "<td>" . $row['no'] . "</td>";
									echo "<td>" . $row['name'] . "</td>";

									echo "<td>" . $row['departure'] . "</td>";
									echo "<td>" . $row['d_time'] . "</td>";
									echo "<td>" . $row['arrival'] . "</td>";
									echo "<td>" . $row['a_time'] . "</td>";
									echo "<td>" . $row['seats'] . "</td>";
									echo "<td>" . $row['price'] . "</td>";
									echo "<td>" . $row['status'] . "</td>";


									echo "</tr>";
								}
							} else {
								$search_empty = "<div class='error-msg'>Flights not available </div>";
							}
						} else {
							$searc_query_error = "<div class='error-msg' >query not executed : error</div>";
						}



						echo $search_empty;
						echo $search_query_error;

						?>
					</table>


				</div>
			</div>
		</div>





	</body>

	</html>

<?php

}


?>