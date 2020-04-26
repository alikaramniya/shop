<!-- Breadcrumb -->
<div class="breadcrumb-holder">
    <!-- Content Row -->
    <div class="row">
        <ul class="breadcrumbs small-12 medium-8 large-8 columns">
            <?php
            if ($subCat == 'no')
                echo "<li><a href='#'title='allProduct'>همه محصولات</a></li>";
            else
                echo "<li><a href='#' title='main category'>" . $mainCat->title . "</a></li>";
            ?>

            <?php
            if ($subCat == 'no')
                echo "<li></li>";
            else
                echo "<li>" . $subCat->title . "</li>";
            ?>
        </ul>
    </div>
    <!-- End Content Row -->
</div>
<!-- End BreadCrumb -->

<!-- Page Content Holder -->
<div class="row">
    <!-- Widget Right -->
    <div class="small-12 small-centered medium-3 large-3 large-uncentered medium-uncentered  columns">
        <!-- Category Listing Module -->
        <div class="lft-module-heading">
            دسته نبدی ها
        </div>
        <!-- Listing -->
        <ul class="cat-listing">


            <?php
            $listSubCat = $pro->listSubCat(['1', '0']);
            if (!empty($listSubCat)) :
                foreach ($listSubCat as  $value):
                    ?>


                    <li>
                        <a href="index.php?c=product&a=list&id=<?php echo $value->id; ?>">
                            <?php echo $value->title; ?>
                        </a>
                    </li>


                <?php
                endforeach;;
            endif;
            ?>


        </ul>
        <!-- End Category Listing Module -->

        <!-- BestSeller Module -->
        <div class="lft-module-heading">
            محصولات مرتبط
        </div>
        <!-- Listings -->


        <?php
            if (!empty($listProDefault)) :
                foreach ($listProDefault as $value) :
        ?>


        <div class="bst-seller-list">
            <div class="bst-seller-thumb">
                <img src="admin/<?php echo $value->img1; ?>" alt="thumbnail1"/>
            </div>
            <div class="bst-seller-content">
                <div class="bst-seller-title">
                    <a href="#" title="turtle neck">
                        محصولات مرتبط
                    </a>
                </div>
                <div class="bst-seller-price">$78.00</div>
                <div class="bst-seller-cart">
                    <a href="#" title="Add to cart"><i class="icon-cart"></i>اضافه به سبد خرید</a>
                </div>
            </div>

            <div class="clearing"></div>
        </div>


        <?php
                endforeach;
            endif;
        ?>

    </div>
    <!-- End Widget Right -->

    <!-- Featured Product Module -->
    <div class="small-12 small-centered medium-9 medium-uncentered large-9 large-uncentered featured-row columns">

        <h1>آخرین پوشاک مجموعه</h1>
        <div class="heading-summary">آخرین مجموعه از آیتم ها</div>

        <!-- End Heading  -->

        <!-- Sorting -->
        <div class="sort-container">
            <!-- Swtich View Mode -->
            <div class="small-12 small-centered medium-uncentered large-uncentered medium-4 large-4 columns">
                <div class="sort-icon"><a href="index.php?c=product&a=list	" title="Product Grid"><i
                                class="icon-grid"></i></a>
                </div>
                <div class="sort-icon"><i class="icon-menu"></i></div>
                <a class="p-compare-link" href="#" title="Product Compare">
                    مقایسه محصولات (10)
                </a>
            </div>
            <!-- End Switch View Mode -->
            <!-- Select Box -->
            <div class="small-12 small-centered medium-uncentered large-uncentered small-offset-1 medium-5 medium-offset-1 large-4 large-offset-4 sort-margin columns">
                <select name="" id="price">
                    <option value=""/>
                    قیمت
                    <option value="1"/>
                    بالاترین
                    <option value="2"/>
                    پایین ترین
                </select>
                <select name="" id="date">
                    <option value=""/>
                    تاریخ اضافه شده
                    <option value="1"/>
                    اخیر
                    <option value="2"/>
                    قدیمی
                </select>
            </div>
            <!-- End Selectboxes -->

        </div>
        <!-- End Sorting -->


        <?php

        if (!empty($listProDefault)) :
            foreach ($listProDefault as $value) :
                $catId = $value->cat_id;
                $stateSubProCat = $pro->stateSubProCat($catId);
                if ($stateSubProCat):
                    ?>


                    <!-- PRODUCT LISTING -->
                    <!-- Item -->
                    <div class="small-12 medium-12 small-centered medium-uncentered large-12 large-uncentered columns product-list">
                        <!-- Product Thumb -->
                        <div class="product-list-thumb small-5 medium-5 large-3 columns">

                            <img src="admin/<?php echo $value->img1; ?>" alt="Product 1"/>

                        </div>
                        <!-- End Product thumb -->

                        <!-- Product RIght -->
                        <div class="small-7 medium-7 large-9 text-right columns">
                            <!-- Product Link -->
                            <div class="product-link">
                                <a href="index.php?c=product&a=details&id=<?php echo $value->id; ?>"><?php echo $value->title; ?></a>
                            </div>

                            <!-- Product Rating -->
                            <div class="f-productrating text-right">
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                            </div>
                            <!-- End Product Rating -->

                            <!-- Product Descipriont -->
                            <div class="product-list-description">
                                <?php echo $value->article; ?>
                            </div>

                            <!-- Product Price -->
                            <div class="f-product-price text-right">
                                <span class="f-product-price-old">$100.00</span> تومان<?php echo $value->price; ?>
                            </div>

                            <!-- AddtoCart Buttons -->
                            <div class="f-product-hover text-right">
                                <div class="f-button">
                                    <a href="#" title="Add to Cart"><i class="icon-cart"></i></a>
                                    <a href="#" title="Add to Wishlist"><i class="icon-heart"></i></a>
                                    <a href="#" title="Add to Compare"><i class="icon-tags"></i></a>
                                </div>
                            </div>
                            <!-- End AddtoCart Buttons -->

                        </div>
                        <!-- End Product Left -->
                        <div class="clearing"></div>
                    </div>
                    <!-- End item -->


                <?php
                endif;
            endforeach;
        else:

            ?>
            <div style="width:100%; background-color:red; padding:15px 0; border-radius:8px; color:whitesmoke; font-weight:bold; margin:0; display:inline-block; text-align:center;">
                برای این دسته بندی هیچ محصولی درج نشده است
            </div>
        <?php
        endif;
        ?>
        <!-- END PRODUCT LISTING -->

        <div class="clearing"></div>
        <!-- Border -->
        <div class="fr-border"></div>


        <!-- Pagination -->
        <div class="small-10 small-centered medium-6 medium-uncentered large-6 large-uncentered columns">
            <div class="pagination">قبلی</div>
            <div class="pagination"><a href="#" title="Page 1">1</a></div>
            <div class="pagination"><a href="#" title="Page 2">2</a></div>
            <div class="pagination"><a href="#" title="Page 3">3</a></div>
            <div class="pagination"><a href="#" title="Page 4">4</a></div>
            <div class="pagination"><a href="#" title="last Page">بعدی</a></div>
        </div>
        <!-- End Pagination -->

        <div class="small-12 small-centered medium-5 medium-uncentered large-uncentered large-6 cnt-btn columns">
            <div class="continue-button"><a href="#">ادامه</a></div>
        </div>

        <div class="clearing"></div>
        <!-- Clearing -->
        <!-- Border -->
        <div class="fr-border"></div>
    </div>

    <!-- End Featured Products -->

    <div class="clearing"></div>

</div>
<!-- End Page Content Holder -->
