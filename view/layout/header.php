<!DOCTYPE html>
<!--[if IE 8]>
<html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width"/>
    <title>سایت فروشگاهی</title>

    <!-- app.css if the Grid file (Contains grid style only) -->
    <link rel="stylesheet" type="text/css" href="admin/public/css/default/app.css"/>
    <!-- Droid Sans From Google -->
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'/>
    <!-- Main stylesheet -->
    <link rel="stylesheet" type="text/css" href="admin/public/css/default/base.css"/>
    <!-- Icon Font (icomoon.io) -->
    <link rel="stylesheet" type="text/css" href="admin/public/fonts/default/style.css"/>
    <!-- CSS3 Animation Lib -->
    <link rel="stylesheet" type="text/css" href="admin/public/css/default/animations.css"/>
    <!-- Flexslider -->
    <link rel="stylesheet" type="text/css" href="admin/public/css/default/slider.css" media="all"/>
    <!-- Jquery Selectric -->
    <link rel="stylesheet" type="text/css" href="admin/public/css/default/selectric.css"/>
    <!-- Owl Carousel Assets -->
    <link href="admin/public/owl-carousel/owl.carousel.css" rel="stylesheet"/>
    <link href="admin/public/owl-carousel/owl.theme.css" rel="stylesheet"/>

    <script src="admin/public/js/default/vendor/custom.modernizr.js"></script>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>

<!-- Header -->
<div class="header">
    <!-- Header top -->
    <div class="headertop">

        <!-- Content Row -->
        <div class="row">

            <!-- Welcome Txt -->
            <div class="small-12 medium-5 large-5 welcome-guest-text columns">
                <div class="topHeader">
                    <?php
                    if (isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) {
                        echo $_SESSION['user_name'] . " عزیز خوش آمدید ";
                        echo "<a href='index.php?c=customer&a=logout&logout=ok'>خروج</a>";
                    } else {
                        echo "کاربر مهمان خوش آمدید   ";
                        echo "<a href='index.php?c=customer&a=login'> ورود </a>" . " ";
                        echo "<a href='index.php?c=customer&a=register'> ثبت نام </a>";
                    }
                    ?>
                </div>
            </div>
            <!-- End Welcome Txt -->
            <!-- Currency -->
            <div class="small-8 text-center small-centered large-uncentered medium-uncentered large-2 large-offset-1 medium-2 columns">
                <div class="currency"><a href="#">$</a></div>
                <div class="currency"><a href="#" title="Sterling Pound">£</a></div>
                <div class="currency"><a href="#" title="Euro">€</a></div>
            </div>

            <!-- Topcart -->
            <div class="small-12 medium-5 large-4 left topcartbg columns">
                <!-- Carticon -->
                <div class="topcart-icon text-center">
                    <i class="icon-cart2"></i>
                </div>
                <!-- End Carticon -->

                <!-- Topcart Text -->
                <div class="topcart-text">

                    <?php
                    if (isset($_SESSION['user_id'])) {
                        if (!empty($listBasket)) {
                            $countBasket = count($listBasket);
                            echo "سبد خرید ($countBasket مورد )";
                        } else {
                            echo "سبد خرید (تهی)";
                        }
                    } else {
                        echo "لطفا ابتدا وارد اکانت خود شوید";
                    }
                    ?>
                </div>
                <!-- End Topcart Text -->

                <!-- Topcart Arrow Down -->
                <div class="topcart-arrow-down">
                    <a href="#">
                        <i class="icon-arrow-down"></i>

                    </a>


                </div>
                <!-- End Topcart Arrow Down -->

                <!-- Cart items -->
                <div class="small-12 medium-12 large-4 cart-dropdown">


                    <?php
                    $total = 0;
                    if (isset($_SESSION['user_id'])) :
                        if (!empty($listBasket)):
                            foreach ($listBasket as $value):
                                $pro_id = $value->pro_id;
                                $showPro = $pro->listProBasket($pro_id);
                                ?>


                                <!-- Item List -->
                                <div class="cart-item-list">

                                    <!-- Thumb -->
                                    <div class="cart-item-thumb right">
                                        <img src="admin/<?php echo $showPro->img1; ?>" class="imageBasket"
                                             alt="Cart product 1"/>
                                    </div>
                                    <!-- End thumb -->

                                    <!-- Content -->
                                    <div class="cart-item-content">
                                        <!-- {product name} -->
                                        <div class="cart-item-title">
                                            <a href="#">
                                                <?php echo $showPro->title; ?>
                                            </a>
                                        </div>
                                        <!-- PRice -->
                                        <div class="cart-item-price">
                                            <?php echo number_format($showPro->price); ?> تومان
                                        </div>
                                        <!-- Remove -->
                                        <a href="index.php?c=basket&a=delete&id=<?php echo $value->id; ?>"
                                           class="cart-remove">X</a>
                                        <!-- Quanitity -->
                                        <div class="cart-item-quantity">

                                            تعداد: (<?php echo $showPro->count; ?>)
                                        </div>


                                    </div>
                                    <!-- End Content -->

                                    <!-- Clearing -->
                                    <div class="clearing"></div>

                                </div>
                                <!-- End item list -->


                                <?php
                                $total += $showPro->price;
                            endforeach;
                        endif;
                    endif;
                    ?>


                    <!-- Total -->
                    <div class="small-12 large-12 text-center medium-12 columns cart-total">
                        <?php if ($total != 0): ?>
                            مجموع: <?php echo number_format($total); ?> تومان
                        <?php else: ?>
                            محصولی دری سبد خرید شما موجود نیست
                        <?php endif; ?>
                    </div>
                    <a href="index.php?c=basket&a=list" class="small-12 large-12 btn btn-3 btn-3a icon-arrow-left">
                        سبد خرید
                    </a>
                    <button class="small-12 large-12 btn btn-3 btn-3a icon-lock">بررسی</button>

                </div>
                <!-- End Cart item -->
            </div>
            <!-- End Topcart -->

        </div>
        <!-- End Content Row -->

    </div>
    <!-- End Header top -->

    <!-- Header Bottom -->
    <div class="headerbottom">
        <!-- Content Row -->
        <div class="row headerbottomrow">

            <!-- Logo -->
            <div class="small-12 medium-3 large-2 small-centered large-uncentered text-center logo columns">
                <a href="index.php" title="nexx Homepage"><img src="admin/public/img/default/logo.png"
                                                               alt="Nexx Store"/></a>
            </div>
            <!-- End Logo -->
            <!-- Menu Icon For Mobile -->
            <div class="menu-icon"><i class="icon-menu"></i>

            </div>

            <!-- Main Navigation -->
            <div class="small-12 medium-12 large-7 mainnav columns">

                <ul class="navigation">


                    <?php
                    if (!empty($listMainProcat)) :
                        foreach ($listMainProcat as $value):
                            ?>


                            <li>

                                <a href="#"><?php echo $value->title; ?></a>
                                <!-- dropdown -->


                                <?php
                                $listSubMainProcat = $procat->listMainChid(['1', $value->id]);
                                if (!empty($listSubMainProcat)) :

                                    ?>

                                    <div class="dropdown-menu">
                                        <!-- Dropdown Links -->
                                        <ul class="dropdown">
                                            <?php
                                            foreach ($listSubMainProcat as $val):
                                                ?>
                                                <li><a href="index.php?c=product&a=list&id=<?php echo $val->id; ?>"
                                                       title="Product Grid"><?php echo $val->title; ?></a></li>
                                            <?php
                                            endforeach;
                                            ?>
                                        </ul>
                                        <!-- End Dropdown Links -->
                                    </div>

                                <?php
                                endif;
                                ?>


                                <!-- End dropdown -->

                            </li>


                        <?php
                        endforeach;
                    endif;
                    ?>


                </ul>

            </div>
            <!-- End Main Navigation -->

            <!-- Searchbox -->
            <div class="small-12 medium-12 large-3 searchinputholder columns">

                <input type="text" class="searchinput" placeholder="
محصولات جستجو"/>

            </div>
            <!-- End Searchbox -->

            <!-- Sub Navigation -->

            <?php
            if (!empty($listMainMenu)) :
                ?>
                <div class="subnavigation">
                    <ul class="subnav">
                        <?php
                        foreach ($listMainMenu as $val):
                            ?>
                            <li><a href="/<?php echo $val->url; ?>" target="_blank"><?php echo $val->title; ?></a></li>
                        <?php
                        endforeach;
                        ?>
                    </ul>
                </div>
            <?php
            endif;
            ?>

            <!-- End Sub Navigation -->

        </div>
        <!-- End Content Row -->

    </div>
    <!-- End Header Bottom -->
</div>
<!-- End header -->
