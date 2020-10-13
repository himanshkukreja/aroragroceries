<?php
require("./partials/_db.php");

if (isset($_POST['suggestion'])) {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $type = $_POST['type'];
    $suggestion = $_POST['suggestion'];
    $is_a_user = $_POST['is_a_user'];

    if ($is_a_user) {
        //no need to verify the email
        $query = "INSERT INTO `suggestions` (`id`, `name`, `mobile`, `email`, `type`, `suggestion`, `date`, `flag`) VALUES (NULL, '$name', '$mobile', '$email', '$type', '$suggestion', current_timestamp(), '0')";
        $result = mysqli_query($conn, $query);
    } else {
        // required to verify the email
        $query = "INSERT INTO `suggestions` (`id`, `name`, `mobile`, `email`, `type`, `suggestion`, `date`, `flag`) VALUES (NULL, '$name', '$mobile', '$email', '$type', '$suggestion', current_timestamp(), '0')";
        $result = mysqli_query($conn, $query);
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
    <title>Welcome To AroraGroceries</title>

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
        if (isset($_SESSION['id'])) {
            if (checking_session($conn)) {
                require("./partials/top/top_after_login.php");
                $is_loggin = true;

                $email = $_SESSION['user_email'];
                $query = "SELECT * FROM `iloveindia` WHERE `email` = '$email'";
                $result = mysqli_query($conn, $query);

                $data = mysqli_fetch_assoc($result);
            } else {
                require("./partials/top/top_without_login.php");
            }
        } else {
            require("./partials/top/top_without_login.php");
        }
        ?>
        <!-- Content -->
        <div class="page-content bg-white">
            <!-- Contact Form -->
            <div class="section-full content-inner contact-page-9 overlay-black-dark" style="background-image: url(images/background/bg5.jpg); background-position: 30% 100%">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 text-white">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 m-b30">
                                    <div class="icon-bx-wraper bx-style-1 p-a20 radius-sm">
                                        <div class="icon-content">
                                            <h5 class="dlab-tilte">
                                                <span class="icon-sm text-primary"><i class="ti-location-pin"></i></span>
                                                Company Address
                                            </h5>
                                            <p>007 Dummy Ashoka Apartment, Gautam Marg, Rani Sati Nagar,Jaipur / India </p>
                                            <h6 class="m-b15 text-black font-weight-400"><i class="ti-alarm-clock"></i> Office Hours</h6>
                                            <p class="m-b0">Mon To Sat - 10.00 - 07.00</p>
                                            <p>Sunday - Close</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 m-b30">
                                    <div class="icon-bx-wraper bx-style-1 p-a20 radius-sm">
                                        <div class="icon-content">
                                            <h5 class="dlab-tilte">
                                                <span class="icon-sm text-primary"><i class="ti-email"></i></span>
                                                E-mail
                                            </h5>
                                            <p class="m-b0">info@example.com</p>
                                            <p class="m-b0">hr@example.com</p>
                                            <p class="m-b0">support@example.com</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 m-b30">
                                    <div class="icon-bx-wraper bx-style-1 p-a20 radius-sm">
                                        <div class="icon-content">
                                            <h5 class="dlab-tilte">
                                                <span class="icon-sm text-primary"><i class="ti-mobile"></i></span>
                                                Phone Numbers
                                            </h5>
                                            <p class="m-b0">+91-80033-93704</p>
                                            <p class="m-b0">+91-80033-96875</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8 col-md-12 m-b30">
                            <div class="section-full content-inner bg-gray">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-8 col-md-12">
                                            <div class="section-head text-black">
                                                <h4 class="text-gray-dark font-weight-300 m-b10">Expertise</h4>
                                                <h2 class="title">Completely customizable high-quality robust websites</h2>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                            </div>
                                            
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="sticky-top m-b30">
                                                <form class="inquiry-form inner">
                                                    <h3 class="title m-t0 m-b10">Let's Convert Your Idea into Reality</h3>
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the</p>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="ti-user text-primary"></i></span>
                                                                    <input name="dzName" type="text" required class="form-control" placeholder="First Name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="ti-mobile text-primary"></i></span>
                                                                    <input name="dzOther[Phone]" type="text" required class="form-control" placeholder="Phone">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="ti-email text-primary"></i></span>
                                                                    <input name="dzEmail" type="email" class="form-control" required placeholder="Your Email Id">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="ti-check-box text-primary"></i></span>
                                                                    <input name="dzOther[Subject]" type="text" required class="form-control" placeholder="Upload File">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="ti-file text-primary"></i></span>
                                                                    <input name="dzOther[Subject]" type="text" required class="form-control" placeholder="Upload File">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="ti-agenda text-primary"></i></span>
                                                                    <textarea name="dzMessage" rows="4" class="form-control" required placeholder="Tell us about your project or idea"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <button name="submit" type="submit" value="Submit" class="site-button button-lg"> <span>Get A Free Quote!</span> </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Our Services -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact Form END -->
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
    <script>
        jQuery(document).ready(function() {
            'use strict';
            dz_rev_slider_11();
            $('.lazy').Lazy();
        }); /*ready*/
    </script>
</body>

</html>