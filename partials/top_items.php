<?php
$query = "SELECT * FROM `products` ORDER BY `no_of_orders` DESC";
$result = mysqli_query($conn, $query);
?>

<div class="section-full content-inner">
    <!-- Product -->
    <div class="container">
        <div class="sort-title clearfix text-center">
            <h2 class="title text-capitalize">MOST ORDERED <br /><span class="text-primary"> PRODUCTS</span></h2>
        </div>
        <div class="row">
            <?php
            $no_of_items = 0;
            while ($data = mysqli_fetch_assoc($result) and $no_of_items < 12) {
                echo '<div class="col-lg-3 col-md-4 col-sm-6">
                <div class="item-box m-b10">
                    <div class="item-img">
                        <img src="images/product/' . $data['img'] . '" alt="" style="height: 15rem; width: 23rem;"/>
                        <div class="item-info-in">
                            <ul>
                                <li><a href="http://localhost/aroragrceries/fill_form.php?serial_no='.$data['serial_no'].'"><i class="ti-shopping-cart"></i></a></li>
                                <li><a href="http://localhost/aroragrceries/product_details.php?serial_no='.$data['serial_no'].'"><i class="ti-eye"></i></a></li>
                                <li><a href="http://localhost/aroragrceries/wishlist.php?serial_no='.$data['serial_no'].'"><i class="ti-heart"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="item-info text-center text-black p-a10">
                        <h6 class="item-title font-weight-500"><a href="javascript:void(0);">' . $data['item'] . '</h6>
                        <h4 class="item-price"> <span class="text-primary"> ₹' . $data['price'] . '</span></h4>
                    </div>
                </div>
            </div>';
                $no_of_items++;
            }
            ?>
        </div>
    </div>
    <!-- Product END -->
</div>

