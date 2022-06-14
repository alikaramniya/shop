@extends('layouts.master')

@section('content')
    <div class="headline">
        <div class="container">
            <div class="row">
                <div class="twelve columns">
                    <h1>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                        گرافیک است </h1>
                </div>
            </div>
        </div>
    </div>


    </div>
    <!-- MAIN CONTENT -->
    <div id="outermain">
        <div class="container">
            <div class="row">
                <section id="maincontent" class="twelve columns">

                    <section class="content">

                        <div class="featured-products">
                            <div class="header-wrapper">
                                <h2>
                                    محصولات ویژه
                                </h2><span></span>
                                <div class="clear"></div>
                            </div>
                            <div class="row">

                            @if ($listBestProducts->count())
                                @foreach ($listBestProducts as $product)
                                    <div class="one_fifth columns">
                                        <div class="product-wrapper">
                                            <a title="White Dress" href="{{ route('home_detail', $product) }}"><img
                                                    width="140" height="140" src="{{ asset('storage/' . $product->image) }}" alt="" /></a>
                                            <h3><a title="White Dress" href="{{ route('home_detail', $product) }}">
                                                {{ $product->title }}
                                                </a></h3>
                                            <div class="price-cart-wrapper">
                                                <div class="price">
                                                    {{ number_format($product->price) }}
                                                </div>
                                                <div class="cart">
                                                    <a href="product-details.html" class="more">بیشتر</a> | <a
                                                        href="#" class="buy">فروش</a>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            </div>
                        </div>

                        <div class="row">
                            <div class="one_third columns"><img src="images/content/EasyCustomize.jpg" alt=""
                                    class="border" /></div>
                            <div class="one_third columns"><img src="images/content/AwesomeAdmin.jpg" alt=""
                                    class="border" /></div>
                            <div class="one_third columns"><img src="images/content/sofaAwesome.jpg" alt=""
                                    class="border" /></div>
                        </div>

                        <div class="new-products">
                            <div class="header-wrapper">
                                <h2>
                                    به تازگی افزوده شده
                                </h2><span></span>
                                <div class="clear"></div>
                            </div>
                            <div class="row">

                                @if ($listNewProducts->count())
                                    @foreach ($listNewProducts as $product)
                                        <div class="one_fifth columns">
                                            <div class="product-wrapper">
                                                <a title="Woman's Dress Flower" href="{{ route('home_detail', $product) }}"><img
                                                        src="{{ asset('storage/' . $product->image) }}" alt="" /></a>
                                                <h3>
                                                    <a title="Woman's Dress Flower" href="{{ route('home_detail', $product) }}">
                                                        {{ $product->title }}
                                                    </a>
                                                </h3>
                                                <div class="price-cart-wrapper">
                                                    <div class="price">
                                                       {{ number_format($product->price) }}
                                                    </div>
                                                    <div class="cart">
                                                        <a href="product-details.html" class="more">بیشتر</a> | <a
                                                            href="#" class="buy">فروش</a>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                        </div>

                        <div class="row">
                            <div class="one_half columns"><img src="images/content/FlexibleLayout.png" alt="" />
                            </div>
                            <div class="one_half columns"><img src="images/content/WellDocumented.png" alt="" />
                            </div>
                        </div>

                    </section>

                </section>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
@endsection
