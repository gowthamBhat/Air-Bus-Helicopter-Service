<?php
session_start();

if(!isset($_SESSION['admin_name'])){
		header("location:admin-login.php");
}else{

session_destroy();
header("location:admin-login.php");
}
?>