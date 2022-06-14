@extends('layouts.admin.master')

@section('title', "ویرایش دسته بندی {{ $category->title }}")

@section('content')
    <!--main content start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    ویرایش {{ $category->title }}
                    
                    @if (session('success'))
                        <style>
                            .removeInsertOk {
                                display:none;
                            } 
                        </style>
                        <span class="insertOk btn btn-success">{{ session('message') }}</span>
                    @endif
                </header>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ route('category_update', $category->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="exampleInputEmail1">عنوان</label>
                            <input type="text" class="form-control" name="title" value="{{ $category->title }}" id="exampleInputEmail1" placeholder="عنوان دسته بندی">
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
                                <input type="radio" name="status" id="optionsRadios1" value="unactive" @if($category->status->value == 'unactive') checked @endif>
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
                                    @foreach ($mainCategory as $cat)
                                        <option value="{{ $cat->id }}"
                                        @if ($category->cat_id == $cat->id) selected @endif
                                        >{{ $cat->title }}</option>
                                    @endforeach
                                @endisset
                            </select>
                            @error('cat_id')
                                <span style='color:red'>{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-info">به روز رسانی</button>
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
