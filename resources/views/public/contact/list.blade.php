@extends('layouts.admin.master')

@section('title', 'لیست تماس ها')

@section('content')
    <!--main content start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
لیست تماس ها

                    @if (session('success'))
                        <style>
                            .removeInsertOk {
                                display: none;
                            }

                        </style>
                        <span class="insertOk btn btn-success">{{ session('message') }}</span>
                    @endif
                </header>
                @if ($contacts->count())
                    <table class="table table-striped table-advance table-hover">
                        <thead>
                            <tr>
                                <th>نام</th>
                                <th>ایمیل</th>
                                <th>موضوع</th>
                                <th>وضعیت</th>
                                <th>حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->subject }}</td>
                                    <td>
                                        <a href="{{ route('contact_read', $contact->id) }}" target="_blank" 
                                        class="btn btn-{{ $contact->state->value == 'read' ? 'success' : 'primary' }}">
                                        {{ $contact->state->value == 'read' ? 'خوانده شده' : 'خوانده نشده' }}
                                        </a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('contact_delete', $contact) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-md icon-trash"></button>
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
                        <a class="btn btn-danger btn-lg btn-block">
                        لیست تماس ها خالیست
                        </a>
                    @endif
                @endisset
        </section>
        {{ $contacts->links('pagination') }}
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
