@extends('layouts.admin.master')

@section('title', '{{ $user->name }}')

@section('content')
    <!--main content start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">

                    ارسال شده از طرف {{ $contact->name }}
                    <style>
                        .insertOk {
                            display: none;
                        }
                    </style>
                    @if (session('success'))
                        <div class="btn btn-success insertOk">
                            {{ session('message') }}
                        </div>
                    @endif
                </header>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ route('contact_delete', $contact) }}">
                    @csrf
                    @method('DELETE')
                        <div class="form-group">
                            <label for="exampleInputEmail1">موضوع</label>
                            <input autofocus type="text" class="form-control" value="{{ $contact->subject }}"
                                id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">ایمیل</label>
                            <input type="text" class="form-control" value="{{ $contact->email }}"
                                id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">وب سایت</label>
                            <input type="text" class="form-control" value="{{ $contact->website }}"
                                id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label>متن پیغام</label>
                            <textarea class="form-control" >{{ $contact->message }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-danger">حذف</button>
                        <a href="{{ route('contact_list') }}" class="btn btn-primary">بازگشت</a>
                    </form>
                </div>
            </section>
        </div>
    </div>
    <!--main content end-->
@endsection
