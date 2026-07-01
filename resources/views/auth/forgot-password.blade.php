@extends('auth.layouts.master')

@section('content')
    <div class="form-wrapper">

        <!-- logo -->
        <div class="logo">
            <img src="{{asset('panel/assets/media/image/logo-sm.png')}}" alt="image">
        </div>
        <!-- ./ logo -->
        @include('admin.layouts.partials.messages')
        <h5>بازیابی رمز عبور</h5>

        <!-- form -->
        <form action="{{ route('password.email') }}" method="POST">
            <div class="form-group">
                <input type="text" name="email" class="form-control text-left" placeholder="ایمیل خود را وارد کنید"
                       dir="ltr" autofocus>
            </div>
            @if (session('status'))
                <div class="mb-4 font-medium text-sm" style="color: green">
                    {{ session('status') }}
                </div>
            @endif
            <button type="submit" class="btn btn-primary btn-block">ثبت</button>
            <hr>
            <p class="text-muted">یک عمل دیگر انجام دهید.</p>
            <a href="{{route('register')}}" class="btn btn-sm btn-outline-light mr-1 my-1">هم اکنون ثبت نام کنید!</a>
        </form>
        <!-- ./ form -->

    </div>
@endsection
