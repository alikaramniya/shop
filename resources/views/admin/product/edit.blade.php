@extends('layouts.admin.master')

@section('title', '{{ $product->title }}')

@section('content')
    <!--main content start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    {{ $product->title }} 

                    @if (session('success'))
                        <style>
                            .removeInsertOk {
                                display: none;
                            }

                        </style>
                        <span class="insertOk" style="color:green">{{ session('message') }}</span>
                    @endif
                </header>
                <div class="panel-body">
                    @if ($colors->isEmpty())
                        <a href="{{ route('color_create') }}" class="btn btn-danger btn-lg btn-block">برای افزودن محصول
                            باید حتما رنگ هایی را داشته باشید برای اضافه کردن رنگ کلیک کنید</a>
                    @elseif($subCategory->isEmpty())
                        <a href="{{ route('category_create') }}" class="btn btn-danger btn-lg btn-block">برای افزودن محصول
                            حتما باید زیر دسته بندی داشته باشید برای افزودن زیر دسته بندی کلیک کنید</a>
                    @else
                        <form role="form" method="POST" action="{{ route('product_update', $product) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="exampleInputEmail1">عنوان</label>
                                <input type="text" class="form-control" value="{{ $product->title }}" name="title" id="exampleInputEmail1"
                                    placeholder="عنوان محصول">
                                @error('title')
                                    <span style='color:red'>{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">دسته بندی</label>
                                <select name="category_id" class="form-control m-bot15">
                                    @isset($subCategory)
                                        @foreach ($subCategory as $category)
                                            <option value="{{ $category->id }}"
                                                @if ($product->category_id == $category->id)
                                                    selected
                                                @endif
                                            >{{ $category->title }}</option>
                                        @endforeach
                                    @endisset
                                </select>
                                @error('cat_id')
                                    <span style='color:red'>{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">رنگ ها</label>
                                <select name="colors[]" multiple class="form-control m-bot15">
                                    @isset($colors)
                                        @foreach ($colors as $color)
                                            <option value="{{ $color->id }}"
                                               {{ in_array($color->id, $product->colors()->pluck('id')->toArray()) ? 'selected' : ''}} 
                                            >{{ $color->title }}</option>
                                        @endforeach
                                    @endisset
                                </select>
                                @error('colors')
                                    <span style='color:red'>{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">تعداد</label>
                                <input type="text" class="form-control" name="count" value="{{ $product->count }}" id="exampleInputEmail1"
                                    placeholder="تعداد محصول موجود در انبار">
                                @error('count')
                                    <span style='color:red'>{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">تصویر</label>
                                <input type="file" name="image" id="exampleInputFile">
                                <p class="help-block">آپلود تصویر جدید</p>
                                <img src="{{ asset('storage/' . $product->image) }}" width="50" height="50" />
                            </div>
                            @error('image')
                                <span style='color:red'>{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputEmail1">قیمت</label>
                                <input type="text" class="form-control" name="price" value="{{ $product->price }}" id="exampleInputEmail1"
                                    placeholder="قیمت محصول">
                                @error('price')
                                    <span style='color:red'>{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>توضیحات کوتاه</label>
                                <textarea class="form-control" name="demo">{{ $product->demo }}</textarea>
                            </div>
                            @error('demo')
                                <span style='color:red'>{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <label>توضیحات کامل</label>
                                <textarea class="form-control" name="description">{{ $product->description }}</textarea>
                            </div>
                            @error('description')
                                <span style='color:red'>{{ $message }}</span>
                            @enderror
                            <button type="submit" class="btn btn-info">ارسال</button>
                        </form>
                    @endif
                </div>
            </section>
        </div>
    </div>
    <script>
        let insertOk = document.querySelector('.insertOk');

        if (insertOk.nodeType == 1) {
            console.log('Ok');
            setTimeout(() => {
                insertOk.classList.add('removeInsertOk');
            }, 3000);
        }
    </script>
    <!--main content end-->
@endsection
