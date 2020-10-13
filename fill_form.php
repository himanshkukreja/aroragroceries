<?php
require("./partials/_db.php");
if (isset($_GET['serial_no']) and checking_session($conn)) {

    $serial_no = $_GET['serial_no'];
    $query = "SELECT * FROM `products` WHERE `serial_no` = '$serial_no'";
    $result = mysqli_query($conn, $query);

    $data = mysqli_fetch_assoc($result);

    // getting data
    $item = $data['item'];
    $brand = $data['brand'];
} else {
    header("location:http://localhost/aroragrceries/login.php");
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
    <title>Industry - Factory & Industrial HTML Template</title>

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--[if lt IE 9]>
	<script src="js/html5shiv.min.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->

    <!-- STYLESHEETS -->
    <link rel="stylesheet" type="text/css" href="css/plugins.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link class="skin" rel="stylesheet" type="text/css" href="css/skin/skin-7.css">
    <link rel="stylesheet" type="text/css" href="css/templete.css">
    <!-- Google Font -->
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Playfair+Display:400,400i,700,700i,900,900i|Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap');
    </style>

</head>

<body id="bg">
    <div class="page-wraper">
        <div id="loading-area" class="solar-loading"></div>
        <?php
        require("./partials/top/top_after_login.php");
        ?>
        <!-- Content -->
        <div class="page-content bg-white">
            <div class="section-full content-inner bg-white contact-style-1">
                <div class="container">
                    <div class="row">
                        <!-- Left part start -->
                        <div class="col-lg-6 m-b30">
                            <div class="p-a30 bg-gray clearfix radius-sm">
                                <h3>Fill To Place Order</h3>
                                <form action="http://localhost/aroragrceries/cart.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input name="item" type="text" class="form-control" value="<?php echo $item; ?>" placeholder="please enter your Item">
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        if ($brand != NULL) {
                                            echo '<div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input name="brand" type="text" class="form-control" required placeholder="please enter the brand" value="' . $brand . '">
                                                    </div>
                                                    <small id="emailHelp" class="form-text text-primary">You can also choose the brand of your choice. For local item please write loacal.</small>
                                                </div>
                                            </div>';
                                        }
                                        ?>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input name="quantity" type="text" required class="form-control" placeholder="plese enter the quantity">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button name="product_id" type="submit" value="<?php echo $serial_no; ?>" class="site-button "> <span>Place Order</span> </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Left part END -->
                        <!-- right part start -->
                        <div class="col-lg-6 m-b30 d-flex">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m21!1m12!1m3!1d579.5501888236879!2d75.89757711249935!3d30.89842857657971!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m6!3e6!4m0!4m3!3m2!1d30.898436!2d75.897863!5e0!3m2!1sen!2sin!4v1593777687336!5m2!1sen!2sin" class="align-self-stretch radius-sm" style="border:0; width:100%;  min-height:100%;" allowfullscreen></iframe>
                        </div>
                        <!-- right part END -->
                    </div>
                </div>
            </div>

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

    <script src='https://www.google.com/recaptcha/api.js'></script> <!-- Google API For Recaptcha  -->
</body>

</html>