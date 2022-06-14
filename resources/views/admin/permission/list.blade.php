@extends('layouts.admin.master')

@section('title', 'لیست دسترسی ها')

@section('content')
    <!--main content start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    لیست دسترسی ها <a href="{{ route('permission_create') }}" class="btn btn-info btn-md">افزودن نقش
                        جدید</a>

                    @if (session('success'))
                        <style>
                            .removeInsertOk {
                                display: none;
                            }

                        </style>
                        <span class="insertOk btn btn-success">{{ session('message') }}</span>
                    @endif
                </header>
                @if ($permissions->count())
                    <table class="table table-striped table-advance table-hover">
                        <thead>
                            <tr>
                                <th>عنوان انگلیسی</th>
                                <th>عنوان فارسی</th>
                                <th>وضعیت</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->title }}</td>
                                    <td>{{ $permission->persian_title }}</td>
                                    <td>
                                        <a href="{{ $permission->status->value == 'active' ? route('permission_update_status', [$permission->id, 'unactive']) : route('permission_update_status', [$permission->id, 'active']) }}"
                                            class="btn btn-{{ $permission->status->value == 'active' ? 'success' : 'danger' }} btn-md">
                                            <i
                                                class="icon-{{ $permission->status->value == 'active' ? 'smile' : 'frown' }}"></i>
                                            </button>
                                    </td>
                                    <td>
                                        <a href="{{ route('permission_edit', $permission->id) }}"
                                            class="btn btn-primary btn-md"><i class="icon-edit"></i></a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('permission_delete', $permission->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-md"><i class="icon-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <a href="{{ route('permission_create') }}" class="btn btn-danger btn-lg btn-block">لیست دسترسی ها
                        خالیست برای افزودن دسترسی جدید کلیک کنید</a>
                @endisset
        </section>
        {{ $permissions->links() }}
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
