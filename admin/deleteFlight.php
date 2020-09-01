<?php
$con=mysqli_connect('localhost','root','','project');
session_start();

/*


if(!isset($_SESSION['admin_name'])){
		header("location:admin-login.php");
}else{

	*/

include('inc/functions.php');

$no='';

$flight_no='';
$flight_query_failed='';
$class_no='';
$class_query_failed='';
$delete_no='';
$delete_query_failed='';

$id=$_GET['id'];


$fselect="SELECT * FROM flights_details WHERE id='$id'";

$fselect_res=mysqli_query($con,$fselect);
$f_rows=mysqli_fetch_array($fselect_res);

$no=$f_rows['no'];
echo $no;


$seats_delete_query="DELETE FROM `flight_seats` WHERE `flight_seats`.`no`='$no'";
$seats_delete_result=mysqli_query($con,$seats_delete_query);
if($seats_delete_result){

		if(mysqli_affected_rows($con)>0){
				echo "seats table row delete";
				$class_delete_query="DELETE FROM `flight_class` WHERE `flight_class`.`no`='$no'";
				$class_delete_result=mysqli_query($con,$class_delete_query);
				if($class_delete_result){

						if(mysqli_affected_rows($con)>0){
								echo "Class table row Deleted";
								$flight_delete_query="DELETE FROM `flights_details` WHERE `flights_details`.`no`='$no'";
								$flight_delete_result=mysqli_query($con,$flight_delete_query);
								if($flight_delete_result){

										if(mysqli_affected_rows($con)>0){
												header("location:viewAllFlights.php");
												
										}else{
											$flight_no="<div class='error-msg'>Delete No Flight</div>";
										}

									}else{
											$flight_query_failed="<div class='error-msg'>Flight Query error Failed</div>";
									}

						}else{
							$class_no="<div class='error-msg'>Delete No class</div>";
						}

					}else{
							$class_query_failed="<div class='error-msg'>Class Query error Failed</div>";
					}

		}else{
			$seats_no="<div class='error-msg'>Delete No seats</div>";
		}

	}else{
			$seats_query_failed="<div class='error-msg'>Seats Query error Failed</div>";
	}


echo $flight_no;
echo $flight_query_failed;
echo $class_no;
echo $class_query_failed;
echo $delete_no;
echo $delete_query_failed;






/*

}

*/
?>