<?php

$is_present = false;
require("./partials/_db.php");
if (isset($_SESSION['id'])) {
    if (!checking_session($conn)) {
        header("location:http://localhost/aroragrceries/");
    }
} else {
    header("location:http://localhost/aroragrceries/login.php");
}

$email = $_SESSION['user_email'];

if (isset($_GET['serial_no'])) {
    $serial_no = $_GET['serial_no'];

    $query = "SELECT * FROM `$email` WHERE `product_id` = '$serial_no' AND `flag` = '0'";
    $result  = mysqli_query($conn, $query);
    $is_present = mysqli_num_rows($result);

    if ($is_present) {
        $is_present = true;
    } else {
        $query = "SELECT * FROM `products` WHERE `serial_no` = '$serial_no'";
        $result = mysqli_query($conn, $query);

        $data = mysqli_fetch_assoc($result);
        $no_of_orders = $data['no_of_orders'] + 1;
        $img = $data['img'];
        
        if (isset($data['brand'])) {
            $brand = $data['brand'];
        }else {
            $brand = "local";
        }
        $item = $data['item'];

        $query = "UPDATE `products` SET `no_of_orders` = '$no_of_orders' WHERE `products`.`serial_no` = '$serial_no'";
        $result = mysqli_query($conn, $query);

        $query = "INSERT INTO `$email` (`serial_no`, `product_id`, `quantity`, `img`, `brand`, `item`, `date`, `flag`) VALUES (NULL, '$serial_no', '0','$img' , '$brand', '$item' , current_timestamp(), '0')";
        $result = mysqli_query($conn, $query);
    }
}

if (isset($_GET['remove'])) {
    $remove = $_GET['remove'];
    $query = "DELETE FROM `$email` WHERE `serial_no` = '$remove'";
    $result = mysqli_query($conn, $query);
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
        require("./partials/top/top_for_wishlist.php");
        if ($is_present) {
            echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Same product is present in your wishlist!</strong> If you want you can change the quantity of the product.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
        ?>
        <!-- contact area -->
        <div class="section-full content-inner">
            <!-- Product -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table check-tbl">
                                <thead>
                                    <tr>
                                        <th>Serial No.</th>
                                        <th>Product</th>
                                        <th>Product name</th>
                                        <th>Add to cart </th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $query = "SELECT * FROM `$email` WHERE `flag` = '0'";
                                    $result = mysqli_query($conn, $query);

                                    $position = 1;
                                    while ($data = mysqli_fetch_assoc($result)) {
                                        echo '<tr class="alert">
                                        <td class="product-item-totle">' . $position . '</td>
                                       <td class="product-item-img">
                                           <img src="images/product/' . $data['img'] . '" alt="">
                                       </td>
                                       <td class="product-item-name">' . $data['item'] . '</td>
                                       <td class="product-item-totle">
                                           <a href="http://localhost/aroragrceries/fill_form.php?serial_no=' . $data['product_id'] . '" class="site-button">Add To Cart</a>
                                       </td>
                                       <td class="product-item-close">
                                                    <a href="http://localhost/aroragrceries/wishlist.php?remove=' . $data['product_id'] . '" class="ti-close"></a>
                                                </td>
                                   </tr>';
                                        $position++;
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product END -->
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