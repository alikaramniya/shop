@extends('layouts.admin.master')

@section('title', 'لیست کاربران سایت')

@section('content')
    <!--main content start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    لیست کاربران

                    <div class="panel-body">
                        <form class="form-inline" method="GET" action="{{ route('user_search') }}" role="form">
                            @csrf
                            <div class="form-group">
                                <input type="text" autofocus class="form-control" name="search" id="exampleInputEmail2"
                                    size="30" placeholder="کاربر را بر اساس نام یا ایمیل جستجو کنید">
                            </div>
                            <button type="submit" class="btn btn-success">جستجو</button>
                        </form>
                    </div>

                    @if ($isHaveSoftDeletedUser)
                        <a class="btn btn-info btn-sm" href="{{ route('user_list_soft_deleted') }}">
                            لیست کاربر های حذف موقت
                        </a>
                    @endif

                    @if (session('success'))
                        <style>
                            .removeInsertOk {
                                display: none;
                            }

                        </style>
                        <span class="insertOk btn btn-{{ session('success') == 'ok' ? 'success' : 'warning' }}">{{ session('message') }}</span>
                    @endif
                </header>
                @if ($users->count())
                    <table class="table table-striped table-advance table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th>اسم</th>
                                <th>اطلاعات پروفایل</th>
                                <th>ایمیل</th>
                                <th>تصویر</th>
                                <th>آنلاین</th>
                                <th>بن شده</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                                <tr>
                                <td>{{ $key + 1 }} .</td>
                                    <td>{{ $user->name }}</td>
                                    <td><a href="{{ route('user_profile_show', $user) }}"
                                            class="btn btn-info btn-sm">show</a></td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <img src="{{ asset(isset($user->profile->image) ? 'storage/' . $user->profile->image : 'admin/img/profile/profile.png') }}"
                                            width="24" height="24" />
                                    </td>
                                    <td>
                                        @if (Cache::has('is_online' . $user->id))
                                            <span style="color:green">online</span>
                                        @else
                                            <span style="color:red">offline</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('user_ban_user', $user->id) }}"
                                            class="btn btn-{{ $user->banned->value == 'no' ? 'danger' : 'success' }}">
                                            {{ $user->banned->value == 'no' ? 'unactive' : 'active' }}
                                        </a>

                                    </td>
                                    <td>
                                        <a href="{{ route('user_edit', $user) }}" class="btn btn-primary btn-sm"><i
                                                class="icon-edit"></i></a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('user_soft_delete', $user) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-warning btn-sm">حذف موقت</button>
                                        </form>
                                        <form method="post" action="{{ route('user_force_delete', $user) }}">
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
                        <a href="{{ route('user_create') }}" class="btn btn-danger btn-lg btn-block">لیست محصولات خالیست
                            برای افزودن محصول جدید کلیک کنید</a>
                    @endif
                @endisset
        </section>
    </div>
    {{ $users->links('pagination') }}
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
