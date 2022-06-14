@extends('layouts.admin.master')

@section('title', 'افزودن دسترسی جدید')

@section('content')
    <!--main content start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    فرم دسترسی جدید

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
                    <form role="form" method="POST" action="{{ route('permission_insert') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">عنوان انگلیسی</label>
                            <input autofocus type="text" class="form-control" name="title" value="{{ old('title') }}"
                                id="exampleInputEmail1" placeholder="عنوان را به صورت انگلیسی وارد کنید">
                            @error('title')
                                <span style='color:red'>{{ __('english_title') }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">عنوان فارسی</label>
                            <input autofocus type="text" class="form-control" name="persian_title" value="{{ old('persian_title') }}"
                                id="exampleInputEmail1" placeholder="عنوان را به صورت فارسی وارد کنید">
                            @error('persian_title')
                                <span style='color:red'>{{ __('persian_title') }}</span>
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
