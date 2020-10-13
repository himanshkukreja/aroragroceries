<?php
require("./partials/_db.php");

$page = 1;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

if (isset($_POST['class'])) {
    $class = $_POST['class'];
}
if (isset($_GET['class'])) {
    $class = $_GET['class'];
}

if ($class == 'grocery') {
    $title = array("Sugar", "Spices", "Dry Fruits", "Sauces And Spreads", "Oils And Ghee", "Dairy Products", "Pulses", "Rice", "Beverages", "Namkeen And Snacks", "Biscuits And Bakery", "Chocolates", "Flour", "Frozen Items", "Soaps And Detergents", "Cleaning Items", "Handwash And Sanitizers", "Baby Basics", "Toothbrush And Toothpaste");

    $links = array("sugar", "spices", "dry_fruits", "sauces", "oils", "dairy", "pulses", "rice", "beverages", "snacks", "biscuits", "choclates", "flour", "frozen_items", "soaps_detergents", "cleaning_items", "handwash_sanitizer", "baby_basics", "toothbrush_paste");
}

if ($class == 'cosmetics') {
    $title = array("Facecream And Facewash", "Body Deo", "Hair Items", "Talcum Powder");
    $links = array("facecream_facewash", "body_deo", "hair_items", "talcum_powder");
}
if (!isset($class)) {
    header("location:http://localhost/aroragrceries/");
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
            } else {
                require("./partials/top/top_without_login.php");
            }
        } else {
            require("./partials/top/top_without_login.php");
        }
        ?>
        <!-- Content -->
        <div class="page-content bg-white">
            <div class="section-full content-inner">

                <?php

                $no_of_total_searches = sizeof($title);
                $total_page = ceil($no_of_total_searches / 6);
                $position = ($page - 1) * 6;
                ?>

                <!-- navigation button -->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-md-12">
                            <h6>Page <?php if ($total_page == 0) {
                                            echo '0';
                                        } else {
                                            echo $page;
                                        } ?> Shown Of <?php echo $total_page; ?></h6>
                            <!-- Alert box -->
                        </div>
                        <div class="col-lg-2 col-md-12">
                            <!-- Alert box -->
                            <div class="section-content box-sort-in m-b15">
                                <div class="pagination-bx primary rounded clearfix">
                                    <ul class="pagination">
                                        <li class="previous"><a href="http://localhost/aroragrceries/product_with_class.php?class=<?php echo $class; ?>&page=<?php
                                                                                                                                                            if ($page == 0) {
                                                                                                                                                                echo $page;
                                                                                                                                                            } elseif ($page == 1) {
                                                                                                                                                                echo $total_page;
                                                                                                                                                            } else {
                                                                                                                                                                echo $page - 1;
                                                                                                                                                            }
                                                                                                                                                            ?>"><i class="ti-arrow-left"></i> Prev</a></li>
                                        <li class="next pull-right"><a href="http://localhost/aroragrceries/product_with_class.php?class=<?php echo $class; ?>&page=<?php
                                                                                                                                                                    if ($page == 0) {
                                                                                                                                                                        echo $page;
                                                                                                                                                                    } else if ($page == $total_page) {
                                                                                                                                                                        echo 1;
                                                                                                                                                                    } else {
                                                                                                                                                                        echo $page + 1;
                                                                                                                                                                    } ?>">Next <i class="ti-arrow-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- navigation button END-->


                <!-- inner page banner END -->
                <div class="bg-white">
                    <div class="section-full bg-white content-inner">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="section-content box-sort-in button-example p-b0">
                                        <div class="row">

                                            <?php
                                            $image_on_page = 0;
                                            $actual_position = $position;
                                            while ($no_of_total_searches - $actual_position > 0 and $image_on_page < 6) {
                                                echo '<div class="post card-container col-lg-4 col-md-6 col-sm-6">
                                                <div class="blog-post blog-grid blog-rounded blog-effect1">
                                                    <div class="dlab-post-media dlab-img-effect">
                                                        <a href="blog-single.html"><img src="images/product/class/'.$links[$actual_position].'.jfif" alt="" style="height: 15rem; width: 20rem;"></a>
                                                    </div>
                                                    <div class="dlab-info p-a20 border-1">

                                                        <div class="dlab-post-title">
                                                            <h4 class="post-title"><a href="blog-single.html">'.$title[$actual_position].'</a></h4>
                                                        </div>
                                                        <div class="dlab-post-text">
                                                        </div>
                                                        <div class="dlab-post-readmore">
                                                            <a href="http://localhost/aroragrceries/showing_products_of_a_class.php?class='.$links[$actual_position].'" title="READ MORE" rel="bookmark" class="site-button">READ MORE
                                                                <i class="ti-arrow-right"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>';
                                            $image_on_page++;
                                            $actual_position++;
                                            }
                                            ?>                                                                                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Images box with content demo 1 END -->
                    </div>
                </div>
            </div>
            <!-- Content END-->
        </div>
        <!-- Content END -->
        <?php
        require("./partials/bottom/bottom_upper.php");
        require("./partials/bottom/bottom_lower.php");
        ?>
    </div>
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