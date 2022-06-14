@extends('layouts.admin.master')

@section('title', '{{ $user->name }}')

@section('content')
    <!--main content start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    اطلاعات پروفایل {{ auth()->user()->name }}

                </header>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ route('profile_store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">نام کاربری</label>
                            <input autofocus type="text" class="form-control" name="username"
                                id="exampleInputEmail1" placeholder="نام کاربری خود را وارد کنید">
                            @error('username')
                                <span style='color:red'>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">نام خانوادگی</label>
                            <input type="text" class="form-control" name="lastName"
                                id="exampleInputEmail1" placeholder="نام خانوادگی خود را وارد کنید">
                            @error('lastName')
                                <span style='color:red'>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">تصویر</label>
                            <input type="file" name="image" id="exampleInputFile">
                            <p class="help-block">آپلود تصویر جدید</p>
                        </div>
                        @error('image')
                            <span style='color:red'>{{ $message }}</span>
                        @enderror
                        <div class="form-group">
                            <label>آدرس</label>
                            <textarea class="form-control" name="address">{{ old('address') }}</textarea>
                        </div>
                        @error('demo')
                            <span style='color:red'>{{ $message }}</span>
                        @enderror
                        <button type="submit" class="btn btn-info">ارسال</button>
                    </form>
                </div>
            </section>
        </div>
    </div>
    <!--main content end-->
@endsection
