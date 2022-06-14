<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="{{ asset('admin/img/favicon.html') }}">

    <title>
        @section('title') master page @show
    </title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/bootstrap-reset.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('admin/assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/style-responsive.css') }}" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <section id="container" class="">
        <!--header start-->
        <header class="header white-bg">
            <div class="sidebar-toggle-box">
                <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
            </div>
            <!--logo start-->
            <a href="#" class="logo">فلت<span>لب</span></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-tasks"></i>
                            <span class="badge bg-success">
                                @if (Cache::has('userIds'))
                                    @php($countUserOnline = 0)
                                    @foreach (Cache::get('userIds') as $userId)
                                        @if (Cache::has('is_online' . $userId))
                                            @php(++$countUserOnline)
                                        @endif
                                    @endforeach
                                    {{ $countUserOnline }}
                                @endif
                            </span>
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">شما 6 برنامه در دست کار دارید</p>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">پنل مدیریت</div>
                                        <div class="percent">40%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-success" role="progressbar"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">بروزرسانی دیتابیس</div>
                                        <div class="percent">60%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-warning" role="progressbar"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">برنامه نویسی IPhone</div>
                                        <div class="percent">87%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-info" role="progressbar"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 87%">
                                            <span class="sr-only">87% Complete</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">برنامه موبایل</div>
                                        <div class="percent">33%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-danger" role="progressbar"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 33%">
                                            <span class="sr-only">33% Complete (danger)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">پروفایل v1.3</div>
                                        <div class="percent">45%</div>
                                    </div>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="45"
                                            aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                            <span class="sr-only">45% Complete</span>
                                        </div>
                                    </div>

                                </a>
                            </li>
                            <li class="external">
                                <a href="#">برنامه های بیشتر</a>
                            </li>
                        </ul>
                    </li>
                    <!-- settings end -->
                    <!-- inbox dropdown start-->
                    <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-envelope-alt"></i>
                            <span class="badge bg-important">5</span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-red"></div>
                            <li>
                                <p class="red">شما 5 پیام جدید دارید</p>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo">
                                        <img alt="avatar" src="{{ asset('admin/img/avatar-mini.jpg') }}"></span>
                                    <span class="subject">
                                        <span class="from">{{ auth()->user()->name }}</span>
                                        <span class="time">همین حالا</span>
                                    </span>
                                    <span class="message">سلام،متن پیام نمایشی جهت تست
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo">
                                        <img alt="avatar" src="{{ asset('admin/img/avatar-mini2.jpg') }}"></span>
                                    <span class="subject">
                                        <span class="from">ایمان مدائنی</span>
                                        <span class="time">10 دقیقه قبل</span>
                                    </span>
                                    <span class="message">سلام، چطوری شما؟
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo">
                                        <img alt="avatar" src="{{ asset('admin/img/avatar-mini3.jpg') }}"></span>
                                    <span class="subject">
                                        <span class="from">صبا ذاکر</span>
                                        <span class="time">3 ساعت قبل</span>
                                    </span>
                                    <span class="message">چه پنل مدیریتی فوق العاده ایی
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo">
                                        <img alt="avatar" src="{{ asset('admin/img/avatar-mini4.jpg') }}"></span>
                                    <span class="subject">
                                        <span class="from">مسعود شریفی</span>
                                        <span class="time">همین حالا</span>
                                    </span>
                                    <span class="message">سلام،متن پیام نمایشی جهت تست
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">نمایش تمامی پیام ها</a>
                            </li>
                        </ul>
                    </li>
                    <!-- inbox dropdown end -->
                    <!-- notification dropdown start-->
                    <li id="header_notification_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <i class="icon-bell-alt"></i>
                            <span class="badge bg-warning">{{ $latestContact->count() }}</span>
                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-yellow"></div>
                            <li>
                                <p class="yellow">شما {{ $latestContact->count() }} تماس بی پاسخ دارید</p>
                            </li>
                            @if ($latestContact->count())
                                @foreach ($latestContact as $contact)
                                    <li>
                                        <a href="{{ route('contact_read', $contact) }}">
                                            <span class="label label-danger"><i class="icon-edit"></i></span>
                                            {{ $contact->name }}
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                            <li>
                                <a href="{{ route('contact_list') }}">رفتن به لیست تماس ها</a>
                            </li>
                        </ul>
                    </li>
                    <!-- notification dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <li>
                        <input type="text" class="form-control search" placeholder="Search">
                    </li>
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="{{ asset('admin/img/avatar1_small.jpg') }}">
                            <span class="username">{{ auth()->user()->name }}</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li><a href="#"><i class=" icon-suitcase"></i>پروفایل</a></li>
                            <li><a href="#"><i class="icon-cog"></i>تنظیمات</a></li>
                            <li><a href="#"><i class="icon-bell-alt"></i>اعلام ها</a></li>
                            <li>
                            <li><a href="#" id="logout"><i class="icon-key"></i>خروج</a></li>
                        </ul>
                    </li>
                    <form action="{{ route('logout') }}" id="logoutForm" style="dispaly:none" method="POST"
                        accept-charset="utf-8">
                        @csrf
                    </form>
                    <script>
                        let logout = document.querySelector('#logout');
                        let logoutForm = document.querySelector('#logoutForm');
                        logout.addEventListener('click', function() {
                            logoutForm.submit();
                        });
                    </script>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
        <!--header end-->
        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu">
                    <li>
                        <a class="" href="{{ route('home') }}">
                            <i class="icon-home"></i>
                            <span>رفتن به سایت</span>
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{ route('dashboard') }}">
                            <i class="icon-dashboard"></i>
                            <span>صفحه اصلی</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-book"></i>
                            <span>کاربران</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li>
                                <a class="" href="{{ route('user_list') }}">&nbsp;&nbsp; لیست
                                    کاربران</a>
                            </li>
                            <li>
                                <a class="" href="{{ route('role_list') }}">&nbsp;&nbsp; لیست نقش
                                    ها</a>
                            </li>
                            <li>
                                <a class="" href="{{ route('permission_list') }}">&nbsp;&nbsp; لیست
                                    دسترسی ها</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-book"></i>
                            <span>پروفایل کاربری</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li>
                                <a class="" href="{{ route('profile_edit') }}">&nbsp;&nbsp; ویرایش
                                    پروفایل</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-book"></i>
                            <span>لیست تماس ها</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li>
                                <a class="" href="{{ route('contact_list') }}">&nbsp;&nbsp; لیست تماس
                                    ها</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-book"></i>
                            <span>دسته بندی محصول</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li>
                                <a class="" href="{{ route('category_create') }}">&nbsp;&nbsp; افزودن
                                    دسته بندی</a>
                            </li>
                            <li>
                                <a class="" href="{{ route('category_list') }}">&nbsp;&nbsp; لیست دسته
                                    بندی ها</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-book"></i>
                            <span>مدیریت محصول</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li>
                                <a class="" href="{{ route('product_create') }}">&nbsp;&nbsp; افزودن
                                    محصول</a>
                            </li>
                            <li>
                                <a class="" href="{{ route('color_create') }}">&nbsp;&nbsp; رنگ محصول
                                    چدید</a>
                            </li>
                            <li>
                                <a class="" href="{{ route('color_list') }}">&nbsp;&nbsp; لیست رنگ
                                    ها</a>
                            </li>
                            <li>
                                <a class="" href="{{ route('product_list') }}">&nbsp;&nbsp; لیست
                                    محصولات</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <!-- page start-->

                @yield('content')

                <!-- page end-->
            </section>
        </section>
        <!--main content end-->
    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('admin/js/jquery.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.nicescroll.js') }}" type="text/javascript"></script>

    <!--common script for all pages-->
    <script src="{{ asset('admin/js/common-scripts.js') }}"></script>


</body>

</html>
