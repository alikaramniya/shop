@extends('layouts.admin.master')

@section('title', 'ویرایش رمز کاربر')

@section('content')
    <!--main content start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    ویرایش {{ $user->name }}

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
                    <form role="form" method="POST" action="{{ route('user_update', $user) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="exampleInputEmail1">رمز جدید کاربر را وارد کنید</label>
                            <input type="text" class="form-control" autofocus name="password" id="exampleInputEmail1"
                                placeholder="رمز را وارد کنید">
                            @error('password')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">نقش ها</label>
                            @if ($roles->count())
                                <select name="role_ids[]" multiple style="height:60px" class="form-control m-bot15">
                                    @isset($roles)
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"
                                                {{ $user->roles->contains($role->id) ? 'selected' : '' }}>
                                                {{ $role->title }}</option>
                                        @endforeach
                                    @endisset
                                </select>
                            @else
                                <a href="{{ route('role_create') }}" class="btn btn-danger btn-lg btn-block">
                                    لیست نقش ها خالیست برای افزودن نقش جدید کلیک کنید
                                </a>
                            @endif
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
