<?php
session_start();
if(!isset($_SESSION['username'])){
		header("location: user-login.php");
}else{
session_destroy();
header("location:user-login.php");
}
?>