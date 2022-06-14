@extends('layouts.master')

@section('title', 'تماس با ما')

@section('content')
    </div>
    <div id="outermain">
        <div class="container">
            <div class="row">
                <section id="maincontent" class="ten columns positionright">
                    <div class="padcontent">
                        <section class="content">
                            <div class="breadcrumb"><a href="index.html">سفحه اصلی</a> /تماس با ما</div>
                            <h1 class="pagetitle">تماس با ما</h1>
                            <div class="frame">
                                <iframe
                                    src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Jalan+Kemanggisan+Utama,+Jakarta,+Indonesia&amp;sll=37.0625,-95.677068&amp;sspn=46.092115,79.013672&amp;ie=UTF8&amp;hq=&amp;hnear=Jalan+Kemanggisan+Utama,+Jakarta+Barat,+Jakarta,+Indonesia&amp;ll=-6.189793,106.7908&amp;spn=0.016639,0.034246&amp;z=14&amp;iwloc=A&amp;output=embed"
                                    style="width:100%; height:316px; border:0; margin:0 0 0px 0; display:block;"></iframe>
                            </div>
                            <br>

                            <h3>
                                فرم تماس با ما
                            </h3>
                            <style>
                                input::placeholder,
                                textarea::placeholder {
                                    font-size: 15px;
                                }

                                .hiddenInfo {
                                    display: none;
                                }

                            </style>
                            @if (session('success') && session('success') == 'ok')
                                <h3 style="color:green" id="showInfo">
                                    {{ session('message') }}
                                </h3>
                            @endif
                            <div id="contactform">
                                <form id="contact" method="POST" action="{{ route('contact_store') }}">
                                    @csrf
                                    <fieldset>

                                        <div class="right">
                                            <input type="text" name="name" id="name" size="50" value=""
                                                placeholder="نام خود را وارد کنید (اجباری)" class="text-input">
                                            @error('name')
                                                <span style="color:red">{{ $message }}</span>
                                            @enderror
                                            <input type="text" name="email" id="email" size="50" value=""
                                                placeholder="ایمیل خود را وارد کنید (اجباری)" class="text-input">
                                            @error('email')
                                                <span style="color:red">{{ $message }}</span>
                                            @enderror
                                            <input type="text" name="subject" id="subject" value=""
                                                placeholder="موضوع را انتخاب کنید (اجباری)" class="text-input">
                                            @error('subject')
                                                <span style="color:red">{{ $message }}</span>
                                            @enderror
                                            <input type="text" name="website" id="website" value=""
                                                placeholder="نام وب سایت خود را وارد کنید (اختیاری)" class="text-input">
                                            @error('website')
                                                <span style="color:red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="left">
                                            <textarea cols="60" rows="10" name="message" id="msg" class="text-input"
                                                placeholder="متن خود را وارد کنید (اجباری)"></textarea>
                                            @error('message')
                                                <span style="color:red">{{ $message }}</span>
                                            @enderror
                                            <br class="clear">
                                            <input type="submit" name="submit" class="button mini" id="submit_btn"
                                                value="ارسال پیام">
                                        </div>
                                    </fieldset>
                                </form>
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
                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                        گرافیک
                                        است.</p>

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
    </div>

    <script>
        let showInfo = document.getElementById('showInfo');
        setTimeout(() => {
            showInfo.classList.add('hiddenInfo');
        }, 3000)
    </script>
@endsection
