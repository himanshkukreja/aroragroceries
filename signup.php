<?php
require("./partials/_db.php");

if (isset($_SESSION['id'])) {
	header("location:http://localhost/aroragrceries/");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$first_name = $_POST['first_name'];
	$last_name =  $_POST['last_name'];
	$email =  $_POST['email'];
	$password =  $_POST['password'];
	$cpassword =  $_POST['cpassword'];
	$mobile =  $_POST['mobile'];
	$address =  $_POST['address'];

	//variable to show error
	$same_email_exists = False;
	$same_password = False;

	$query = "SELECT * FROM `iloveindia` WHERE `email`= '$email'";
	$result = mysqli_query($conn, $query);

	if (mysqli_num_rows($result)) {
		$same_email_exists = True;
	}
	if ($cpassword != $password) {
		$same_password = True;
	}

	//captcha validation
	// $secret_key = "6Ld3T6wZAAAAAAhln_kB3-z_fq-SAB6WoWK_YiKt";
	// $token  = $_POST['g-token'];
	// $ip = $_SERVER['REMOTE_ADDR'];

	//writing url
	// $url = "https://www.google.com/recaptcha/api/siteverify?secret=".$secret_key."&response=".$token."&remoteip=".$ip;
	// $request = file_get_contents($url);
	// $response = json_decode($request);


	//add a condition -> and $response->success
	if (!$same_email_exists and !$same_password) {
		$password = encrypt($password);
		$query = "INSERT INTO `iloveindia` (`id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address`, `session_id`) VALUES (NULL, '$first_name', '$last_name', '$email', '$password', '$mobile', '$address', NULL)";
		$result = mysqli_query($conn, $query);

		$name = $first_name." ".$last_name;
		$query = "CREATE TABLE `$email` ( `serial_no` INT NOT NULL AUTO_INCREMENT ,  `name` TEXT NOT NULL DEFAULT '$name' , `product_id` INT NOT NULL ,  `quantity` TEXT NOT NULL , `img` TEXT NOT NULL , `brand` TEXT NOT NULL ,`item` TEXT NOT NULL ,  `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,  `flag` INT NOT NULL ,    PRIMARY KEY  (`serial_no`)) ENGINE = InnoDB";
		$result = mysqli_query($conn, $query);

		header("location:http://localhost/aroragrceries/login.php");
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="description" content="Industry - Factory & Industrial HTML Template" />
	<meta property="og:title" content="Industry - Factory & Industrial HTML Template" />
	<meta property="og:description" content="Industry - Factory & Industrial HTML Template" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">

	<!-- FAVICONS ICON -->
	<link rel="icon" href="images/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />

	<!-- PAGE TITLE HERE -->
	<title>SignUp To AroraGroceries</title>

	<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--[if lt IE 9]>
	<script src="js/html5shiv.min.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	<!-- STYLESHEETS -->
	<link rel="stylesheet" type="text/css" href="css/plugins.css">
	<link rel="stylesheet" type="text/css" href="css/style.min.css">
	<link class="skin" rel="stylesheet" type="text/css" href="css/skin/skin-7.min.css">
	<link rel="stylesheet" type="text/css" href="css/templete.min.css">
	<!-- Google Font -->
	<style>
		@import url('https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Playfair+Display:400,400i,700,700i,900,900i|Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap');
	</style>

	<!-- REVOLUTION SLIDER CSS -->
	<link rel="stylesheet" type="text/css" href="plugins/revolution/revolution/css/revolution.min.css">

</head>

<body id="bg">
	<div class="page-wraper">
		<div id="loading-area" class="solar-loading"></div>
		<?php
		require("./partials/top/top_for_signup.php");
		?>
		<!-- Content -->
		<!-- contact area -->
		<div class="section-full content-inner shop-account">
			<!-- Product -->
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<h2 class="font-weight-700 m-t0 m-b40">CREATE AN ACCOUNT</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 m-b30">
						<div class="p-a30 border-1  max-w500 m-auto">
							<div class="tab-content">
								<form id="login" class="tab-pane active" action="http://localhost/aroragrceries/signup.php" method="POST">
									<h4 class="font-weight-700">PERSONAL INFORMATION</h4>
									<p class="font-weight-600">If you have an account with us, please <a href="http://localhost/aroragrceries/login.php" style="color: #007bff;">log in.</a></p>
									<div class="form-group">
										<label class="font-weight-700">First Name *</label>
										<input required="" class="form-control" placeholder="First Name" type="text" name="first_name" <?php if (isset($first_name)) {
																																			echo 'value=' . $first_name;
																																		} ?>>


									</div>
									<div class="form-group">
										<label class="font-weight-700">Last Name *</label>
										<input required="" class="form-control" placeholder="Last Name" type="text" name="last_name" <?php if (isset($last_name)) {
																																			echo 'value=' . $last_name;
																																		} ?>>
									</div>
									<div class="form-group">
										<label class="font-weight-700">E-MAIL *</label>
										<input required="" class="form-control" placeholder="Your Email Id" type="email" name="email" <?php if (isset($email)) {
																																			echo 'value=' . $email;
																																		} ?> <?php if (isset($same_email_exists)) {
																																					if ($same_email_exists) {
																																						echo 'style="border: 2px red solid;"';
																																					}
																																				} ?>>
										<?php if (isset($same_email_exists)) {
											if ($same_email_exists) {
												echo '<small id="emailHelp" class="form-text text-danger">Same email exists.</small>';
											}
										} ?>
									</div>
									<div class="form-group">
										<label class="font-weight-700">PASSWORD *</label>
										<input required="" class="form-control " minlength="8" placeholder="Type Password" type="password" name="password" <?php if (isset($same_password)) {
																																								if ($same_password) {

																																									echo 'style="border: 2px red solid;"';
																																								}
																																							} ?>>
										<?php if (isset($same_password)) {
											if ($same_password) {
												echo '<small id="emailHelp" class="form-text text-danger">Please enter same passwords.</small>';
											}
										} ?>
									</div>
									<div class="form-group">
										<label class="font-weight-700">CONFIRM PASSWORD *</label>
										<input required="" class="form-control " minlength="8" placeholder="Type Password" type="password" name="cpassword" <?php if (isset($same_password)) {
																																								if ($same_password) {

																																									echo 'style="border: 2px red solid;"';
																																								}
																																							} ?>>
										<?php if (isset($same_password)) {
											if ($same_password) {
												echo '<small id="emailHelp" class="form-text text-danger">Please enter same passwords.</small>';
											}
										} ?>
									</div>
									<div class="form-group">
										<label class="font-weight-700">PHONE NO *</label>
										<input required="" class="form-control " placeholder="Type Phone No" type="tel" name="mobile" minlength="10" <?php if (isset($mobile)) {
																																							echo 'value=' . $mobile;
																																						} ?>>
									</div>
									<div class="form-group">
										<label class="font-weight-700">ADDRESS *</label>
										<input required="" class="form-control " placeholder="Type Address" type="text" name="address" <?php if (isset($address)) {
																																			echo 'value=' . $address;
																																		} ?>>
									</div>
									<!-- <div class="form-group">
											<div class="input-group">
												<div class="g-recaptcha" data-sitekey="6Ld3T6wZAAAAAOgMZDwG_jvPR_eL8lrJKwwF4OS9" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
												<input class="form-control d-none" style="display:none;" data-recaptcha="true" required data-error="Please complete the Captcha" name="g-token">
											</div>
										</div> -->
									<div class="text-left m-t15">
										<button class="site-button button-lg radius-no outline outline-2">CREATE</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Product END -->
		</div>
		<!-- Content END -->
		<?php
		require("./partials/bottom/bottom_lower.php");
		?>
	</div>
	<!-- JAVASCRIPT FILES ========================================= -->
	<script src="js/jquery.min.js"></script><!-- JQUERY.MIN JS -->
	<script src="plugins/wow/wow.js"></script><!-- WOW JS -->
	<script src="plugins/bootstrap/js/popper.min.js"></script><!-- BOOTSTRAP.MIN JS -->
	<script src="plugins/bootstrap/js/bootstrap.min.js"></script><!-- BOOTSTRAP.MIN JS -->
	<script src="plugins/bootstrap-select/bootstrap-select.min.js"></script><!-- FORM JS -->
	<script src="plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script><!-- FORM JS -->
	<script src="plugins/magnific-popup/magnific-popup.js"></script><!-- MAGNIFIC POPUP JS -->
	<script src="plugins/counter/waypoints-min.js"></script><!-- WAYPOINTS JS -->
	<script src="plugins/counter/counterup.min.js"></script><!-- COUNTERUP JS -->
	<script src="plugins/imagesloaded/imagesloaded.js"></script><!-- IMAGESLOADED -->
	<script src="plugins/masonry/masonry-3.1.4.js"></script><!-- MASONRY -->
	<script src="plugins/masonry/masonry.filter.js"></script><!-- MASONRY -->
	<script src="plugins/owl-carousel/owl.carousel.js"></script><!-- OWL SLIDER -->
	<script src="plugins/lightgallery/js/lightgallery-all.min.js"></script><!-- Lightgallery -->
	<script src="js/custom.js"></script><!-- CUSTOM FUCTIONS  -->
	<script src="js/dz.carousel.min.js"></script><!-- SORTCODE FUCTIONS  -->
	<script src="plugins/countdown/jquery.countdown.js"></script><!-- COUNTDOWN FUCTIONS  -->
	<script src="js/dz.ajax.js"></script><!-- CONTACT JS  -->
	<script src="plugins/rangeslider/rangeslider.js"></script><!-- Rangeslider -->

	<script src="js/jquery.lazy.min.js"></script>
	<!-- REVOLUTION JS FILES -->
	<script src="plugins/revolution/revolution/js/jquery.themepunch.tools.min.js"></script>
	<script src="plugins/revolution/revolution/js/jquery.themepunch.revolution.min.js"></script>
	<!-- Slider revolution 5.0 Extensions  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
	<script src="plugins/revolution/revolution/js/extensions/revolution.extension.actions.min.js"></script>
	<script src="plugins/revolution/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
	<script src="plugins/revolution/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
	<script src="plugins/revolution/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
	<script src="plugins/revolution/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
	<script src="plugins/revolution/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
	<script src="plugins/revolution/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
	<script src="plugins/revolution/revolution/js/extensions/revolution.extension.video.min.js"></script>
	<script src="js/rev.slider.js"></script>

	<script src='https://www.google.com/recaptcha/api.js'></script> <!-- Google API For Recaptcha  -->

	<script>
		jQuery(document).ready(function() {
			'use strict';
			dz_rev_slider_11();
			$('.lazy').Lazy();
		}); /*ready*/
	</script>
</body>

</html>