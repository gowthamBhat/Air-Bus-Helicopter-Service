<?php
$con = mysqli_connect('localhost', 'root', '', 'project');
session_start();



if (!isset($_SESSION['username'])) {
	header("location:user-login.php");
} else {
	$search_empty = '';
	$searc_query_error = '';
	$u_name = $_SESSION['username'];


?>


	<!DOCTYPE html>
	<html>

	<head>
		<title>Canceled Tickets</title>
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

					<span class="go-back-span">
						<a class="go-back" href="user-home.php">Go Back</a>
					</span>

					<?php


					$search_query = "SELECT * FROM cancel WHERE uname='$u_name'";

					$res = mysqli_query($con, $search_query);

					if ($res) {
						if (mysqli_num_rows($res) > 0) {
							echo "<div class='success count-div'>Cancelled Tickets<span class='flight-count'>" . mysqli_num_rows($res) . "</span></div>";
							echo "<div style='clear:both;'></div>";
							echo "<table class='flights-view-table'>";
							echo "<thead>
										<tr>
											<th>S.No</th>
											<th>PNR</th>
											<th>Flight No</th>
											<th>Flight Name</th>
											
											<th>Departure</th>
											<th>Departure Time</th>
											<th>Arrival</th>
											<th>Arrival Time</th>
											<th>Status</th>
											<th>View</th>
											<th>Delete</th>

										</tr>
									</thead>";


							$i = 0;
							while ($row = mysqli_fetch_array($res)) {

								$i = $i + 1;
								echo "<tr>";
								echo "<td>" . $i . "</td>";
								echo "<td>" . $row['pnr'] . "</td>";
								echo "<td>" . $row['no'] . "</td>";
								echo "<td>" . $row['name'] . "</td>";

								echo "<td>" . $row['departure'] . "</td>";
								echo "<td>" . $row['d_time'] . "</td>";
								echo "<td>" . $row['arrival'] . "</td>";
								echo "<td>" . $row['a_time'] . "</td>";
								echo "<td>" . $row['status'] . "</td>";
								echo "<td>
								    <a class='view-option' href='viewCancelledTicket.php?pnr=" . $row['pnr'] . "'>View</a>
								    </td>";

								echo "<td>
								    <a class='cancel-option' href='deleteCancelledTicket.php?pnr=" . $row['pnr'] . "'>Delete</a>
								    </td>";

								echo "</tr>";
							}

							echo "</table>";
						} else {
							$search_empty = "<div class='error-msg'>No Cancelled flight tickes</div>";
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