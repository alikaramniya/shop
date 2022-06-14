@extends('layouts.admin.master')

@section('title', 'لیست رنگ ها')

@section('content')
    <!--main content start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    لیست رنگ ها

                    @if (session('success'))
                        <style>
                            .removeInsertOk {
                                display: none;
                            }

                        </style>
                        <span class="insertOk btn btn-success">{{ session('message') }}</span>
                    @endif
                </header>
                @if ($colors->count())
                    <table class="table table-striped table-advance table-hover">
                        <thead>
                            <tr>
                                <th>عنوان</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($colors as $color)
                                <tr>
                                    <td>{{ $color->title }}</td>
                                    <td>
                                        <a href="{{ route('color_edit', $color->id) }}" class="btn btn-primary btn-sm">
                                            <i class="icon-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('color_delete', $color->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="icon-trash btn btn-danger btn-sm"></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <a href="{{ route('color_create') }}" class="btn btn-danger btn-lg btn-block">لیست رنگ ها خالیست برای اضافه کردن رنگ جدید کلیک کنید</a>
                @endisset
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
