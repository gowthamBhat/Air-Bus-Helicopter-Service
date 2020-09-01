<?php
$con = mysqli_connect('localhost', 'root', '', 'project');
session_start();



if (!isset($_SESSION['username'])) {
	header("location:user-login.php");
} else {


	$from = '';
	$to = '';
	$from_empty = '';
	$to_empty = '';
	$search_empty = '';
	$search_query_error = '';

	$ok = '';

	$u_name = $_SESSION['username'];

?>


	<!DOCTYPE html>
	<html>

	<head>
		<title>View all Helicopter</title>
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


					<table class='flights-view-table'>
						<span class="go-back-span">
							<a class="go-back" href="user-home.php">Go Back</a>
						</span>


						<?php


						$search_query = "SELECT * FROM flights_details";

						$res = mysqli_query($con, $search_query);

						if ($res) {
							if (mysqli_num_rows($res) > 0) {
								echo "<div class='success count-div'>Available Flights - <span class='flight-count'>" . mysqli_num_rows($res) . "</span></div>";
								echo "
							<div style='clear:both;'></div>
							<thead>
					<tr>
						<th>Flight No</th>
						<th>Flight Name</th>
						
						<th>Flight From</th>
						<th>Depart Time</th>
						<th>Flight To</th>
						<th>Reach Time</th>
						
						<th>Book Tickes</th>

					</tr>
				</thead>";

								while ($row = mysqli_fetch_array($res)) {
									echo "<tr>";
									echo "<td>" . $row['no'] . "</td>";
									echo "<td>" . $row['name'] . "</td>";

									echo "<td>" . $row['departure'] . "</td>";
									echo "<td>" . $row['d_time'] . "</td>";
									echo "<td>" . $row['arrival'] . "</td>";
									echo "<td>" . $row['a_time'] . "</td>";


									echo "<td>
								    <a class='book-option-btn' href='user-reservation.php?id=" . $row['id'] . "'>Reserve</a>
								    </td>";
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