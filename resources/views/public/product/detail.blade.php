@extends('layouts.master')

@section('title', 'جزعیات محصول');

@section('content')

    <div id="outermain">
        <div class="container">
            <div class="row">

                <section id="maincontent" class="ten columns positionright">
                    <div class="padcontent">

                        <section class="content" id="product-detail">

                            <div class="breadcrumb"><a href="index.html">صفحه اصلی</a> /محصولات / لباس زنانه</div>
                            <h1 class="pagetitle">{{ $product->title }}</h1>

                            <div class="row">
                                <div class="one_fourth columns">
                                    <div id="pb-left-column">
                                        <div class="image-block">
                                            <div id="imageitems" class="flexslider">
                                                <ul class="slides">
                                                    <li class="flex-active-slide"
                                                        style="width: 100%; float: left; margin-right: -100%; position: relative; display: list-item;">
                                                        <a class="image" href="images/content/products/p-1.jpg"
                                                                         data-rel="prettyPhoto[mixed]" rel="prettyPhoto[mixed]">
                                                            <img src="{{ asset('storage/' . $product->image) }}" alt="">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="three_fourth columns">

                                    <p>{{ $product->demo }}</p>
                                    <div class="price">{{ $product->price }} <span>تومان</span></div>
                                    <form action="#" method="get" class="product_attributes">
                                        <fieldset class="attribute_fieldset">
                                            <label class="attribute_label">رنگ:</label>
                                            <div class="attribute_list">
                                                <select>
                                                    @foreach ($product->colors as $color)
                                                        @if ($color->first)
                                                            <option option="{{ $color->id }}" selected="selected">
                                                            {{ $color->title }}</option>
                                                        @endif
                                                        <option option="{{ $color->id }}">{{ $color->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <br>
                                            <label class="qty_label">تعداد:</label>
                                            <div class="qty_list">
                                                <select>
                                                    @foreach (range(1, $product->count) as $key => $value)
                                                        <option title="1" selected="selected">1</option>
                                                        <option title="2">2</option>
                                                        <option title="3">3</option>
                                                        <option title="4">4</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </fieldset>
                                    </form>

                                    <a href="checkout.html" class="cart">افزودن به سبد خرید</a>
                                    <form action="index.html" class="compare">
                                        <input type="checkbox" class="comparator">
                                        <label>
                                            افزودن برای مقایسه
                                        </label>
                                    </form>

                                </div>
                            </div>

                            <div class="separator"></div>

                            <div class="tabcontainer">
                                <ul class="tabs">
                                    <li class="active"><a href="#tab0">
                                            اطلاعات بیشتر
                                        </a></li>
                                        <li><a href="#tab1">
                                                ورقه داده ها
                                            </a></li>
                                </ul>
                                <div class="tab-body">
                                    <div id="tab0" class="tab-content" style="display: block;">
                                        <p>{{ $product->description }}</p>
                                    </div>
                                    <div id="tab1" class="tab-content" style="display: none;">
                                        {{-- TODO add form for comment product --}}
                                    </div>

                                </div>
                            </div>

                        </section>

                    </div>
                </section>

                <aside class="two columns">

                    <div class="sidebar">
                        <ul>
                            <li class="widget-container">
                                <h2 class="widget-title">ردههای صفحه</h2>
                                <ul>
                                    @if ($listCategory as $category)

                                    @endif
                                    <li><a href="#">
                                            لباس (8)
                                        </a>
                                        <ul>
                                            <li><a href="#">
                                                    لباس زن (4)
                                                </a></li>
                                                <li><a href="#">کت و شلوار (4)</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">
                                            مبلمان (4)
                                        </a></li>
                                        <li><a href="#">
                                                وسایل الکترونیکی (4)
                                            </a></li>
                                            <li><a href="#">
                                                    لوازم جانبی (4)
                                                </a></li>
                                                <li><a href="#">
                                                        کفش (4)
                                                    </a></li>
                                </ul>
                            </li>
                            <li class="widget-container">
                                @if ($relatedProduct->count() > 1)
                                    <h2 class="widget-title">
                                        پیشنهادات ویژه
                                    </h2>
                                    <ul class="sp-widget">
                                        @foreach ($relatedProduct as $pro)
                                            @if ($product->id == $pro->id)
                                                @continue
                                            @endif
                                            <li>
                                                <img src="{{ asset('storage/' . $pro->image) }}" alt="">
                                                <h3><a href="#">{{ $pro->title }}</a></h3>
                                                <div class="price">{{ $pro->price }} تومان</div>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>

                        </ul>
                    </div>

                </aside>

            </div>
        </div>
    </div>

@endsection
