@extends('layouts.admin.master')

@section('title', 'افزودن دسته بندی جدید')

@section('content')
    <!--main content start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    دسته بندی جدید

                    <style>
                        .removeInsertOk {
                            display: none;
                        }
                    </style>
                    @if (session('success') == 'Ok')
                        <span class="btn btn-success insertOk">{{ session('message') }}</span>
                    @elseif (session('success') == 'No')
                        <span class="btn btn-warning insertOk">{{ session('message') }}</span>
                    @endif
                </header>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ route('category_insert') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">عنوان</label>
                            <input type="text" autofocus class="form-control" name="title" id="exampleInputEmail1"
                                placeholder="عنوان دسته بندی">
                            @error('title')
                                <span style='color:red'>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">وضعیت</label> &nbsp;&nbsp;&nbsp;
                            <label>
                                <input type="radio" name="status" id="optionsRadios1" value="active" checked="">
                                فعال
                            </label> &nbsp;&nbsp;&nbsp;
                            <label>
                                <input type="radio" name="status" id="optionsRadios1" value="unactive">
                                غیر فعال
                            </label>
                            @error('status')
                                <span style='color:red'>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">دسته بندی</label>
                            <select name="cat_id" class="form-control m-bot15">
                                <option value="0">دسته بندی اصلی</option>
                                @isset($mainCategory)
                                    @foreach ($mainCategory as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                @endisset
                            </select>
                            @error('cat_id')
                                <span style='color:red'>{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-info">ارسال</button>
                    </form>
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
