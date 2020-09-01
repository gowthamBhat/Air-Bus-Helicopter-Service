<?php

$con=mysqli_connect('localhost','root','','project');
session_start();


if(!isset($_SESSION['username'])){
		header("location:user-login.php");
}else{
include('inc/functions.php');

$pnr=$_GET['pnr'];
$uname=$_SESSION['username'];




$delete_query_failed='';

$delete_no='';


/*

$delete_query="DELETE FROM `booking` WHERE `booking`.`id`='$id'";*/



		$delete_query="DELETE FROM `cancel` WHERE `cancel`.`pnr`='$pnr'";
		$delete_result=mysqli_query($con,$delete_query);
		if($delete_result){

				if(mysqli_affected_rows($con)>0){
						echo "delete table row";
						header("location:viewMyCancelledTicket.php?name=".$uname);
				}else{
					$delete_no="<div class='error-msg'>Delete No Ticket</div>";
				}

			}else{
					$delete_query_failed="<div class='error-msg'>Delete Query error Failed</div>";
			}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Ticket Cancel Page</title>
</head>
<body>

	<?php

		echo $delete_query_failed;

		echo $delete_no;
	?>
	

</body>

</html>

<?php
}

?>