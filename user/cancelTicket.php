<?php

$con=mysqli_connect('localhost','root','','project');
session_start();

if(!isset($_SESSION['username'])){
		header("location:user-login.php");
}else{
include('inc/functions.php');
$pnr=$_GET['pnr'];
$u_name=$_SESSION['username'];

$booking_fetch="SELECT * FROM booking WHERE pnr='$pnr'";
$fetch_result=mysqli_query($con,$booking_fetch);
$fetch_rows=mysqli_fetch_array($fetch_result);

$uname=$fetch_rows['uname'];
$customer=$fetch_rows['customer'];
$no=$fetch_rows['no'];
$name=$fetch_rows['name'];
$departure=$fetch_rows['departure'];
$d_time=$fetch_rows['d_time'];
$arrival=$fetch_rows['arrival'];
$a_time=$fetch_rows['a_time'];
$date=$fetch_rows['date'];
$adult=$fetch_rows['adult'];
$child=$fetch_rows['child'];
$seats=$fetch_rows['seats'];
$email=$fetch_rows['email'];
$dob=$fetch_rows['dob'];
$gender=$fetch_rows['gender'];
$total_price=$fetch_rows['price'];
$cancel_query_failed='';
$delete_query_failed='';
$cancel_no='';
$delete_no='';

$cancel_query="INSERT INTO `cancel`(`uname`,`pnr`, `customer`, `no`, `name`, `departure`, `d_time`, `arrival`, `a_time`, `date`, `adult`, `child`, `seats`, `email`, `dob`, `gender`, `price`,`status`) VALUES ('$uname',$pnr,'$customer',$no,'$name','$departure','$d_time','$arrival','$a_time','$date',$adult,$child,$seats,'$email','$dob','$gender',$total_price,'Cancel')";

$cancel_result=mysqli_query($con,$cancel_query);


/*

$delete_query="DELETE FROM `booking` WHERE `booking`.`id`='$id'";*/

if($cancel_result){

if(mysqli_affected_rows($con)>0){
		


		$delete_query="DELETE FROM `booking` WHERE `booking`.`pnr`='$pnr'";
		$delete_result=mysqli_query($con,$delete_query);
		if($delete_result){

				if(mysqli_affected_rows($con)>0){
						echo "delete table row";
						header("location:viewMyTicket.php?name=".$uname);
				}else{
					$delete_no="<div class='error-msg'>Cancel No Ticket</div>";
				}

			}else{
					$delete_query_failed="<div class='error-msg'>Cancel Query error Failed</div>";
			}



}else{
	$cancel_no="<div class='error-msg'>Cancel No Ticket</div>";
}

}else{
	$cancel_query_failed="<div class='error-msg'>Cancel Query error Failed</div>";
}	

?>

<!DOCTYPE html>
<html>
<head>
	<title>Ticket Cancel Page</title>
</head>
<body>

	<?php
		echo $cancel_query_failed;
		echo $delete_query_failed;
		echo $cancel_no;
		echo $delete_no;
	?>


</body>
</html>

<?php

}

?>
