<?php
require("./partials/_db.php");

if (isset($_GET['serial_no'])) {

    $serial_no = $_GET['serial_no'];
    $query = "SELECT * FROM `products` WHERE `serial_no` = '$serial_no'";
    $result = mysqli_query($conn, $query);

    $data = mysqli_fetch_assoc($result);
    $item = $data['item'];
    $item_family = $data['item_family'];
    $type = $data['type'];
    $classed = $data['class'];
    $brand = $data['brand'];
    $description = $data['description'];
} else {
    header("location:http://localhost/aroragrceries");
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

            <div class="section-full content-inner bg-white">
                <!-- Product details -->
                <div class="container woo-entry">
                    <div class="row m-b30">
                        <div class="col-md-5 col-lg-5 col-sm-12">
                            <div class="product-gallery on-show-slider lightgallery" id="lightgallery">
                                <div id="sync1">
                                    <div class="item">
                                        <div class="mfp-gallery">
                                            <div class="dlab-box">
                                                <div class="dlab-thum-bx dlab-img-overlay1 ">
                                                    <img src="images/product/<?php echo $data['img']; ?>" alt="" style="height: 20rem; width: 30rem;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-7 col-lg-7 col-sm-12">
                            <form method="post" class="cart sticky-top">
                                <div class="dlab-post-title">
                                    <h4 class="post-title"><a href="javascript:void(0);"><?php echo $data['item']; ?></a></h4>
                                    <p class="m-b10"><?php echo $data['description']; ?></p>
                                    <div class="relative">
                                        <h3 class="m-tb10">₹<?php echo $data['price']; ?></h3>
                                    </div>
                                    <div class="dlab-divider bg-gray tb15">
                                        <i class="icon-dot c-square"></i>
                                    </div>
                                </div>
                                <div class="dlab-divider bg-gray tb15">
                                    <i class="icon-dot c-square"></i>
                                </div>
                                <a href="http://localhost/aroragrceries/fill_form.php?serial_no=<?php echo $serial_no; ?>" class="site-button radius-no">
                                    <i class="ti-shopping-cart"></i> Add To Cart
                                </a>
                            </form>
                        </div>
                    </div>

                    <?php
                    $query = "SELECT * FROM `products` WHERE `products`.`item` LIKE '%" . $item . "%' OR `products`.`item_family` LIKE '%" . $item_family . "%' OR `products`.`type` LIKE '%" . $type . "%'  OR `products`.`class` LIKE '%" . $classed . "%' OR `products`.`brand` LIKE '%" . $brand . "%' OR `products`.`description` LIKE '%" . $description . "%' EXCEPT SELECT * FROM `products`WHERE `serial_no` = '$serial_no' ORDER BY `no_of_orders` DESC";
                    if ($result = mysqli_query($conn, $query)) {
                        if (mysqli_num_rows($result)) {
                            $is_ok = true;
                        } else {
                            $is_ok = false;
                        }
                    } else {
                        $is_ok = false;
                    }

                    if ($is_ok) {
                        echo '<div class="row">
                                    <div class="col-lg-12">
                                        <h5 class="m-b20">Related Products</h5>
                                        <div class="img-carousel-content owl-carousel owl-btn-center-lr owl-btn-1 primary">';

                        while ($data = mysqli_fetch_assoc($result)) {
                            echo '<div class="item">
                                    <div class="item-box">
                                        <div class="item-img">
                                            <img src="images/product/' . $data['img'] . '" alt="" style="height: 15rem; width: 20rem;">
                                            <div class="item-info-in">
                                                <ul>
                                                    <li><a href="http://localhost/aroragrceries/fill_form.php?serial_no=' . $data['serial_no'] . '"><i class="ti-shopping-cart"></i></a></li>
                                                    <li><a href="http://localhost/aroragrceries/product_details.php?serial_no=' . $data['serial_no'] . '"><i class="ti-eye"></i></a></li>
                                                    <li><a href="http://localhost/aroragrceries/wishlist.php?serial_no=' . $data['serial_no'] . '"><i class="ti-heart"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="item-info text-center text-black p-a10">
                                            <h6 class="item-title text-uppercase font-weight-500">' . $data['item'] . '</h6>
                                            <h4 class="item-price">
                                                <span class="text-primary">₹' . $data['price'] . '</span>
                                            </h4>
                                        </div>
                                    </div>
                                </div>';
                        }
                        echo '</div>
                                </div>
                            </div>';
                    } 
                    else {
                        echo '<div class="row">
                        <div class="col-lg-12">
                            <h5 class="m-b20" style="text-align:center; color:#007bff; font-size: 2rem">No Related Products</h5>
                            </div>
                            </div>';
                    }
                    ?>
                    <!-- till here -->
                </div>
                <!-- Product details -->
            </div>
            <!-- contact area  END -->

            <?php
            require("./partials/bottom/bottom_upper.php");
            ?>

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

    <script src="js/jquery.star-rating-svg.js"></script>
    <script>
        jQuery(document).ready(function() {
            'use strict';
            dz_rev_slider_11();
            $('.lazy').Lazy();
        }); /*ready*/

        $(document).ready(function() {

            var sync1 = $("#sync1");
            var sync2 = $("#sync2");
            var slidesPerPage = 4; //globaly define number of elements per page
            var syncedSecondary = true;

            sync1.owlCarousel({
                items: 1,
                slideSpeed: 2000,
                nav: true,
                autoplay: false,
                dots: false,
                loop: true,
                responsiveRefreshRate: 200,
                navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
            }).on('changed.owl.carousel', syncPosition);

            sync2.on('initialized.owl.carousel', function() {
                sync2.find(".owl-item").eq(0).addClass("current");
            }).owlCarousel({
                items: slidesPerPage,
                dots: false,
                nav: false,
                margin: 5,
                smartSpeed: 200,
                slideSpeed: 500,
                slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
                responsiveRefreshRate: 100
            }).on('changed.owl.carousel', syncPosition2);

            function syncPosition(el) {
                //if you set loop to false, you have to restore this next line
                //var current = el.item.index;

                //if you disable loop you have to comment this block
                var count = el.item.count - 1;
                var current = Math.round(el.item.index - (el.item.count / 2) - .5);

                if (current < 0) {
                    current = count;
                }
                if (current > count) {
                    current = 0;
                }

                //end block

                sync2
                    .find(".owl-item")
                    .removeClass("current")
                    .eq(current)
                    .addClass("current");
                var onscreen = sync2.find('.owl-item.active').length - 1;
                var start = sync2.find('.owl-item.active').first().index();
                var end = sync2.find('.owl-item.active').last().index();

                if (current > end) {
                    sync2.data('owl.carousel').to(current, 100, true);
                }
                if (current < start) {
                    sync2.data('owl.carousel').to(current - onscreen, 100, true);
                }
            }

            function syncPosition2(el) {
                if (syncedSecondary) {
                    var number = el.item.index;
                    sync1.data('owl.carousel').to(number, 100, true);
                }
            }

            sync2.on("click", ".owl-item", function(e) {
                e.preventDefault();
                var number = $(this).index();
                //sync1.data('owl.carousel').to(number, 300, true);

                sync1.data('owl.carousel').to(number, 300, true);

            });
        });

        $(".my-rating").starRating({
            initialRating: 4,
            strokeColor: '#894A00',
            strokeWidth: 10,
            starSize: 25
        });
    </script>
</body>

</html>