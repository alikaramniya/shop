@extends('layouts.admin.master')

@section('title', '{{ $user->name }}')

@section('content')
    <!--main content start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    اطلاعات پروفایل{{ $user->name }}

                    @if (session('success'))
                        <style>
                            .removeInsertOk {
                                display: none;
                            }

                        </style>
                        <span class="insertOk btn btn-success">{{ session('message') }}</span>
                    @endif
                </header>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ route('profile_update', $user) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="exampleInputEmail1">نام</label>
                            <input type="text" class="form-control" disabled value="{{ $user->name }}"
                                id="exampleInputEmail1" placeholder="عنوان محصول">
                            @error('name')
                                <span style='color:red'>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">نام خانوادگی</label>
                            <input type="text" class="form-control" value="{{ $user->profile->lastName }}"
                                name="lastName" id="exampleInputEmail1" placeholder="نام خانوادگی">
                            @error('lastName')
                                <span style='color:red'>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">نام کاربری</label>
                            <input type="text" class="form-control" name="username"
                                value="{{ $user->profile->username }}" id="exampleInputEmail1" placeholder="نام کاربری">
                            @error('username')
                                <span style='color:red'>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">تصویر</label>
                            <input type="file" name="image" id="exampleInputFile">
                            <p class="help-block">آپلود تصویر جدید</p>
                            <img src="{{ asset($user->profile->image ? 'storage/' . $user->profile->image : 'admin/img/profile/profile.png') }}"
                                width="50" height="50" />
                        </div>
                        @error('image')
                            <span style='color:red'>{{ $message }}</span>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputEmail1">آدرس</label>
                            <input type="text" class="form-control" name="address"
                                value="{{ $user->profile->address }}" id="exampleInputEmail1" placeholder="قیمت محصول">
                            @error('address')
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
