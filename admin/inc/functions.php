<?php




function username_exists($username,$con){
	$res=mysqli_query($con,"SELECT * FROM users WHERE uname='$username'");
	if($res){
		if(mysqli_num_rows($res)>0){
			return true;
		}else{
			return false;
		}
	}
}


function email_exists($email,$con){
	$res=mysqli_query($con,"SELECT * FROM users WHERE email='$email'");
	if($res){
		if(mysqli_num_rows($res)>0){
			return true;
		}else{
			return false;
		}
	}
}

function mobile_exists($mobile,$con){
	$res=mysqli_query($con,"SELECT * FROM users WHERE mobile='$mobile'");
	if($res){
		if(mysqli_num_rows($res)>0){
			return true;
		}else{
			return false;
		}
	}
}


function admin_exists($username,$con){
	$res=mysqli_query($con,"SELECT * FROM admin WHERE aname='$username'");
	if($res){
		if(mysqli_num_rows($res)>0){
			return true;
		}else{
			return false;
		}
	}
}


function admin_email_exists($email,$con){
	$res=mysqli_query($con,"SELECT * FROM admin WHERE email='$email'");
	if($res){
		if(mysqli_num_rows($res)>0){
			return true;
		}else{
			return false;
		}
	}
}

function admin_mobile_exists($mobile,$con){
	$res=mysqli_query($con,"SELECT * FROM admin WHERE mobile='$mobile'");
	if($res){
		if(mysqli_num_rows($res)>0){
			return true;
		}else{
			return false;
		}
	}
}




function no_exists($no,$con){
	$no_query="SELECT * FROM flight_details WHERE  no='$no'";
	$no_res=mysqli_query($con,$no_query);
	if($no_res){
		if(mysqli_num_rows($no_res)>0){
			return true;
		}else{
			return false;
		}
	}
	
}

function name_exists($name,$con){
	$name_query="SELECT * FROM flight_details WHERE  name='$name'";
	$name_res=mysqli_query($con,$name_query);
	if($name_res){
		if(mysqli_num_rows($name_res)>0){
			return true;
		}else{
			return false;
		}
	}
	
}

function rand_no_exists($rand_no,$con){
	$rand_query="SELECT * FROM booking WHERE pnr='$rand_no'";
	$rand_res=mysqli_query($con,$rand_query);
	if($rand_res){
		if(mysqli_num_rows($rand_res)>0){
			return true;
		}else{
			return false;
		}
	}
	
}
?>