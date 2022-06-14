@extends('layouts.admin.master')

@section('title', 'لیست محصولات سایت')

@section('content')
    <!--main content start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    لیست محصولات
                    <div class="panel-body">
                        <form class="form-inline" method="GET" action="{{ route('product_search') }}" role="form">
                            @csrf
                            <div class="form-group">
                                <input type="text" autofocus class="form-control" name="search" id="exampleInputEmail2"
                                    size="30" placeholder="محصول مد نظر خود را جستجو کنید">
                            </div>
                            <button type="submit" class="btn btn-success">جستجو</button>
                        </form>
                    </div>
                    @if ($listSoftDeletedProduct)
                        <a href="{{ route('product_list_softDeleted') }}" class="btn btn-info">لیست محصولات حذف موقت</a>
                    @endif

                    @if (session('success'))
                        <style>
                            .removeInsertOk {
                                display: none;
                            }

                        </style>
                        <span class="insertOk btn btn-success">{{ session('message') }}</span>
                    @endif
                </header>
                @if ($products->count())
                    <table class="table table-striped table-advance table-hover">
                        <thead>
                            <tr>
                                <th>عنوان</th>
                                <th>سرگروه</th>
                                <th>قیمت</th>
                                <th>تصویر</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->title }}</td>
                                    <td>{{ $product->category->title }}</td>
                                    <td>{{ number_format($product->price) }} تومان</td>
                                    <td><img src="{{ asset('storage/' . $product->image) }}" width="70" height="70" />
                                    </td>
                                    <td>
                                        <a href="{{ route('product_edit', $product->id) }}"
                                            class="btn btn-primary btn-sm"><i class="icon-edit"></i></a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('product_delete_soft', $product->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-warning btn-sm">حذف موقت</button>
                                        </form>
                                        <form method="post" action="{{ route('product_delete_force', $product->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" style="width: 84px">حذف داعم</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    @if (session('search') && session('search') == 'notfound')
                        <button class="btn btn-info btn-lg btn-block">{{ session('message') }}</button>
                    @else
                        <a href="{{ route('product_create') }}" class="btn btn-danger btn-lg btn-block">
                            لیست محصولات خالیست
                            برای افزودن محصول جدید کلیک کنید
                        </a>
                    @endif
                @endisset
        </section>
        {{ $products->links('pagination') }}
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
