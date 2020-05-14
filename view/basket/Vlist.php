<!-- Page Content Holder -->
<div class="row featured-row">

    <h1>سبد خرید</h1>
    <div class="fr-border"></div>


    <?php
    if (!empty($listBasket)):
        $total = 0;
        foreach ($listBasket as $val):
            $proId = $val->pro_id;
            $proBasket = $pro->listProBasket($proId);
            ?>


            <!-- Item List -->
            <div class="small-10 small-centered large-12 medium-12 medium-uncentered large-uncentered columns shopping-cart-list ">
                <div class="small-12 small-centered medium-2 medium-uncentered large-2 shopping-cart-thumb large-uncentered columns">
                    <img src="admin/<?php echo $proBasket->img1; ?>" alt="Product 1"/>
                </div>
                <!-- End Thumb -->
                <!-- Content -->
                <div class="small-12 small-centered medium-8 medium-uncentered large-9 large-uncentered columns">
                    <!-- Title -->
                    <div class="product-detail-title  shopping-cart-item-title">
                        <a href="index.php?c=product&a=details&id=<?php echo $proBasket->id; ?>"
                           title="Coolwater Perfume">
                            <?php echo $proBasket->title; ?>
                        </a>
                    </div>
                    <!-- End Title -->
                    <div class="main-price shopping-cart-item-price">
                        <?php echo number_format($proBasket->price); ?> تومان
                    </div>

                    <!-- Product Size -->
                    <div class="small-12 small-centered medium-12 medium-uncentered large-12 large-uncentered shopping-cart-product-size columns">
                        <div class="product-attr-text">
                            اندازه:
                        </div>
                        <div class="product-size">
                            <?php
                            $size = $proBasket->size;
                            switch ($size) {
                                case 0:
                                    echo "<a href='' title='کوچک'>S</a>";
                                    break;
                                case 1:
                                    echo "<a href='' title='متوسط'>M</a>";;
                                    break;
                                case 2:
                                    echo "<a href='' title='بزرگ'>L</a>";;
                                    break;
                            }
                            ?>
                        </div>


                    </div>
                    <!-- End Product Size -->


                    <!-- Product Quantity -->
                    <div class="small-12 small-centered medium-12 medium-uncentered large-12 large-uncentered columns">
                        <div class="product-attr-text q-lineheight">
                            تعداد:
                        </div>

                        <div class="quantity-inp">
                            <input type="text" class="quantity-input" id="p_quantity" value="1"/>
                        </div>

                    </div>
                    <!-- End Product Quantity -->


                </div>
                <!-- End Content  -->

                <!-- Remove Button -->
                <div class="small-12 text-center medium-1 large-1 large-uncentered shp-remove-btn medium-uncentered columns">
                    <div class="continue-button">
                        <a href="index.php?c=basket&a=delete&id=<?php echo $val->id; ?>" title="remove item">
                            X
                        </a>
                    </div>
                </div>
                <div class="clearing">
                </div>
            </div>
            <!-- End item list -->


            <?php
            $total += $proBasket->price;
        endforeach;
    else:
        $total = 0;
    endif;
    ?>


    <!-- Total -->
    <div class="small-12 small-centered large-uncentered medium-uncentered large-6 medium-6 cart-total columns">

        مجموع: <?php echo number_format($total); ?> تومان

    </div>

    <!-- Check out button -->

    <div class="small-12 large-5 cart-checkout-button left medium-6 columns">
        <button class="small-12 large-12 medium-12 btn btn-3 btn-3a icon-lock">بررسی</button>
    </div>

</div>
<!-- End Page Content Holder -->