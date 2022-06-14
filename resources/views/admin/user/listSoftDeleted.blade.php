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
                            <th>اسم</th>
                            <th>ایمیل</th>
                            <th>تصویر</th>
                            <th>بن شده</th>
                            <th>حذف</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <img src="{{ asset(isset($user->profile->image) ? 'storage/' . $user->profile->image : 'admin/img/profile/profile.png') }}"
                                        width="24" height="24" />
                                </td>
                                <td>
                                    <a href="{{ route('user_ban_user_soft_deleted', $user->id) }}"
                                        class="btn btn-{{ $user->banned->value == 'no' ? 'danger' : 'success' }}">
                                        {{ $user->banned->value == 'no' ? 'unactive' : 'active' }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('user_restore', $user->id) }}" class="btn btn-info btn-sm">برگشت کاربر</a>
                                    <a href="{{ route('user_delete_softDeleted', $user->id) }}"
                                        class="btn btn-danger btn-sm">حذف قطعی</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
            {{ $users->links() }}
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
