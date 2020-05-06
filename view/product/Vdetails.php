<!-- Breadcrumb -->
<div class="breadcrumb-holder">
    <!-- Content Row -->
    <div class="row">
        <ul class="breadcrumbs small-12 medium-8 large-8 columns">
            <li><a href="#" title="Homepage"><?php echo $mainCat->title; ?></a></li>
            <li><a href='index.php?c=product&a=list&id=<?php echo $subCat->id; ?>'><?php echo $subCat->title; ?></a>
            </li>
            <li><?php echo $details->title; ?></li>
        </ul>
    </div>
    <!-- End Content Row -->
</div>
<!-- End BreadCrumb -->

<!-- Page Content Holder -->
<div class="row">

    <!-- Product Thumb -->
    <div class="small-12 small-centered medium-4 medium-uncentered large-4 large-uncentered product-thumb columns">
        <!-- Product Main Photo -->
        <div class="product-main-photo">
            <img class="p-photo" src="admin/<?php echo $details->img1; ?>" width="100%" height="100%" data-large="img/products/product-large.jpg"
                 alt="Product Main Thumb"/>
        </div>
        <!-- End product main photo -->

        <!-- Product Thumb Gallery  -->
        <div class="thumb-gallery" dir="ltr">

            <div id="carousel-gallery">

                <div class="item"><img data-tmb-large="img/products/product-large-1.jpg"
                                       data-medium="img/products/product-main-1.jpg" src="img/cart/1.jpg"
                                       alt="Producct 11"/></div>
                <div class="item"><img data-tmb-large="img/products/product-large-1.jpg"
                                       data-medium="img/products/product-main-1.jpg" src="img/cart/1.jpg"
                                       alt="Producct 21"/></div>
                <div class="item"><img data-tmb-large="img/products/product-large-1.jpg"
                                       data-medium="img/products/product-main-1.jpg" src="img/cart/1.jpg"
                                       alt="Producct 1"/></div>
                <div class="item"><img data-tmb-large="img/products/product-large-1.jpg"
                                       data-medium="img/products/product-main-1.jpg" src="img/cart/1.jpg"
                                       alt="Producct 2"/></div>
                <div class="item"><img data-tmb-large="img/products/product-large-1.jpg"
                                       data-medium="img/products/product-main-1.jpg" src="img/cart/1.jpg"
                                       alt="Producct 3"/></div>
                <div class="item"><img data-tmb-large="img/products/product-large-1.jpg"
                                       data-medium="img/products/product-main-1.jpg" src="img/cart/1.jpg"
                                       alt="Producct 4"/></div>
                <div class="item"><img data-tmb-large="img/products/product-large-1.jpg"
                                       data-medium="img/products/product-main-1.jpg" src="img/cart/1.jpg"
                                       alt="Producct 5"/></div>
            </div>

        </div>
        <!-- End Thumb Gallery -->
    </div>

    <!-- End Product Thumb -->

    <!-- Product Description -->
    <div class="small-12 small-centered medium-5 medium-uncentered large-5 large-uncentered product-description columns">
        <!-- Title -->
        <div class="product-detail-title">
            <?php echo $details->title; ?>
        </div>
        <!-- End Title -->
        <!-- Description -->
        <div class="product-detail-description">
            <?php echo $details->article; ?>
        </div>
        <!-- End Description -->
        <!-- Border -->
        <div class="fr-border"></div>
        <!-- Product Size -->
        <div class="small-12 small-centered medium-6 medium-uncentered large-6 large-uncentered columns">
            <div class="product-attr-text">اندازه:</div>
            <?php
            $size = $details->size;
            switch ($size) {
                case '0':
                    echo "<div class='product-size'><a href='#' title='Small'>S</a></div>";
                    break;
                case '1':
                    echo "<div class='product-size'><a href='#' title='Medium'>M</a></div>";
                    break;
                case '2':
                    echo "<div class='product-size'><a href='#' title='Large'>L</a></div>";
                    break;
            }
            ?>
        </div>
        <!-- End Product Size -->
        <!-- Stock -->
        <div class="small-10 small-centered medium-6 medium-uncentered large-6 large-uncentered columns">
            <div class="product-attr-text">در دسترس بودن:<span>در انبار</span></div>
        </div>
        <!-- End Stock -->
        <div class="clearing"></div>

        <!-- Border -->
        <div class="fr-border"></div>

        <!-- Product Quantity -->
        <div class="small-12 small-centered medium-6 medium-uncentered large-7 large-uncentered columns">
            <div class="product-attr-text q-lineheight">تعداد:</div>
            <div class="quantity-txt"><a href="#self" class="qnt" id="minus">-</a></div>
            <div class="quantity-inp"><input type="text" class="quantity-input" id="p_quantity" value="1"/></div>
            <div class="quantity-txt"><a href="#self" class="qnt" id="plus">+</a></div>
        </div>
        <!-- End Product Quantity -->
        <!-- Add to wishlist + compare -->
        <div class="small-10 small-centered medium-6 medium-uncentered large-5 large-uncentered q-lineheight columns">

            <div class="f-button">

                <a href="#" title="Add to Wishlist"><i class="icon-heart"></i></a>
                <a href="#" title="Add to Compare"><i class="icon-tags"></i></a>
            </div>

        </div>
        <!-- End Add to wishlist + compare -->

        <div class="clearing"></div>
        <!-- Border -->
        <div class="fr-border"></div>


        <!-- Product Price and Add To Cart -->
        <div class="small-12 small-centered medium-5 medium-uncentered large-6 q-lineheight large-uncentered columns">
            <div class="main-price"><span>$400.00</span> تومان <?php echo $details->price; ?></div>
        </div>
        <!-- End Product Price -->
        <!-- Add To Cart -->
        <div class="small-12 small-centered medium-7 medium-uncentered large-6 large-uncentered q-lineheight cart-area columns">

            <div class="continue-button"><a href="index.php?c=basket&a=add&pro_id=<?php echo $val->id; ?>&page=details" title="Add to cart"><i class="icon-cart"></i>
                    اضافه کردن به سبد</a></div>

        </div>
        <!-- End Add to Cart -->

        <div class="clearing"></div>
        <!-- Border -->
        <div class="fr-border"></div>
        <!-- End PRoduct Price and Add to cart -->

        <!-- Product Rating -->
        <div class="small-6 medium-5 large-5 columns">
            <div class="product-rating">
                <i class="icon-star"></i>
            </div>
            <div class="product-rating">
                <i class="icon-star"></i>
            </div>
            <div class="product-rating">
                <i class="icon-star"></i>
            </div>
            <div class="product-rating">
                <i class="icon-star"></i>
            </div>
            <div class="product-rating">
                <i class="icon-star"></i>
            </div>


        </div>
        <!-- End Product Rating -->

        <!-- Product Review Links -->
        <div class="small-6 medium-6 large-6 ratinglink columns">
            <div class="rating-link">
                <a href="#" title="View Reviews">بررسی (10)</a>
            </div>
            <div class="rating-link">
                <a href="#" title="Write a review">
                    نوشتن نظر</a>
            </div>
        </div>

        <div class="clearing"></div>
        <script type="text/javascript">var switchTo5x = true;</script>
        <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
        <script type="text/javascript">stLight.options({
                publisher: "ur-91f7351c-4e1e-33ef-9cac-f7276559ca2f",
                doNotHash: false,
                doNotCopy: false,
                hashAddressBar: false
            });</script>
        <!-- Share Widget -->
        <div class="share-widget">
            <a href="https://www.google.com" target="_blank"><span displaytext='Google +1'
                                                                   class='st_plusone'></span></a>
            <a href="https://www.facebook.com" target="_blank"><span class='st_facebook' displaytext='Facebook'></span></a>
            <a href="https://www.tweet.com" target="_blank"><span class='st_twitter' displaytext='Tweet'></span></a>
            <a href="https://www.linkdin.com" target="_blank"><span class='st_linkedin'
                                                                    displaytext='LinkedIn'></span></a>
            <a href="https://www.pinterest.com" target="_blank"><span class='st_pinterest'
                                                                      displaytext='Pinterest'></span></a>

        </div>
        <!-- End Share Widget -->
    </div>
    <!-- End Product Description -->

    <!-- Product Left module -->
    <div class="small-12 small-centered medium-3 medium-uncentered large-3 large-uncentered product-left-module columns">
        <!-- Related Product -->

        <div class="lft-module-heading">
            محصولات مرتبط
        </div>
        <!-- Listings -->


        <?php
        if (!empty($listProDefault)):
            foreach ($listProDefault as $val) :
                if ($val->id == $details->id)
                    continue;
                ?>


                <div class="bst-seller-list">
                    <div class="bst-seller-thumb">
                        <img src="admin/<?php echo $val->img1; ?>" alt="thumbnail1"/>
                    </div>
                    <div class="bst-seller-content">
                        <div class="bst-seller-title"><a href="index.php?c=product&a=details&id=<?php echo $val->id; ?>" title="turtle neck">

                                <?php echo $val->title; ?></a></div>
                        <div class="bst-seller-price">تومان <?php echo $val->price; ?></div>
                        <div class="bst-seller-cart">
                            <a href="index.php?c=basket&a=add&page=<?php echo $val->id ?>&page=details" title="Add to cart"><i class="icon-cart"></i>اضافه به سبد خرید</a>
                        </div>
                    </div>

                    <div class="clearing"></div>
                </div>


            <?php
            endforeach;
        endif;
        ?>


        <!-- Ennd related product Module -->

    </div>
    <!-- End product left module -->

    <div class="clearing"></div>

    <!-- PAGE TABS -->
    <ul class="tabs">
        <li><a href="#self" id="#tab0" class="active">
                توضیحات</a></li>
        <li><a href="#self" id="#tab1">بررسی</a></li>
        <li><a href="#self" id="#tab2">
                محصولات برچسب ها</a></li>

    </ul>
    <!-- Tab 0  -->
    <div class="tab-content small-12 medium-12 large-12 columns" id="tab0" style="display:block;">
        <!-- Description -->
        <div class="product-detail-description">
            <?php echo $details->text; ?>
        </div>
        <!-- End Description -->
    </div>

    <!-- Tab1 -->
    <div class="tab-content small-12 medium-12 large-12 columns" id="tab1">
        <!-- Review -->
        <div class="row">
            <!-- Reviews -->
            <div class="small-12 medium-5 large-5 columns">
                <h1>
                    نظرات مشتری</h1>
                <div class="fr-border"></div>
                <!-- Review -->
                <div class="rev-box">
                    <div class="rev-name">الهامیان<span>در اکتبر 9</span></div>
                    <div class="rev-rating">
                        <div class="product-rating">
                            <i class="icon-star"></i>
                        </div>
                        <div class="product-rating">
                            <i class="icon-star"></i>
                        </div>
                        <div class="product-rating">
                            <i class="icon-star"></i>
                        </div>
                        <div class="product-rating">
                            <i class="icon-star"></i>
                        </div>
                        <div class="product-rating">
                            <i class="icon-star"></i>
                        </div>
                    </div>

                    <p class="product-detail-description">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                        استفاده از طراحان گرافیک است</p>
                </div>
                <!-- End Review -->
                <!-- Review -->
                <div class="rev-box">
                    <div class="rev-name">الهامیان<span>در اکتبر 9</span></div>
                    <div class="rev-rating">
                        <div class="product-rating">
                            <i class="icon-star"></i>
                        </div>
                        <div class="product-rating">
                            <i class="icon-star"></i>
                        </div>
                        <div class="product-rating">
                            <i class="icon-star"></i>
                        </div>
                        <div class="product-rating">
                            <i class="icon-star"></i>
                        </div>
                        <div class="product-rating">
                            <i class="icon-star"></i>
                        </div>
                    </div>

                    <p class="product-detail-description">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                        استفاده از طراحان گرافیک است</p>
                </div>
                <!-- End Review -->

            </div>
            <!-- End Reivewis -->

            <!-- Write a Review -->
            <div class="small-12 medium-5 large-6 columns">
                <h1>نوشتن نظر</h1>
                <div class="fr-border"></div>

                <!-- Form -->
                <form action="#self" id="review_form" method="post"/>
                <label>نام:</label>
                <input type="text" id="name"/>
                <label>ایمیل:</label>
                <input type="text" id="email"/>

                <label>
                    بازبینی</label>
                <textarea name="" id="review"></textarea>

                <button class="form-btn"><i class="icon-arrow-left"></i>ارسال</button>
                </form>

            </div>

        </div>
        <!-- End Review Module -->
    </div>
    <!-- Tab2 -->
    <div class="tab-content small-12 medium-12 large-12 columns" id="tab2">
        Tab2
    </div>

</div>
<!-- End Page Content Holder -->

