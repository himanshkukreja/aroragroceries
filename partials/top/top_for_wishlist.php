<?php
$email = $_SESSION['user_email'];
$query = "SELECT `flag` FROM `$email` WHERE `flag` = 1";
$result = mysqli_query($conn, $query);

$no_of_products_in_cart = mysqli_num_rows($result);
?>

<!-- header -->
<header class="site-header mo-left header">
	<!-- main header -->
	<div class="sticky-header main-bar-wraper header-curve navbar-expand-lg">
		<div class="main-bar clearfix bg-primary">
			<div class="container clearfix">
				<!-- website logo -->
				<div class="logo-header mostion">
					<a href="http://localhost/aroragrceries/"><img src="images/logo.png" alt=""></a>
				</div>
				<!-- nav toggle button -->
				<button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span></span>
					<span></span>
					<span></span>
				</button>
				<!-- extra nav -->
				<div class="extra-nav">
					<div class="extra-cell">
						<button id="quik-search-btn" type="button" class="site-button-link"><i class="la la-search"></i></button>
						<div class="shop-cart navbar-right">
							<a href="http://localhost/aroragrceries/cart.php" type="button" class="site-button-link cart-btn">
								<i class="la la-cart-plus"></i><span class="badge bg-primary"><?php echo $no_of_products_in_cart;?></span>
							</a>
						</div>
					</div>
				</div>
				<!-- Quik search -->
				<div class="dlab-quik-search ">
					<form action="http://localhost/aroragrceries/searching_product.php" method="GET">
						<input value="" type="text" class="form-control" placeholder="Type to search" name="search">
						<span id="quik-search-remove"><i class="ti-close"></i></span>
					</form>
				</div>
				<!-- main nav -->
				<div class="header-nav navbar-collapse collapse justify-content-end" id="navbarNavDropdown">
					<div class="logo-header d-md-block d-lg-none">
						<a href="index.html"><img src="images/logo.png" alt=""></a>
					</div>
					<ul class="nav navbar-nav">
						<li class="has-mega-menu"><a href="http://localhost/aroragrceries/">Home</a></li>
						<li><a href="http://localhost/aroragrceries/contact.php">Suggestions</a></li>
						<li><a onclick="logout_fun()">Logout</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- main header END -->
</header>
<!-- header END -->

<script>
	function logout_fun() {
		let choice = confirm("do you really want to logout");
		if (choice) {
			location.replace("http://localhost/aroragrceries/logout.php");
		}
	}
</script>