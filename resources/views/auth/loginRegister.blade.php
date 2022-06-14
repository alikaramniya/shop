@extends('layouts.master')

@section('title', 'ورود / ثبت نام')

@section('content')

    </div>

    <div class="container">
        <div class="row">

            <section id="maincontent" class="ten columns positionright">
                <div class="padcontent">

                    <section class="content">

                        <div class="breadcrumb"><a href="index.html">سفحه اصلی</a>/ فرم ورود و ثبت نام</div>
                        <h1 class="pagetitle">فرم ورود و ثبت نام</h1>
                        @if ($errors->any())
                            {{-- <h1 class="pagetitle"></h1> --}}
                            <div style="text-align:center">
                            <h1 style="color:red; font-size:20px">
                            اطلاعات وارد شده درست نمیباشد
                            </h1>
                            </div>
                        @endif
                        <br>
                        <div id="contactform">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="right">
                                    <input type="email" name="email" id="name" size="50"
                                        placeholder="ایمیل خود را وارد کنید" class="text-input">
                                    <input type="password" name="password" placeholder="رمز خورد را وارد کنید" id="website"
                                        class="text-input">
                                    <input type="submit" name="submit" class="button mini" id="submit_btn" value="ورود">
                                </div>
                            </form>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="left">
                                    <input type="text" name="name" id="name" size="50" value="{{ old('name') }}" placeholder="نام خود را وارد کنید" class="text-input">
                                    <input type="text" name="email" id="email" size="50" value="{{ old('email') }}" placeholder="ایمیل خود را وارد کنید"
                                        class="text-input">
                                    <input type="password" name="password" id="website" placeholder="رمز خود را وارد کنید" class="text-input">
                                    <input type="password" name="password_confirmation" id="subject" placeholder="رمز خود را تکرار کنید" class="text-input">
                                    <input type="submit" name="submit" class="button mini" id="submit_btn"
                                        value="ثبت نام">
                                    <br class="clear">
                            </form>
                        </div>
                </div><!-- end contactform -->
                <p></p>

            </section>

        </div>
        </section>

        <aside class="two columns">

            <div class="sidebar">
                <ul>
                    <li class="widget-container">
                        <h2 class="widget-title">آدرس ما</h2>
                        <div class="textarea">
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                                است.
                            </p>

                            <p> Telp: +98 500 600 222<br>
                                Fax: +98 500 600 111</p>

                            <a href="mailto:testmail@yourdomain.com">testmail@yourdomain.com</a><br>
                            <a href="http://www.yourdomain.com">www.yourdomain.com</a>
                        </div>
                    </li>
                    <li class="widget-container">
                        <a href="#"><img src="images/content/banner.gif" alt=""></a>
                    </li>
                </ul>
            </div>

        </aside>

    </div>
    </div>
@endsection
