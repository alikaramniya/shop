@extends('layouts.admin.master')

@section('title', 'محصولاتی که موقتا حذف شده اند')

@section('content')
    <!--main content start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    لیست محصولات حذف شده

                    <style>
                        .removeInsertOk {
                            display: none;
                        }

                    </style>
                    @if (session('success'))
                        <span class="insertOk btn btn-success">{{ session('message') }}</span>
                    @endif
                </header>
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
                                <td>{{ $product->price }}</td>
                                <td><img src="{{ asset('storage/' . $product->image) }}" width="70" height="70" />
                                </td>
                                <td>
                                    <a href="{{ route('product_update', $product->id) }}" class="btn btn-primary btn-sm"><i
                                            class="icon-edit"></i></a>
                                </td>
                                <td>
                                    <a href="{{ route('product_restore', $product->id) }}"
                                        class="btn btn-info btn-sm">برگرشت
                                        محصول</a>
                                    <a href="{{ route('product_delete_softDeleted', $product->id) }}"
                                        class="btn btn-danger btn-sm">حذف قطعی</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
            {{ $products->links() }}
        </div>
    </div>
    <script>
        let insertOk = document.querySelector('.insertOk');

        if (insertOk.nodeType == 1) {
            setTimeout(() => {
                insertOk.classList.add('removeInsertOk');
            }, 3000);
        }
    </script>
    <!--main content end-->
@endsection
