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
	$searc_query_error = '';

	$ok = '';

	$u_name = $_SESSION['username'];

	if (isset($_POST['submit'])) {
		$from = $_POST['from'];
		$to = $_POST['to'];
		if (empty($from)) {
			$from_empty = "<div class='error search-error'>From Field is empty";
		} else if (empty($to)) {
			$to_empty = "<div class='error search-error'>To Field is empty";
		} else {
			$ok = 'true';
		}
	}
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
						<span class="uname_header"><?php echo $u_name; ?></span>
						<a class="user-option btn-danger" href="user-logout.php">Logout</a>
					</div>
					<div style="clear:both;"></div>
				</div>
			</div>
		</div>

		<div class="search-area-full">
			<div class="container">
				<div class="search-area">
					<h2>Helicopter Search By Place</h2>

					<form action="" method="POST" name="flight-search-by-place-form" class="flight-search-by-place-form">
						<input type="text" name="from" class="psearch-input" placeholder="From" value="<?php echo $from; ?>" />
						<input type="text" name="to" class="psearch-input" placeholder="To" value="<?php echo $to; ?>" />
						<input type="submit" name="submit" class="psearch-input" />
					</form>
					<?php
					echo $from_empty;
					echo $to_empty;
					?>
				</div>
			</div>
		</div>

		<div class="view-area-full">
			<div class="container">
				<div class="view-area">


					<span class='go-back-span'>
						<a class='go-back' href='user-home.php'>Go Back</a>
					</span>

					<?php

					if (!empty($ok)) {
						$search_query = "SELECT * FROM flights_details WHERE departure='$from' AND arrival='$to'";

						$res = mysqli_query($con, $search_query);

						if ($res) {
							if (mysqli_num_rows($res) > 0) {

								echo "<div class='success count-div'>Available Flights - <span class='flight-count'>" . mysqli_num_rows($res) . "</span></div>";
								echo "<div style='clear:both;'></div>";
								echo "<table class='flights-view-table'>";



								echo "<thead>
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
								echo "</table>";
							} else {
								$search_empty = "<div class='error-msg'>Flights not available </div>";
							}
						} else {
							$searc_query_error = "<div class='error-msg' >query not executed : error</div>";
						}
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