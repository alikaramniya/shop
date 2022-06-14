@extends('layouts.admin.master')

@section('title', 'لیست دسته بندی ها')

@section('content')
    <!--main content start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    لیست دسته بندی ها
                    <div class="panel-body">
                        <form class="form-inline" method="GET" action="{{ route('category_search') }}" role="form">
                            @csrf
                            <div class="form-group">
                                <input type="text" autofocus class="form-control" name="search" id="exampleInputEmail2"
                                    size="30" placeholder="دسته بندی خود را جستجو کنید">
                            </div>
                            <button type="submit" class="btn btn-success">جستجو</button>
                        </form>
                    </div>
                    @if(session('success'))
                        <style>
                            .removeInsertOk {
                                display:none;
                            } 
                        </style>
                        <span class="insertOk btn btn-success">{{ session('message') }}</span>
                    @endif
                    <form method="POST" action="{{ route('category_delete_all', $categories->pluck('id')) }}">
                        @csrf
                        <button class="btn btn-danger">حذف همه</button>
                    </form>
                </header>
                @if ($categories->count())
                <table class="table table-striped table-advance table-hover">
                    <thead>
                        <tr>
                            <th>عنوان</th>
                            <th>وضعیت</th>
                            <th>سرگروه</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->title }}</td>
                                <td>
                                    <button class="btn btn-{{$category->status->value == 'active' ? 'success' : 'danger'}} btn-md">
                                    <i class="icon-{{$category->status->value == 'active' ? 'smile' : 'frown'}}"></i>
                                    </button>
                                </td>
                                <td>
                                    @if ($category->cat_id == 0)
                                       سرگروه 
                                    @else
                                        {{ $category->subCat->title }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('category_edit', $category->id) }}" class="btn btn-primary btn-md"><i class="icon-edit"></i></a>
                                </td>
                                <td>
                                    <form method="post" action="{{ route('category_delete', $category->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="icon-trash btn btn-danger btn-md"></button>
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
                        <a href="{{ route('category_create') }}" class="btn btn-danger btn-lg btn-block">لیست دسته بندی خالیست برای افزودن دسته بندی جدید کلیک کنید</a>
                    @endif
                @endisset
            </section>
            {{ $categories->links('pagination') }}
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
