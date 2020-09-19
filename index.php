<!DOCTYPE html>
<html>

<head>
	<title>Home Page</title>
	<meta charset="utf-8" />
	<link rel="shortcut icon" type="image/x-icon" href="fav-icon.png" />
	<link rel="stylesheet" type="text/css" href="user/css/ars.css" />
	<script src="js/jquery-3.5.1.min.js"></script>
	<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" 
	integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->
</head>

<body>

	<div class="header-area-full">
		<div class="container">
			<div class="header-area">

				<a class="brand-title" href="index.php">AIRBUS HELICOPTER SERVICE</a>

				<div class="header-menu" id="myNavbar">

					<a class="user-option" href="user/user-login.php">User Login</a>
					<a class="user-option" href="admin/admin-login.php">Admin Login</a>
				</div>
				<div style="clear:both;"></div>
			</div>
		</div>
	</div>

	<div class="slider-area-full">
		<div class="container">
			<div class="slider-area">
				<ul id="slides">
					<li class="slide showing"></li>
					<li class="slide"></li>
					<li class="slide"></li>
					<li class="slide"></li>
					<li class="slide"></li>
				</ul>
				<script type="text/javascript">
					var slides = document.querySelectorAll('#slides .slide');
					var currentSlide = 0;
					var slideInterval = setInterval(nextSlide, 3500);

					function nextSlide() {
						slides[currentSlide].className = 'slide';
						currentSlide = (currentSlide + 1) % slides.length;
						slides[currentSlide].className = 'slide showing';
					}
				</script>
			</div>
		</div>
	</div>

	<div class="index-area-full">
		<div class="container">
			<div class="index-area">


				<h2 class="formarea-title">Welcome To AIRBUS HELICOPTER SERVICE</h2>
				<div class="home-options">
					<div class="option-area" id="user-path">
						<a class='home-link' href="user/user-login.php">User Login</a>
					</div>
					<div class="option-area"  id="admin-path">
						<a class='home-link' href="admin/admin-login.php">Admin Login</a>
					</div>
					<!--	<div class="option-area">
					<a class='home-link' href="2093_flight\index.html">Contact Us</a>
				</div>  -->

				</div>

			</div>
		</div>
	</div>

	<div class="footer-area-full">
		<div class="container">
			<div class="footer-area">


				<p>AIRBUS HELICOPTER SERVICE</p>

			</div>
		</div>
	</div>
	<script>
	$(document).ready(function(){
		$('#user-path').on('click',function(){
						location.assign("user/user-login.php");
         });
		 $('#admin-path').on('click',function(){
						location.assign("admin/admin-login.php");
         });
});

	</script>

</body>

</html>