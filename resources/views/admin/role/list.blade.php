@extends('layouts.admin.master')

@section('title', 'لیست نقش ها')

@section('content')
    <!--main content start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    لیست نقش ها <a href="{{ route('role_create') }}" class="btn btn-info btn-md">افزودن نقش جدید</a>

                    @if (session('success'))
                        <style>
                            .removeInsertOk {
                                display: none;
                            }

                        </style>
                        <span class="insertOk btn btn-success">{{ session('message') }}</span>
                    @endif
                </header>
                @if ($roles->count())
                    <table class="table table-striped table-advance table-hover">
                        <thead>
                            <tr>
                                <th>عنوان انگلیسی</th>
                                <th>عنوان فارسی</th>
                                <th>وضعیت</th>
                                <th>تعداد دسترسی</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->title }}</td>
                                    <td>{{ $role->persian_title }}</td>
                                    <td>
                                        <a href="{{ $role->status->value == 'active' ? route('role_update_status', [$role->id, 'unactive']) : route('role_update_status', [$role->id, 'active']) }}"
                                            class="btn btn-{{ $role->status->value == 'active' ? 'success' : 'danger' }} btn-md">
                                            <i
                                                class="icon-{{ $role->status->value == 'active' ? 'smile' : 'frown' }}"></i>
                                            </button>
                                    </td>
                                    {{-- <td> --}}
                                    {{--     <button class="btn btn-{{$role->status->value == 'active' ? 'success' : 'danger'}} btn-md"> --}}
                                    {{--     <i class="icon-{{$role->status->value == 'active' ? 'smile' : 'frown'}}"></i> --}}
                                    {{--     </button> --}}
                                    {{-- </td> --}}
                                    <td>
                                       {{ $role->permissions_count }} 
                                    </td>
                                    <td>
                                        <a href="{{ route('role_edit', $role->id) }}"
                                            class="btn btn-primary btn-md"><i class="icon-edit"></i></a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('role_delete', $role->id) }}">
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
                    <a href="{{ route('role_create') }}" class="btn btn-danger btn-lg btn-block">لیست نقش ها خالیست برای اضافه کردن نقش جدید کلیک کنید</a>
                @endisset
        </section>
        {{ $roles->links() }}
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
