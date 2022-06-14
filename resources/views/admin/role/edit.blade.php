@extends('layouts.admin.master')

@section('title', 'ویرایش نقش {{ $role->title }}')

@section('content')
    <!--main content start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    فرم ویرایش نقش {{ $role->title }}
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
                    <form role="form" method="POST" action="{{ route('role_update', $role) }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="exampleInputEmail1">عنوان</label>
                            <input type="text" class="form-control" name="title" value="{{ $role->title }}"
                                id="exampleInputEmail1" placeholder="عنوان را به صورت انگلیسی وارد کنید">
                            @error('title')
                                <span style='color:red'>{{ __('english_title') }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">عنوان فارسی</label>
                            <input type="text" class="form-control" name="persian_title"
                                value="{{ $role->persian_title }}" id="exampleInputEmail1"
                                placeholder="عنوان را به صورت فارسی وارد کنید">
                            @error('persian_title')
                                <span style='color:red'>{{ __('persian_title') }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">دسترسی ها</label>
                            <select name="permission_ids[]" multiple style="height:60px" class="form-control m-bot15">
                                @isset($permissions)
                                    @foreach ($permissions as $permission)
                                        <option value="{{ $permission->id }}"
                                            {{ $listPermissionRole->contains($permission->id) ? 'selected' : '' }}>
                                            {{ $permission->title }}</option>
                                    @endforeach
                                @endisset
                            </select>
                            @error('cat_id')
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
                                <input type="radio" name="status" id="optionsRadios1" value="unactive"
                                    @if ($role->status->value == 'unactive') checked @endif>
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
