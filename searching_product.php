<?php
require("./partials/_db.php");

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
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

        $result = False;
        $total_page = 0;

        if ($_SERVER['REQUEST_METHOD'] == 'GET' and isset($_GET['search'])) {
            $search = $_GET['search'];
            $query = "SELECT * FROM `products` WHERE `products`.`item` LIKE '%" . $search . "%' OR `products`.`item_family` LIKE '%" . $search . "%' OR `products`.`type` LIKE '%" . $search . "%' OR `products`.`class` LIKE '%" . $search . "%' OR `products`.`brand` LIKE '%" . $search . "%' OR `products`.`description` LIKE '%" . $search . "%' ORDER BY `no_of_orders` DESC";

            if ($result = mysqli_query($conn, $query)) {
                $no_of_total_searches = mysqli_num_rows($result);
                $total_page = ceil($no_of_total_searches / 8);
                $start = ($page - 1) * 8;
                $query = "SELECT * FROM `products` WHERE `products`.`item` LIKE '%" . $search . "%' OR `products`.`item_family` LIKE '%" . $search . "%' OR `products`.`type` LIKE '%" . $search . "%' OR `products`.`class` LIKE '%" . $search . "%' OR `products`.`brand` LIKE '%" . $search . "%' OR `products`.`description` LIKE '%" . $search . "%' ORDER BY `no_of_orders` DESC LIMIT $start, 8";
                $result = mysqli_query($conn, $query);
            }
        }
        ?>
        <!-- Content -->
        <div class="page-content bg-white">
            <div class="section-full content-inner">

                <!-- navigation button -->
                <div class="container">
                    <div class="sort-title clearfix text-center">
                        <h2 class="title text-capitalize"> <?php if ($result) {
                                                                echo 'Results Found ' . $no_of_total_searches;
                                                            } else {
                                                                echo 'avoid use of special symbols';
                                                            } ?><br /><span class="text-primary"> </span></h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-10 col-md-12">
                            <h6>Page <?php if ($total_page == 0) {
                                echo '0';
                            }else {
                                echo $page;
                            } ?> Shown Of <?php echo $total_page; ?></h6>
                            <!-- Alert box -->
                        </div>
                        <div class="col-lg-2 col-md-12">
                            <!-- Alert box -->
                            <div class="section-content box-sort-in m-b15">
                                <div class="pagination-bx primary rounded clearfix">
                                    <ul class="pagination">
                                        <li class="previous"><a href="http://localhost/aroragrceries/searching_product.php?search=<?php echo $search; ?>&page=<?php
                                                                                                                                                                if ($page == 0) {
                                                                                                                                                                    echo $page;
                                                                                                                                                                } elseif ($page == 1) {
                                                                                                                                                                    echo $total_page;
                                                                                                                                                                } else {
                                                                                                                                                                    echo $page - 1;
                                                                                                                                                                }
                                                                                                                                                                ?>"><i class="ti-arrow-left"></i> Prev</a></li>
                                        <li class="next pull-right"><a href="http://localhost/aroragrceries/searching_product.php?search=<?php echo $search; ?>&page=<?php
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

                <!-- Product -->
                <div class="container">
                    <div class="row">
                        <?php
                        if ($result) {

                            while ($data = mysqli_fetch_assoc($result)) {
                                echo '<div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="item-box m-b10">
                            <div class="item-img">
                                <img src="images/product/' . $data['img'] . '" alt="" style="height: 15rem; width: 20rem;"/>
                                <div class="item-info-in">
                                    <ul>
                                        <li><a href="http://localhost/aroragrceries/fill_form.php?serial_no=' . $data['serial_no'] . '"><i class="ti-shopping-cart"></i></a></li>
                                        <li><a href="http://localhost/aroragrceries/product_details.php?serial_no=' . $data['serial_no'] . '"><i class="ti-eye"></i></a></li>
                                        <li><a href="http://localhost/aroragrceries/wishlist.php?serial_no=' . $data['serial_no'] . '"><i class="ti-heart"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item-info text-center text-black p-a10">
                                <h6 class="item-title font-weight-500"><a href="javascript:void(0);">' . $data['item'] . '</a></h6>
                                <h4 class="item-price"> <span class="text-primary"> ₹' . $data['price'] . '</span></h4>
                            </div>
                        </div>
                    </div>';
                            }
                        }

                        ?>

                    </div>
                </div>
                <!-- Product END -->
            </div>
        </div>
        <!-- Content END -->
        <?php
        require("./partials/bottom/bottom_upper.php");
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