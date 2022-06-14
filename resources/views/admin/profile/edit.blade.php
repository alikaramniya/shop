@extends('layouts.admin.master')

@section('title', '{{ $user->name }}')

@section('content')
    <!--main content start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    اطلاعات پروفایل {{ auth()->user()->name }}

                    <style>
                        .insertOk {
                            display: none;
                        }
                    </style>
                    @if (session('success'))
                        <div class="btn btn-success insertOk">
                            {{ session('message') }}
                        </div>
                    @endif
                </header>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ route('profile_update') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">نام کاربری</label>
                            <input autofocus type="text" class="form-control" name="username" value="{{ $user->profile->username }}"
                                id="exampleInputEmail1" placeholder="نام کاربر خود را وارد کنید">
                            @error('username')
                                <span style='color:red'>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">نام خانوادگی</label>
                            <input type="text" class="form-control" name="lastName" value="{{ $user->profile->lastName }}"
                                id="exampleInputEmail1" placeholder="نام خانوادگی خود را وارد کنید">
                            @error('lastName')
                                <span style='color:red'>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">تصویر</label>
                            <input type="file" name="image" id="exampleInputFile">
                            <p class="help-block">آپلود تصویر جدید</p>
                            <img src="{{ asset('storage/'. $user->profile->image) }}" alt="" width="100" height="100">
                        </div>
                        @error('image')
                            <span style='color:red'>{{ $message }}</span>
                        @enderror
                        <div class="form-group">
                            <label>آدرس</label>
                            <textarea class="form-control" name="address">{{ $user->profile->address }}</textarea>
                        </div>
                        @error('demo')
                            <span style='color:red'>{{ $message }}</span>
                        @enderror
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
