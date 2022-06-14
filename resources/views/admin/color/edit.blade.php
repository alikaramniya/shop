@extends('layouts.admin.master')

@section('title', "ویرایش رنگ {{ $color->title }}")

@section('content')
    <!--main content start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    ویرایش {{ $color->title }}
                    
                    @if(session('success'))
                        <style>
                            .removeInsertOk {
                                display:none;
                            } 
                        </style>
                        <span class="insertOk" style="color:green">update Ok!</span>
                    @endif
                </header>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ route('color_update', $color->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="exampleInputEmail1">عنوان</label>
                            <input type="text" class="form-control" name="title" value="{{ $color->title }}" id="exampleInputEmail1" placeholder="عنوان دسته بندی">
                            @error('title')
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
