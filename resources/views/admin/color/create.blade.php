@extends('layouts.admin.master')

@section('title', 'افزودن رنگ جدید')

@section('content')
    <!--main content start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    رنگ محصول

                    <style>
                        .removeInsertOk {
                            display: none;
                        }

                    </style>
                    @if (session('success'))
                        <span
                            class="btn btn-{{ session('success') == 'ok' ? 'success' : 'primary' }} insertOk">{{ session('message') }}</span>
                    @endif
                </header>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ route('color_insert') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">عنوان</label>
                            <input type="text" autofocus class="form-control" name="title" id="exampleInputEmail1"
                                placeholder="رنگ محصول">
                            @error('title')
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
