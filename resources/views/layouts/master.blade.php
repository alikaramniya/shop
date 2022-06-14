<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8" />
    <title>
        @section('title') صفحه اصلی @show
    </title>
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />


    <!-- CSS
  ================================================== -->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:400,700,500,300,400italic,300italic' rel='stylesheet'
        type='text/css'>
    <link rel="stylesheet" href="{{ asset('css/styles/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/styles/inner.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/styles/layout.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/styles/layerslider.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/styles/color.css') }}" />


    <!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
 <![endif]-->

    <!-- Favicons
 ================================================== -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />



</head>


<body>

    <div id="bodychild">
        <div id="outercontainer">

            <!-- HEADER -->
            <div id="outerheader">


                <header>
                    <div id="top">
                        <div class="container">
                            <div class="row">
                                <div id="topmenu" class=" six columns">
                                    <ul id="topnav">
                                        <li><a href="#">تماس با ما</a></li>
                                        <li><a href="#">نقشه سایت</a></li>
                                        <li><a href="#">نشانه گذاری</a></li>
                                    </ul>
                                </div>
                                <div id="topleft" class="six columns">

                                    <div class="language">
                                        @if (Route::has('login'))
                                            <div class="fixed top-0 right-0 hidden px-6 py-4 sm:block">
                                                @auth
                                                    <form action="{{ route('logout') }}" method="post"
                                                        accept-charset="utf-8">
                                                        @csrf
                                                        <button
                                                            style="background-color:transparent;border:none;color: white;font-size:14px">خروج</button>
                                                    </form>
                                                    {{-- <a href="{{ url('/logout') }}" --}}
                                                    {{-- class="text-sm text-gray-700 underline dark:text-gray-500">خروج</a> --}}
                                                @else
                                                    <a href="{{ route('login') }}"
                                                        class="text-sm text-gray-700 underline dark:text-gray-500">ورود</a>

                                                    @if (Route::has('register'))
                                                        <a href="{{ route('register') }}"
                                                            class="ml-4 text-sm text-gray-700 underline dark:text-gray-500">ثبت
                                                            نام</a>
                                                    @endif
                                                @endauth
                                            </div>
                                        @endif

                                    </div>
                                    @if (Route::has('login'))
                                        @auth
                                            {{ auth()->user()->name }} عزیز خوش آمدید
                                        @else
                                            کاربر عزیز خوش آمدید
                                        @endauth
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="logo-wrapper">
                        <div class="container">
                            <div class="row">
                                <div id="logo" class="six columns">
                                    <a href="index.html"><img src="images/logo.png" alt="" /></a>
                                    <span class="desc">
                                        @if (Route::has('login'))
                                            @auth
                                                <a href="{{ route('dashboard') }}" style="color:blue; font-size:15px" >پنل ادمین</a>
                                            @else
                                                بهترین راه حل برای کسب و کار شما
                                            @endauth
                                        @endif
                                    </span>
                                </div>
                                <div class="left six columns">

                                    <form action="#" id="searchform" method="get">

                                        <input type="text"
                                            onblur="if (this.value == '')this.value = 'Search keywords here';"
                                            onfocus="if (this.value == 'Search keywords here')this.value = '';"
                                            value="جستجو..." id="s" name="s" class="field">
                                        <input type="submit" value="" class="searchbutton">

                                    </form>

                                    <div id="shopping-cart-wrapper">
                                        <div id="shopping_cart"><a href="#" id="shop-bag">سبد خرید</a><a
                                                class="btncart" href="#"></a>
                                            <ul class="shop-box">
                                                <li>
                                                    <h2>محصول 1</h2>
                                                    <div class="price">1 x $150.00</div>
                                                    <div class="clear"></div>
                                                </li>
                                                <li>
                                                    <h2>حمل و نقل</h2>
                                                    <div class="price">1 x $10.00</div>
                                                    <div class="clear"></div>
                                                </li>
                                                <li class="total">
                                                    <h2>مجموع</h2>
                                                    <div class="price"> $160.00</div>
                                                    <div class="clear"></div>
                                                </li>
                                                <li class="btn-wrapper">
                                                    <a href="#" class="cart">سبد خرید</a> <a href="#"
                                                        class="checkout">پرداخت</a>
                                                    <div class="clear"></div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <section id="navigation">
                        <div class="container">
                            <div class="row">
                                <nav id="nav-wrap" class="twelve columns">
                                    <ul id="sf-nav" class="sf-menu">
                                        <li><a href="index.html">صفحه اصلی</a></li>
                                        <li class="current"><a href="about.html">درباره ما</a>
                                            <ul>
                                                <li><a href="element.html">عناصر</a></li>
                                                <li><a href="single.html">
                                                        وبلاگ جزئیات
                                                    </a></li>
                                                <li><a href="#">کشویی</a>
                                                    <ul>
                                                        <li><a href="#">تنها </a></li>
                                                        <li><a href="#">
                                                                مثال از
                                                            </a></li>
                                                        <li><a href="#">منوی کرکره ای</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="product-grid.html">محصولات</a>
                                            <ul>
                                                <li><a href="product-grid.html">
                                                        محصول شبکه
                                                    </a></li>

                                                <li><a href="product-details.html">
                                                        جزئیات محصول
                                                    </a></li>
                                                <li><a href="checkout.html">پرداخت</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="portfolio.html">نمونه کارها</a></li>
                                        <li><a href="blog.html">وبلاگ</a></li>
                                        <li><a href="{{ route('contact_create') }}">تماس با ما</a></li>
                                    </ul><!-- topnav -->
                                </nav><!-- nav -->
                            </div>
                        </div>
                    </section>

                    <div class="clear"></div>
                </header>

                <!-- END HEADER -->



                @yield('content')




                <!-- FOOTER -->
                <footer id="footer">
                    <div id="carousel" class="es-carousel-wrapper">
                        <div class="es-carousel">
                            <ul>
                                <li><a title="Audio Jungle" href="#"><img alt="Audio Jungle"
                                            src="images/content/audiojungle.png"></a></li>
                                <li><a title="Active Den" href="#"><img alt="Active Den"
                                            src="images/content/activeden.png"></a></li>
                                <li><a title="Graphic River" href="#"><img alt="Graphic River"
                                            src="images/content/graphicriver.png"></a></li>
                                <li><a title="Photo Dune" href="#"><img alt="Photo Dune"
                                            src="images/content/photodune.png"></a></li>
                                <li><a title="Theme Forest" href="#"><img alt="Theme Forest"
                                            src="images/content/themeforest.png"></a></li>
                                <li><a title="Video Hive" href="#"><img alt="Video Hive"
                                            src="images/content/videohive.png"></a></li>
                                <li><a title="Audio Jungle" href="#"><img alt="Audio Jungle"
                                            src="images/content/audiojungle.png"></a></li>
                                <li><a title="Active Den" href="#"><img alt="Active Den"
                                            src="images/content/activeden.png"></a></li>
                                <li><a title="Graphic River" href="#"><img alt="Graphic River"
                                            src="images/content/graphicriver.png"></a></li>
                                <li><a title="Photo Dune" href="#"><img alt="Photo Dune"
                                            src="images/content/photodune.png"></a></li>
                                <li><a title="Theme Forest" href="#"><img alt="Theme Forest"
                                            src="images/content/themeforest.png"></a></li>
                                <li><a title="Video Hive" href="#"><img alt="Video Hive"
                                            src="images/content/videohive.png"></a></li>
                            </ul>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <!-- FOOTER SIDEBAR -->
                    <div id="outerfootersidebar">
                        <div class="container">
                            <div id="footersidebar" class="row">

                                <div id="footcol1" class="one_fifth columns">
                                    <ul>
                                        <li class="widget-container">
                                            <h2 class="widget-title">اطلاعات</h2>
                                            <ul>
                                                <li><a href="#">درباره ما</a></li>
                                                <li><a href="#">
                                                        اطلاعات تحویل
                                                    </a></li>
                                                <li><a href="#">
                                                        سیاست حفظ حریم خصوصی
                                                    </a></li>
                                                <li><a href="#">شرایط استفاده</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div id="footcol2" class="one_fifth columns">
                                    <ul>
                                        <li class="widget-container">
                                            <h2 class="widget-title">
                                                خدمات مشتری
                                            </h2>
                                            <ul>
                                                <li><a href="#">تماس با ما</a></li>
                                                <li><a href="#">

                                                        لورم ایپسوم</a></li>
                                                <li><a href="#">
                                                        نقشه سایت
                                                    </a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div id="footcol3" class="one_fifth columns">
                                    <ul>
                                        <li class="widget-container">
                                            <h2 class="widget-title">
                                                حساب من
                                            </h2>
                                            <ul>
                                                <li><a href="#">
                                                        تاریخچه سفارشات
                                                    </a></li>
                                                <li><a href="#">
                                                        حساب من
                                                    </a></li>
                                                <li><a href="#">
                                                        لیست درخواست ها
                                                    </a></li>
                                                <li><a href="#">خبرنامه</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div id="footcol4" class="one_fifth columns">
                                    <ul>
                                        <li class="widget-container">
                                            <h2 class="widget-title">افزودنیهای پیشنهاد شده</h2>
                                            <ul>
                                                <li><a href="#">علامت های تجاری</a></li>
                                                <li><a href="#">همکاران فروش</a></li>
                                                <li><a href="#">
                                                        کوپن هدیه
                                                    </a></li>
                                                <li><a href="#">فروش فوق العاده</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div id="footcol5" class="one_fifth columns">
                                    <ul>
                                        <li class="widget-container">
                                            <h2 class="widget-title">تماس با ما</h2>
                                            <div class="textwidget">
                                                Telp: +98 500 600 222<br>
                                                Fax: +98 500 600 111<br>
                                                <a href="mailto:info@yourdomain.com">info@yourdomain.com</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div
                                <div class="clear"></div>

                            </div>
                        </div>
                    </div>
                    <!-- END FOOTER SIDEBAR -->

                    <!-- COPYRIGHT -->
                    <div id="outercopyleft">
                        <div class="container">
                            <div id="copyleft">
                                کپی رایت@2015
                            </div>
                            <ul class="sn">
                                <li><a href="http://twitter.com" title="Twitter"><span
                                            class="icon-img twitter"></span></a>
                                </li>
                                <li><a href="http://facebook.com" title="Facebook"><span
                                            class="icon-img facebook"></span></a></li>
                                <li><a href="https://plus.google.com" title="Google+"><span
                                            class="icon-img google"></span></a></li>
                                <li><a href="http://amazon.com" title="Amazon"><span class="icon-img amazon"></span></a>
                                </li>
                                <li><a href="http://pinterest.com" title="Pinterest"><span
                                            class="icon-img pinterest"></span></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- END COPYRIGHT -->
                </footer>
                <!-- END FOOTER -->
                <div class="clear"></div><!-- clear float -->
            </div><!-- end outercontainer -->
        </div><!-- end bodychild -->


        <!-- ////////////////////////////////// -->
        <!-- //      Javascript Files        // -->
        <!-- ////////////////////////////////// -->
        <script type="text/javascript" src="{{ asset('js/js/jquery-1.7.1.min.js') }}"></script>

        <!-- jQuery Superfish -->
        <script type="text/javascript" src="{{ asset('js/js/hoverIntent.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/js/superfish.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/js/supersubs.js') }}"></script>

        <!-- jQuery Carosel Slider -->
        <script type="text/javascript" src="{{ asset('js/js/jquery.elastislide.js') }}"></script>
        <script type="text/javascript">
            jQuery('#carousel').elastislide({
                imageW: 135,
                margin: 12
            });
        </script>

        <!-- jQuery Dropdown Mobile -->
        <script type="text/javascript" src="{{ asset('js/js/tinynav.min.js') }}"></script>

        <!-- Custom Script -->
        <script type="text/javascript" src="{{ asset('js/js/custom.js') }}"></script>

        <!-- jQuery Layerslider -->
        <script type="text/javascript" src="{{ asset('js/js/jquery-easing-1.3.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/js/layerslider.js') }}"></script>
        <script type="text/javascript">
            jQuery(window).load(function() {
                jQuery('#layerslider.slideritems').layerSlider({
                    skinsPath: "{{ asset('images/layerslider-skins/') }}",
                    skin: 'lastore',
                    autoStart: true
                });
                jQuery('.ls-nav-prev').fadeOut();
                jQuery('.ls-nav-next').fadeOut();
                jQuery('#layerslider.slideritems').mouseleave(function() {
                    jQuery('.ls-nav-prev').fadeOut();
                    jQuery('.ls-nav-next').fadeOut();
                });
                jQuery('#layerslider.slideritems').mouseenter(function() {
                    jQuery('.ls-nav-prev').fadeIn();
                    jQuery('.ls-nav-next').fadeIn();
                });
            });
        </script>


</body>

</html>
